<?php

include 'autoload.php';

function doFilter($target) {
    $get = filter_input(INPUT_GET, $target, FILTER_DEFAULT);
    $post = filter_input(INPUT_POST, $target, FILTER_DEFAULT);

    if (!is_null($get)) {
        return $get;
    } else {
        if (!is_null($post)) {
            return $post;
        }
    }
}

$class = doFilter('c');
$method = doFilter('m');
$parameter = doFilter('p');

if (is_null($class) || is_null($method)) {
    exit;
}

$obj{$class} = new $class();
echo $obj{$class}->$method($parameter);
