<?php
 require 'db.php';
 session_start();

$sql = "DELETE FROM items";

if (mysqli_query($conn, $sql))  {
    
    header("Location: customer.php");
} else {
    echo "Your Payment Unsucessfull Please Try Again";
}

mysqli_close($conn);
?>