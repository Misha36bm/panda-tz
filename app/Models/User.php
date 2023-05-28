<?php

namespace Panda\Tz\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class User extends Model
{
    protected $table = 'users';

    protected $fillable = [
        'username',
        'email',
        'password',
        'api_key'
    ];

    /**
     * Get all of the quizzes for the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function quizzes(): HasMany
    {
        return $this->hasMany(Quiz::class, 'user_id', 'id');
    }

    public function getRandomQuiz()
    {
        if ($this->quizzes->isEmpty()) {
            return [];
        }
        

        $quiz = $this->quizzes->where('is_showed', true)->random();

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

        return $result;
    }
}
