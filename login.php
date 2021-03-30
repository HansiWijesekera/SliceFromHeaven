<?php
   require 'db.php';
   session_start();
   
   if (isset($_POST['Empno'])){

	$Number=$_POST['Empno'];
	$Password=md5($_POST['password']);
	
	$query="SELECT * from employee where Empno='$Number' and password='$Password'";
	
	$result=mysqli_query($conn,$query);
	$count=mysqli_num_rows($result);
	
	if($count>0){
		$row=mysqli_fetch_row($result);
		$_SESSION['Empno']=$row[0];
		$_SESSION['roletype']=$row[2];

		header('location:role.php');
	}else
		echo "Account Invalid";
}	
?>
<html lang="en">

<head>
	

	<meta charset="utf-8">
	<title>SLICE-FROM-HEVEN</title>

    <link rel="stylesheet" href="css/style.css">

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
</head>

<body>
	


	<div class="container">
		<div class="top">
			<h1 id="title" class="hidden"><span id="logo"><marquee width="35%" direction="left" height="100px">
SLICE FROM HEVEN
</marquee></span></h1>
		</div>
		<div class="login-box animated fadeInUp">
			<div class="box-header">
				<h2>Log In</h2>
			</div>

	<form method="POST">
			
			<label for="Empno">Employee Number</label>
			<br/>
			<input type="Empno" id="Empno" name="Empno">
			<br/>
			<label for="password">Password</label>
			<br/>
			<input type="password" id="password"  name="password">
			<br/>
			<button type="submit">OK</button><br/></br>
			
			<br/>
	</form>
			
		</div>
	</div>
</body>


</html>