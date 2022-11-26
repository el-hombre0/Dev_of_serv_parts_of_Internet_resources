<?php
session_start();
if($_SESSION['user']){
    header('Location: profile.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Регистрация</title>
</head>
<body>
<h3>
Регистрация  
</h3>
<form action="vendor/signup.php" method="POST" enctype="multipart/form-data">
    <label>Придумайте логин</label>
    <input type="text" name="login" placeholder="Введите логин">
    
    <label>Придумайте пароль</label>
    <input type="password" name="password" placeholder="Введите пароль">
    
    <label>Изображение профиля</label>
    <input type="file" name="avatar">
    <button type="submit">Зарегистрироваться</button>
    <p>Уже есть аккаунт? <a href="http://localhost:80/index.php">Войдите!</a></p>
    <?php
        // if($_SESSION['message']){
        //     echo '<p class="msg"> '. $_SESSION['message'].' </p>';
        // }
        
        // unset($_SESSION['message']); //уничтожение
    ?>
</form>
</body>
</html>