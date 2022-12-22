<!doctype html>
<html>
<head>
   <meta http-equiv="Content-Type" content="text/html; charset=windows-1251" />
   <title>Ваше сообщение успешно отправлено</title>
</head>
 
<body>
</body>
</html>
<?php
   $back = "<p><a href=\"javascript: history.back()\">Вернуться назад</a></p>";
 
   if(!empty($_POST['name']) and !empty($_POST['phone']) and !empty($_POST['mail']) 
   and !empty($_POST['message'])){
      $name = trim(strip_tags($_POST['name']));
      $phone = trim(strip_tags($_POST['phone']));
      $mail = trim(strip_tags($_POST['mail']));
      $message = trim(strip_tags($_POST['message']));
 
      mail('evendot@yandex.ru', 'Письмо с Портфолио', 
      $name.' wrote to you.'.'<br />His/Her number is: '.$phone.'<br />His/Her email is: '.$mail.'<br />
      His/Her message: '.$message,"Content-type:text/html;charset=windows-1251");
 
      echo "Your message has been sent successfully!<Br> You will receive a response in
      coming soon<Br> $back";
 
      exit;
   } 
   else {
      echo "To send a message, fill in all the fields! $back";
      exit;
   }
?>
