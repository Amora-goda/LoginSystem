<?php     
session_start();

if(!isset($_SESSION['user'])){
     header("location:login.php");
     exit();
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>HOME</title>
	<link rel="stylesheet" type="text/css" href="style.css">
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body style="background-color:#364035;color:white;">
<div class="container mt-5" style="max-width:620px;">   

     <h1>Hello to my profile,<?php echo $_SESSION['user']->NAME ?></h1>
     <a class="btn btn-dark" href="logout.php">Logout</a>
     <a class="btn btn-danger" href="home.php">Home</a>
     
     <a class="btn btn-warning" href="update.php">Edit Info</a>
</div>
</body>
</html>