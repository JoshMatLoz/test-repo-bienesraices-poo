<?php 
  require 'includes/app.php';

  incluirTemplate('header');

?>

<main class="contenedor">
  <h1>Contacto</h1>
  <picture>
    <source srcset="build/img/destacada3.avif" type="image/avif">
    <source srcset="build/img/destacada3.webp" type="image/webp">
    <img loading="lazy" src="build/img/destacada3.jpg" alt="Imagen de Blog">
  </picture>

  <h2>Llene el formulario de contacto</h2>

  <form class="formulario">
    <fieldset>
      <legend>Informacion Personal</legend>

      <label for="nombre">Nombre</label>
      <input type="text" id="nombre" placeholder="Tu nombre">

      <label for="email">Email</label>
      <input type="email" id="email" placeholder="Tu Email">

      <label for="telefono">Telesforo</label>
      <input type="tel" id="telefono" placeholder="Tu Numero Tel.">

      <label for="mensaje">Mensaje</label>
      <textarea id="mensaje" placeholder="Inserta tu mensaje aqui"></textarea>
    </fieldset>

    <fieldset>
      <legend>Informacion Sobre la Propiedad</legend>

      <label for="opciones">Vende o Compra</label>
      <select id="opciones">
        <option value="" disabled selected>--Seleccione --</option>
        <option value="Comprar">Comprar</option>
        <option value="Vender">Vender</option>
      </select>

      <label for="presupuesto">Precio o presupuesto</label>
      <input type="number" id="presupuesto" placeholder="Tu precio o Presupuesto">
    </fieldset>

    <fieldset>
      <legend>Información sobre la Propiedad</legend>

      <p>¿Cómo desea ser Contactado?</p>

      <div class="forma-contacto">
        <label for="contactar-telefono">Teléfono</label>
        <input name="contacto" type="radio" value="telefono" id="contactar-telefono">

        <label for="contactar-email">Email</label>
        <input name="contacto" type="radio" value="email" id="contactar-email">
      </div>

      <p>Si eligió Pololo, elija la fecha y la hora</p>

      <label for="fecha">Focha:</label>
      <input type="date" id="fecha">

      <label for="hora">Hora:</label>
      <input type="time" id="hora" min="09:00" max="18:00">
    </fieldset>
    <input type="submit" class="boton-verde" value="Enviar">

  </form>
</main>

  <?php incluirTemplate('footer'); ?>