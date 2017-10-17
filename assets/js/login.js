function login() {
	var xmlhttp;
	if (window.XMLHttpRequest) {
		xmlhttp = new XMLHttpRequest();
	} else {
		xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
	}
	xmlhttp.onreadystatechange = function(){
		if (xmlhttp.status == 200) {
			if (xmlhttp.readyState == 4) {
				if (xmlhttp.responseText != 0) {
					header("location: profile.php?id-active=" + xmlhttp.responseText);
				} else {
					document.getElementById()
				}
			}
		}
	}
	xmlhttp.open("POST", "/TugasBesar1_2017/handlers/login-handler.php", true);
	xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xmlhttp.send();
}