<?php

namespace Panda\Tz\Controllers\Admin;

use Panda\Tz\Controllers\Controller;

class AdminAreaController extends Controller
{
    public function index()
    {
        return view('index', [
            'slot' => view('pages.admin.index', [
                'quizzes' => auth()->getUser()->quizzes
            ])
        ]);
    }
}
