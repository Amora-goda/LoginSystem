<?php session_start();?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Home</title>
    
</head>
<body style="background-color:#2c6c62;color:white;">
<div class="container" 
    style="margin: auto;
    width: 500px;
    height: 500px;
    margin-top: 220px;
    margin-left: 220px;">
        <?php 
        if(isset($_SESSION['user'])){
        ?>  
           <p class="fs-1">Welcome to Home Page <?php echo $_SESSION['user']->NAME ?></p>
           <a class="btn btn-warning me-3 " href="profile.php">Login</a>
           
         <?php
        }else{
         ?>
            <p class="fs-1">Welcome to Home Page </p>
            <a class="btn btn-warning me-3 " href="login.php">Login</a>
            <a class="btn btn-dark me-3" href="register.php">Register</a>
     
      <?php }?>
    </div>
</body>

