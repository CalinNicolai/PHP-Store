<?php

namespace src\routes;

class Router
{
    public function get($route, $callback)
    {
        $this->route('GET', $route, $callback);
    }

    public function post($route, $callback)
    {
        $this->route('POST', $route, $callback);
    }

    public function put($route, $callback)
    {
        $this->route('PUT', $route, $callback);
    }

    public function patch($route, $callback)
    {
        $this->route('PATCH', $route, $callback);
    }

    public function delete($route, $callback)
    {
        $this->route('DELETE', $route, $callback);
    }

    public function any($route, $callback)
    {
        $this->route('ANY', $route, $callback);
    }

    private function route($method, $route, $callback)
    {
        if ($_SERVER['REQUEST_METHOD'] == $method || $method == 'ANY') {
            $this->executeRoute($route, $callback);
        }
    }

    private function executeRoute($route, $callback)
    {
        // Оставим логику выполнения маршрута сюда
    }
}