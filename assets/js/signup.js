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
		// if (password == confirmpass) {
			document.getElementById("signup").submit();
		// } else {
		// 	alert("Please fill valid value");
		// }
	}
}

function validate_username() {
	var xmlhttp;
	if (window.XMLHttpRequest) {
		xmlhttp = new XMLHttpRequest();
	} else {
		xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
	}
	xmlhttp.onreadystatechange = function(){
		if (xmlhttp.status == 200 && xmlhttp.readyState == 4) {
			if (xmlhttp.responseText == 'failed') {
				document.getElementById('username').value = 'failed';
				alert("failed");
			} else {
				//nampilin centang
				alert("correct");
			}
		}	
	}
	xmlhttp.open("POST", "../handlers/signup-handler-username.php", false);
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
		if (xmlhttp.status == 200 && xmlhttp.readyState == 4) {
			if (xmlhttp.responseText == 'failed') {
				document.getElementById('email').value = 'failed';
			} else {
				//nampilin centang
			}
		}
	}
	xmlhttp.open("POST", "../handlers/signup-handler-email.php", false);
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
		if (xmlhttp.status == 200 && xmlhttp.readyState == 4) {
			if (xmlhttp.responseText == 'failed') {
				document.getElementById('confirmpass').value = 'failed';
			} else {
				//
			}
		}
	}
	xmlhttp.open("POST", "../handlers/signup-handler-confirmpass.php", false);
	xmlhttp.send();	
}

