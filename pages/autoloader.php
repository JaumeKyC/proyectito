<?php

spl_autoload_register('myAutoloader');

function myAutoloader($className)
{
    $path = "../class/";//ruta por defecto a las class

    $file = $path.$className.".php"; //concatenamos con el nombre de la class

    if(file_exists($file)){ //si el fichero existe, requerir el archivo
        require_once $file;
    }
}

//-------------------------------------