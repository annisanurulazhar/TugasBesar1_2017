<?php
	include '../handlers/config.php';
	if (isset($_POST['signup'])) {
		$pass = $_POST['password'];
		$confirm_pass = $_POST['confirmpass'];
		$id = $_POST['user_id'];

		$query = mysql_query("SELECT * FROM penumpang WHERE penumpang.email='" . $confirm_pass . "'");
		$result = $conn->query($query);
		$row = $result->fetch_assoc();		

		if($confirm_pass != $pass) {
			echo 'failed';
		} else {
			echo 'success';	
		}
	}
	$conn->close();
?>