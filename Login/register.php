<?php
include "connectlogin.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $fullname  = mysqli_real_escape_string($conn, $_POST['fullname']);
    $username  = mysqli_real_escape_string($conn, $_POST['username']);
    $email     = mysqli_real_escape_string($conn, $_POST['email']);
    $password  = mysqli_real_escape_string($conn, $_POST['password']);

    // Check username or email duplicates
    $check = "SELECT * FROM users WHERE username='$username' OR email='$email'";
    $result = $conn->query($check);

    if ($result->num_rows > 0) {
        echo "Username or Email already exists!";
        exit();
    }

    // Hash password
    $hashed_password = password_hash($password, PASSWORD_BCRYPT);

    // Insert user
    $sql = "INSERT INTO users (fullname, username, email, password)
            VALUES ('$fullname', '$username', '$email', '$hashed_password')";

    if ($conn->query($sql) === TRUE) {
        echo "Account created successfully!";
        header("Location: index.html");
    } else {
        echo "Error: " . $conn->error;
    }
}
?>
