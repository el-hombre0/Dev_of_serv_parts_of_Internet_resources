<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Таблица проектов</title>
</head>
<body>
<h1>Таблица проектов, зарегистрированных на сайте</h1>
<table>
    <tr>
        <th>id_project</th>
        <th>title_project</th>
        <th>author_name</th>
        <th>main_lang</th>
        <th>descrip</th>
    </tr>
<?php

$mysqli = new mysqli("mysql-db", "root", "password", "portfolioDB");

$result = $mysqli->query("SELECT * FROM projects");
foreach ($result as $row){
    echo "<tr><td>{$row['id_project']}</td><td>{$row['title_project']}</td><td>{$row['author_name']}</td>
    <td>{$row['main_lang']}</td><td>{$row['descrip']}</td></tr>";
}
?>
</table>
<?php
phpinfo();
?>
</body>
</html>