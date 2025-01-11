<?php

use Core\Database;

$config = require base_path("config.php");

$db = new Database($config['database']);

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $id = $_POST['id_target'];
    $post = $db->query('DELETE FROM posts where id = :id', ['id' => $id]);
    header('location : /notes');
}else{


    $id = $_GET['id'];

    $post = $db->query('SELECT * FROM posts where id = :id', ['id' => $id])->fetch();

    view("notes/show.view.php", [
        'heading' => "Note :",
        'post' => $post,
    ]);
}

