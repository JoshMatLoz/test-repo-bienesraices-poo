<fieldset>
  <legend>Informacion General</legend>

  <label for="titulo">Titulo</label>
  <input type="text" name="titulo" id="titulo" placeholder="Titulo Propiedad" value="<?php echo sanitize($propiedad->titulo);?>">

  <label for="precio">Precio</label>
  <input type="number" name="precio" id="precio" placeholder="Precio Propiedad" value="<?php echo sanitize($propiedad->precio);?>">        

  <label for="imagen">Imagen</label>
  <input type="file" name="imagen" id="imagen" accept="image/jpeg">

  <label for="descripcion" >Descripcion</label>
  <textarea name="descripcion" id="descripcion"><?php echo sanitize($propiedad->descripcion);?></textarea>

</fieldset>

<fieldset>
  <legend>Informacion Propiedad</legend>

  <label for="habitaciones">Habitaciones</label>
  <input type="number" name="habitaciones" id="habitaciones" placeholder="Habitaciones Propiedad" minimal="1" value="<?php echo sanitize($propiedad->habitaciones); ?>">

  <label for="wc">Baños</label>
  <input type="number" name="wc" id="wc" placeholder="Baños Propiedad" minimal="1" value="<?php echo sanitize($propiedad->wc);?>">

  <label for="estacionamiento">Estacionamiento</label>
  <input type="number" name="estacionamiento" id="estacionamiento" placeholder="Estacionamiento Propiedad" minimal="1" value="<?php echo sanitize($propiedad->estacionamiento);?>">
</fieldset>

<fieldset>
  <legend>Vendedor</legend>
  <select name="idVendedor">
    <option value="" >---Seleccione---</option> -->
      <?//php while($row = mysqli_fetch_assoc($resultado)):?>

        <option  <?//php echo $idVendedor === $row['id'] ? "selected" : '';?> value="<?//php echo sanitize($propiedad->row) ?>"><?//php echo $row['nombre'] . ' ' . $row['apellido']; ?></option>
        <?//php endwhile; ?>
  </select>
</fieldset>

    