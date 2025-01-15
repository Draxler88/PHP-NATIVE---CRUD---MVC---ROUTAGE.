<?php
use \Core\Router;
function urlIs($value) {
    return $_SERVER['REQUEST_URI'] === $value ;
}


function dd($value) {
    echo "<pre>";
    var_dump($value);
    echo "</pre>";
    die();
}

function base_path($path) {
    return (__DIR__ . '/../' . $path) ;
}

function view($path, $props = [])
{
    extract($props);
    require base_path('views/' . $path);
}

function authorize($condition){
    if(!$condition) {
        Router::abort(403);
        return;
    }
}

function redirect($path)
{
    header("location: {$path}");
    die();
}