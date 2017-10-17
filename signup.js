function checkForm() {
	var yourname = document.getElementById("yourname").value;
	var username = document.getElementById("username").value;
	var email = document.getElementById("email").value;
	var password = document.getElementById("password").value;
	var confirmpass = document.getElementById("confirmpass").value;
	var phonenumber = document.getElementById("phonenumber").value;

	if (yourname == "" || username == "" || email == "" || password == "" || confirmpass == "" || phonenumber == "") {
		alert("Please fill all field")
	} else {
		var usernameval = document.getElementById("usernameval");
		var emailval = document.getElementById("emailval");

		if (usernameval.innerHTML == "Can't user blank" || emailval.innerHTML == "Invalid email") {
			alert("Fill valid information please");
		} else {
			document.getElementById("signup").submit();
		}
	}
}

function validate(field, query) {
	var xmlhttp;
	if (window.XMLHttpRequest) {
		xmlhttp = new XMLHttpRequest();
	} else {
		xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
	}
	xmlhttp.onreadystatechange = function(){
		if (xmlhttp.status == 200) {
			if (xmlhttp.readyState == 4) {
				document.getElementById(field).innerHTML = xmlhttp.responseText;
				
				//php mengembalikan value true/false denngan json
				var berhasil = true;

				if (berhasil) {
					document.getElementById('username_validated') = "berhasil";
					// kasih labelnya done
				}
				else {
					document.getElementById('username_validated') = "gagal";
				}
			} else {
				document.getElementById(field).innerHTML = "Validating...";
			}
		} else {
			document.getElementById(field).innerHTML = "Error Occured";
		}
	}
	xmlhttp.open("GET", "	?field" + field + "'&query" + query, false);
	xmlhttp.send();
}