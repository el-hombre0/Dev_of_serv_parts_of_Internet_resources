<!doctype html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=windows-1251"/>
    <link rel="stylesheet" href="../css/<?php use JetBrains\PhpStorm\NoReturn;

    echo $_SESSION['theme']; ?>.css" type="text/css">

    <title>Ваше сообщение успешно отправлено</title>
</head>

<body>
</body>
</html>
<?php
$back = "<p><a href=\"javascript: history.back()\">Вернуться назад</a></p>";

/**
 * @param string $back
 * @return void
 */
#[NoReturn] function extracted(string $back): void
{
    if (!empty($_POST['name']) and !empty($_POST['phone']) and !empty($_POST['mail'])
        and !empty($_POST['message'])) {
        $name = trim(strip_tags($_POST['name']));
        $phone = trim(strip_tags($_POST['phone']));
        $mail = trim(strip_tags($_POST['mail']));
        $message = trim(strip_tags($_POST['message']));

        mail('evendot@yandex.ru', 'Письмо с Портфолио',
            'Вам написал: ' . $name . '<br />Его номер: ' . $phone . '<br />Его почта: ' . $mail . '<br />
      Его сообщение: ' . $message, "Content-type:text/html;charset=windows-1251");

        echo "Ваше сообщение успешно отправлено!<Br> Вы получите ответ в 
      ближайшее время<Br> $back";

        exit;
    } else {
        echo "Для отправки сообщения заполните все поля! $back";
        exit;
    }
}

extracted($back);
?>
