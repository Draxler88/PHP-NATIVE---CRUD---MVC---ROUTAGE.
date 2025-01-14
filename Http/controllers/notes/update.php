<?php
use \Core\Validator;
use Core\Database;

$db = App::resolve(Database::class);
//take the value
$id = $_POST['id'];

$post = $db->query("select * from posts where id = :id", [
    "id" => $id,
])->fetch();

$currentUser = $_SESSION['id'];

//authorize the value
authorize($currentUser === $post['user_id']);

$title = $_POST['note'];
$errors = [];
if (!Validator::string($_POST['note'], 5, 10)) {
    $errors['body'] = "Title must be bigger than 5 characters and least than 10";
}


if (!empty($errors)) {
    view("notes/edit.view.php", [
        'heading' => 'Create Notes :',
        'errors' => $errors,
        'post' => $post,
    ]);
    return;
}

$db->query("UPDATE posts  SET title = :title where id = :id", [
    'id' => $id,
    "title" => $_POST["note"],
]);

//update the value after that redirect to notes

header('location: /notes');