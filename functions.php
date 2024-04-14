<?php

use App\Session;

function dd($var)
{
    echo '<pre style="font-size:20px;">';

    var_dump($var);

    echo '</pre>';

    exit();
}

function abort($statusCode = 404)
{
    http_response_code($statusCode);

    require "views/$statusCode.php";

    exit();
}

function authorize($condition)
{
    if (!$condition) {
        abort(401);
    }
}

function base_path($path)
{
    return BASE_PATH . $path;
}

function redirect($path)
{
    header("location: {$path}");
    exit();
}

function view($path, $attributes = [])
{
    extract($attributes);

    require base_path('views/' . $path);
}

function session($key)
{
    return Session::get($key);
}

function old($key, $default = '')
{
    return Session::get('old')[$key] ?? $default;
}
