<fieldset>
  <legend>Informacion General</legend>

  <label for="titulo">Titulo</label>
  <input type="text" name="propiedad[titulo]" id="titulo" placeholder="Titulo Propiedad" value="<?php echo sanitize($propiedad->titulo);?>">

  <label for="precio">Precio</label>
  <input type="number" name="propiedad[precio]" id="precio" placeholder="Precio Propiedad" value="<?php echo sanitize($propiedad->precio);?>">        

  <label for="imagen">Imagen</label>
  <input type="file" name="propiedad[imagen]" id="imagen" accept="image/jpeg" >

  <?php if($propiedad->imagen):?>
    <img src="imagenes/<?php echo $propiedad->imagen ?>" alt="Imagen Casa" width=100 height=100 class="imagen-small" >
  <?php endif; ?>


  <label for="descripcion" >Descripcion</label>
  <textarea name="propiedad[descripcion]" id="descripcion"><?php echo sanitize($propiedad->descripcion);?></textarea>

</fieldset>

<fieldset>
  <legend>Informacion Propiedad</legend>

  <label for="habitaciones">Habitaciones</label>
  <input type="number" name="propiedad[habitaciones]" id="habitaciones" placeholder="Habitaciones Propiedad" minimal="1" value="<?php echo sanitize($propiedad->habitaciones); ?>">

  <label for="wc">Baños</label>
  <input type="number" name="propiedad[wc]" id="wc" placeholder="Baños Propiedad" minimal="1" value="<?php echo sanitize($propiedad->wc);?>">

  <label for="estacionamiento">Estacionamiento</label>
  <input type="number" name="propiedad[estacionamiento]" id="estacionamiento" placeholder="Estacionamiento Propiedad" minimal="1" value="<?php echo sanitize($propiedad->estacionamiento);?>">
</fieldset>

<fieldset>
  <legend>Vendedor</legend>

</fieldset>

    