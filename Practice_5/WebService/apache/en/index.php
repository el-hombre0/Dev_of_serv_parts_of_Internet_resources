<?php
    session_start();
    $_SESSION['start'] = time(); 
  
    // Destroying session after 1 minute
    $_SESSION['expire'] = $_SESSION['start'] + (1 * 10) ; 
    if(isset($_SESSION['user'])){
        $now = time();
        if($now > $_SESSION['expire']){
            session_destroy();
            echo "<p align='center'>Session has been destroyed!!</p>";
        }
    }
    echo "Start: ".$_SESSION['start']." End: ".$_SESSION['expire'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portfolio - Our projects</title>
</head>
<body>
<h3>Menu</h3>
<ul>
    <li><a href="http://localhost:8080/index.html">Main page</a></li>
    <li><a href="http://localhost:8080/second.html">Our features</a></li>
</ul>
<?php
if($_SESSION['user']){
    echo "<h2>Hello, ".$_SESSION['user']['login_user']."!</h2>
    <a href=\"profile.php\">Personal account</a>
    <a href=\"vendor/logout.php\">Exit</a>";
} 
else{
    echo "<h3>Autorization</h3>
        <form action=\"vendor/signin.php\" method=\"POST\" >
        <label>Логин</label>
        <input type=\"text\" name=\"login\" placeholder=\"Enter login\">
        <label>Пароль</label>
        <input type=\"password\" name=\"password\" placeholder=\"Enter password\">
        <button type=\"submit\">Log in</button>
        <p>Впервые тут? <a href=\"http://localhost:80/register.php\">Register!</a></p>";
    if($_SESSION['message']){
        echo '<p class="msg"> '. $_SESSION['message'].' </p>';
    }
          
    unset($_SESSION['message']); 
    echo "</form>";
}
?>

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