<?php

declare(strict_types=1);

include __DIR__ . "/../../vendor/autoload.php";

use Framework\App;
use App\Config\Paths;
use function App\Config\registerRoutes;
use function App\Config\registerMiddleware;

$app = new App(Paths::SOURCE . "App/container-definitions.php");
registerRoutes($app);
registerMiddleware($app);

return $app;
