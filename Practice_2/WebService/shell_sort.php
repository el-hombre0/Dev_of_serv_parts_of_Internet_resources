<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style.css" />
    <title>Сортировка Шелла</title>
</head>
<body>
    <a class="mainpage" href="./index.php">Главная</a>
<?php
    function array_fill_rand($limit, $min=true, $max=true) 
    {
        $limit = (int)$limit;
        $numbers = array();
        
        if ($min !== false && $max !== false)
        {
            $min = (int)$min;
            $max = (int)$max;
            for ($i=0; $i<$limit; $i++)
            {
                $numbers[$i] = rand($min, $max);
            }
        }
        else
        {
            for ($i=0; $i<$limit; $i++)
            {
                $numbers[$i] = rand();
            }
        }
        
        return $numbers;
    }
    $numbers = array_fill_rand(50, 0, 100);
    // $numbers = [21, 25, 100, 1, 3, 2, 34, 853, 298, 4, 98, 89, 77];
    echo '<pre>';
    print_r($numbers);
    echo '</pre>';

    function shell_Sort($my_array)
    {
        $x = round(count($my_array)/2);
        while($x > 0)
        {
            for($i = $x; $i < count($my_array);$i++){
                $temp = $my_array[$i];
                $j = $i;
                while($j >= $x && $my_array[$j-$x] > $temp)
                {
                    $my_array[$j] = $my_array[$j - $x];
                    $j -= $x;
                }
                $my_array[$j] = $temp;
            }
            $x = round($x/2.2);
        }
        return $my_array;
    }

    $new_array = shell_Sort($numbers);
    echo '<pre>';
    print_r($new_array);
    echo '</pre>';
?>
    
</body>
</html>
