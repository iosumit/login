<?php
	//For the localhost
	 $dbhost = "localhost";
	 $dbuser = "root";
	 $dbpass = "";
	 $db = "auth";
	 $conn = new mysqli($dbhost, $dbuser, $dbpass,$db) or die("Connect failed: %s\n". $conn -> error);
?>