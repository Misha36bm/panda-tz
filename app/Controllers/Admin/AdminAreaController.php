<?php

namespace Panda\Tz\Controllers\Admin;

use Panda\Tz\Controllers\Controller;

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
}
