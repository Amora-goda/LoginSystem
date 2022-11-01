

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Change password</title>
</head>
<body>
<div class="container mt-5" style="max-width:620px;">
 <?php
   if(!isset($_GET['code'])){
       echo '<form method="post">
	
       Email:<input  class="form-control" type="text" name="email" required/>
       <br>
       
       <button class="btn btn-dark" type="submit" name="reset">Change Password from Gmail</button> 
       <a class="btn btn-warning" href="login.php">Back</a>
       
   </form>';

   }elseif(isset($_GET['code'])&&(isset($_GET['email']))){
         echo'
         <form method="post">
           <p class="">Put New Password</p>
           <input class="form-control" type="text" name="password" required/>
           <br>
           <button class="btn btn-dark" type="submit" name="newpassword">Edit Password</button> 
           <a class="btn btn-warning" href="home.php">Home</a>
         </form>
         ';
   }
 ?>   

<?php

if(isset($_POST['reset'])){
    require_once 'connect.php';
     $checkEmail=$conn->prepare("SELECT EMAIL,SECURITY_CODE FROM users WHERE EMAIL =:email");
     $checkEmail->bindParam("email" , $_POST['email']);
     $checkEmail->execute();
         if($checkEmail->rowCount()>0){
            require_once 'mail.php';
            $user=$checkEmail->fetchObject();
            $mail->addAddress($_POST['email']);
            $mail->Subject="رمز التحقق من البريد الاكترونى";
            $mail->Body = '
            رابط لتعيين كلمه المرورالخاص بك
            <br>
            '.'<a href=http://localhost/authon-system/resetpass.php?email='.$_POST['email'].
            '&code='.$user->SECURITY_CODE. '">http://localhost/authon-system/resetpass.php?email='.$_POST['email'].
            '&code='.$user->SECURITY_CODE.'</a>';
            $mail->setFrom("amora123@gmail.com","Amora Goda");
            $mail->send();
            echo  '<div class="alert alert-success" role="alert">
            تم ارسال رابط لايميلك لتعيين كلمه المرور
        </div>';
         }else{
             echo " هدا البريد الالكترونى غير موجود لدينا";
         }

}
?>

<?php
 if(isset($_POST['newpassword'])){
    require_once 'connect.php';
    $updatepass=$conn->prepare("UPDATE users SET PASSWORD =:password WHERE EMAIL =:email");
    $updatepass->bindParam("password" , $_POST['password']);
    $updatepass->bindParam("email" , $_GET['email']);
    $updatepass->execute();

 }

?>

</div>
</body>
</html>