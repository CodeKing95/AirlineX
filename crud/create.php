<?php include 'db.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <title>Add Passenger</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">

    <style>
        /* ===== PAGE ===== */
        body {
            min-height: 100vh;
            background: linear-gradient(135deg, #eef2ff, #e0e7ff);
            font-family: 'Segoe UI', sans-serif;
            animation: pageFade 1s ease forwards;
            opacity: 0;
        }

        @keyframes pageFade {
            to { opacity: 1; }
        }

        /* ===== GLASS CARD ===== */
        .glass-card {
            background: rgba(255, 255, 255, 0.8);
            backdrop-filter: blur(14px);
            border-radius: 18px;
            padding: 35px;
            box-shadow: 0 30px 60px rgba(0,0,0,0.12);
            animation: slideUp 1s ease forwards;
            transform: translateY(40px);
            opacity: 0;
        }

        @keyframes slideUp {
            to {
                transform: translateY(0);
                opacity: 1;
            }
        }

        /* ===== TITLE ===== */
        h2 {
            text-align: center;
            font-weight: 700;
            margin-bottom: 10px;
            position: relative;
            animation: fadeDown 1s ease forwards;
            opacity: 0;
        }

        h2::after {
            content: "";
            display: block;
            width: 70px;
            height: 4px;
            margin: 10px auto 20px;
            border-radius: 10px;
            background: linear-gradient(90deg, #0d6efd, #6610f2);
            animation: growLine 1s ease forwards;
        }

        @keyframes fadeDown {
            to { opacity: 1; transform: translateY(0); }
        }

        @keyframes growLine {
            from { width: 0; }
            to { width: 70px; }
        }

        /* ===== FORM INPUTS ===== */
        .form-group {
            position: relative;
            margin-bottom: 22px;
            animation: inputFade 0.6s ease forwards;
            opacity: 0;
        }

        @keyframes inputFade {
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .form-control {
            padding: 12px 12px;
            border-radius: 10px;
            border: 1px solid #ddd;
            transition: all 0.3s ease;
        }

        .form-control:focus {
            border-color: #0d6efd;
            box-shadow: 0 0 0 0.2rem rgba(13,110,253,.25);
        }

        /* ===== BUTTONS ===== */
        .btn {
            padding: 10px 22px;
            border-radius: 50px;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .btn-success:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 25px rgba(25,135,84,0.4);
        }

        .btn-secondary:hover {
            transform: translateY(-2px);
        }

        /* ===== BUTTON GROUP ===== */
        .btn-group-custom {
            display: flex;
            gap: 12px;
            justify-content: center;
            margin-top: 25px;
        }
    </style>
</head>

<body>

<div class="container mt-5">
    <div class="glass-card mx-auto" style="max-width: 720px;">

        <h2>Add New Passenger</h2>
        <p class="text-center text-muted mb-4">
            Enter passenger personal & travel details
        </p>

        <form method="POST" action="">

            <?php
            $delay = 0;
            function animatedInput($label, $name, $type = "text", $required = false, &$delay) {
                $delay += 0.05;
                $req = $required ? "required" : "";
                echo "
                <div class='form-group' style='animation-delay: {$delay}s'>
                    <label class='mb-1'>$label</label>
                    <input type='$type' name='$name' class='form-control' $req>
                </div>";
            }

            animatedInput("First Name", "firstname", "text", true, $delay);
            animatedInput("Last Name", "lastname", "text", true, $delay);
            animatedInput("Date of Birth", "dob", "date", true, $delay);
            animatedInput("Country", "country", "text", true, $delay);
            animatedInput("City", "city", "text", true, $delay);
            animatedInput("Address", "address", "text", false, $delay);
            animatedInput("Postcode", "postcode", "text", false, $delay);
            animatedInput("Mobile", "mobile", "text", false, $delay);
            animatedInput("Email", "email", "email", false, $delay);
            animatedInput("Passport Number", "passport", "text", false, $delay);
            animatedInput("Passport ID", "passportid", "text", false, $delay);
            ?>

            <div class="btn-group-custom">
                <button type="submit" name="submit" class="btn btn-success">
                    💾 Save Passenger
                </button>
                <a href="index.php" class="btn btn-secondary">
                    Cancel
                </a>
            </div>

        </form>
    </div>
</div>

</body>
</html>

<?php
if (isset($_POST['submit'])) {

    $firstname  = $_POST['firstname'];
    $lastname   = $_POST['lastname'];
    $dob        = $_POST['dob'];
    $country    = $_POST['country'];
    $city       = $_POST['city'];
    $address    = $_POST['address'];
    $postcode   = $_POST['postcode'];
    $mobile     = $_POST['mobile'];
    $email      = $_POST['email'];
    $passport   = $_POST['passport'];
    $passportid = $_POST['passportid'];

    $sql = "INSERT INTO passengers 
    (firstname, lastname, dob, country, city, address, postcode, mobile, email, passport, passportid)
    VALUES 
    ('$firstname','$lastname','$dob','$country','$city','$address','$postcode','$mobile','$email','$passport','$passportid')";

    mysqli_query($conn, $sql);
    header("Location: crud.php");
    exit;
}
?>
