<!DOCTYPE html>
<html>
<head>
	<title>LOGIN</title>
	<link rel="stylesheet" type="text/css" href="style1.css">
</head>
<body>
	<img src="logo_telu.png" width="180" height="200">
	<form action="login.php" method="post">
		<h2>LOGIN</h2>
		<?php if (isset($_GET['error'])) { ?>
			<p class="error"><?php echo $_GET['error']; ?></p>
		<?php } ?>
		<label>Username</label>
		<input type="text" name="uname" placeholder="Username"><br>

		<label>Password</label>
		<input type="text" name="password" placeholder="Password"><br>

		<button type="submit">Login</button>
<div class="cont3">
	<a class="cont3" href="verifikasi.php">Verifikasi</a>
</div> 
	</form>
</body>
</html>
