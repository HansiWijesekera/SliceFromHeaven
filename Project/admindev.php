<?php
 require 'db.php';
 session_start();

$sql = "DELETE FROM items";

if (mysqli_query($conn, $sql))  {
    header("Location: admincustomer.php");
} else {
    echo "Your Payment Unsucessfull" . mysqli_error($conn);
}

mysqli_close($conn);
?>