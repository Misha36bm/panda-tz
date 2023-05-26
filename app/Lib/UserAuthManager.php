<?php

namespace Panda\Tz\Lib;

use Panda\Tz\Models\User;

class UserAuthManager
{
    private $userModel;

    public function __construct()
    {
        $this->userModel = new User();
    }

    public function isUserLogin()
    {
        $userName = $this->getFromCookies('user_name');
        $password = $this->getFromCookies('tocken');

        if (is_null($userName) || is_null($password)) {
            return false;
        }

        return $this->userModel->where('username', $userName)->where('password', $password)->exists();
    }

    public function getUser()
    {
        $userName = $this->getFromCookies('user_name');
        $password = $this->getFromCookies('tocken');

        if (is_null($userName) || is_null($password)) {
            return false;
        }

        $queryTemplate = $this->userModel->where('username', $userName)->where('password', $password);

        if ($queryTemplate->exists()) {
            return $queryTemplate->first();
        }

        return false;
    }

    public function registerNewUser($userName, $email, $password)
    {
        if (($userName == '' && $email == '' && $password == '') || $this->isUserExists($userName, $email)) {
            return false;
        }

        $password = password_hash($password, PASSWORD_DEFAULT);


        $status = $this->userModel->insert([
            'username' => $userName,
            'email' => $email,
            'password' => $password
        ]);

        if ($status) {
            $this->writeUserToCookie($userName, $password);
        }

        return $status;
    }

    public function login($email, $password)
    {
        $user = $this->userModel->where('email', $email)->first();

        if (!$user) {
            return false;
        }

        $userPassword = $user->password;

        if (!password_verify($password, $userPassword)) {
            return false;
        }

        $this->writeUserToCookie($user->username, $userPassword);

        return true;
    }

    private function writeUserToCookie($userName, $password)
    {
        setcookie('user_name', serialize($userName));
        setcookie('tocken', serialize($password));
    }

    private function getFromCookies($key)
    {
        if (array_key_exists($key, $_COOKIE)) {
            return unserialize($_COOKIE[$key]);
        }

        return null;
    }

    private function isUserExists($userName, $email)
    {
        return $this->userModel->where('username', $userName)->orWhere('email', $email)->exists();
    }
}
