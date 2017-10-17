<?php
	include '../handlers/config.php';
	if ($_GET['username'])) {
		$username = $_GET['username'];
		// $id = $_POST['user_id'];

		$query = mysql_query("SELECT * FROM penumpang WHERE penumpang.username='" . $username . "'");
		$result = $conn->query($query);
		while ($row = $result->fetch_assoc()) {
			$id = $row['user_id'];
		}

		if(mysql_num_rows($id) >= 1 || strlen($username) > 20 || strlen($username) < 4){
			echo 'failed';
		} else {
			echo 'success';	
		}
	}
	$conn->close();
?>