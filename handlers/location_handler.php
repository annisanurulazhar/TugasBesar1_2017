<?php
		include 'config.php';


		if (isset($_GET['updateloc'])) {
			$user_id = $_GET['id_active'];
			$location = $_GET['updateloc'];
			$locbefore = $_GET['location'];

			$sql = "UPDATE preferred_location SET preferred_loc = '$location' WHERE user_id= $user_id AND preferred_loc = '$locbefore';";

			if($conn->query($sql) === TRUE) {
				echo "Succces";
			} else {
				echo "Failed";
			}

		}

		if(isset($_GET['deleteloc'])) {
			$user_id = $_GET['id_active'];
			$location = $_GET['deleteloc'];

			$sql = "DELETE FROM preferred_location WHERE user_id= $user_id AND preferred_loc= '$location'";

			if($conn->query($sql) === TRUE) {
				echo "Succces";
			} else {
				echo "Failed";
			}

		}


?>