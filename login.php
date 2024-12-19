<?php
$email = $_GET["loginemail"];
$psw = $_GET["loginpassword"];


$connection = mysqli_connect("localhost:3306", "root", "") or die("Failed to connect to database");

if (!$connection) {
    echo "
    <script>
      window.location.href = `error.php?error=".mysqli_error($connection)."`; 

    </script>
    ";
} 



$connection->select_db("marsexplorer");


$email = mysqli_real_escape_string($connection, $email);
$psw = mysqli_real_escape_string($connection, $psw);


$myQuery = "SELECT FIRST_NAME,LAST_NAME FROM users WHERE EMAIL='$email' AND PASSWORD='$psw'";


if ($result = $connection->query($myQuery)) {
    if ($result->num_rows > 0) {
        $row = $result->fetch_array();
        $username = $row[0].' '. $row[1];
        echo "
        <script>
        var uname = '$username'; 
        localStorage.setItem('uname', uname);
         localStorage.setItem('email', '$email');
         localStorage.setItem('password', '$psw');
        console.log(localStorage.getItem('uname'));
        alert('Welcome '+localStorage.getItem('uname')+' !');
        window.location.href = 'userpage.php'; 
        </script>
        ";
    } 
   
    else {
       
        echo "
        <script>
        alert('User not found!');
          window.location.href = 'userpage.php';
        </script>
        ";
    }
} else {
    echo "<br>Error in query execution: " . $connection->error;
    exit();
}


mysqli_close($connection);
?>
