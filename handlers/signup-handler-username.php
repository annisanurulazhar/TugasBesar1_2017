<?php
	include '../handlers/config.php';
	if (isset($_POST['signup'])) {
		$username = $_POST['username'];
		$id = $_POST['user_id'];

		$query = mysql_query("SELECT * FROM penumpang WHERE penumpang.username='" . $username . "'");
		$result = $conn->query($query);
		$row = $result->fetch_assoc();		

		if(mysql_num_rows($query) >= 1 || strlen($username) > 20){
			echo 'failed';
		} else {
			echo 'success';	
		}
	}
	$conn->close();
?>