<?php

use Core\Database;

$db = App::resolve(Database::class);


$id = $_GET['id'];

$post = $db->query('SELECT * FROM posts where id = :id', ['id' => $id])->fetch();

view("notes/show.view.php", [
    'heading' => "Note :",
    'post' => $post,
]);

