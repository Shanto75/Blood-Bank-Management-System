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
  <?php Require 'navbar.php' ?>

    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST'){

        $name = $_POST['name'];
        $email = $_POST['email'];
        $birthday = $_POST['birthday'];
        $bloodgroup = $_POST['bloodgroup'];
        $gender = $_POST['gender'];
        $mobilenumber = $_POST['mobilenumber'];
        $city = $_POST['city'];
        $pass = $_POST['pass'];
        
      // Connecting to the Database
      $servername = "localhost";
      $username = "root";
      $password = "";
      $database = "bbms";

      // Create a connection
      $conn = mysqli_connect($servername, $username, $password, $database);
      // Die if connection was not successful
      if (!$conn){
          die("Sorry we failed to connect: ". mysqli_connect_error());
      }
      else{ 
        // Submit these to a database
        // Sql query to be executed 
        $sql = "INSERT INTO `donor-reg` (`name`, `email`, `birthday`, `bloodgroup`, `gender`, `mobilenumber`, `city`, `pass`) VALUES ('$name','$email','$birthday','$bloodgroup','$gender','$mobilenumber','$city','$pass')";
        $result = mysqli_query($conn, $sql);
 
        if($result){
          echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
          <strong>Success!</strong> Your entry has been submitted successfully!
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>';
        }
        else{
            // echo "The record was not inserted successfully because of this error ---> ". mysqli_error($conn);
            echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
          <strong>Error!</strong> We are facing some technical issue and your entry ws not submitted successfully! We regret the inconvinience caused!
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>';
        }
      }
    }
?>

    <div class="container mt-5 p-5 ">
        <h1 class="text-center">Donor Regestration Form</h1>
        <form action="donor-reg.php" method="post" class="item-center"> 
            <div class="mb-3 col-md-6">
              <label for="exampleInputName1" class="form-label">Name</label>
              <input type="text" class="form-control" name="name" id="exampleInputName1" >
            </div><hr>
            <div class="mb-3 col-md-6">
              <label for="exampleInputEmail1" class="form-label">Email Address</label>
              <input type="email" class="form-control" name="email" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div><hr>
            <div class="mb-3 col-md-6">
              <label for="exampleInputDate1" class="form-label">Birth Day</label>
              <input type="date" class="form-control" name="birthday" id="exampleInputDate1" >
            </div><hr>
            <div class="mb-3 col-md-6">
            <label for="exampleInputDate1" class="form-label">Blood Group</label>
                <select name="bloodgroup" class="form-select" aria-label="Default select example">
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
                <label for="exampleInputName1" class="form-label">Gender</label>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="gender" id="exampleRadios1" value="Male">
                    <label class="form-check-label" for="exampleRadios1">Male</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="gender" id="exampleRadios2" value="Female">
                    <label class="form-check-label" for="exampleRadios2">Female</label>
                </div>
            </div><hr>
            <div class="mb-3 col-md-6">
              <label for="exampleInputNumber1" class="form-label">Mobile Number</label>
              <input type="number" class="form-control" name="mobilenumber" id="mobilenumber" >
            </div><hr>
            <div class="mb-3 col-md-6">
                <label for="exampleInputName1" class="form-label">City</label>
                <input type="text" class="form-control" name="city" id="city" >
            </div><hr>
            <div class="mb-3 col-md-6">
              <label for="exampleInputPassword1" class="form-label">Password</label>
              <input type="password" class="form-control" name="pass" id="exampleInputPassword1">
            </div><hr>
            <div class="mb-3">
                <button type="submit" class="btn btn-outline-danger px-5 py-3">Submit</button>
            </div><hr>
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