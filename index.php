<?php
	session_start();
	if (!isset($_SESSION['LoginUser'])) {
		header('location:login.php');
	}
	if (isset($_GET['type']) && ($_GET['type']=='logout')) {
		if (session_destroy()) {
			header('location:login.php');
		}
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Home Page</title>
</head>
<body>
	<center><h1>Welcome <i><?=$_SESSION['LoginUser'];?></i></h1></center>
	<center><a href="index.php?type=logout">Logout</a></center>
</body>
</html>