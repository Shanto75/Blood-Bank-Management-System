
<?php
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
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Home</title>
    <!-- <link rel="stylesheet" href="style.css"> -->
  </head>

  <body>

  <?php Require 'navbar.php' ?>

    <div class="container mt-3">
      <h1 class="text-center">Donor List</h1><hr>
      <div class="m-5">
            <table class="table table-dark table-striped table-hover">
                <thead>
                    <tr>
                    <th scope="col">serial</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email Address</th>
                    <th scope="col">Birth Day</th>
                    <th scope="col">Blood Group</th>
                    <th scope="col">Gender</th>
                    <th scope="col">Mobile Number</th>
                    <th scope="col">City</th>
                    </tr>
                </thead>

                <tbody>
                    <?php
                    $sql = "SELECT * FROM `donor-reg`";
                    $result = mysqli_query($conn, $sql);
                    $c=1;
                    while($row = mysqli_fetch_assoc($result)){
                        echo " <tr>
                        <th scope='row'> ". $c." </th>
                        <td>". $row['name']."</td>
                        <td>". $row['email']."</td>
                        <td>". $row['birthday']."</td>
                        <td>". $row['bloodgroup']."</td>
                        <td>". $row['gender']."</td>
                        <td>". $row['mobilenumber']."</td>
                        <td>". $row['city']."</td>
                        </tr>";
                        $c=$c+1;
                    }
                    ?>
                </tbody>

            </table>
      </div><hr>
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