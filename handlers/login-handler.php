<?php
	include '../handlers/config.php';
	if (isset($_POST['username']) && (isset($_POST['password']))) {

		$username = $_POST['username'];
		$password = $_POST['password'];
		$id = $_POST['user_id'];
		
		$query = mysql_query("SELECT * FROM penumpang WHERE penumpang.username='" . $username . "'");
		$result = $conn->query($query);
		$row = $result->fetch_assoc();
		

		if(mysql_num_rows($query) == 1){
			echo $id;
		} else {
			echo 0;
		}
	}
	$conn->close();
?>