<?php

namespace Panda\Tz;


class Kernel
{
    private $router;

    public function __construct(
        private string $appPath
    ) {
        $this->bindRoutes();
    }

    public function bindRoutes()
    {
        $this->router = new Router($this->appPath . '/routes/');
    }

    public function getRouter()
    {
        return $this->router;
    }
}
