<?php

declare(strict_types=1);

namespace Framework;

class Router
{
  private $routes = [];
  private $middlewares = [];

  public function add(string $method, string $path, array $controller): void
  {
    $path = $this->normalizePath($path);

    $this->routes[] = [
      'method' => strtoupper($method),
      'path' => $path,
      'controller' => $controller,
    ];
  }

  public function normalizePath(string $path): string
  {
    $path = trim($path, '/');
    $path = "/{$path}/";
    $path = preg_replace('#[/]{2,}#', '/', $path);

    return $path;
  }

  public function dispatch(string $path, string $method, Container $container = null)
  {
    $path = $this->normalizePath($path);
    $method = strtoupper($method);

    foreach ($this->routes as $route) {
      if (
        !preg_match("#^{$route['path']}$#", $path) ||
        $route['method'] !== $method
      ) {
        continue;
      }

      [$class, $function] = $route['controller'];

      $controllerInstance = $container ? $container->resolve($class) : new $class;
      $action = $controllerInstance->$function();

      foreach ($this->middlewares as $middleware) {
        $middlewareInstance = $container ? $container->resolve($middleware) : new $middleware;
        $action = fn () => $middlewareInstance->process($action);
      }

      $action();
      return;
    }
  }

  public function addMiddleware(string $middleware): void
  {
    $this->middlewares[] = $middleware;
  }
}
