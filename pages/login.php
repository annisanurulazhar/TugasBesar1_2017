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
		<form  id="login">
			<div class="formBox">
				<label class="formAttribute">Username</label>	
				<input type="text" name="username" class="formFill">
			</div>
			<div class="formBox">
				<label class="formAttribute">Password</label>
				<input type="password" name="username" class="formFill">
			</div>
		</form>
		<div class="choice">
			<a href="signup.php" id="link">Don't have an account?</a>
			<button type="submit" class="button" value="Go" onclick="login()">GO!</button>
		</div>
	</div>
</body>
</html>