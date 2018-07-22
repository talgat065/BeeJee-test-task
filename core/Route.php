<?php

namespace Core;

use App\Controllers;
use App\Models;

class Route
{

    public static function start()
    {
        $controllerClass = 'Home';

        $actionMethod = 'index';

        $pathQuery = parse_url($_SERVER['REQUEST_URI']);

        $path = $pathQuery['path'];

        $query = [];

        if (! empty($pathQuery['query'])) {
            parse_str($pathQuery['query'], $query);
        }

        $routes = explode('/', $path);

        if (! empty($routes[1])) {
            $controllerClass = $routes[1];
        }

        if (! empty($routes[2])) {
            $actionMethod = $routes[2];
        }

        $modelName = $controllerClass.'Model';

        $controllerClass = 'App\\Controllers\\' .$controllerClass.'Controller';

        $modelFile = ucfirst($modelName).'.php';

        $modelPath = "app/models/".$modelFile;

        $controllerFile = ucfirst($controllerClass).'.php';

        $controllerPath = "app/controllers/".$controllerFile;

        if (! class_exists($controllerClass)) {
            Route::ErrorPage404();
        }

        $controller = new $controllerClass();

        if (method_exists($controller, $actionMethod)) {
            $controller->$actionMethod($query);
        } else {
            Route::ErrorPage404();
        }
    }

    public static function ErrorPage404()
    {
        $host = 'http://'.$_SERVER['HTTP_HOST'].'/';

        header('HTTP/1.1 404 Not Found');

        header("Status: 404 Not Found");

        header('Location:'.$host.'404');
    }
}
