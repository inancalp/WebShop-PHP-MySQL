<?php

function dd($value) {
    echo "<pre class='p-4'>";
    var_dump($value);
    echo "</pre>";
    die();
}


function view($path, $attributes = [])
{
	extract($attributes);
	require $path;
}


function abort($status_code) {
    http_response_code($status_code);
    view("views/abort.view.php", [
        "status_code" => $status_code
    ]);
    exit();
}