<?php

$name = $_GET["tname"];
$email = $_GET["temail"];
$date = $_GET["tdate"];
$dob = $_GET["tdob"];
$gender = $_GET["gender"];
$class = $_GET["class"];
$row = $_GET["row"];
$seat = $_GET["seat"];
$launch = $_GET["launch"];
$land = $_GET["land"];
$ins = $_GET["insurance"];
$med = $_GET["medical"];
$pemail = $_GET["pemail"];
$id = $_GET["id"];



$connection = mysqli_connect("localhost:3306", "root", "") or die("Failed to connect to the database");


if (!$connection) {
    echo "
    <script>
      window.location.href = `error.php?error=".mysqli_error($connection)."`; 

    </script>
    ";
} 


mysqli_select_db($connection, "marsexplorer");


$query = "INSERT INTO tickets (id,passenger_name, dob, pemail, email,  departure_date, flight_class, row_number,seat_type,launch_site,landing_site,insurance,medical,gender) 
          VALUES ('$id','$name', '$dob', '$pemail', '$email','$date', '$class', '$row', '$seat','$launch','$land','$ins','$med','$gender')";

// Execute the query
if (mysqli_query($connection, $query)) {
    echo "
        <script>
        alert('Ticket Booking Success ! \\n Ticket no : '+'$id' );
        window.location.href = 'ticket.html'; 
        </script>
        ";
} else {
    echo "<h2>Error: " . mysqli_error($connection) . "</h2>";
}


mysqli_close($connection);
?>
