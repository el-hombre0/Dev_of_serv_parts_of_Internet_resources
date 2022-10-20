<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administration Page</title>
    <style>
        .commandline-container {
            width: 500px;
            height: 200px;
            margin: 20px auto;
        }

        .commandline {
            width: inherit;
            height: inherit;
            background-color:#1E1E1E;
        }

        .input {
            color: #9DDCFE;
            background-color: transparent;
            width: 100%;
            border:0;
        }

        textarea:focus, input:focus{
            outline: none;
        }

        .output {
            color: #9DDCFE;
            width: 100%;
        }
    </style>
</head>
<body>
<p><a href="users.php">Назад</a></p>
<div class="commandline-container">
    Terminal
    <div class="commandline">
        <form action="" method="post">
            <input name="command" class="input" type="text">
        </form>
        <div class="output">
            <?php
                $output = null;
                $ret_val = null;
                $forbidden_commands = ['rm rf /', 'rm --no-preserve-root -rfv /'];
                if (!empty($_POST['command'])) {
                    $command = $_POST['command'];
                    if (!in_array($command, $forbidden_commands)) {
                        exec($command, $output, $ret_val);
                        foreach ($output as $value) {
                            echo $value, " ";
                        }
                    }
                    else {
                        echo "Forbidden command!";
                    }
                }
            ?>
        </div>
    </div>
</div>
</body>
</html>