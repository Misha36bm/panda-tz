<?php

namespace Panda\Tz\Controllers;

use Panda\Tz\Models\Quiz;

class HomeController extends Controller
{
    public function index()
    {
        $quizzes = Quiz::select()->inRandomOrder()->limit(4)->get();

        return view('index', [
            'slot' => view('pages.main-page', ['quizzes' => $quizzes])
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
