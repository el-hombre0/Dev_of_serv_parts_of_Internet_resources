<?php
    session_start();
    $count = isset($_SESSION['count']) ? $_SESSION['count'] : 1;
    echo $count; $_SESSION['count'] = ++$count; 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Портфолио - Наши проекты</title>
</head>
<body>
<h3>Меню</h3>
<ul>
    <li><a href="./private/admin_page.php">Администратор</a></li>
    <li><a href="http://localhost:8080/index.html">Главная</a></li>
    <li><a href="http://localhost:8080/second.html">Наши особенности</a></li>
</ul>
<h3>
  Авторизация  
</h3>
<form action="vendor/signin.php" method="POST" >
    <label>Логин</label>
    <input type="text" placeholder="Введите логин">
    <label>Пароль</label>
    <input type="password" placeholder="Введите пароль">
    <button type="submit">Войти</button>
    <p>Впервые тут? <a href="http://localhost:80/register.php">Зарегистрируйтесь!</a></p>
    <?php
    if($_SESSION['message']){
            echo '<p class="msg"> '. $_SESSION['message'].' </p>';
        }
        
        unset($_SESSION['message']); //уничтожение
    ?>
</form>
<button>Смена темы сайта</button>
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
phpinfo();
?>

</table>

</body>
</html>