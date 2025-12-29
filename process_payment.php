<?php
if($_SERVER["REQUEST_METHOD"] !== "POST"){
    die("Invalid request");
}

function clean($data){
    return htmlspecialchars(trim($data));
}

$card_name = clean($_POST['card_name']);
$card_number = preg_replace('/\D/','', $_POST['card_number']);
$expiry = clean($_POST['expiry']);
$cvv = clean($_POST['cvv']);
$amount = floatval($_POST['amount']);

$errors = [];


if(strlen($card_name) < 3){
    $errors[] = "Invalid cardholder name";
}

if(strlen($card_number) < 13 || strlen($card_number) > 19) {
    $errors[] = "Invalid card number";
}

function luhnCheck($number) {
    $sum = 0;
    $alt = false;

    for($i = strlen($number) - 1; $i >= 0; $i--){
        $n = intval($number[$i]);
        if($alt) {
            $n *= 2;
            if($n > 9) $n -= 9;
        }
        $sum += $n;
        $alt = !$alt;
    }

    if(!luhnCheck($card_number)){
        $errors[] = "Card number failed validation";
    }

    if(!preg_match('/^(0[1-9]|1[0-2])\/\d{2}$/', $expiry)){
        $errors[] = "Invalid expiry date format";
    }else{
        list($mm, $yy) = explode('/', $expiry);
        $expiryTime = strtotimr("20$yy-$mm-01 +1 month");
        if($expiryTime < time()){
            $errors[] = "Card has expired";
        }
    }

    if(!preg_match('/^\d{3,4}$/', $cvv)) {
        $errors[] = "Invalid CVV";
    }

    if($amount <= 0){
        $errors[] = "Invalid payment amount";
    }

    if(!empty($errors)){
        echo "<h3>Payment Failed</h3><ul>";
        foreach ($errors as $error){
            echo "<li>$error</li>";
        }
        echo "</ul><a href='payment.php'>Go Back</a>";
        exit;
    }

    $maskedCard = str_repeat("*", strlen($card_number) -4). substr($card_number, -4);

    echo "
    <h2>Payment Successful </h2>
    <p><strong>Amount:</strong> $maskedCard</p>
    <p>Thank you for payment at airstar.</p>
    <a href='index.php'>Return Home Page</a>
    ";

}