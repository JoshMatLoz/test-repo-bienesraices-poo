<?php 
  if(!isset($_SESSION)){
    session_start();
  }
  
  $auth = $_SESSION['login'] ?? false;

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <base href="http://localhost/Programacion_web/Udemy/bienesraices_POO/">
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" href="data:,">
  <title>Bienes Raices</title>

  <link rel="stylesheet" href= "build/css/app.css">
</head>
<header class="header <?php echo $inicio ?  ' inicio' :  ''; ?>">
  <div class="contenedor contenido-header">

    <div class="barra">
      <a href="index.php">
        <img src="./build/img/logo.svg" alt="Logotipo Bienes raices">
      </a>
      <div class="mobile-menu">
        <img src="./build/img/barras.svg" alt="Menu de barras">
      </div>

      <div class="derecha">
        <img src="./build/img/dark-mode.svg" alt="Icono modo ohjcuro" class="dark-mode-boton">
        <nav class="navegacion">
          <a href="nosotros.php">Nosotros</a>
          <a href="anuncios.php">Anuncios</a>
          <a href="blog.php"><i>Blog</i></a>
          <a href="contacto.php">Contacto</a>
          <?php if($auth): ?>

            <a href="../../cerrar_sesion.php">Cerrar Sesion</a>

          <?php endif; ?>

        </nav>
      </div>
    </div>
    <!--barra-->
    <?php
      if($inicio){
        echo "<h1>Venta de Casas y Departamentos Mamalones</h1>";
      }
    ?>
  </div>
</header>