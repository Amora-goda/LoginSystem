<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<title>Register</title>
</head>
<body>
<div class="container mt-5" style="max-width:720px;">
<form method="post" action="register.php">
	Name:<input class="form-control" value="<?php if(isset($_POST['name'])){echo $_POST['name'];}?>" 
	type="text" name="name" required/>
	<br>
	Email:<input class="form-control" value="<?php if(isset($_POST['email'])){echo $_POST['email'];}?>"
	  type="text" name="email" required/>
	<br>
	password:<input class="form-control" type="text" name="password" required/>
	<br>
	<button class="btn btn-dark" type="submit" name="submit ">Register</button> 
    <a class="btn btn-warning" href="login.php">Login</a>
</form>

<?php
echo '<pre>';

if(isset($_POST['submit'])){}
    
	 include_once 'connect.php';
	$checkEmail=$conn->prepare("SELECT *FROM users WHERE EMAIL = :EMAIL"); 
	$email = $_POST['email'];
	$checkEmail->bindParam("EMAIL" , $email);
	$checkEmail->execute();
		if($checkEmail->rowCount()>0){
			// print_r($checkEmail);
			// die();
			echo  '<div class="alert alert-danger" role="alert"> 
			This email already exists!
			</div>';
		}else{
			$name =filter_var($_POST['name'],FILTER_SANITIZE_STRING) ;
			$password =filter_var($_POST['password'],FILTER_SANITIZE_STRING) ;
			$hashpass=md5($password);
			$email=filter_var($_POST['email'],FILTER_SANITIZE_EMAIL) ;
			if(empty($name)&&empty($password)&&empty($email)){
				echo  '<div class="alert alert-danger" role="alert"> 
				cant be empty
			</div>';
			}else{
             
            $addUser= $conn->prepare("INSERT INTO users(NAME,PASSWORD,EMAIL,SECURITY_CODE )
            VALUES (:NAME,:PASSWORD,:EMAIL,:SECURITY_CODE )");
			
			$addUser->bindParam('NAME',$name);
			$addUser->bindParam('PASSWORD',$hashpass);
			$addUser->bindParam('EMAIL',$email);
			$securCode=md5(date("h:i:s"));
			$addUser->bindParam('SECURITY_CODE',$securCode);

			if($addUser->execute()){
				$_POST['name']='';
				$_POST['email']='';
				$_POST['password']='';
				require_once 'mail.php';
				$mail->addAddress($email);
				$mail->Subject="رمز تحقق من بريد الكترونى";
				$mail->Body = "<h1> thanks for register in our website</h1> "
				."<div> رابط تحقق من بريدك الالكترونى"."</div>".
				"<a href='http://localhost/authon-system/active.php?code=".$securCode."'>
				"."http://localhost/authon-system/active.php?code=".$securCode."</a>";
				$mail->setFrom("amora123@gmail.com","Amora Goda");
				$mail->send();
				echo  '<div class="alert alert-success" role="alert">
				The account has been created successfully!
			</div>';
			header("location:profile.php");
			
			}else{
				echo  '<div class="alert alert-danger" role="alert"> 
				something wrong!
			</div>';
				}	
		}	
	}

?>
</div>
	
</body>
</html>


