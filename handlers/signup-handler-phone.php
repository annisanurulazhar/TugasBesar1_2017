<?php
	include '../handlers/config.php';
	if (isset($_POST['signup'])) {
		$pass = $_POST['password'];
		$id = $_POST['user_id'];

		$query = mysql_query("SELECT * FROM penumpang WHERE penumpang.email='" . $pass . "'");
		$result = $conn->query($query);
		$row = $result->fetch_assoc();		

		if(!preg_match("^(^\+62\s?|^0)(\d{3,4}-?){2}\d{3,4}$", $pass)) {
			echo 'failed';
		} else {
			echo 'success';	
		}
	}
	$conn->close();
?>