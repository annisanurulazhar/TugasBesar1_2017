<?php
	include '../handlers/config.php';
	if (isset($_POST['signup'])) {
		$pass = $_POST['password'];
		$id = $_POST['user_id'];

		$query = mysql_query("SELECT * FROM penumpang WHERE penumpang.email='" . $pass . "'");
		$result = $conn->query($query);
		$row = $result->fetch_assoc();		

		if(strlen($pass) < 6) {
			echo 'failed';
		} else {
			echo 'success';	
		}
	}
	$conn->close();
?>