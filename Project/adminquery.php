<?php
   require 'db.php';
   session_start();
   $sql1="INSERT INTO cus_order(id,emp_no,price,main_item_data,extra_item_data) (SELECT items.id,items.emp_no,items.price,items.main_item_data,items.extra_item_data FROM items)";

   

  if (mysqli_query($conn, $sql1))  {
   
    header("Location: adminorder.php");
} else {
      echo "Order Confirmation Unsuccesfull. Please Try Again" ;
  }

   ?>
