<?php
session_start();
$error = false;
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Connecting to the Database
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "bbms";

    // Create a connection
    $conn = mysqli_connect($servername, $username, $password, $database);
    // Die if connection was not successful
    if (!$conn) {
        die("Sorry we failed to connect: " . mysqli_connect_error());
    } else {

        $email = $_POST['email'];
        $pass = $_POST['pass'];

        $sql = "Select * from admin where email='$email'";
        $result = mysqli_query($conn, $sql);
        $num = mysqli_num_rows($result);
        if ($num == 1) {
            while ($row = mysqli_fetch_assoc($result)) {

                if (password_verify($pass, $row['pass'])) {
                    session_start();
                    $_SESSION['loggedin'] = true;
                    $_SESSION['admin'] = 'admin';
                    $_SESSION['email'] = $email;
                    header("location: admin.php");
                } else {
                    $error = "Invalid Input";
                }
            }
        } else {
            $error = "Invalid Input";
        }
    }
}
?>

<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

  <title>Admin Login</title>
  <link rel="stylesheet" href="style.css">
</head>

<body>
  <?php require 'navbar.php' ?>

  <?php

  if ($error) {
    echo ' <div class="text-center alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Error!</strong> ' . $error . '
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
    </div> ';
  }
  ?>

  <div class="container mt-5 p-5 ">
    <h1 class="text-center">Admin LogIn</h1>
    <form action="adminLogin.php" method="post">
      <hr>
      <div class="mb-3 col-md-6">
        <label for="exampleInputEmail1" class="form-label">Email Address</label>
        <input type="email" class="form-control" name="email" id="exampleInputEmail1" aria-describedby="emailHelp">
      </div>
      <div class="mb-3 col-md-6">
        <label for="exampleInputPassword1" class="form-label">Password</label>
        <input type="password" class="form-control" name="pass" id="exampleInputPassword1">
      </div>
      <button type="submit" class="py-3 mt-4 px-5 btn btn-outline-danger">Submit</button>
    </form>
  </div>


  <!-- Optional JavaScript; choose one of the two! -->

  <!-- Option 1: Bootstrap Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

  <!-- Option 2: Separate Popper and Bootstrap JS -->

  <!-- <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
</body>

</html>