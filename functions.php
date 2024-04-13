<?php 

function dd($var){
    echo '<pre style="font-size:20px;">';

    var_dump($var);

    echo '</pre>';

    die();
}

function abort($statusCode = 404){
    http_response_code($statusCode);

    require "views/$statusCode.php";

    die();
}

function authorize($condition){
    if(!$condition){
        abort(401);
    }
}

function base_path($path){
    return BASE_PATH . $path;
}