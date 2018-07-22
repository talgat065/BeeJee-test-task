<?php

namespace Core;

class Route
{
    protected $actionMethod = 'index';

    protected $controllerClass = 'Home';

    private $routes;

    private $params;

    protected $controllersPath = 'App\\Controllers\\';

    /**
     * @param mixed $routes
     */
    public function setRoutes($routes)
    {
        $this->routes = $routes;
    }

    /**
     * @param mixed $params
     */
    public function setParams($params)
    {
        $this->params = $params;
    }

    /**
     * @param $uri
     */
    protected function parseRoutes($uri)
    {
        $routes = explode('/', parse_url($uri, PHP_URL_PATH));

        $this->setRoutes($routes);
    }

    /**
     * @param $uri
     * @param $parsedQueries
     * @return mixed
     */
    protected function parseParams($uri)
    {
        $result = [];

        $queries = parse_url($uri, PHP_URL_QUERY);

        if (! empty($queries)) {
            parse_str($queries, $result);
        }

        $this->setParams($result);
    }

    /**
     * @param $uri
     */
    public function start($uri)
    {
        $this->parseRoutes($uri);

        $this->parseParams($uri);

        if (! empty($this->routes[1])) {
            $this->controllerClass = ucfirst($this->routes[1]);
        }

        if (! empty($this->routes[2])) {
            $this->actionMethod = $this->routes[2];
        }

        $this->controllerClass = $this->controllersPath.$this->controllerClass.'Controller';

        if (! class_exists($this->controllerClass)) {
            Route::ErrorPage404();
        }

        $controller = new $this->controllerClass();

        if (! method_exists($controller, $this->actionMethod)) {
            Route::ErrorPage404();
        }

        $method = $this->actionMethod;

        $controller->$method($this->params);
    }

    public static function ErrorPage404()
    {
        $host = 'http://'.$_SERVER['HTTP_HOST'].'/';

        header('HTTP/1.1 404 Not Found');

        header("Status: 404 Not Found");

        header('Location:'.$host.'404');
    }
}
