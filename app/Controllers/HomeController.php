<?php

namespace Panda\Tz\Controllers;

use Panda\Tz\Models\Quiz;

class HomeController extends Controller
{
    public function index()
    {
        $quizzes = Quiz::getRandomActiveQuizzes();

        $view = view('components.main-page-quizzes-empty', ['quizzes' => $quizzes]);

        if ($quizzes->isNotEmpty()) {
            $view = view('pages.main-page', ['quizzes' => $quizzes]);
        }


        return view('index', [
            'slot' => $view,
        ]);
    }

    public function vote_quiz($id)
    {
        $selectedOption = $this->request['selected_option'];

        $quiz = Quiz::find($id)->first();

        $quiz->vote($selectedOption);

        return header("Location: /", true, 302);
    }
}
