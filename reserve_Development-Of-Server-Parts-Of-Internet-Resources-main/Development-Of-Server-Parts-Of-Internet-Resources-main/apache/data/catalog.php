<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <title>Строительный магазин - Каталог</title>
</head>
<body>
    <h1>Строительный магазин</h1>
    <h3>Каталог</h3>
    <p>
        <table>
            <tbody>
                <tr>
                    <th>Наименование</th>
                    <th>Цена</th>
                </tr>

                <?php
                    $mysqli = new mysqli("database", "user", "password", "main_database");
                    $table = $mysqli->query("SELECT * FROM products");

                    foreach ($table as $row) {
                        echo "<tr><td>{$row['name_of_product']}</td><td>{$row['price']}</td></tr>";
                    }
                ?>

            </tbody>
        </table>
    </p>
    <p><a href="/">Вернуться на главную</a></p>
</body>
</html>