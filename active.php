<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>active</title>
</head>
<body>
<div class="container mt-5" style="max-width:720px;">
<?php
if(isset($_GET['code'])){
    include_once 'connect.php';
    $checkCode=$conn->prepare("SELECT SECURITY_CODE FROM users WHERE SECURITY_CODE = :SECURITY_CODE");
    $checkCode->bindParam("SECURITY_CODE",$_GET['code']);
    $checkCode->execute();
    if($checkCode->rowCount()>0){
        $update = $conn ->prepare("UPDATE users SET SECURITY_CODE = :SEC , ACTIVATED = true WHERE SECURITY_CODE=:SECURITY_CODE");
        $securCode=md5(date("h:i:s"));
        $update->bindParam("SEC",$securCode);
        $update->bindParam("SECURITY_CODE",$_GET['code']);
        // print_r($update);
        // die();
    if($update->execute()){
        echo  '<div class="alert alert-success" role="alert">
          this sucsess!
      </div>';
      echo '<a class="btn btn-warning" href="login.php">Login</a>';
    //header("location:profile.php");
    }    

    }
}
?>
</div>
    
</body>
</html>


