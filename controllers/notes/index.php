<?php


$config = require base_path("config.php");

$db = new Database($config['database']);

$posts = $db->query('SELECT * FROM posts')->fetchAll();


view("notes/index.view.php", [
    'heading' => "Notes :",
    'posts' => $posts,
]);
