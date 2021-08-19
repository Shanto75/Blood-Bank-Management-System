<?php
session_start();
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true) {
    header("location: userlogin.php");
    exit;
}
$showAlert = false;
$showError = false;
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $recipt_no = $_POST['Reciptno'];
    $bagid = $_POST['bagid'];
    $bloodgroup = $_POST['bloodgroup'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $mobile = $_POST['mobilenumber'];
    $price = $_POST['price'];
    $date = date("Y-m-d");


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
        $sql = "INSERT INTO `bill`(`receipt_no`, `bagid`, `bloodgroup`, `buyer_name`, `email`, `mobile`, `price`, `date`) VALUES  ('$recipt_no','$bagid','$bloodgroup','$name','$email','$mobile','$price','$date')";
        $result = mysqli_query($conn, $sql);
        $_SESSION['id'] = $recipt_no;
        if ($result) {
            $showAlert = true;
        } else {
            $showError = "failed !!";
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
    <link rel="stylesheet" href="style.css">
    <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
    integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous"> -->
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
    <title>Payment</title>
</head>

<body>

    <?php require 'navbar.php' ?>
    <?php
    if ($showAlert) {
        echo ' <div class="text-center alert alert-success alert-dismissible fade show" role="alert">
        <strong>Success!</strong> !!.
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
        <h1 class="text-center">Payment Form</h1>
        <hr>
        <form action="payment.php" method="post">
            <div class="col-md-4 mx-auto">
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Recipt Number</label>
                    <input type="number" class="form-control" name="Reciptno" id="Reciptno">
                </div>
                <hr>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Blood Bag ID</label>
                    <input type="number" class="form-control" name="bagid" id="bagid">
                </div>
                <hr>
                <div class="mb-3">
                    <label for="exampleInputDate1" class="form-label">Blood Group</label>
                    <select name="bloodgroup" id="bloodgroup" class="form-select" aria-label="Default select example"required>
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
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Buyer Name</label>
                    <input type="text" class="form-control" name="name" id="name" aria-describedby="emailHelp">
                </div>
                <hr>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Email</label>
                    <input type="email" class="form-control" name="email" id="email" aria-describedby="emailHelp">
                </div>
                <hr>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Mobile Number</label>
                    <input type="number" class="form-control" name="mobilenumber" id="mobilenumber">
                </div>
                <hr>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Total Price (Taka)</label>
                    <input type="number" class="form-control" name="price" id="price" aria-describedby="emailHelp">
                </div>
                <hr>
                <button type="submit" class="py-3 mt-4 px-5 btn btn-outline-danger">Submit</button>
                <a type='submit' name='submit' class='py-3 mt-4 px-5 btn btn-danger' href='printbill.php'>Print</a>
            </div>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src="//cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    </script>


</body>

</html>