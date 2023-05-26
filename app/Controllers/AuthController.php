<?php

namespace Panda\Tz\Controllers;

class AuthController extends Controller
{
    public function showRegistratoinPage()
    {
        return view('index', [
            'slot' => view('pages.auth.registration'),
        ]);
    }

    public function registration()
    {
    }
}
