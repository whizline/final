<?php
session_start();
include ('config/db_connect.php');

if (isset($_POST['register'])){
	//check username
	if(empty($_POST['username'])){
		echo 'username required';
	}
	//check fullname
	if(empty($_POST['fullname'])){
		echo 'Full Name required';
	}
	//check email
	if(empty($_POST['mail'])){
		echo 'Email required';
	}else{
		$email = $_POST['mail'];
		if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
		echo 'email must be valid';	
		}
	}

	//check password
	if(empty($_POST['psw'])){
		echo 'Password required';
	}

	//check phone number
	if(empty($_POST['phone'])){
		echo 'Phone Number required';
	}

	$username = mysqli_real_escape_string($conn, $_POST['username']);
    $fullname = mysqli_real_escape_string($conn, $_POST['fullname']);
    $email = mysqli_real_escape_string($conn, $_POST['mail']);
    $psw = mysqli_real_escape_string($conn, $_POST['psw']);
	$phone = mysqli_real_escape_string($conn, $_POST['phone']);

	//create sql
    $sql = "INSERT INTO user(username,full_name,email,password,phone)  VALUES ('$username', '$fullname', '$email', '$psw', '$phone')";

    //save to db

    if(mysqli_query($conn, $sql)){
        //success
        header('location: dashboard.php');
    
    }else{
        //error
        echo 'query error: ' . mysqli_error($conn);

    }




}
if (isset($_POST['login'])){
	$email = $_POST['mail'];
	$password = $_POST['psw'];
	$sql = mysqli_query ($conn, "SELECT * FROM `user` WHERE email='$email' AND password ='$password'");
	$row = mysqli_fetch_array($sql);
	if (is_array($row)){
		header("location: dashboard.php");
	}else{
		echo"invalid email/password";
	}

}

?>

<html>
<head>
	<title>Account</title>
	<link rel="stylesheet" href="css/logincss.css">
</head>


<body>


<h2>Welcome to my market </h2>
<div class="container" id="container">

	<div class="form-container sign-up-container">
		<form action="signup.php" method="POST">
			<?php


			if(isset($_POST['register'])){
			  echo "<h4>Registration Successful</h4>";
			}else{
			  echo "<h1>Create Account</h1>";
			}

			?>
			<br>
			<input type="text" placeholder="Username" name="username"/>
			<input type="text" placeholder="Name" name="fullname"/>
			<input type="email" placeholder="Email" name="mail" />
			<input type="password" placeholder="Password" name="psw" />
			<input type="tel" placeholder="Phone" name="phone"/>
			<button type="submit" name="register" > Sign Up</button>
		</form>
	</div>
	<div class="form-container sign-in-container">
		<form action="#" method="POST">
			
			<h1>Sign in</h1>
			<br>
			<input type="email" placeholder="Email" name="mail"/>
			<input type="password" placeholder="Password" name="psw"/>
			<a href="#">Forgot your password?</a>


			
			<button type="submit" name="login">Sign In</button>
		</form>
	</div>
	<div class="overlay-container">
		<div class="overlay">
			<div class="overlay-panel overlay-left">
				<h1>Welcome Back!</h1>
				<p>To keep connected with us please login with your personal info</p>
				<button class="ghost" id="signIn">Sign In</button>
				<a href='index.php'><button class="ghost" id="signIn">Home</button></a>
			</div>
			<div class="overlay-panel overlay-right">
				<h1>Hey There!</h1>
				<p>Enter your login details and start journey with us</p>
				<button class="ghost" id="signUp">Sign Up</button>
				<br>
				<p>
				<a href='index.php'><button class="ghost" id="signUp">Home</button></a>
			</div>
		</div>
	</div>
</div>

<footer>
	<p>
	Created with &#128147; by
		<a target="_blank" href="#">Rogers</a>
	</p>
</footer>
 <script src="js/main.js"></script>
</body>
</html>