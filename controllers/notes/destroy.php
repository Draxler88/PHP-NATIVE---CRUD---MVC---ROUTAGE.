<?php
use  Core\Database;

$db = App::resolve(Database::class);

$id = $_POST['id_target'];
$post = $db->query('DELETE FROM posts where id = :id', ['id' => $id]);
header("location: /notes");
die();

