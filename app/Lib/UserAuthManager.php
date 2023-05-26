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

    public function registerNewUser($userName, $email, $password)
    {
        if (($userName == '' && $email == '' && $password == '') || $this->isUserExists($userName, $email)) {
            return false;
        }

        $password = password_hash($password, PASSWORD_DEFAULT);


        return $this->userModel->insert([
            'username' => $userName,
            'email' => $email,
            'password' => $password
        ]);
    }

    private function isUserExists($userName, $email)
    {
        return $this->userModel->where('username', $userName)->orWhere('email', $email)->exists();
    }
}
