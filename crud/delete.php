<?php
include 'db.php';

$id = $_GET['id'];

mysqli_query($conn, "DELETE FROM passengers WHERE id=$id");

header("Location: crud.php");
exit;
?>
