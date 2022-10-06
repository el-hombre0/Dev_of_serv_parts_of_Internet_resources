<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Drawer</title>
    <link rel="stylesheet" href="./style.css">
</head>
<body>
    <?php
        $articles = [
            [
                'title' => 'Круг',
                'content' => '<circle cx="102" cy="102" r="100" fill="rgb(255,0,0)" stroke-width="1" stroke="rgb(0,0,0)"/>'
            ],
            [
                'title' =>  'Квадрат',
                'content' => '<rect width="200" height="200" fill="rgb(255,128,0)" stroke-width="1" stroke="rgb(0,0,0)"/>'
            ],
            [
                'title' =>  'Прямоугольник',
                'content' => '<rect width="400" height="200" fill="rgb(255,255,0)" stroke-width="1" stroke="rgb(0,0,0)"/>'
            ],
            [
                'title' =>  'Эллипс',
                'content' => '<ellipse cx="100" cy="50" rx="100" ry="50" fill="rgb(0,255,0)" stroke-width="1" stroke="rgb(0,0,0)"/>'
            ]
        ];
    ?>
    <!-- Выводим меню -->
    <a class="mainpage" href="/">Главная</a>
    <br>
    <h2>Упражнение 1</h2>
    
    <?php foreach($articles as $id => $article): ?>
        <a href="/index.php?id=<?= $id ?>"><?= $article['title'] ?></a>
        <br>
    <?php endforeach; ?>
    
    <?php
    // Если id нет в URL - отображаем главную страницу
    if(!isset($_GET['id']))
        echo '';

    // Если id есть, но нет фигуры с таким id - показываем ошибку
    elseif(!isset($articles[$_GET['id']]))
        echo '<h1>Ошибка: страница не существует.</h1>';

    // Если id есть и статья с таким id существует - выводим статью
    else
    {
        $article = $articles[$_GET['id']];

        echo '<h1>' . $article['title'] . '</h1>';
        echo '<svg>' . $article['content'] . '</svg>';
    }
    ?>
    <h2>Упражнение 2</h2>
    <a href="./shell_sort.php">Сортировка Шелла</a>

    <h2>Упражнение 3</h2>
    <a href="./admin_page.php">Информационно-административная страница о сервере</a>
</body>
</html>
