<?php

$method = $_SERVER['REQUEST_METHOD'];

$url = (isset($_GET['q'])) ? $_GET['q'] : '';
$url = rtrim($url, '/');
$urls = explode('/', $url);
if ($urls[0] == "api") {
    switch ($urls[1]):
        case "products":
        {
            switch ($method):
                case "GET":
                {
                    if (isset($urls[2]) and ctype_digit($urls[2])) {
                        $id = intval($urls[2]);
                        include_once "api/products/read_one.php";
                    } else include_once "api/products/read.php";
                    break;
                }
                case "POST":
                {
                    include_once "api/products/create.php";
                    break;
                }
                case "PUT":
                {
                    include_once "api/products/update.php";
                    break;
                }
                case "DELETE":
                {
                    if (isset($urls[2]) and ctype_digit($urls[2])) {
                        $id = intval($urls[2]);
                        include_once "api/products/delete.php";
                    }
                    break;
                }
            endswitch;
            break;
        }
        case "user":
        {
            switch ($method):
                case "GET":
                {
                    if (isset($urls[2]) and ctype_digit($urls[2])) {
                        $id = intval($urls[2]);
                        include_once "api/users/read_one.php";
                    } else {
                        include_once "api/users/read.php";
                    }
                    break;
                }
                case "POST":
                {
                    include_once "api/users/create.php";
                    break;
                }
                case "PUT":
                {
                    include_once "api/users/update.php";
                    break;
                }
                case "DELETE":
                {
                    if (isset($urls[2]) and ctype_digit($urls[2])) {
                        $id = intval($urls[2]);
                        include_once "api/users/delete.php";
                    }
                    break;
                }
            endswitch;
            break;
        }
    endswitch;
}