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
        <li><a href="http://localhost:8080/second.html">Наши особенности</a></li>
        <li><a href="http://localhost:80/index.php">Наши проекты</a></li>
    </ul>
    <form>
        <img src="<?= $_SESSION['user']['avatar'] ?>" width="100" alt="Фото профиля">
        <h2>Логин: <?= $_SESSION['user']['login_user'] ?></h2>
        <h3>Имя: <?= $_SESSION['user']['name_user'] ?></h3>
        <button> 
        <a href="./vendor/downloadFile.php">Скачать Ваше резюме</a>
        </button>
        <a href="vendor/logout.php">Выход</a>
    </form>

    <h4>Загрузите Ваше резюме:</h4>
       
    <form action="/upload_resume.php" method="post" enctype="multipart/form-data">
        <input type="file" name="file">
        <input type="submit" value="Отправить">
        <?php
        require_once './upload_resume.php';
        // Выводим сообщение о результате загрузки.
        
        echo "error: ".$input_name;

		if (!empty($success)) {
			echo '<p>' . $success . '</p>';	
		} else {
			echo '<p>' . $error . '</p>';
		}
        ?>
    </form>
    
</body>
</html>