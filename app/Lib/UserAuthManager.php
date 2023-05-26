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

    private function writeUserToCookie($userName, $password)
    {
        setcookie('user_name', serialize($userName));
        setcookie('tocken', serialize($password));
    }

    private function isUserExists($userName, $email)
    {
        return $this->userModel->where('username', $userName)->orWhere('email', $email)->exists();
    }
}
