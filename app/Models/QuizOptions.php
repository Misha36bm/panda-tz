<?php

namespace Panda\Tz\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class QuizOptions extends Model
{
    protected $table = 'users';

    protected $fillable = [
        'quiz_id',
        'option_text',
    ];

    /**
     * Get the quiz that owns the QuizOptions
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function quiz(): BelongsTo
    {
        return $this->belongsTo(Quiz::class, 'id', 'quiz_id');
    }
}
