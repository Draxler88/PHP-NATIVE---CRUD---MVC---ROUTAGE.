<?php

$config = require base_path("config.php");

$db = new Database($config['database']);
$errors = [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {


    if (!Validator::string($_POST['note'], 5, 10)) {
        $errors['body'] = "Title must be bigger than 5 characters and least than 10";
    }

    if (empty($errors)) {
        $db->query("INSERT INTO posts (id, title, user_id) VALUES (null, :body , :user_id)", [
            "body" => $_POST["note"],
            "user_id" => 3,
        ]);
    }
}
view("notes/create.view.php", [
    'heading' => 'Create Notes :',
    'errors' => $errors,
]);
