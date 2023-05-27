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

        // if (!UserAuthManager::checkApiKey($_SERVER['HTTP_X_API_KEY'])) {
        //     return header("Location: http://panda-tz.loc/api/get-random-quiz", true, 403);
        // }
    }

    public function get_random_quiz()
    {
        $api_key = $_SERVER['HTTP_X_API_KEY'];

        if (!UserAuthManager::checkApiKey($api_key)) {
            return header("Location: http://panda-tz.loc/api/get-random-quiz", true, 403);
        }

        $user = User::select()->where('api_key', $api_key)->first();

        $quiz = $user->quizzes->where('is_showed', true)->random();

        $options = $quiz->options;

        $result = [
            'quiz-title' => $quiz->quiz_title,
            'total-votes' => $quiz->getTotalVotes(),
            'quiz-options' => []
        ];

        foreach ($options as $index => $option) {
            $result['quiz-options'][$index] = [
                'option-text' => $option->option_text,
                'option-votes' => $option->votes,
                'is-correct' => $option->is_correct
            ];
        }


        return json_encode($result);
    }
}
