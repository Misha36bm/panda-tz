<?php

namespace Panda\Tz;

use Dotenv\Dotenv;
use Illuminate\Database\Capsule\Manager as Capsule;

class Kernel
{
    private $router;

    public function __construct(
        private string $appPath
    ) {
        $this->bindEnvVariables();
        $this->bindGlobalDBConnection();
        $this->bindRoutes();
    }

    public function getRouter()
    {
        return $this->router;
    }

    private function bindRoutes()
    {
        $this->router = new Router($this->appPath . '/routes/');
    }

    private function bindEnvVariables()
    {
        Dotenv::createImmutable($this->appPath)->load();
    }

    private function bindGlobalDBConnection()
    {
        $capsule = new Capsule();

        $capsule->addConnection([
            'driver'    => env('DB_CONNECTION'),
            'host'      => env('DB_HOST'),
            'database'  => env('DB_DATABASE'),
            'username'  => env('DB_USERNAME'),
            'password'  => env('DB_PASSWORD'),
            'charset'   => 'utf8',
            'collation' => 'utf8_unicode_ci',
        ]);

        $capsule->setAsGlobal();
        $capsule->bootEloquent();
    }
}
