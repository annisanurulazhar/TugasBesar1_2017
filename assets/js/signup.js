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
			if (xmlhttp.responseText == 'success') {
				document.getElementById('username').style.visibility = 'visible';
			} else {
				document.getElementById('username').style.visibility = 'hidden';
			}
		}	
	}
	xmlhttp.open("POST", "../handlers/signup-handler-username.php", true);
	xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xmlhttp.send("username=" + document.getElementById('username_text').value);	
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
			if (xmlhttp.responseText == 'success') {
				document.getElementById('email').style.visibility = 'visible';
			} else {
				document.getElementById('email').style.visibility = 'hidden';
			}
		}
	}
	xmlhttp.open("POST", "../handlers/signup-handler-email.php", true);
	xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xmlhttp.send("email=" + document.getElementById('email_text').value);	
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
			if (xmlhttp.responseText == 'success') {
				document.getElementById('confirmpass') = 'failed';
			} else {
				//
			}
		}
	}
	xmlhttp.open("POST", "../handlers/signup-handler-confirmpass.php", true);
	xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xmlhttp.send("confirmpass=" + document.getElementById('confirmpass').value);	
}

