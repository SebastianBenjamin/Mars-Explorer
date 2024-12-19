<?php
// Get form data from the URL parameters using GET
$fname = $_GET["registerfname"];
$lname = $_GET["registerlname"];
$email = $_GET["loginemail"];
$psw = $_GET["loginpassword"];
$mob = $_GET["registermob"];
$dob = $_GET["registerdob"];
$country = $_GET["registercountry"];
$gen = $_GET["gender"];


$connection = mysqli_connect("localhost:3306", "root", "") or die("Failed to connect to the database");


if (!$connection) {
    echo "
    <script>
      window.location.href = `error.php?error=".mysqli_error($connection)."`; 

    </script>
    ";
} 

mysqli_select_db($connection, "marsexplorer");


$query = "UPDATE users SET first_name ='$fname', last_name='$lname', password='$psw', mobile='$mob', date_of_birth='$dob', country= '$country',gender='$gen'
          WHERE email='$email'";


if (mysqli_query($connection, $query)) {
    echo "<script>
      alert('updated !');
       window.location.href = 'userpage.php?loginemail=$email&&loginpassword=$psw'; 
        </script>
        ";
} else {
    echo "<h2>Error: " . mysqli_error($connection) . "</h2>";
}


mysqli_close($connection);
?>
