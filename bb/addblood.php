<?php
session_start();
$showAlert = false;
$showError = false;
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $bagid = $_POST['bagid'];
  $donorname = $_POST['donorname'];
  $email = $_POST['email'];
  $mobilenumber = $_POST['mobilenumber'];
  $bloodgroup = $_POST['bloodgroup'];
  $unit = $_POST['unit'];
  $storedate = $_POST['storedate'];
  $expirydate = $_POST['expirydate'];

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
    $sql = "INSERT INTO `bloodstock`(`bagid`, `donorname`, `email`, `mobilenumber`, `bloodgroup`, `unit`, `storedate`, `expirydate`) VALUES  ('$bagid','$donorname','$email','$mobilenumber','$bloodgroup','$unit','$storedate','$expirydate')";
    $result = mysqli_query($conn, $sql);
    if ($result) {
      $showAlert = true;
    }
    else{
      $showError = "failed to insert your information!!";
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

  <title>Donor Regestration</title>
  <link rel="stylesheet" href="style.css">
</head>

<body>
  <?php require 'navbar.php' ?>

  <?php
  if ($showAlert) {
    echo ' <div class="text-center alert alert-success alert-dismissible fade show" role="alert">
        <strong>Success!</strong> Information successfully Stored!!.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div> ';
  }
  if ($showError) {
    echo ' <div class="text-center alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Error!!</strong> ' . $showError . '
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div> ';
  }
  ?>

  <div class="container mt-5 p-5 ">
    <h1 class="text-center">Add Blood Unit</h1>
    <form action="addblood.php" method="post" class="item-center">
      <div class="mb-3 col-md-6">
        <label for="exampleInputName1" class="form-label">Bag Id</label>
        <input type="number" class="form-control" name="bagid" id="bagid">
      </div>
      <hr>
      <div class="mb-3 col-md-6">
        <label for="exampleInputEmail1" class="form-label">Donor Name</label>
        <input type="text" class="form-control" name="donorname" id="donorname" aria-describedby="emailHelp">
      </div>
      <hr>
      <div class="mb-3 col-md-6">
        <label for="exampleInputEmail1" class="form-label">Email Address</label>
        <input type="email" class="form-control" name="email" id="email" aria-describedby="emailHelp">
      </div>
      <hr>
      <div class="mb-3 col-md-6">
        <label for="exampleInputNumber1" class="form-label">Mobile Number</label>
        <input type="number" class="form-control" name="mobilenumber" id="mobilenumber">
      </div>
      <hr>
      <div class="mb-3 col-md-6">
        <label for="exampleInputDate1" class="form-label">Blood Group</label>
        <select name="bloodgroup" id="bloodgroup" class="form-select" aria-label="Default select example">
          <option value="A+" selected>A+</option>
          <option value="A-">A-</option>
          <option value="B+">B+</option>
          <option value="B-">B-</option>
          <option value="O+">O+</option>
          <option value="O-">O-</option>
          <option value="AB+">AB+</option>
          <option value="AB-">AB-</option>
        </select>
      </div>
      <hr>
      <div class="mb-3 col-md-6">
        <label for="exampleInputNumber1" class="form-label">Units</label>
        <input type="number" class="form-control" name="unit" id="unit">
      </div>
      <hr>
      <div class="mb-3 col-md-6">
        <label for="exampleInputDate1" class="form-label">Storing Date</label>
        <input type="date" class="form-control" name="storedate" id="storedate">
      </div>
      <hr>
      <div class="mb-3 col-md-6">
        <label for="exampleInputDate1" class="form-label">Expiry Date</label>
        <input type="date" class="form-control" name="expirydate" id="expirydate">
      </div>
      <hr>
      <div class="mb-3">
        <button type="submit" class="btn btn-outline-danger px-5 py-3">Submit</button>
      </div>
      <hr>
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