<?php
session_start();
date_default_timezone_set('America/Sao_Paulo');

define("FIRST_YEAR", 2009);
define("LAST_YEAR", 2023);
define("MIN_QUESTION", 1);
define("MAX_QUESTION", 180);
define("BASE_URL_QUESTIONS", "../../data/");
define("SUBJECTS", [
    'matematica',
    'linguagens',
    'ciencias-humanas',
    'ciencias-natureza'
]);
define("MIN_YEAR", 2009);
define("MAX_YEAR", 2023);

spl_autoload_register( function($className){
    $classPath = __DIR__ . '/classes/' . $className . '.php';

    if(file_exists($classPath)){
        require_once $classPath;
    }
});

