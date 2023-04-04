<?php
session_start();

if (isset($_SESSION['id']) && isset($_SESSION['user_name'])) {

 ?>
<!DOCTYPE html>
<html>
<head>
	<title>HOME</title>
	<link rel="stylesheet" type="text/css" href="style1.css">
</head>
<body>
	<form>
		<h2>ISI DATA</h2>
		
		<label>Name</label>
		<input type="text" name="name" placeholder="Name"><br>

		<label>University</label>
		<input type="text" name="univ" placeholder="University"><br>

		<label>Gpa</label>
		<input type="text" name="gpa" placeholder="Gpa"><br>

		<button href="phpmyadmin.php">Submit</button>
	</form>
<div class="cont1">
	<a class="cont1">Print</a>
	<a class="cont1" href="logout.php">Logout</a>	
</div> 
</body>
</html>

<?php
}else{
	header("Location: index.php?");
	exit();
}
 ?>

