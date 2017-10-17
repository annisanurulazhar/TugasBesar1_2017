<?php
	include '../handlers/config.php';
	if (isset($_POST['signup'])) {
		
		$name = $_POST['yourname'];
		$id = $_POST['user_id'];

		$query = mysql_query("SELECT * FROM penumpang WHERE penumpang.yourname='" . $name . "'");
		$result = $conn->query($query);
		$row = $result->fetch_assoc();

		if(mysql_num_rows($query) >= 1) {
			echo 'failed';
		} else {
			echo 'success';	
		}
	}
	$conn->close();
?>