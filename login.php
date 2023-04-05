<?php 

	session_start();
	
	if(isset($_SESSION['userlogin'])){
		header("Location: index.php");
	}


?>
<!DOCTYPE html>
<html>
<head>
	<title>login</title>
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="css/css.css">
</head>
<body>
<div class="container h-100">
	<div class="d-flex justify-content-center h-100">
		<div class="user_card">
			<div class="d-flex justify-content-center form_container" style="margin-top: 40px;">
			<form>
			<div class="header">
			<i class="fa fa-check-circle fa-lg" style="color: white; font-size: 2.25em;"></i>
			<h1>Hello Again!</h1>	
			<p>Welcome Back, Please Put Your Email And Password Here To Help Us Identify You</p>
			</div>
					<div class="input-group mb-3">
						<input type="text" name="username" id="username" class="form-control input_user" required>
					</div>
					<div class="input-group mb-2">
						<input type="password" name="password" id="password" class="form-control input_pass" required>
					</div>
					<div class="form-group">
						<div class="custom-control custom-checkbox">
							<input type="checkbox" name="rememberme" class="custom-control-input" id="customControlInline">
							<label class="custom-control-label" for="customControlInline" style="color: white;">Remember me </label>
							<a href="#" style="padding-left: 70px;">Forget Password?</a>
						</div>
					</div>	
				</div>
			<div class="d-flex justify-content-center mt-3 login_container">
				<button type="button" name="button" id="login" class="btn login_btn">Login</button> 
			</div>
			</form>
			<div class="mt-4">
				<div class="d-flex justify-content-center links">
					<p style="color: white;">Don't have an account? <a href="register.php" class="ml-2">Sign Up</a> </p>
				</div>

			</div>
			
		</div>
		<div class="photo">
		<img src="img/6846926 1.png" alt="" style="height: 500px; width: 350px;">
		</div>
	</div>
</div>
<script src="http://code.jquery.com/jquery-3.3.1.min.js"
			  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
			  crossorigin="anonymous"></script>
<script type="text/javascript" src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<script>
	$(function(){
		$('#login').click(function(e){

			var valid = this.form.checkValidity();

			if(valid){
				var username = $('#username').val();
				var password = $('#password').val();
			}

			e.preventDefault();

			$.ajax({
				type: 'POST',
				url: 'jslogin.php',
				data:  {username: username, password: password},
				success: function(data){
					alert(data);
					if($.trim(data) === "1"){
						setTimeout(' window.location.href =  "index.php"', 1000);
					}
				},
				error: function(data){
					alert('there were erros while doing the operation.');
				}
			});

		});
	});
</script>
</body>
</html>