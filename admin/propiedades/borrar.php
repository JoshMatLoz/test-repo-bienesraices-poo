<?php
  require '../../includes/funciones.php';
  $auth = estaAutenticado();

    if(!$auth){
      header("Location: /Programacion_web/Udemy/bienesraices_inicio");

    }
  incluirTemplate('header');
?>

<main class="contenedor seccion">
  <h1>Borrar</h1>
</main>
<?php
  incluirTemplate('footer');
?>