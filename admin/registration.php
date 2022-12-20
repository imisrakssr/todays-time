<?php 
	include 'inc/connection.php'; 
	ob_start();

	$msg = '';

	if(isset($_POST['reg_user'])){
		$email            = $_POST['email'];
		$password         = $_POST['password'];
		$confirm_password = $_POST['confirm_password'];

	if($password == $confirm_password){

		if(strlen($password) > 7){

		$hassPassword = sha1($password);

		$mail_check_sql = "SELECT u_mail FROM users WHERE u_mail = '$email'";
		$mail_check_res = mysqli_query($conn,$mail_check_sql);
		$mail_count = mysqli_num_rows($mail_check_res);
		if($mail_count > 0){
		$msg = 'This email is already exists!';
		}else{
	$add_user_sql = "INSERT INTO users (u_mail,u_pass) VALUES ('$email','$hassPassword')";
    $add_user_res = mysqli_query($conn,$add_user_sql);

    if ($add_user_res) {
        header('Location: index.php');
    }else{
        die('Adding user error!'.mysqli_error($conn));
    }
		}
		}else{
		$msg = 'Password should be minimun 8 characters long!';
		}
	}else{
		$msg = 'Password not matched!';
	}
	}
?>


<!DOCTYPE html>
<html>
<head>
	<title>Today's Time Login Form</title>
	
	<link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
	<script src="https://kit.fontawesome.com/a81368914c.js"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
	<img class="wave" src="images/login/wave.png">
	<div class="container">
		<div class="img">
			<img src="images/login/bg.svg">
		</div>
		<div class="login-content">
			<form method="POST">
				<img src="images/login/avatar.svg">
				<h2 class="title">Welcome</h2>
           		<div class="input-div one">
           		   <div class="i">
           		   		<i class="fas fa-user"></i>
           		   </div>
           		   <div class="div">
           		   		<h5>User Email</h5>
           		   		<input type="email" class="input" name="email">
           		   </div>
           		</div>
           		<div class="input-div pass">
           		   <div class="i"> 
           		    	<i class="fas fa-lock"></i>
           		   </div>
           		   <div class="div">
           		    	<h5>Password</h5>
           		    	<input type="password" class="input" name="password">
            	   </div>
            	</div>
            	<div class="input-div pass mb-3">
           		   <div class="i"> 
           		    	<i class="fas fa-lock"></i>
           		   </div>
           		   <div class="div">
           		    	<h5>Confirm Password</h5>
           		    	<input type="password" class="input" name="confirm_password">
           		    	<small class="text-danger d-block my-2"><?php echo $msg; ?></small>
            	   </div>
            	</div>
            	<span>Already have an account? <a href="index.php">Login here</a></span>
            	<input type="submit" class="btn" value="Register" name="reg_user">
            </form>
        </div>
    </div>
<script type="text/javascript">
    	const inputs = document.querySelectorAll(".input");


function addcl(){
	let parent = this.parentNode.parentNode;
	parent.classList.add("focus");
}

function remcl(){
	let parent = this.parentNode.parentNode;
	if(this.value == ""){
		parent.classList.remove("focus");
	}
}


inputs.forEach(input => {
	input.addEventListener("focus", addcl);
	input.addEventListener("blur", remcl);
});
    </script>
    <?php
    	ob_end_flush();
    ?>
</body>
</html>