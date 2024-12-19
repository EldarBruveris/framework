<?php

namespace app\Infrastructure\Router;

class Router{
    protected $routes = [];

    public function addRoute(string $method, string $url, $target){
        if ($url !== '/' && substr($url, 0, 1) !== '/') {
            $url = '/' . $url;
        }
        if ($url !== '/' && substr($url, -1) === '/') {
            $url = rtrim($url, '/');
        }

        $this->routes[$method][$url] = $target;
    }

    public function matchRoute(){
        $method = $_SERVER['REQUEST_METHOD'];
        $url = rtrim($_SERVER['REQUEST_URI'], '/')  ;

        if (!$url) {    
        $url = '/';
        }

        if(isset($this->routes[$method])){
            foreach($this->routes[$method] as $routeUrl => $target){
                $pattern = preg_replace('/\/:([^\/]+)/', '/(?P<$1>[^/]+)', $routeUrl);

                if (preg_match('#^' . $pattern . '$#', $url, $matches)) {
                    $params = array_filter($matches, 'is_string', ARRAY_FILTER_USE_KEY); 
                    $target(...array_values($params));
                    return;
                }
            }
        }
    }
}
