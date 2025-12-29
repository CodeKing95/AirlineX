<?php
if(isset($_POST['submit'])){
  $first=$_POST['first'];
  $last=$_POST['last'];
  $dob=$_POST['dob'];
  $address=$_POST['address'];
  $city=$_POST['city'];
  $flight=$_POST['flight'];

  $sql="insert into 'passenger(first,last,dob,address,city,flight) values('$first','$last','$dob','$address','$city','$flight')";
  $result=mysqli_query($con,$sql);
  if($result){
    echo "Data inserted successfully";
  }else{
    die(mysqli_error($con));
  }

}
?>


<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Crud Passenger</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>
    <h1></h1>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>
  </head>
  <body>
    <div class="container">
    <form method="post">
  <div class="mb-3">
    <label>First Name:</label>
    <input type="first" class="form-control" placeholder="Enter your first name...">
  </div>

  <div class="mb-3">
    <label>Last Name:</label>
    <input type="last" class="form-control" placeholder="Enter your last name...">
  </div>

  <div class="mb-3">
    <label>Date Of Birth:</label>
    <input type="date" class="form-control">
  </div>

  <div class="mb-3">
    <label>Address:</label>
    <input type="address" class="form-control" placeholder="Enter your address...">
  </div>

  <div class="mb-3">
    <label>City:</label>
    <input type="city" class="form-control" placeholder="Enter your City...">
  </div>

  <div class="mb-3">
    <label>Flight ID:</label>
    <input type="flight" class="form-control" placeholder="Enter your flight ID...">
  </div>

  <button type="submit" class="btn btn-primary">Submit</button>
</form>
    </div>
  </body>
</html>