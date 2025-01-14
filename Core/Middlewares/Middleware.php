<?php
namespace Core\Middlewares;
class Middleware
{
    public const MAP = [
        'guest' => Guest::class,
        'auth' => Auth::class,
        ];

    /**
     * @throws \Exception
     */
    public static function resolve($key)
    {
        if(!$key){
            return;
        }
        $middleware = static::MAP[$key];

        if(!$middleware){
            throw new \Exception("No matching found a middleware name {$middleware} .");
        }
        (new $middleware)->handle();
    }
}