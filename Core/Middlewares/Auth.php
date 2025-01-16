<?php
namespace Core\Middlewares;
class Auth
{
    public function handle()
    {
        if(!$_SESSION['email'] ?? false){
            header('location: /');
            exit();
        }
    }
}