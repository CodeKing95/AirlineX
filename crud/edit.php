<?php include 'db.php'; ?>

<?php
$id = $_GET['id'];
$result = mysqli_query($conn, "SELECT * FROM passengers WHERE id=$id");
$row = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Passenger</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>

<body class="bg-light">

<div class="container mt-5">

    <h2 class="mb-4">Edit Passenger</h2>

    <form method="POST">
        
        <div class="mb-3">
            <label>First Name</label>
            <input type="text" name="firstname" value="<?= $row['firstname'] ?>" class="form-control">
        </div>

        <div class="mb-3">
            <label>Last Name</label>
            <input type="text" name="lastname" value="<?= $row['lastname'] ?>" class="form-control">
        </div>

        <div class="mb-3">
            <label>DOB</label>
            <input type="date" name="dob" value="<?= $row['dob'] ?>" class="form-control">
        </div>

        <div class="mb-3">
            <label>Country</label>
            <input type="text" name="country" value="<?= $row['country'] ?>" class="form-control">
        </div>

        <div class="mb-3">
            <label>City</label>
            <input type="text" name="city" value="<?= $row['city'] ?>" class="form-control">
        </div>

        <div class="mb-3">
            <label>Address</label>
            <input type="text" name="address" value="<?= $row['address'] ?>" class="form-control">
        </div>

        <div class="mb-3">
            <label>Postcode</label>
            <input type="text" name="postcode" value="<?= $row['postcode'] ?>" class="form-control">
        </div>

        <div class="mb-3">
            <label>Mobile</label>
            <input type="text" name="mobile" value="<?= $row['mobile'] ?>" class="form-control">
        </div>

        <div class="mb-3">
            <label>Email</label>
            <input type="email" name="email" value="<?= $row['email'] ?>" class="form-control">
        </div>

        <div class="mb-3">
            <label>Passport No</label>
            <input type="text" name="passport" value="<?= $row['passport'] ?>" class="form-control">
        </div>

        <div class="mb-3">
            <label>Passport ID</label>
            <input type="text" name="passportid" value="<?= $row['passportid'] ?>" class="form-control">
        </div>

        <button type="submit" name="update" class="btn btn-warning">Update</button>
        <a href="index.php" class="btn btn-secondary">Cancel</a>
    </form>

</div>

</body>
</html>

<?php
if (isset($_POST['update'])) {

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

    $sql = "UPDATE passengers SET 
            firstname='$firstname',
            lastname='$lastname',
            dob='$dob',
            country='$country',
            city='$city',
            address='$address',
            postcode='$postcode',
            mobile='$mobile',
            email='$email',
            passport='$passport',
            passportid='$passportid'
            WHERE id=$id";

    mysqli_query($conn, $sql);
    header("Location: crud.php");
    exit;
}
?>
