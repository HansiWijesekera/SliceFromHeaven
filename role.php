<?php
session_start();


if($_SESSION['roletype']=="admin"){
	header('location:admincustomer.php');
}else if($_SESSION['roletype']=="user"){
	header('location: customer.php');

}

?>