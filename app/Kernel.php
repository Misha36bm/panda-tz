<?php

namespace Panda\Tz;

use Dotenv\Dotenv;


class Kernel
{
    private $router;

    public function __construct(
        private string $appPath
    ) {
        $this->bindEnvVariables();
        $this->bindRoutes();
    }

    private function bindRoutes()
    {
        $this->router = new Router($this->appPath . '/routes/');
    }

    public function getRouter()
    {
        return $this->router;
    }

    private function bindEnvVariables()
    {
        Dotenv::createImmutable($this->appPath)->load();
    }
}
