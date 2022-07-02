<?php 
  require 'includes/app.php';

  incluirTemplate('header');

?>
<body>
<main class="contenedor">
  <h1>Conoce sobre Nosotros</h1>
  <div class="contenido-nosotros">
    <div class="imagen">
      <picture>
        <source srcset="build/img/nosotros.avif" type="image/avif">
        <source srcset="build/img/nosotros.webp" type="image/webp">
        <img loading="lazy" src="build/img/nosotros.jpg" alt="Imagen Bakana sobre nosotros">
      </picture>
    </div>
    <div class="texto-nosotros">
      <blockquote>
        25 Años de Experiencia
      </blockquote>
      <p>
        Morbi lorem dui, pharetra vitae sem at, sollicitudin scelerisque erat. Ut nec tempor purus, quis dapibus purus.
        Duis
        faucibus tellus sed ligula convallis consequat. Aliquam mollis posuere tempor. Maecenas posuere dolor nec
        aliquam
        sollicitudin. Aenean interdum metus et lobortis vehicula. Etiam quis diam arcu. Cras mauris dolor, molestie ut
        eleifend
        et, gravida a quam.
      </p>
      <p>
        Phasellus dui ante, vestibulum a dignissim nec, ultricies eu velit. Vestibulum magna orci, vulputate sed eros
        pellentesque, hendrerit ornare felis. Etiam ultrices porttitor mattis. Nam tristique pellentesque mi quis
        feugiat.
        Aenean elit leo, faucibus vitae est ut, sodales rutrum ex. Nulla facilisi. Aliquam tempus posuere volutpat.
        Aliquam quis
        nibh eget neque pretium dapibus. Fusce feugiat efficitur mauris, in sollicitudin orci venenatis eu. Integer sit
        amet
        placerat dolor. Quisque eget massa lobortis, ornare ligula quis, rhoncus sapien. Nulla et tincidunt velit.
        Maecenas
        vitae hendrerit diam. Aenean justo justo, lacinia eu nunc id, consequat imperdiet nisl. Nam ac porttitor magna,
        cursus
        facilisis quam.
      </p>
    </div>
  </div>
</main>
<section class="contenedor seccion">
  <h1>Más Sobre Nosotros</h1>
  <div class="iconos-nosotros">
    <div class="icono">
      <img src="build/img/icono1.svg" alt="Icono Seguridad" loading="lazy">
      <h3>Seguridad</h3>
      <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Eaque enim a laudantium earum nisi tenetur officiis
        quaerat amet, beatae tempora numquam rerum ipsa nulla officia quis incidunt soluta debitis alias?</p>
    </div>
    <div class="icono">
      <img src="build/img/icono2.svg" alt="Icono Precio" loading="lazy">
      <h3>Precio</h3>
      <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Eaque enim a laudantium earum nisi tenetur officiis
        quaerat amet, beatae tempora numquam rerum ipsa nulla officia quis incidunt soluta debitis alias?</p>
    </div>
    <div class="icono">
      <img src="build/img/icono3.svg" alt="Icono Tiempo" loading="lazy">
      <h3>Tiempo</h3>
      <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Eaque enim a laudantium earum nisi tenetur officiis
        quaerat amet, beatae tempora numquam rerum ipsa nulla officia quis incidunt soluta debitis alias?</p>
    </div>
  </div>
</section>

  <?php incluirTemplate('footer'); ?>
