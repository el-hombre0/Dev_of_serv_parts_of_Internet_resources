<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="./style.css" />
        <title>Информационно-административная страница о сервере</title>
    </head>
    <body>
        <a href="http://localhost:80/index.php">Главная</a>
        <br>
        <form action="" method="post">
            <input name="command" class="input" type="text">
        </form>
        <?php
            $output = null;
            $retval = null;
            if (!empty($_POST['command'])) {
                $command = $_POST['command'];
                exec($command, $output, $retval);
                foreach ($output as $i) {
                    echo $i, " ";
                }
            }
        ?>
        <table>
    <tr>
        <th>ID пользователя</th>
        <th>Логин</th>
        <th>Пароль</th>
        <th>Пароль расшифрованный</th>
        <th>Имя пользователя</th>
    </tr>
    <?php

        $mysqli = new mysqli("database1", "user", "password", "portfolioDB");

        $result = $mysqli->query("SELECT * FROM auth_users");
        foreach ($result as $row){
            echo "<tr>
            <td>{$row['id_user']}</td>
            <td>{$row['login_user']}</td>
            <td>{$row['password_user']}</td>
            <td>{$row['password_user_encr']}</td>
            <td>{$row['name_user']}</td>
            </tr>";
        }
    ?>
    </table>
    </body>
</html>