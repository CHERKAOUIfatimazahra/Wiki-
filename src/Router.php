<?php
namespace App;

class Router
{
    protected $routes = [];

    private function addRoute($route, $controller, $action, $method)
    {
        // Convert route with parameters to a regex pattern
        $pattern = str_replace('/:id', '/(?<id>[^\/]+)', $route);
        $pattern = str_replace('/', '\/', $pattern);
        $pattern = "#^" . $pattern . "$#";

        $this->routes[$method][$pattern] = ['controller' => $controller, 'action' => $action];
    }
    public function get($route, $controller, $action)
    {
        $this->addRoute($route, $controller, $action, "GET");
    }
    public function post($route, $controller, $action)
    {
        $this->addRoute($route, $controller, $action, "POST");
    }
    public function dispatch()
    {
        $olduri = strtok($_SERVER['REQUEST_URI'], '?');

        if ($olduri == "/") {
            $uri = $olduri;
        } else {
            $uri = rtrim(strtolower($olduri), '/');
        }

        $method = $_SERVER['REQUEST_METHOD'];

        foreach ($this->routes[$method] as $pattern => $info) {

            if (preg_match($pattern, $uri, $matches)) {
                $controller = $info['controller'];
                $action = $info['action'];

                $params = array_filter($matches, 'is_string', ARRAY_FILTER_USE_KEY);

                $controllerInstance = new $controller();

                if (method_exists($controllerInstance, $action)) {

                    $controllerInstance->$action($params);

                } else {
                    throw new \Exception("Action not found: $action");
                }

                return;
            }
        }

        throw new \Exception("No route found for URI: $uri");
    }
}
