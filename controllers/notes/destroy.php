<?php

use Core\Database;

$config = require base_path("config.php");

$db = new Database($config['database']);

$id = $_POST['id_target'];
$post = $db->query('DELETE FROM posts where id = :id', ['id' => $id]);
header("location: /notes");
die();

