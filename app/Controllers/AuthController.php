<?php

namespace Panda\Tz\Controllers;

use Panda\Tz\Lib\UserAuthManager;

class AuthController extends Controller
{
    private $authMeneger;

    public function __construct()
    {
        $this->authMeneger = new UserAuthManager;
    }

    public function showRegistratoinPage()
    {
        return view('index', [
            'slot' => view('pages.auth.registration'),
        ]);
    }

    public function registration()
    {
        $regStatus = $this->authMeneger->registerNewUser($this->request['username'], $this->request['email'], $this->request['password']);

        if ($regStatus) {
            return header("Location: /personal-area", true, 302);
        }


        return header("Location: /registration", true, 302);
    }

    public function showLoginPage()
    {
        return view('index', [
            'slot' => view('pages.auth.login'),
        ]);
    }

    public function login()
    {
        $logStatus = $this->authMeneger->login($this->request['email'], $this->request['password']);

        if ($logStatus) {
            return header("Location: /personal-area", true, 302);
        }


        return header("Location: /login", true, 302);
    }

    public function logout()
    {
        $this->authMeneger->logout();


        return header("Location: /", true, 302);
    }
}
