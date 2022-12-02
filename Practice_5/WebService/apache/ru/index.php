<?php
    session_start();
    $_SESSION['path'] = "ru/index.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/<?php echo $_SESSION['theme']; ?>.css" type="text/css">
    <title>Портфолио - Наши проекты</title>
</head>
<body>

<h3>Меню</h3>
<ul>
    <li><a href="./private/admin_page.php">Администратор</a></li>
    <li><a href="http://localhost:8080/index.html">О нас</a></li>
    <li><a href="http://localhost:8080/second.html">Наши особенности</a></li>
</ul>
<?php
if($_SESSION['user']){
    echo "<h2>Здравствуйте, ".$_SESSION['user']['login_user']."!</h2>
    <a href=\"profile.php\">Личный аккаунт</a>
    <a href=\"vendor/logout.php\">Выход</a>";
} 
else{
    echo "<h3>Авторизация</h3>
        <form action=\"vendor/signin.php\" method=\"POST\" >
        <label>Логин</label>
        <input type=\"text\" name=\"login\" placeholder=\"Введите логин\">
        <label>Пароль</label>
        <input type=\"password\" name=\"password\" placeholder=\"Введите пароль\">
        <button type=\"submit\">Войти</button>
        <p>Впервые тут? <a href=\"http://localhost:80/ru/register.php\">Зарегистрируйтесь!</a></p>";
    if($_SESSION['message']){
        echo '<p class="msg"> '. $_SESSION['message'].' </p>';
    }
          
    unset($_SESSION['message']);
    echo "</form>";
}
?>
<h3>Смена темы сайта</h3>
<form action="../../controllers/change_theme.php" method="GET">
    <label>Светлая</label>
    <input type="radio" name="theme" value="light" checked>
    <label>Тёмная</label>
    <input type="radio" name="theme" value="dark">
    <input type="submit" value="Подтвердить">
</form>
<h3>Смена языка сайта</h3>
<form action="../../controllers/change_lang.php" method="GET">
    <?php
    if($_SESSION['lang'] == "en")
        echo "<p style=\"color: red;\">It looks like you speak English. Whould you like to change the website's language?</p>"
    ?>
    <label>Русский</label>
    <input type="radio" name="lang" value="ru" checked>
    <label>English</label>
    <input type="radio" name="lang" value="en">
    <input type="submit" value="Подтвердить">
</form>
<h1>Таблица проектов, зарегистрированных на сайте</h1>
<table>
    <tr>
        <th>ID проекта</th>
        <th>Название</th>
        <th>Автор</th>
        <th>Язык</th>
        <th>Описание</th>
    </tr>
<?php

$mysqli = new mysqli("db_mysql", "user", "password", "portfolioDB");

$result = $mysqli->query("SELECT * FROM projects");
foreach ($result as $row){
    echo "<tr><td>{$row['id_project']}</td><td>{$row['title_project']}</td><td>{$row['author_name']}</td>
    <td>{$row['main_lang']}</td><td>{$row['descrip']}</td></tr>";
}
?>

</table>

<h1>Наши профи</h1>
<table>
    <tr>
        <th>ID профи</th>
        <th>ФИО</th>
        <th>Дата рождения</th>
        <th>Мето проживания</th>
        <th>Контактная информация</th>
        <th>Ключевые навыки</th>
        <th>Опыт работы</th>
        <th>Образование</th>
    </tr>
<?php

$mysqli = new mysqli("db_mysql", "user", "password", "portfolioDB");

$result = $mysqli->query("SELECT * FROM pros");
foreach ($result as $row){
    echo "<tr><td>{$row['id_pro']}</td><td>{$row['`name`']}</td><td>{$row['birth_date']}</td>
    <td>{$row['residence_place']}</td><td>{$row['contacts']}</td><td>{$row['skills']}</td>
    <td>{$row['work_expirience']}</td><td>{$row['education']}</td></tr>";
}
?>

</table>

</body>
</html>