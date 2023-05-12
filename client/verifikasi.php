<!DOCTYPE html>
<html>
<head>
	<title>VERIFIKASI</title>
	<link rel="stylesheet" type="text/css" href="style1.css">
</head>
<body>
	<form>
		<h2>VERIFIKASI</h2>
		<label for="id">ID:</label>
		<input type="text" name="id" placeholder="ID"><br>
		<label for="txHash">Transaction Hash:</label>
		<input type="text" name="txHash" placeholder="txHash">
		<br>
		<button onclick="handleSubmit()">Submit</button>
		<div class="cont2">
			<a class="cont2" href="home.php">Back</a>
		</div>
	</form>

	<script>
  	function handleSubmit() {
		const id = document.getElementById("id").value;
		const txHash = document.getElementById("txHash").value;

		const response = await fetch('/readData', {
			method: 'POST',
			headers: { 'Content-Type': 'application/json' },
			body: JSON.stringify({ id: id, txHash: txHash })
    });

    const result = await response.json();

    console.log(result);
  	}
	</script>

	<a href="logout.php">Logout</a>
</body>
</html>

