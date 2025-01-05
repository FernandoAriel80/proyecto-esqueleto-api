<?php

namespace App\Core;

class Router
{
    private static $routes = [];

    public static function get($uri,$callback)
    {
        self::$routes[] = [
            'method' => 'GET',
            'uri' => $uri,
            'callback' => $callback
        ];
        self::dispatch();
    }

   public static function post($uri,$callback)
    {
        self::$routes[] = [
            'method' => 'POST',
            'uri' => $uri,
            'callback' => $callback
        ];
        self::dispatch();
    }

    public static function dispatch()
    {
        $requestMethod = $_SERVER['REQUEST_METHOD'];
        $requestUri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        foreach (self::$routes as $route) {
            if ($route['method'] === $requestMethod && $route['uri'] === $requestUri) {
                call_user_func($route['callback']);
                return;
            }
        }
        // Respuesta 404 si no se encuentra la ruta
        http_response_code(404);
        return ['error' => 'Endpoint no encontrado'];
    }
}
