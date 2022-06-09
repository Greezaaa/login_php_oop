<?php

 //autoinclude classes
spl_autoload_register('myAutoLoader');

function myAutoLoader($className)
{
    $path = "classes/";
    $ext = ".class.php";
    $full = $path . $className . $ext;

    if (!file_exists($full)) {
        return false;
    }

    include_once $full;
}