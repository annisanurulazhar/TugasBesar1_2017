<!DOCTYPE html>
<html>
	 <?php
			include '../handlers/config.php';

			// Check connection
			if ($conn->connect_error) {
   				die("Connection failed: " . $conn->connect_error);
   		}
			$id = $_GET['id_active'];


			$sql1 = "SELECT preferred_loc FROM preferred_location WHERE user_id= $id";
			$sql2 = "SELECT is_driver FROM penumpang WHERE user_id = $id";

			$result1 = $conn->query($sql1);
			$result2 = $conn->query($sql2);

			$row = $result2->fetch_assoc();


			$is_driver = $row['is_driver'];


			if($is_driver==false) {
				header("Location: profile.php?id_active=" . $id);
			}

			//Add
			if(isset($_POST['add'])) {
			
			$location = $_POST['location'];

			$sql = "INSERT INTO preferred_location  (user_id, preferred_loc) VALUES ($id, '$location')";

			if($conn->query($sql) === TRUE) {
				echo "Succces";
			} else {
				echo "Failed";
			}

			header("Location: editlocation.php?id_active=".$id);
		}

			echo '<script> var id=' . $id . '</script>';

		?> 
	<head>
		<title>
			Edit Preferred Location
		</title>
		<link rel="stylesheet" type="text/css" href="../assets/styles/profile.css">
		<link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">
	</head>
	<body>
		<div class="flex-container">
			<div id="container" class="flex-container container"> 
				<div class="menu-title-edit">EDIT PREFERRED LOCATION</div>
					<div class="table-container">
						<table id="table-loc">
							<tr>
								<th>No</th>
								<th>Location</th>
								<th>Action</th>
							</tr>
							<?php
									$no 	= 1;
									$total 	= 0;
									while ($row = mysqli_fetch_array($result1))
									{
										echo '<tr>
												<td>' .$no. '</td>
												<td> <input type="text" value="'.$row['preferred_loc']. '" disabled></td>
												<td>
													<row style="display: flex; flex-direction: row; justify-content: center;">
														<div id="edit-icon-"'.$no. 'class="edit-icon" ><i class="material-icons orange" onclick="editloc(this)">create</i></div>
														<div id="delete-icon-"'.$no. 'class="delete-icon" ><i class="material-icons red" onclick ="deleteloc(this)">clear</i></div>
													</row>
												</td>
											</tr>';
										$no++;
									}
								?>
						</table>
						
					</div>
				<div class="add-loc-container">
					<div class="menu-title" style="font-size: 28px; margin-bottom: 20px">ADD NEW LOCATION</div>
					<div class="edit-location-add">
						<form action="" method="POST" style="display: flex; flex-direction: row; height: 50px; justify-content: space-between;">
								<input type="text" name="location" class="location-placeholder">
								<button type="submit" name="add" class="button-add">ADD</button>
						</form>
					</div>
					<button class="button-back" id="back">BACK</button>
				</div>
			</div>
		</div>
	</body>
	<script type="text/javascript">
		document.getElementById("back").onclick = function() {
			location.href = "profile.php?id_active=" +id;
		}
		function editloc(elmt) {
			var row = elmt.parentElement.parentElement.parentElement.parentElement;
			var text = row.children[1].children[0].value;
			row.children[1].children[0].disabled = false;
			row.children[2].children[0].children[0].children[0].innerHTML = "save";
			row.children[2].children[0].children[0].children[0].onclick = function(){saveloc(elmt, text)};
			console.log(row.children[1]);
			console.log(text);
			console.log(row.children[1].value);
			console.log(id);
		}

		function saveloc(elmt, locbefore) {
			var row = elmt.parentElement.parentElement.parentElement.parentElement;
			row.children[1].children[0].disabled = true;
			row.children[2].children[0].children[0].children[0].innerHTML = "create";
			row.children[2].children[0].children[0].children[0].onclick = function(){editloc(elmt, text)};
			var loc = encodeURI(row.children[1].children[0].value);
			locbefore = encodeURI(locbefore);

			var xhttp = new XMLHttpRequest();

			if (!xhttp) {
				return;
			}

			var url = "../handlers/location_handler.php?id_active=" + id + "&updateloc=" + loc + "&location=" + locbefore;
			xhttp.open("GET", url, true);
			xhttp.send();
			location.reload();

		}

		function deleteloc(elmt) {
			var result = confirm("Are you sure you want to delete this location?");
				if (result) {
	   				 //Logic to delete the item

				var row = elmt.parentElement.parentElement.parentElement.parentElement;
				var loc = row.children[1].children[0].value;
				loc = encodeURI(loc);

				var xhttp = new XMLHttpRequest();

				if(!xhttp) {
					return;
				}

				var url = "../handlers/location_handler.php?id_active=" + id + "&deleteloc=" + loc;
				xhttp.open("GET", url, true);
				xhttp.send();
				location.reload();
			}
		}
    
	</script>
	
</html>