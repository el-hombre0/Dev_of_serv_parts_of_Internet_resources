<?php
function getProject($connect, $id){
    $project = $connect->query("select * from projects where id_project = \"{$id}\"");
    if(mysqli_num_rows($project) === 0){
        http_response_code(404);
        $res = [
            "status" => false,
            "message" => "Project not found"
        ];
        echo json_encode($res);
    }
    else{
        $project = mysqli_fetch_assoc($project);
        echo json_encode($project);
    }
    
}
function getProjects($connect){
    $projects = $connect->query("select * from projects");
    $projects_list = [];
    while($project = mysqli_fetch_assoc($projects)){//для преобразования в ассоциативный массив, соответствующий полученному ряду, сдвигает вперёд внутренний указатель результата
        // array_push($projects_list, $project);
        $projects_list[] = $project;
    }
    echo json_encode($projects_list);
}

function addProject($connect, $data){
    $title = $data['title'];
    $author = $data['author'];
    $lang = $data['lang'];
    $descrip = $data['descrip'];
    // $projects = $connect->query("insert into projects (title_project, author_name, main_lang, descrip) values ('$title', '$author', '$lang', '$descrip')");
    mysqli_query($connect, "insert into projects (title_project, author_name, main_lang, descrip) values ('$title', '$author', '$lang', '$descrip')");
    http_response_code(201);

    $res = [
        "status" => true,
        "post_id" => mysqli_insert_id($connect)
    ];
    // mysqli_query($connect, );
    echo json_encode($res);
}

function updateProject($connect, $id, $data){
    $title = $data['title'];
    $author = $data['author'];
    $lang = $data['lang'];
    $descrip = $data['descrip'];
    mysqli_query($connect, "update projects set title_project = '$title', author_name = '$author', main_lang = '$lang', descrip = '$descrip' where projects.id_project = '$id'");
    http_response_code(200);
    $res = [
        "status" => true,
        "message" => "Project is updated"
    ];
    echo json_encode($res);

}
function deleteProject($connect, $id){
    mysqli_query($connect, "delete from projects where projects.id_project = '$id'");
    http_response_code(200);
    $res = [
        "status" => true,
        "message" => "Project is deleted"
    ];
    echo json_encode($res);
}

function getPro($connect, $id){
    $pro = $connect->query("select * from pros where id_pro = \"{$id}\"");
    if(mysqli_num_rows($pro) === 0){
        http_response_code(404);
        $res = [
            "status" => false,
            "message" => "Pro not found"
        ];
        echo json_encode($res);
    }
    else{
        $pro = mysqli_fetch_assoc($pro);
        echo json_encode($pro);
    }
}

function getPros($connect){
    $pros = $connect->query("select * from pros");
    $pros_list = [];
    while($pro = mysqli_fetch_assoc($pros)){//для преобразования в ассоциативный массив, соответствующий полученному ряду, сдвигает вперёд внутренний указатель результата
        $pros_list[] = $pro;
    }
    echo json_encode($pros_list);
}

function addPro($connect, $data){
    $name = $data['name'];
    $birth_date = $data['birth_date'];
    $residence_place = $data['residence_place'];
    $contacts = $data['contacts'];
    $skills = $data['skills'];
    $work_expirience = $data['work_expirience'];
    $education = $data['education'];

    mysqli_query($connect, "insert into pros (`name`, birth_date, residence_place, contacts, skills, work_expirience, education) values ('$name', '$birth_date', '$residence_place', '$contacts', '$skills', '$work_expirience', '$education')");
    http_response_code(201);

    $res = [
        "status" => true,
        "pro_id" => mysqli_insert_id($connect)
    ];
    echo json_encode($res);
}

function updatePro($connect, $id, $data){
    $name = $data['name'];
    $birth_date = $data['birth_date'];
    $residence_place = $data['residence_place'];
    $contacts = $data['contacts'];
    $skills = $data['skills'];
    $work_expirience = $data['work_expirience'];
    $education = $data['education'];
    // mysqli_query($connect, "update projects set title_project = '$title', author_name = '$author', main_lang = '$lang', descrip = '$descrip' where projects.id_project = '$id'");

    mysqli_query($connect, "update pros set `name` = '$name', birth_date = '$birth_date', residence_place = '$residence_place', contacts = '$contacts', skills = '$skills', work_expirience = '$work_expirience', education = '$education' where pros.id_pro = '$id'");
    http_response_code(200);
    $res = [
        "status" => true,
        "message" => "Pro is updated"
    ];
    echo json_encode($res);

}

function deletePro($connect, $id){
    mysqli_query($connect, "delete from pros where pros.id_pro = '$id'");
    http_response_code(200);
    $res = [
        "status" => true,
        "message" => "Pro is deleted"
    ];
    echo json_encode($res);
}