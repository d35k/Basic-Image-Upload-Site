<?php
function kisalt($kelime, $str = 10)
{
    if (strlen($kelime) > $str)
    {
        if (function_exists("mb_substr")) $kelime = mb_substr($kelime, 0, $str, "UTF-8").'..';
        else $kelime = substr($kelime, 0, $str).'..';
    }
    return $kelime;
}

function controller($name){
    return controller . '/' .$name . '.php';
}
function view($name){
    return view . '/' .$name . '.php';
}