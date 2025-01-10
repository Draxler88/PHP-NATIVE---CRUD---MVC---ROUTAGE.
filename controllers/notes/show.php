<?php


$config = require base_path("config.php");

$db = new Database($config['database']);

$id = $_GET['id'];

$post = $db->query('SELECT * FROM posts where id = :id', ['id' => $id])->fetch();

view("notes/show.view.php", [
    'heading' => "Note :",
    'post' => $post,
]);
