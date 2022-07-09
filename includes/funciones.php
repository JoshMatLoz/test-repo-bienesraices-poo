<?php
declare(strict_types=1);

define('TEMPLATES_URL', __DIR__.'/templates/');
define('FUNCIONES_URL', __DIR__.'/funciones.php');
define('CARPETA_IMAGENES', __DIR__.'/../imagenes/');

function incluirTemplate( string $nombre, $inicio = false ){
 include TEMPLATES_URL."${nombre}.php";
}

function estaAutenticado() {
  session_start();
  // if(!isset($_SESSION['login'])){
  //   $_SESSION['login'] = '';
  // }  
  if(!$_SESSION['login']){
    header('Location: ../index.php');
  }
}

function debuguear($variable){
  echo '<pre>';
  var_dump($variable);
  echo '</pre>';
  exit;
}

//Escapa / Sanitiza HTML
function sanitize($html):string{
  $sanitize = htmlspecialchars($html);
  return $sanitize;
}