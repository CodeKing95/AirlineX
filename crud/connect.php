<?php

$con=new mysqli('localhost', 'root', 'passenger');

if(!$con){
    echo "Connection Successfull";
}else{
    die(mysqli_error($con));
}

?>