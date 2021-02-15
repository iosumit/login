<?php
	session_start();
	if (isset($_SESSION['LoginUser'])) {
		header('location:index.php');
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<link rel="stylesheet" type="text/css" href="bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="auth.css">
</head>
<body>
	<div class="card form-box" style="width: 18rem;">
	  <div class="card-body">
	    <h5 class="card-title">Login</h5>
	    <form>
		  <div class="form-group">
		    <label for="exampleInputEmail1">Email address</label>
		    <input type="email" class="form-control" id="email"  placeholder="Enter email">
		  </div>
		  <div class="form-group">
		    <label for="exampleInputPassword1">Password</label>
		    <input type="password" class="form-control" id="pwd" placeholder="Password">
		  </div>
		  <button type="button" onclick="submitMyForm();" class="btn btn-primary">Submit</button>
		  <div class="spinner-border text-primary" id="loader" role="status">
			  <span class="sr-only">Loading...</span>
		  </div>
		</form>
	  </div>
	</div>
</body>
<script src="jquery-3.5.1.js"></script>
<script type="text/javascript">

	$('#loader').hide();

	function submitMyForm() {

		if ($('#email').val()=='') {
			alert("Invalid Email");
		} else if ($('#pwd').val()=='') {
			alert("Invalid Password");
		} else {
			//alert("Done");
			$('#loader').show();

			var em = $('#email').val();
			var pw =$('#pwd').val();

			$.post("api/ajaxLogin.php",{
				'email':em,
				'pwd':pw
			}, function(data, status){
				console.log(data);
				var myData=JSON.parse(data);

				$('#loader').hide();

				if (myData['status']=='1') {
					location.reload();
				} else {
					alert(myData['msg']);
				}
			})

		}
	}
</script>
</html>