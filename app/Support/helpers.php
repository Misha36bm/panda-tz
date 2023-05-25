<?php

function view($view = null, $data = [])
{
    $pathToViewFolder = app()->getAppPath() . '/resources/views/';

    if (str_contains($view, '.')) {
        $view = str_replace('.', '/', $view);
    }

    $path = $pathToViewFolder . $view . '.php';

    if (!file_exists($path)) {
        throw new Exception('Template not found: ' . $view);
    }

    extract($data);
    ob_start();
    include $path;
    return ob_get_clean();
}
