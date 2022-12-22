<?php
$connect = new mysqli("db_mysql", "user", "password", "portfolioDB");

header('Content-type: json/application');
require '../controllers/connect.php';
require 'functions.php';

$method = $_SERVER['REQUEST_METHOD'];

$q = $_GET['q'];
$params = explode('/', $q); // разрыв строки на символы

$type = $params[0];
$id = $params[1];
$api_request = new ApiClass($connect, $_SESSION['id']);

if ($method === 'GET') {
    if ($type === 'projects') {
        if (isset($id)) {
            $api_request._toString(getProject($connect, $id));
        } else {
            $api_request.getProjects($connect);
        }

    } elseif ($type === 'pros') {
        if (isset($id)) {
            $api_request.getPro($connect, $id);
        } else {
            $api_request.getPros($connect);
        }
    }
} elseif ($method === 'POST') {
    if ($type === 'projects') {
        $api_request.addProject($connect, $_POST);
    }
    if ($type === 'pros') {
        $api_request.addPro($connect, $_POST);
    }
} elseif ($method === 'PATCH') {
    if ($type === 'projects') {
        if (isset($id)) {
            $data = file_get_contents('php://input');
            $data = json_decode($data, true);
            $api_request.updateProject($connect, $id, $data);
        }
    } elseif ($type === 'pros') {
        if (isset($id)) {
            $data = file_get_contents('php://input');
            $data = json_decode($data, true);
            $api_request.updatePro($connect, $id, $data);
        }
    }
} elseif ($method === 'DELETE') {
    if ($type === 'projects') {
        if (isset($id)) {
            $api_request.deleteProject($connect, $id);
        }
    } elseif ($type === 'pros') {
        if (isset($id)) {
            $api_request.deletePro($connect, $id);
        }
    }
}





if ($method === 'GET') {
    if ($type === 'projects') {
        if (isset($id)) {
            getProject($connect, $id);
        } else {
            getProjects($connect);
        }

    } elseif ($type === 'pros') {
        if (isset($id)) {
            getPro($connect, $id);
        } else {
            getPros($connect);
        }
    }
} elseif ($method === 'POST') {
    if ($type === 'projects') {
        addProject($connect, $_POST);
    }
    if ($type === 'pros') {
        addPro($connect, $_POST);
    }
} elseif ($method === 'PATCH') {
    if ($type === 'projects') {
        if (isset($id)) {
            $data = file_get_contents('php://input');
            $data = json_decode($data, true);
            updateProject($connect, $id, $data);
        }
    } elseif ($type === 'pros') {
        if (isset($id)) {
            $data = file_get_contents('php://input');
            $data = json_decode($data, true);
            updatePro($connect, $id, $data);
        }
    }
} elseif ($method === 'DELETE') {
    if ($type === 'projects') {
        if (isset($id)) {
            deleteProject($connect, $id);
        }
    } elseif ($type === 'pros') {
        if (isset($id)) {
            deletePro($connect, $id);
        }
    }
}