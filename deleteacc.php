<?php

if (isset($_GET['email'])) {
    $email = $_GET['email']; 

    
    $connection = mysqli_connect("localhost:3306", "root", "", "marsexplorer");

    if (!$connection) {
        echo "
        <script>
          window.location.href = `error.php?error=".mysqli_error($connection)."`; 

        </script>
        ";
    } 
    

    
    $myQuery = "DELETE FROM users WHERE email = ?";
    $myQuery1 = "DELETE FROM tickets WHERE pemail = ?";

    
    $stmt = $connection->prepare($myQuery);
    $stmt1 = $connection->prepare($myQuery1);
    $stmt->bind_param("s", $email); 
    $stmt1->bind_param("s", $email); 

    
    if ($stmt->execute()&&$stmt1->execute()) {
      echo"<script>
       window.location.href = 'login.html';
      </script> ";
    } else {
        echo "Error: " . $stmt->error;
        echo "Error: " . $stmt1->error;
    }

    
    $stmt->close();
    $stmt1->close();
    mysqli_close($connection);
} else {
    echo "No email provided.";
}
mysqli_close($connection);

?>
