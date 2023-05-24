<?php

namespace Panda\Tz;

use Exception;
use FastRoute\RouteCollector;
use FastRoute\DataGenerator\GroupCountBased as DataGenerator;
use FastRoute\RouteParser\Std as RouteParser;
use FastRoute\Dispatcher;
use FastRoute\Dispatcher\GroupCountBased as DispatcherType;

class Router
{
    private $routes = [];

    private $router;

    private $dispatcher;

    public function __construct(
        private string $routesPath
    ) {
        $this->router = new RouteCollector(new RouteParser(), new DataGenerator());

        $this->parseRoutesFiles();
    }

    public function dispatch($httpMethod, $uri)
    {
        $routeInfo = $this->dispatcher->dispatch($httpMethod, $uri);

        return $this->callCallback($routeInfo);
    }

    private function callCallback($routeInfo)
    {
        switch ($routeInfo[0]) {
            case Dispatcher::NOT_FOUND:
                echo '404 - Сторінка не знайдена';
                break;
            case Dispatcher::METHOD_NOT_ALLOWED:
                echo '405 - Неприпустимий метод';
                break;
            case Dispatcher::FOUND:
                $handler = $routeInfo[1];
                $vars = $routeInfo[2];

                if (is_array($handler) && count($handler) === 2 && !is_callable($handler)) {
                    [$class, $method] = $handler;

                    $instance = new $class();
                    $result = $instance->$method($vars);
                } else if ((is_string($handler) && function_exists($handler)) || is_callable($handler)) {
                    $result = $handler($vars);
                }
                break;
        }

        return $result;
    }

    private function parseRoutesFiles()
    {
        foreach (scandir($this->routesPath) as $index => $fileName) {
            if ($fileName != '.' && $fileName !== '..') {
                $this->parseRoutes($fileName);
            }
        }
    }

    private function parseRoutes($routeFile)
    {
        $routes = include $this->routesPath . $routeFile;

        foreach ($routes as $route) {
            $this->bindRoute($route, explode('.', $routeFile)[0]);
        }

        $this->dispatcher = new DispatcherType($this->router->getData());
    }

    private function bindRoute($route, $file)
    {
        if (!array_key_exists('methood', $route) || !array_key_exists('url', $route) || !array_key_exists('callback', $route)) {
            throw new Exception('Uncorrect route bind');
        }

        if (!array_key_exists($file, $this->routes)) {
            $this->routes[$file] = [];
        }

        $this->bindToGlobalRouter($route);
    }

    private function bindToGlobalRouter($route)
    {
        $methood = $route['methood'];
        $url = $route['url'];
        $callback = $route['callback'];

        $this->router->$methood($url, $callback);
    }
}
