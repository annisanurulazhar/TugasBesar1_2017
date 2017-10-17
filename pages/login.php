<?php
	include '../handlers/config.php';
	if (isset($_POST['submit'])) {

		$username = $_POST['username'];
		$password = $_POST['password'];

		$sql = "SELECT * FROM penumpang WHERE username=$username AND password= $password";
		$query = mysql_query($sql);
		$result = $conn->query($query);
		while ($row = $result->fetch_assoc()) {
			$id = $row['user_id'];
		}
	}
	$conn->close();
?>
<!DOCTYPE html>
<link rel="stylesheet" type="text/css" href="../assets/styles/login.css">
<script type="text/javascript" src="../assets/js/login.js"></script>
<html>
<head>
	<title></title>
</head>
<body>
	<div class="foundation">
		<div class="boxdummy">
			<div class="line"><hr></div>
			<div class="title">LOGIN</div>
			<div class="line"><hr></div>
		</div>
		<form method="POST" id="login" action="../handlers/login-handler.php">
			<div class="formBox">
				<label class="formAttribute">Username</label>	
				<input type="text" name="username" class="formFill">
			</div>
			<div class="formBox">
				<label class="formAttribute">Password</label>
				<input type="password" name="password" class="formFill">
			</div>
		</form>
		<div class="choice">
			<a href="signup.php" id="link">Don't have an account?</a>
			<button type="submit" class="button" value="Go" form="login">GO!</button>
		</div>
	</div>
</body>
</html>