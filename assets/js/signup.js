function signup() {
	var yourname = document.getElementById("yourname").value;
	var username = document.getElementById("username").value;
	var email = document.getElementById("email").value;
	var password = document.getElementById("password").value;
	var confirmpass = document.getElementById("confirmpass").value;
	var phonenumber = document.getElementById("phonenumber").value;

	if (yourname == "" || username == "" || email == "" || password == "" || confirmpass == "" || phonenumber == "") {
		alert("Please fill all field");
	} else {
		var username_validated = document.getElementById("username_validated");
		var email_validated = document.getElementById("email_validated");

		if (username_validated.innerHTML == "Can't use blank" || email_validated.innerHTML == "Invalid email") {
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
				var berhasil;

				if (berhasil) {
					document.getElementById('username_validated') = "success";
					// kasih labelnya done
				}
				else {
					document.getElementById('username_validated') = "failed";
				}
			} else {
				document.getElementById(field).innerHTML = "Validating...";
			}
		} else {
			document.getElementById(field).innerHTML = "Error Occured";
		}
	}
	xmlhttp.open("POST", "/TugasBesar1_2017/handlers/signup-handlers.php", false);
	xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xmlhttp.send();
}


function validate_name() {
	var xmlhttp;
	if (window.XMLHttpRequest) {
		xmlhttp = new XMLHttpRequest();
	} else {
		xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
	}
	xmlhttp.onreadystatechange = function(){
		if (xmlhttp.status == 400 && xmlhttp.readyState == 4) {
			if (xmlhttp.responseText == 'success') {
				
			}
		}
	}
	xmlhttp.open("POST", "/TugasBesar1_2017/handlers/signup-handler-name.php", false);
	xmlhttp.send();	
}

function validate_username() {
	var xmlhttp;
	if (window.XMLHttpRequest) {
		xmlhttp = new XMLHttpRequest();
	} else {
		xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
	}
	xmlhttp.onreadystatechange = function(){
		
	}
	xmlhttp.open("POST", "/TugasBesar1_2017/handlers/signup-handler-username.php", false);
	xmlhttp.send();	
}

function validate_email() {
	var xmlhttp;
	if (window.XMLHttpRequest) {
		xmlhttp = new XMLHttpRequest();
	} else {
		xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
	}
	xmlhttp.onreadystatechange = function(){
		
	}
	xmlhttp.open("POST", "/TugasBesar1_2017/handlers/signup-handler-email.php", false);
	xmlhttp.send();	
}

function validate_pass() {
	var xmlhttp;
	if (window.XMLHttpRequest) {
		xmlhttp = new XMLHttpRequest();
	} else {
		xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
	}
	xmlhttp.onreadystatechange = function(){
		
	}
	xmlhttp.open("POST", "/TugasBesar1_2017/handlers/signup-handler-password.php", false);
	xmlhttp.send();	
}

function validate_confirmpass() {
	var xmlhttp;
	if (window.XMLHttpRequest) {
		xmlhttp = new XMLHttpRequest();
	} else {
		xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
	}
	xmlhttp.onreadystatechange = function(){
		
	}
	xmlhttp.open("POST", "/TugasBesar1_2017/handlers/signup-handler-confirmpass.php", false);
	xmlhttp.send();	
}

function validate_phone() {
	var xmlhttp;
	if (window.XMLHttpRequest) {
		xmlhttp = new XMLHttpRequest();
	} else {
		xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
	}
	xmlhttp.onreadystatechange = function(){
		
	}
	xmlhttp.open("POST", "/TugasBesar1_2017/handlers/signup-handler-phone.php", false);
	xmlhttp.send();	
}