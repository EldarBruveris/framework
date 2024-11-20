<?php

namespace Router;

class Router{
    protected $routes = [];

    public function addRoute(string $method, string $url, $target){
        $this->routes[$method][$url] = $target;
    }

    public function matchRoute(){
        $method = $_SERVER['REQUEST_METHOD'];
        $url = $_SERVER['REQUEST_URI'];

        if(isset($this->routes[$method])){
            foreach($this->routes[$method] as $routeUrl => $target){
                $pattern = preg_replace('/\/:([^\/]+)/', '/(?P<$1>[^/]+)', $routeUrl);

                if (preg_match('#^' . $pattern . '$#', $url, $matches)) {
                    // Pass the captured parameter values as named arguments to the target function
                    $params = array_filter($matches, 'is_string', ARRAY_FILTER_USE_KEY); // Only keep named subpattern matches

                    $target(...$params);

                    return;
                }
            }
        }
    }
}
