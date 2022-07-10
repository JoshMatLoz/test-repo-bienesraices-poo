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

function deb($variable){
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

//Validar tipo de contenido

function validarTipoContenido($tipo){
  $tipos = ['vendedor', 'propiedad'];

  return in_array($tipo, $tipos);
}

//Muestra los mensajes
function mostrarNotificacion($codigo){
  $mensaje = '';

  switch($codigo) {
    case 1:
      $mensaje = "Registro Creado Bacanamente";
      break;

    case 2:
      $mensaje = "Registro Actualizado Bacanamente";
      break;

    case 3:
      $mensaje = "Registro Eliminado Bacanamente";
      break;
    
    default:
      $mensaje = false;
      break;
    }
    return $mensaje;
}