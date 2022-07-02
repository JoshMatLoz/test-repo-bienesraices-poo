<?php 
  require 'includes/app.php';

  incluirTemplate('header', true);

?>
<body>
<main class="contenedor seccion">
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
</main>
<section class="seccion contenedor">
  <h2>Casas y Departamentos en Venta</h2>

  <?php
    $limite = 3;
    include './includes/templates/anuncios.php';
  ?>

  <div class="ver-todas alinear-derecha">
    <a href="anuncios.php" class="boton-verde">Ver Todas</a>
  </div>
</section>
<section class="imagen-contacto">
  <h2>Encuentra la casa de tus sueños</h2>
  <p>Llena el formulario de contacto y un especialista se comunicará contigo de volada</p>
  <a href="contacto.php" class="boton-amarillo">Contáctanos</a>
</section>
<div class="contenedor seccion seccion-inferior">
  <section class="blog">
    <h3>Nuestro <i>Blog</i></h3>
    <article class="entrada-blog">
      <div class="imagen">
        <picture>
          <source srcset="./build/img/blog1.avif" type="image/avif">
          <source srcset="./build/img/blog1.webp" type="image/webp">
          <img loading="lazy" src="./build/img/blog1.jpg" alt="Imagen de Blog">
        </picture>
      </div>
      <div class="texto-entrada">
        <a href="entrada.php">
          <h4>Terraza en el Techo de tu Casa</h4>
          <p class="informacion-meta">Escrito el <span>10/10/2022</span> por: <span>Admin</span></p>
          <p>
            Consejos para construir la terraza en el techo de tu casa con materiales bakanos y ahorrando una moneda.
          </p>
        </a>
      </div>
    </article>
    <article class="entrada-blog">
      <div class="imagen">
        <picture>
          <source srcset="./build/img/blog2.avif" type="image/avif">
          <source srcset="./build/img/blog2.webp" type="image/webp">
          <img loading="lazy" src="./build/img/blog2.jpg" alt="Imagen de Blog">
        </picture>
      </div>
      <div class="texto-entrada">
        <a href="entrada.php">
          <h4>Guía para la decoracion de tu Hogar</h4>
          <p class="informacion-meta">Escrito el <span>12/12/2022</span> por: <span>Tal-Rasha</span></p>
          <p>
            Decora ese hogar con los cadáveres de tus enemigos, Afila esas estacas!!! nené y maximiza el espacio
            aprendiendo a combinar los muebles con la sangre de esos desgraciados.
          </p>
        </a>
      </div>
    </article>
  </section>
  <section class="testimoniales">
    <h3>Testimoniales</h3>
    <div class="testimonial">
      <blockquote>El personal fue harto bakano, cumplieron todos mis caprichos y se tiraron unas caguamas conmigo.
        Cumplieron todas mis expectativas.
      </blockquote>
      <p>- Josué Mata</p>
    </div>
  </section>
</div>

  <?php incluirTemplate('footer'); ?>
