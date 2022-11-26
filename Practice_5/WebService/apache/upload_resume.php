<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Загрузка Вашего резюме</title>
</head>
<body>
    <h1>Загрузите Ваше резюме!</h1>

    <form action="/upload.php" method="post" enctype="multipart/form-data">
        <input type="file" name="file_res">
        <input type="submit" value="Отправить">
    </form>
</body>
</html>