<?php

	session_start();
	
	if (isset($_POST['name']) && isset($_POST['email']) && isset($_POST['pwd'])) {

		//print_r(json_encode($_POST));
		include 'config.php';
		date_default_timezone_set('Asia/Calcutta');
		$date_time = date('Y-m-d H:i:s');

		$sql = "INSERT INTO `user`(`name`, `email`, `pwd`, `doj`) VALUES (?, ?, ?, ?)";
		$stmt = $conn->prepare($sql);
		$stmt->bind_param('ssss', $_POST['name'], $_POST['email'], $_POST['pwd'], $date_time);
		if ($stmt->execute()) {

			$_SESSION['LoginUser']=$_POST['name'];

			$stmt->close();
			$res = array('status'=>'1', 'id'=> $conn->insert_id, 'msg'=>"Signed up Successfully");
			print_r(json_encode($res));

		}  else {
			$res = array('status'=>'0', 'msg'=>"Something went wrong");
			print_r(json_encode($res));
		}
		
	} else {
		$res = array('status'=>'0', 'msg'=>"Invalid Credential");
		print_r(json_encode($res));
	}

?>