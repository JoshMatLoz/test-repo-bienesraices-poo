<?php 
  require 'includes/funciones.php';

  incluirTemplate('header');

?>

<body>
<main class="contenedor seccion contenido-centrado">
  <h1>Nuestro <i>Blog</i></h1>
  <article class="entrada-blog">
    <div class="imagen">
      <picture>
        <source srcset="build/img/blog1.avif" type="image/avif">
        <source srcset="build/img/blog1.webp" type="image/webp">
        <img loading="lazy" src="build/img/blog1.jpg" alt="Imagen de Blog">
      </picture>
    </div>
    <div class="texto-entrada">
      <a href="entrada.php">
        <h4>Terraza en el Techo de tu Casa</h4>
        <p>Escrito el <span>10/10/2022</span> por: <span>Admin</span></p>
        <p>
          Consejos para construir la terraza en el techo de tu casa con materiales bakanos y ahorrando una moneda.
        </p>
      </a>
    </div>
  </article>
  <article class="entrada-blog">
    <div class="imagen">
      <picture>
        <source srcset="build/img/blog2.avif" type="image/avif">
        <source srcset="build/img/blog2.webp" type="image/webp">
        <img loading="lazy" src="build/img/blog2.jpg" alt="Imagen de Blog">
      </picture>
    </div>
    <div class="texto-entrada">
      <a href="entrada.php">
        <h4>Guía para la decoracion de tu Hogar</h4>
        <p>Escrito el <span>12/12/2022</span> por: <span>Tal-Rasha</span></p>
        <p>
          Decora ese hogar con los cadáveres de tus enemigos, Afila esas estacas!!! nené y maximiza el espacio
          aprendiendo a combinar los muebles con la sangre de esos desgraciados.
        </p>
      </a>
    </div>
  </article>
  <article class="entrada-blog">
    <div class="imagen">
      <picture>
        <source srcset="build/img/blog3.avif" type="image/avif">
        <source srcset="build/img/blog3.webp" type="image/webp">
        <img loading="lazy" src="build/img/blog3.jpg" alt="Imagen de Blog">
      </picture>
    </div>
    <div class="texto-entrada">
      <a href="entrada.php">
        <h4>Chimeneas Fresonas</h4>
        <p>Escrito el <span>10/10/2022</span> por: <span>Admin</span></p>
        <p>
          Como hacer tu chimenea para quemar los cadaveres de tus adversarios.
        </p>
      </a>
    </div>
  </article>
  <article class="entrada-blog">
    <div class="imagen">
      <picture>
        <source srcset="build/img/blog4.avif" type="image/avif">
        <source srcset="build/img/blog4.webp" type="image/webp">
        <img loading="lazy" src="build/img/blog4.jpg" alt="Imagen de Blog">
      </picture>
    </div>
    <div class="texto-entrada">
      <a href="entrada.php">
        <h4>Combina esas Sabanas con tus cortinas</h4>
        <p>Escrito el <span>12/12/2022</span> por: <span>Tal-Rasha</span></p>
        <p>
          Guia para combinar las sabanas con las cortinas de toda la casa. Quedara todo DIVIINOOO!
        </p>
      </a>
    </div>
  </article>
</main>

  <?php incluirTemplate('footer'); ?>
