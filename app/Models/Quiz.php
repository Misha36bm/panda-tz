<?php

namespace Panda\Tz\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\{BelongsTo, HasMany};

class Quiz extends Model
{
    protected $table = 'quizzes';

    protected $fillable = [
        'user_id',
        'quiz_title',
    ];

    public $timestamps = false;

    /**
     * Get the user that owns the Quiz
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'id', 'user_id');
    }

    /**
     * Get all of the options for the Quiz
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function options(): HasMany
    {
        return $this->hasMany(QuizOptions::class, 'quiz_id', 'id');
    }

    public function updateTitle($title)
    {
        $this->update(['quiz_title' => $title]);

        return $this;
    }

    public function updateOptions($options, $correctAnswerIndex)
    {
        $this->options->each(fn ($item) => $item->deleteOption());

        $optionsModelsToSave = [];

        foreach ($options as $index => $optionText) {
            $optionsModelsToSave[$index] = new QuizOptions([
                'quiz_id' => $this->id,
                'option_text' => $optionText,
                'is_correct' => $index == $correctAnswerIndex
            ]);
        }

        $this->options()->saveMany($optionsModelsToSave);


        return $this;
    }

    public function deleteQuiz()
    {
        $this->options->each(fn ($item) => $item->deleteOption());

        $this->delete();
    }
}
