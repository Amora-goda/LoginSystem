<?php

$username ='root';
$password ="";

   try{
	$conn=new PDO("mysql:host=localhost;dbname=login_system;",$username,$password);
	// echo "connect";
   }catch(PDOException $e){
      echo  $e->getMessage();
	  exit();
   }                                    
