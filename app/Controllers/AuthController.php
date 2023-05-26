<?php

namespace Panda\Tz\Controllers;

use Panda\Tz\Lib\UserAuthManager;

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
        $authManager = new UserAuthManager;

        $regStatus = $authManager->registerNewUser($this->request['username'], $this->request['email'], $this->request['password']);

        if ($regStatus) {
            return header("Location: /", true, 302);
        }

        return header("Location: /registration", true, 302);
    }
}
