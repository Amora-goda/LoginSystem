
<?php
 
    session_start();
  if(isset($_SESSION['user'])){
  	header("location:profile.php");
  	exit();
  }
     
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<title>Login</title>
</head>
<body>
<div class="container mt-5" style="max-width:520px;">
<form method="post" >
	
	<p>Email:</p><input class="form-control" type="email" name="email" required/>
	<br>
	<p>Password:</p><input class="form-control" type="password" name="password" required/>
	<br>
	<button class="btn btn-warning" type="submit" name="login">Login</button> 
	<a class="btn btn-danger" href="register.php">Register</a>
	<a class="btn btn-dark" href="resetpass.php">Change Password</a>
</form>

<?php

if(isset($_POST['login'])){
    include_once 'connect.php';
	$login=$conn->prepare("SELECT *FROM USERS WHERE EMAIL =:email AND PASSWORD=:password");
	$login->bindParam('email',$_POST['email']);
	$hashpass=md5($_POST['password']);
	$login->bindParam('password',$hashpass);
	$login->execute();
	if($login->rowCount()===1){
		$user=$login->fetchObject();
		if($user->ACTIVATED == 1){
			$_SESSION['user']=$user;
			// $_SESSION['email']=$user->EMAIL;
			// $_SESSION['password']=$user->PASSWORD;
			// $_SESSION['name']=$user->NAME;
           //echo"good";
		   header("location:profile.php");
              
		}else{
			echo "Please activate your account at first We have sent a verification code from your account to your e-mail";

		}
	}else{
		echo "password or email un correct try again";
	}

}
?>
</div>
	
</body>
</html>











	
