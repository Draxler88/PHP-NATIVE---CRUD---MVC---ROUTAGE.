<?php
session_start();
use Core\Router;
const BASE_PATH = __DIR__ . "/../";
require BASE_PATH . "Core/functions.php";

spl_autoload_register(function ($class){
    require base_path("{$class}.php");
});

require base_path('bootstrap.php');

$router = new Router();
$uri = parse_url($_SERVER["REQUEST_URI"])["path"];
$method = isset($_POST['_method']) ? $_POST['_method'] : $_SERVER['REQUEST_METHOD'];

require base_path('routes.php');
$router->route($uri, $method);





