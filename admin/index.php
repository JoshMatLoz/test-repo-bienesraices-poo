<?php
  use App\Propiedad;
  use App\Vendedor;
  
  require '../includes/app.php';

  estaAutenticado();

  //Implementar un método para obtener todas las propiedad
  $propiedades = Propiedad::all();
  $vendedores = Vendedor::all();

  //Muestra mensaje condicional
  $resultado = $_GET['resultado'] ?? null; //Si no existe valor asigna uno

  //Comprobacion para saber que metodo se uso y se puedan pasar los datos
  if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $id = $_POST['id'];
    $id = filter_var($id, FILTER_VALIDATE_INT);

      if($id){
        $propiedad = Propiedad::find( $id );
        $propiedad->eliminar();
    }
  }
  //Incluye template
  incluirTemplate('header');
?>

<main class="contenedor seccion">
  <h1>Administrador de Bienes Raices</h1>
  <br>
  
  <?php if(intval($resultado) == 1) :?>
    <p class="alerta exito">Anuncio registrado Bacanamente</p>
  <?php elseif(intval($resultado) == 2): ?>
      <p class="alerta exito">Anuncio Actualizado Bacanamente</p>
    <?php elseif(intval($resultado) == 3): ?>
      <p class="alerta exito">Anuncio Eliminado Bacanamente</p>
  <?php endif; ?>
  
  <a href="./admin/propiedades/crear.php" class="boton boton-verde">Nueva Propiedad</a>

  <table class="propiedades">
    <thead>
      <th>ID</th>
      <th>TITULO</th>
      <th>IMAGEN</th>
      <th>PRECIO</th>
      <th>ACCIONES</th>
    </thead>
    <tbody ><!--Mostrar los resultados-->
      <?php foreach($propiedades as $propiedad):?>
      
        <tr>  
          <td><?php echo $propiedad-> id;?></td>
          <td><?php echo $propiedad-> titulo;?></td>
          <td><img class="imagen-tabla" src="./imagenes/<?php echo $propiedad->imagen;?>" alt="Imagen Casa"></td>
          <td>$<?php echo $propiedad-> precio;?></td>
          <td>
        
        <form  method="POST" class="w-100">
          <input type="hidden" name="id" value="<?php echo $propiedad-> id;?>">
          <input type="submit" value="Eliminar" class="boton-rojo-block">
        </form>
        
          <a class="boton-amarillo-block" href="admin/propiedades/actualizar.php?id=<?php echo $propiedad-> id; ?>">Modificar</a>
        </td>
      </tr>
      <?php endforeach; ?>
    </tbody>

  </table>

</main>

<?php

  //Cerrar la conexion
  mysqli_close($db);

  incluirTemplate('footer');
?>