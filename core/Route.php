<?php
namespace Core;

class Route
{
    public static function start()
    {
        $controllerName = 'Home';

        $actionName = 'index';

        $pathQuery = parse_url($_SERVER['REQUEST_URI']);

        $path = $pathQuery['path'];

        $query = [];
        if (! empty($pathQuery['query'])) {
            parse_str($pathQuery['query'], $query);
        }

        $routes = explode('/', $path);

        if (! empty($routes[1])) {
            $controllerName = $routes[1];
        }

        if (! empty($routes[2])) {
            $actionName = $routes[2];
        }

        $modelName = $controllerName.'Model';

        $controllerName = $controllerName.'Controller';

        $modelFile = ucfirst($modelName).'.php';

        $modelPath = "app/models/".$modelFile;

        if (file_exists($modelPath)) {
            include "app/models/".$modelFile;
        }

        $controllerFile = ucfirst($controllerName).'.php';

        $controllerPath = "app/controllers/".$controllerFile;

        if (file_exists($controllerPath)) {
            include "app/controllers/".$controllerFile;
        } else {
            Route::ErrorPage404();
        }

        $controller = new $controllerName();

        $action = $actionName;

        if (method_exists($controller, $action)) {
            $controller->$action($query);
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
