<fieldset>
  <legend>Informacion General</legend>

  <label for="nombre">Nombre</label>
  <input type="text" name="vendedor[nombre]" id="nombre" placeholder="Nombre Vendedor" value="<?php echo sanitize($vendedor->nombre);?>">

  <label for="apellido">Apedillo</label>
  <input type="text" name="vendedor[apellido]" id="apellido" placeholder="Apedillo del Vendedor" value="<?php echo sanitize($vendedor->apellido);?>">

  <label for="telefono">Telesforo</label>
  <input type="text" name="vendedor[telefono]" id="telefono" placeholder="Telesforo del Vendedor" value="<?php echo sanitize($vendedor->telefono);?>">

</fieldset>
