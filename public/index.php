<?php

require_once __DIR__ . '/../vendor/autoload.php';

use Panda\Tz\Kernel;
use Whoops\Run;
use Whoops\Handler\PrettyPageHandler;

$whoops = new Run;
$whoops->pushHandler(new PrettyPageHandler);
$whoops->register();

$app  = new Kernel(dirname(__DIR__));

$httpMethod = $_SERVER['REQUEST_METHOD'];
$uri = $_SERVER['REQUEST_URI'];

echo $app
    ->getRouter()
    ->dispatch($httpMethod, $uri);
