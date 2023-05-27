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
        'is_showed'
    ];

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

    public function updateStatus($status)
    {
        $this->update(['is_showed' => $status]);


        return $this;
    }

    public function updateOptions($options, $correctAnswerIndex = 0)
    {
        $this->options->each(function ($item, $index) use ($options, $correctAnswerIndex) {
            $newText = $options[$index];
            $newStatus = $correctAnswerIndex == $index;

            if ($newText != $item->option_text) {
                $item->updateText($newText);
            }

            if ($newStatus != $item->is_correct) {
                $item->updateCorrectAnswer($newText);
            }
        });


        return $this;
    }

    public function createOptions($options, $correctAnswerIndex = 0)
    {
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

    public function getTotalVotes()
    {
        $totalVotes = $this->options->pluck('votes');

        $totalVotes = array_sum($totalVotes->toArray());

        return $totalVotes;
    }

    public function vote($optionId)
    {
        $needleOption = $this->options->where('id', $optionId);

        if ($needleOption->isEmpty()) {
            return;
        }

        $needleOption->first()->vote();
    }
}
