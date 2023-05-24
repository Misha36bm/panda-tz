<?php

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
];
