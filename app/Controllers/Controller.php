<?php

namespace Panda\Tz\Controllers;

class Controller
{
    protected $request = [];

    public function __construct()
    {

        $getData = $_GET;
        $postData = $_POST;

        $this->request = array_merge($getData, $postData);
    }
}
