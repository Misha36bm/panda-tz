<?php

namespace Panda\Tz\Controllers\Admin;

use Exception;
use Panda\Tz\Controllers\Controller;
use Panda\Tz\Models\Quiz;

class AdminAreaController extends Controller
{
    public function __construct()
    {
        parent::__construct();

        if (!auth()->isUserLogin()) {
            return header("Location: /", true, 403);
        }
    }

    public function index()
    {
        return view('index', [
            'slot' => view('pages.admin.index', [
                'quizzes' => auth()->getUser()->quizzes
            ])
        ]);
    }

    public function create_quiz()
    {
        $user = auth()->getUser();

        $quiz = (new Quiz([
            'user_id' => $user->id,
            'quiz_title' => $this->request['quiz-title'],
            'is_showed' => isset($this->request['show-quiz'])
        ]));

        $quiz->save();

        $quiz->createOptions($this->request['option']['text'], $this->request['option']['answer-index']);

        $user->quizzes()->save($quiz);


        return header("Location: /personal-area", true, 302);
    }

    public function edit_quiz($id)
    {
        $quiz = Quiz::find($id)->first();

        $quiz->updateTitle($this->request['quiz-title'])
            ->updateStatus(isset($this->request['show-quiz']))
            ->updateOptions(
                $this->request['option']['text'],
                $this->request['option']['answer-index']
            );


        return header("Location: /personal-area", true, 302);
    }

    public function delete_quiz($id)
    {
        $id = $id['id'];

        $user = auth()->getUser();

        $needlQuiz = $user->quizzes->where('id', $id);

        if ($needlQuiz->isEmpty()) {
            throw new Exception('User ' . $user->id . ' try to delete not him quiz', 403);

            return header("Location: /personal-area", true, 302);
        }

        $needlQuiz->first()->deleteQuiz();


        return header("Location: /personal-area", true, 302);
    }
}
