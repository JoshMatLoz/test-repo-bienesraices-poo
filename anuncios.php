<?php 
  require 'includes/app.php';

  incluirTemplate('header');

?>
<body>
<main class="contenedor">
  <section class="seccion contenedor">
    <h2>Casas y Departamentos en Venta</h2>
      <?php
    $limite = 10;
    include './includes/templates/anuncios.php';
  ?>
  </section>
</main>

  <?php incluirTemplate('footer'); ?>
