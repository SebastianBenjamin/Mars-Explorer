<?php

$fname = $_GET["registerfname"];
$lname = $_GET["registerlname"];
$email = $_GET["loginemail"];
$psw = $_GET["loginpassword"];
$mob = $_GET["registermob"];
$dob = $_GET["registerdob"];
$gen = $_GET["gender"];
$country = $_GET["registercountry"];


$connection = mysqli_connect("localhost:3306", "root", "") or die("Failed to connect to the database");

if (!$connection) {
  echo "
  <script>
  window.location.href = 'error.html'; 
  </script>
  ";
} 


mysqli_select_db($connection, "marsexplorer");


$query = "INSERT INTO users (first_name, last_name, email, password, mobile, date_of_birth, country,gender) 
          VALUES ('$fname', '$lname', '$email', '$psw', '$mob', '$dob', '$country','$gen')";


if (mysqli_query($connection, $query)) {
    echo "
        <script>
        var uname = '$fname'+' '+ '$lname'; 
        localStorage.setItem('uname', uname);
        console.log(localStorage.getItem('uname'));
        localStorage.setItem('email', '$email');
         localStorage.setItem('password', '$psw');
        window.location.href = 'userpage.php'; 
          alert('Welcome '+localStorage.getItem('uname')+' !');
        </script>
        ";
} else {
  echo "
  <script>
  window.location.href = `error.php?error=".mysqli_error($connection)."`; 

    </script>
  ";
   
}


mysqli_close($connection);
?>
