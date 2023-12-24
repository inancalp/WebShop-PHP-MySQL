<?php

function dd($value) {
    echo "<pre>";
    var_dump($value);
    echo "</pre>";
    die();
}


function view($path, $attributes = [])
{
	extract($attributes);
	require $path;
}