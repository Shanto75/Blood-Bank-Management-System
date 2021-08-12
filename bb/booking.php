<?php
session_start();
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true) {
    header("location: userlogin.php");
    exit;
}
$showAlert = false;
$showError = false;
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_SESSION['email'];
    $bloodgroup = $_POST['bloodgroup'];
    $unit = $_POST['quantity'];
    $reqdate = date("Y-m-d");
    $expirydate = $_POST['date'];

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
        $sql = "INSERT INTO `blood-request`(`user_mail`, `blood_group`, `unit`, `req_date`, `req_expire_date`) VALUES  ('$email','$bloodgroup','$unit','$reqdate','$expirydate')";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            $showAlert = true;
        } else {
            $showError = "failed to Send Blood Request !!";
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

    <title>Booking</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <?php require 'navbar.php' ?>

    <?php
    if ($showAlert) {
        echo ' <div class="text-center alert alert-success alert-dismissible fade show" role="alert">
        <strong>Success!</strong> Blood Request successfully !!.
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
        <h1 class="text-center">Request for Blood Bag</h1>
        <form action="booking.php" method="post" class="item-center">
            <input type="hidden" name="mode" value="PinRequest" />
            <div class="mb-3 col-md-4">
                <label for="exampleInputDate1" class="form-label">Blood Group</label>
                <select name="bloodgroup" id="bloodgroup" class="form-select" aria-label="Default select example">
                    <option value="" disabled selected>Select Blood Group</option>
                    <option value="A+">A+</option>
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
            <div class="mb-3 col-md-4">
                <label for="exampleInputNumber1" class="form-label">Quantity</label>
                <select class="form-select" name="quantity" id="quantity" onchange="calculateAmount(this.value)" required>
                    <option value="" disabled selected>Quantity</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                    <option value="7">7</option>
                </select>
            </div>
            <hr>
            <div class="mb-3 col-md-4">
                <label for="exampleInputNumber1" class="form-label">Price in TK</label>
                <input type="text" class="form-control" name="price" id="price" readonly>
            </div>
            <hr>
            <div class="mb-3 col-md-4">
                <label for="exampleInputDate1" class="form-label">date of collecting</label>
                <input type="date" class="form-control" name="date" id="date">
            </div>
            <hr>
            <div class="mb-3">
                <button type="submit" class="btn btn-outline-danger px-5 py-3">Submit</button>
            </div>
            <hr>
        </form>
    </div>

    <script>
        function calculateAmount(val) {
            var tot_price = val * 100;
            /*display the result*/
            var divobj = document.getElementById('price');
            divobj.value = tot_price;
        }
    </script>
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->

    <!-- <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
</body>

</html>