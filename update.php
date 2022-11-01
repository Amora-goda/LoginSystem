<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
<div class="container mt-5" style="max-width:520px;">
<?php
session_start();
 if(isset($_SESSION['user'])){
     echo'<div class="container">
     <form method="post" >
         Name:<input class="form-control" type="text" name="name" value="'.$_SESSION['user']->NAME.'" required/>
         <br>
         Email:<input class="form-control" type="text" name="email" value="'.$_SESSION['user']->EMAIL.'" required/>
         <br>
         password:<input class="form-control" type="text" name="password" value="'.$_SESSION['user']->PASSWORD.'" required/>
         <br>
         <button class="btn btn-dark" type="submit" name="update" value="'.$_SESSION['user']->ID.'" >Save</button> 
         <a class="btn btn-warning" href="profile.php">Profile</a>
         <a class="btn btn-danger" href="home.php">Home</a>
     </form>
     </div>';
 }
    if(isset($_POST['update'])){
        include_once 'connect.php';
        $updateUser= $conn->prepare("UPDATE  users SET NAME = :name ,PASSWORD=:password WHERE ID =:id"); 
        $updateUser->bindParam('name',$_POST['name']);
        $updateUser->bindParam('password',$_POST['password']);
        $updateUser->bindParam('id',$_POST['update']);
    

        if($updateUser->execute()){
            
            echo  '<div class="alert alert-success" role="alert">
            Your data has been successfully updated
        </div>';
        $user=$conn->prepare("SELECT *FROM users WHERE ID=:id");
        $user->bindParam('id',$_POST['update']);
        $user->execute();
        $_SESSION['user']=$user->fetchObject();
        header("refresh:2;");
    }else{
        echo  '<div class="alert alert-success" role="alert">
        Data update failed
        </div>';
    }
 }

?>
 </div>
    
</body>
</html>



