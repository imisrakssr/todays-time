<?php
	include 'inc/connection.php';
	session_start();
	ob_start();

	if(!empty($_SESSION['u_id '])){
    header('Location: dashboard.php');
	}

	$msg = '';

	if(isset($_POST['login'])){
		$email    = $_POST['email'];
		$password = $_POST['password'];
		$hassPassword = sha1($password);

	$user_login = "SELECT * FROM users WHERE u_mail = '$email'";
	$users_res = mysqli_query($conn,$user_login);

    $row = mysqli_fetch_assoc($users_res);
    $_SESSION['u_id ']        = $row['u_id'];
    $_SESSION['u_name']       = $row['u_name'];
    $_SESSION['u_mail']       = $row['u_mail'];
    $_SESSION['u_pass']       = $row['u_pass'];
    $_SESSION['u_photo']      = $row['u_photo'];
    $_SESSION['u_status']     = $row['u_status'];
    $_SESSION['u_type']       = $row['u_type'];
    $_SESSION['u_profession'] = $row['u_profession'];

    if($_SESSION['u_mail'] == $email && $_SESSION['u_pass'] == $hassPassword){
    	header('Location: dashboard.php');	
    }else{
    	header('Location: index.php');
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
           		    	<small class="text-danger d-block my-2"><?php echo $msg; ?></small>

            	   </div>
            	</div>
            	<a href="forgetpassword.php">Forgot Password?</a>
            	<input type="submit" class="btn" value="Login" name="login">
            	<a href="registration.php" class="btn my-2">Register</a>
            </form>
        </div>
    </div>
    <script>
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