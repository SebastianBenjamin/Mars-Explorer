<?php

if (isset($_GET['id'])) {
    $id = $_GET['id']; 

    
    $connection = mysqli_connect("localhost:3306", "root", "", "marsexplorer");

    if (!$connection) {
        echo "
        <script>
          window.location.href = `error.php?error=".mysqli_error($connection)."`; 

        </script>
        ";
    } 
    

    
    $myQuery = "DELETE FROM tickets WHERE id = ?";

    
    $stmt = $connection->prepare($myQuery);
    $stmt->bind_param("s", $id); 
     

    
    if ($stmt->execute()) {
      echo"<script>

       window.location.href = 'loadticket.php?ppemail='+localStorage.getItem('email');
       alert('Ticket Cancellation Success !');
      </script> ";
    } else {
      echo" <script>
          window.location.href = `error.php?error=".mysqli_error($connection)."`; 

        </script>";
    }

    
    $stmt->close();
    
    mysqli_close($connection);
}
mysqli_close($connection);

?>
