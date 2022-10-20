<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: access");
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Allow-Credentials: true");
header("Content-Type: application/json");

include_once "api/config/database.php";
include_once "api/entities/product.php";

$database = new Database();
$db = $database->getConnection();

$product = new Product($db);

$product->id = $id ?? die();

$product->readOne();

if ($product->name != null) {

    $product_arr = array(
        "id" => $product->id,
        "name" => $product->name_of_product,
        "description" => $product->description,
        "price" => $product->price,
    );

    http_response_code(200);

    echo json_encode($product_arr);
} else {
    http_response_code(404);

    echo json_encode(array("message" => "Товар не существует."), JSON_UNESCAPED_UNICODE);
}
