<?php

namespace Panda\Tz\Controllers\Admin;

use Panda\Tz\Controllers\Controller;
use Panda\Tz\Lib\UserAuthManager;
use Panda\Tz\Models\User;

class ApiController extends Controller
{
    public function __construct()
    {
        parent::__construct();

        header('Content-Type: application/json', true);
    }

    public function get_random_quiz()
    {
        $api_key = $_SERVER['HTTP_X_API_KEY'];

        if (!UserAuthManager::checkApiKey($api_key)) {
            return header("Location: http://panda-tz.loc/api/get-random-quiz", true, 403);
        }

        $user = User::getUserByApiKey($api_key);

        $result = $user->getRandomQuiz();


        return json_encode($result);
    }
}
