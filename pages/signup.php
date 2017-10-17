<?php
	include '../handlers/config.php';
	if (isset($_POST['signup'])) {
		$username = $_POST['username'];
		$password = $_POST['password'];
		$id = $_POST['user_id'];

		$query = mysql_query("SELECT * FROM penumpang WHERE penumpang.username=$username");
		$result = $conn->query($query);
		$row = $result->fetch_assoc();

		if(mysql_num_rows($query) > 0){
			alert("Akun telah didaftarkan");			
		} else {
			//nambahin url
			header("location: ../handlers/signup-handler.php?id-active=".$id);
		}
	}
	$conn->close();
?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="../assets/styles/login.css">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<script type="text/javascript" src="../assets/js/signup.js"></script>
</head>
<body>
	<div class="foundation">
		<div class="boxdummy">
			<div class="line"><hr></div>
			<div class="title">SIGNUP</div>
			<div class="line"><hr></div>
		</div>
		<form method="post" action="../handlers/signup-handler.php" id="signup">
			<div class="formBox">
				<label class="formAttribute2">Your Name</label>	
				<input type="text" name="yourname" class="formFill" id="yourname" onclick="validate_name()">
			</div>
			<div class="formBox">
				<label class="formAttribute2">Username</label>	
				<div class="check"><i class="material-icons">done</i></div>
				<input type="text" name="username" class="formFillCheck" id="username" onclick="validate_username()">
			</div>
			<div class="formBox">
				<label class="formAttribute2">Email</label>	
				<div class="check"><i class="material-icons">done</i></div>
				<input type="text" name="email" class="formFillCheck" id="email" onclick="validate_email()">
			</div>
			<div class="formBox">
				<label class="formAttribute2">Password</label>	
				<input type="password" name="password" class="formFill" id="password" onclick="validate_pass()">
			</div>
			<div class="formBox">
				<label class="formAttribute2">Confirm Password</label>	
				<input type="password" name="confirmpass" class="formFill" id="confirmpass" onclick="validate_confirmpass()">
			</div>
			<div class="formBox">
				<label class="formAttribute2">Phone Number</label>	
				<input type="tel" name="phonenumber" class="formFill" id="phonenumber" onclick="validate_phone()">
			</div>
			<div class="formBox">
				<input type="checkbox" name="checkbox" class="formCheck">
				<label class="formAttribute2">Also sign me up as a driver!</label>	
			</div>
		<div class="other">
			<a href="login.php" id="link1">Already have an account?</a>
			<button type="submit" form="signup" class="button" value="register" onclick="signup()">REGISTER</button>
		</div>
		</form>
	</div>
</body>
</html>