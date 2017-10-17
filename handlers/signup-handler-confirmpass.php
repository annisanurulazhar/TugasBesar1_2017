<?php
	include '../handlers/config.php';
	if ($_POST['confirm_pass']) {
		$pass = $_POST['password'];
		$confirm_pass = $_POST['confirmpass'];
		$id = $_POST['user_id'];

		$query = mysql_query("SELECT * FROM penumpang WHERE penumpang.confirmpass='" . $confirm_pass . "'");
		$result = $conn->query($query);
		while ($row = $result->fetch_assoc()) {
			$id = $row['user_id'];
		}

		if($confirm_pass != $pass) {
			echo 'failed';
		} else {
			echo 'success';	
		}
	}
	$conn->close();
?>