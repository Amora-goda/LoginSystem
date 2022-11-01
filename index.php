 <!DOCTYPE html>
 <html lang="en">
 <head>
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>index</title>
 </head>
 <body>
     <?php
 //  if(isset($_POST['send'])){
    require_once 'mail.php';
    $mail->setFrom('amoragoda.0987654@gmail.com', 'Amora Goda');
    $mail->addAddress('amoragoda.0987654@gmail.com');
  
    $mail->Subject = 'رسالة تجريبية';
    $mail->Body    = 'Test from amora <b>PHP Mailer</b>';
    $mail->send();
//    header("Location: index.php", true);
//}

?>
<!-- 
<form method="POST">
<button type="submit" name="send">ارسال</button>
</form> -->
     
 </body>
 </html>
 
