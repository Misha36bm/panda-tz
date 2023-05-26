<?php

use Panda\Tz\Controllers\AuthController;
use Panda\Tz\Controllers\HomeController;

return [
    /**
     * Template for routes: 
     * 
     * For call function from class:
     * [
     *  'methood' => 'get',
     *  'url' => '/',
     *  'callback' => [TestController::class, 'index']
     * ]
     * 
     * For call callback:
     * [
     *     'methood' => 'get',
     *     'url' => '/test',
     *     'callback' => function () {
     *         return 'Hello world';
     *     }
     * ]
     * 
     * For call function by it name:
     * 
     * [
     *    'methood' => 'get',
     *    'url' => '/abc',
     *    'callback' => 'phpinfo'
     * ]
     */

    //  Pages
    [
        'methood' => 'get',
        'url' => '/',
        'callback' => [HomeController::class, 'index']
    ],
    
    // registration
    [
        'methood' => 'get',
        'url' => '/registration',
        'callback' => [AuthController::class, 'showRegistratoinPage']
    ],
    [
        'methood' => 'post',
        'url' => '/registration',
        'callback' => [AuthController::class, 'registration']
    ],
    
    // Login
    [
        'methood' => 'get',
        'url' => '/login',
        'callback' => [AuthController::class, 'showLoginPage']
    ],
    [
        'methood' => 'post',
        'url' => '/login',
        'callback' => [AuthController::class, 'login']
    ],

    // Logout
    [
        'methood' => 'get',
        'url' => '/logout',
        'callback' => [AuthController::class, 'logout']
    ],
];
