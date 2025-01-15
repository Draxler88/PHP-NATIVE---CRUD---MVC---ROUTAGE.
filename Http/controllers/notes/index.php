<?php
use Core\Database;

$db = App::resolve(Database::class);
$currentUser = $_SESSION['user']['id'];

$posts = $db->query('SELECT * FROM posts where user_id = :current_user', ['current_user' => $currentUser])->fetchAll();


view("notes/index.view.php", [
    'heading' => "Notes :",
    'posts' => $posts,
]);
