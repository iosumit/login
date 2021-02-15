<?php
	
	session_start();
	if (isset($_SESSION['LoginUser'])) {
		header('location:index.php');
	}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Sign Up</title>
	<link rel="stylesheet" type="text/css" href="bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="auth.css">

</head>
<body>
	<div class="card form-box" style="width: 18rem;">
	  <div class="card-body">
	    <h5 class="card-title">Register User</h5>
	    <form>
	      <div class="form-group">
		    <label for="name">Enter Name</label>
		    <input type="email" class="form-control" id="name" aria-describedby="emailHelp" placeholder="Enter name">
		  </div>
		  <div class="form-group">
		    <label for="email">Email address</label>
		    <input type="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Enter email">
		  </div>
		  <div class="form-group">
		    <label for="password">Password</label>
		    <input type="password" class="form-control" id="password" placeholder="Password">
		    <small id="response" >Check</small>
		  </div>

		  <button type="button" onclick="addUser();" class="btn btn-primary">Submit</button>
		  <div class="spinner-border text-primary" id="loader" role="status">
			  <span class="sr-only">Loading...</span>
		  </div>
		</form>
	  </div>
	</div>
</body>
<script type="text/javascript" src="jquery-3.5.1.js"></script>
<script type="text/javascript">

	$("#response").hide();
	$("#loader").hide();

	function addUser() {
		$("#response").hide();
		if ($("#name").val()=="") {
			$("#response").text("Invalid Name");
			$("#response").show();
		} else if ($("#email").val()=="") {
			$("#response").text("Invalid Email");
			$("#response").show();
		}  else if ($("#password").val()=="") {
			$("#response").text("Invalid Password");
			$("#response").show();
		} else {

			$("#loader").show();
			
			var na = $('#name').val();
			var em = $('#email').val();
			var pw = $('#password').val();

			$.post("api/ajaxSignup.php", {
				'name':na,
				'email':em,
				'pwd':pw
			}, function(data, status){
				console.log(data);
				var myData=JSON.parse(data);

				$("#loader").hide();

				if (myData['status']=='1') {
					$('#response').text(myData['msg']);
					location.reload();
				} else {
					$('#response').text(myData['msg']);
				}
			})

		}
	}
</script>
</html>