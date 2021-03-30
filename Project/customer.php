<?php   session_start();
   require 'db.php';

  
   if (isset($_POST['number'])){
	    $Number=$_POST['number'];
		$contact=$_POST['num'];
		$name=$_POST['name'];
		$town=$_POST['address'];
		$type=$_POST['type'];
	
	$query="INSERT INTO customer (number,num,name,address,type)
	VALUES('$Number','$contact','$name','$town','$type')";

	
    if (mysqli_query($conn,$query)){
		header("Location: order.php");
		
	}else{
		echo "Error".$query."<br>".mysqli_error($conn);
	}
	mysqli_close($conn);
	}
   ?>
   <!DOCTYPE html>
<html lang="en">


<head>

<style>
ul {
    list-style-type: none;
    margin: 0;
    padding: 0;
    overflow: hidden;
    background-color: #333;
}

li {
    float: left;
}

li a {
    display: block;
    color: white;
    text-align: center;
    padding: 14px 16px;
    text-decoration: none;
}

li a:hover:not(.active) {
    background-color: #111;
}

.active {
    background-color: #654321;


	
}
</style>

    <meta charset="utf-8">
	<title>SLICE-FROM-HEVEN</title>

	<link rel="stylesheet" href="css/style.css">

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
</head>

<body>
<ul>
  <li><a class="active" href="login.php">Home</a></li>
  <li><a href="logout.php">Logout</a></li>
  <li><a href="order.php">Order</a></li>
  <li><a href="information.php">Information</a></li>

</ul>

		<div class="login-box animated fadeInUp">
			<div class="box-header">
				<h2>Customer Information</h2>
				<form method="POST">
			</div>
			<label for="number">Order Number</label>
			<br/>
			<input type="number" id="number" name="number"  min="1" required>
			</br>
			<label for="num">Contact Number</label>
			<br/>
			<input type="num" id="num" name="num" required>
			<br/>

			
			<label for="name">Customer's Name</label>
			<br/>
			<input type="name" id="name" name="name" required>
			<br/>
			<label for="address">Home Town</label>
			<br/>
			<input type="address" id="address" name="address" required>
			<br/>
			<select name="type">
				<option value="dinein">Dine In </option>
				<option value="carryout">Carry Out</option>
				
			</select>
  <br><br>
			<button type="submit">OK</button>
			</br></br>
            <button ><a class="active" href="order.php">Order items</button>
			<br/>
</form>
			
		</div>
	</div>
</body>


</html>