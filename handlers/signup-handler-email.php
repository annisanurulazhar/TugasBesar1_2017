<?php
	include '../handlers/config.php';
	if (isset($_POST['signup'])) {
		$email = $_POST['email'];
		$id = $_POST['user_id'];

		$query = mysql_query("SELECT * FROM penumpang WHERE penumpang.email='" . $email . "'");
		$result = $conn->query($query);
		$row = $result->fetch_assoc();		

		if(mysql_num_rows($query) >= 1 || !preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/", $email)) {
			echo 'failed';
		} else {
			echo 'success';	
		}
	}
	$conn->close();
?>