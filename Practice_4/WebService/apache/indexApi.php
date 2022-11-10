<?php
die($_GET['q']);
header('Content-type: json/application');
require 'connect.php';

$projects = $connect->query("select * from projects");
// print_r($result);
$projects_list = [];
// echo gettype($projects_list);
while($project = mysqli_fetch_assoc($projects)){//ассоциативный массив, соответствующий полученному ряду, сдвигает вперёд внутренний указатель результата
    array_push($projects_list, $project);
}
// print_r($projects_list);
echo json_encode($projects_list);
// $mysqli = new mysqli("database1", "user", "password", "portfolioDB");
// $result = $mysqli->query("SELECT * FROM projects");