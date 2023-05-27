<?php

namespace Panda\Tz\Controllers\Admin;

use Panda\Tz\Controllers\Controller;

class ApiController extends Controller
{
    public function __construct()
    {
        parent::__construct();

        dd(getallheaders());
    }

    public function get_random_quiz()
    {
        dd($this->request);
    }
}
