<?php

namespace Panda\Tz\Controllers\Admin;

use Panda\Tz\Controllers\Controller;
use Panda\Tz\Models\Quiz;

class AdminAreaController extends Controller
{
    public function index()
    {
        if (!auth()->isUserLogin()) {
            return header("Location: /", true, 302);
        }

        return view('index', [
            'slot' => view('pages.admin.index', [
                'quizzes' => auth()->getUser()->quizzes
            ])
        ]);
    }

    public function create_quiz()
    {
        return view('index', [
            'slot' => view('pages.admin.create-quiz')
        ]);
    }

    public function edit_quiz($id)
    {
        $quiz = Quiz::find($id)->first();

        $quiz->updateTitle($this->request['quiz-title'])
            ->updateOptions(
                $this->request['option']['text'],
                $this->request['option']['answer-index']
            );


        return header("Location: /personal-area", true, 302);
    }
}
