<?php
session_start();
date_default_timezone_set('America/Sao_Paulo');

define("FIRST_YEAR", 2009);
define("LAST_YEAR", 2023);
define("BASE_URL_QUESTIONS", "../../data/");
define("SUBJECTS", [
  'matematica' => "Matemática e suas Tecnologias",
  'linguagens' => "Linguagens e seus Códigos",
  'ciencias-humanas' => "Ciências ciencias-humanas",
  'ciencias-natureza' => "Ciências da Natureza"
]);
define("MIN_YEAR", 2009);
define("MAX_YEAR", 2023);

function validate_body($body, $atributes)
{
  foreach ($atributes as $atribute) {
    if (!isset($body[$atribute])) {
      return $atribute;
    }
  }
  return false;
}

spl_autoload_register(function ($className) {
  $classPath = __DIR__ . '/classes/' . $className . '.php';

  if (file_exists($classPath)) {
    require_once $classPath;
  }
});
