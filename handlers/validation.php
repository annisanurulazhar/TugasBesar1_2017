<?php
$value = $_GET['query'];
$field = $_GET['field'];

if ($field == "username") {
	if () {
		echo "string";
	} else {

	}
}

if ($field == "emailval") {
	if (!filter_var($value, FILTER_VALIDATE_EMAIL)) {
		echo '{"valid": false}'; //json
	} else {
		echo '{"valid": true}';
	}
} 
?>