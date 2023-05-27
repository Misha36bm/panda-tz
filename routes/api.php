<?php

use Panda\Tz\Controllers\Admin\ApiController;

return [
    [
        'methood' => 'post',
        'url' => '/api/get-random-quiz',
        'callback' => [ApiController::class, 'get_random_quiz']
    ],
];
