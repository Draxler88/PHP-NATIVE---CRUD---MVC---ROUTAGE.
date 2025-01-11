<?php

use Core\Database;
use Core\Validator;
$config = require base_path("config.php");

$db = new Database($config['database']);
$errors = [];


    if (!Validator::string($_POST['note'], 5, 10)) {
        $errors['body'] = "Title must be bigger than 5 characters and least than 10";
    }

    if(!empty($errors)){
        view("notes/create.view.php", [
            'heading' => 'Create Notes :',
            'errors' => $errors,
        ]);
        return;
    }

    if (empty($errors)) {
        $db->query("INSERT INTO posts (id, title, user_id) VALUES (null, :body , :user_id)", [
            "body" => $_POST["note"],
            "user_id" => 3,
        ]);
        header('location: /notes');
        die();
    }

