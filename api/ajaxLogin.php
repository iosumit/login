<?php
	
	session_start();

	if (isset($_POST['email']) && isset($_POST['pwd'])) {

		//print_r($_POST);
		include('config.php');

		$query="SELECT `name` FROM `user` WHERE `email`=? AND `pwd`=?";
		$stmt=$conn->prepare($query);
		$stmt->bind_param('ss', $_POST['email'], $_POST['pwd']);
		$stmt->execute();
		$result=$stmt->get_result();
		$user=$result->fetch_assoc();
		if ($result->num_rows==1) {

			$_SESSION['LoginUser']=$user['name'];
			
			$res=array('status'=>1, 'name'=>$user['name'], 'msg'=>'Logged in Successfully');
			print_r(json_encode($res));
		} else {
			$res = array('status' => '0', 'msg' => 'Invalid Email or Password.');
			print_r(json_encode($res));
		}
		
	} else {
		$res = array('status' => '0', 'msg' => 'Invalid Email or Password.');
		print_r(json_encode($res));
	}


?>