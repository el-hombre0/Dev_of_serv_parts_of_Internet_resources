<?php
session_start();
if(!$_SESSION['user']){
    header('Location: index.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Профиль</title>
</head>
<body>
    <h3>Меню</h3>
    <ul>
        <li><a href="http://localhost:8080/index.html">Главная</a></li>
        <li><a href="http://localhost:8080/second.html">Наши особенности</a>
        <li><a href="http://localhost:80/index.php">Наши проекты</a></li>
</li>
    </ul>
    <form>
        <img src="<?= $_SESSION['user']['avatar'] ?>" width="100" alt="Фото профиля">
        <h2>Логин: <?= $_SESSION['user']['login_user'] ?></h2>
        <h3>Имя: <?= $_SESSION['user']['name_user'] ?></h3>
        <a href="vendor/logout.php">Выход</a>

        <h4>Загрузите Ваше резюме:</h4>

        <form action="/upload.php" method="post" enctype="multipart/form-data">
            <input type="file" name="file_res">
            <input type="submit" value="Отправить">
        </form>
    </form>
</body>
</html>