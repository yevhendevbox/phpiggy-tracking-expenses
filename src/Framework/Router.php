<?php

declare(strict_types=1);

namespace Framework;

class Router {
  private $routes = [];

  public function add(string $method, string $path, array $controller): void {
    $path = $this->normalizePath($path);

    $this->routes[] = [
      'method' => strtoupper($method),
      'path' => $path,
      'controller' => $controller,
    ];
  }

  public function normalizePath(string $path): string {
    $path = trim($path, '/');
    $path = "/{$path}/";
    $path = preg_replace('#[/]{2,}#', '/', $path);

    return $path;
  }

  public function dispatch(string $path, string $method) {
    $path = $this->normalizePath($path);
    $method = strtoupper($method);

    echo $path . $method;
  }
}