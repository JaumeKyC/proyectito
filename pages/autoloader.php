<?php

spl_autoload_register('myAutoloader');

function myAutoloader($className)
{
    $path = "../class/";

    $file = $path.$className.".php"; 

    if(file_exists($file)){ 
        require_once $file;
    }
}
