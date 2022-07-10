<?php
  require '../includes/app.php';
  estaAutenticado();

  use App\Propiedad;
  use App\Vendedor;
  
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

        $tipo = $_POST['tipo'];
        
        if(validarTipoContenido($tipo)){
          //compara lo que vamos a eliminar
          if($tipo === 'vendedor'){
            $vendedor = Vendedor::find( $id );
            $vendedor->eliminar();
          }elseif($tipo === 'propiedad'){
            $propiedad = Propiedad::find( $id );
            $propiedad->eliminar();
          }
        }
    }
  }
  //Incluye template
  incluirTemplate('header');
?>

<main class="contenedor seccion">
  <h1>Administrador de Bienes Raices</h1>
  <br>
  
  <a href="./admin/propiedades/crear.php" class="boton boton-verde">Nueva Propiedad</a>
  <a href="./admin/vendedores/crear.php" class="boton boton-amarillo">Nuevo Vendedor</a>

  <?php $mensaje = mostrarNotificacion(intval($resultado)); 
    if($mensaje):?>

      <p class="alerta exito"><?php echo sanitize($mensaje)?></p>
    
    <?php endif; ?>

  <h2>Propiedades</h2>
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
          <input type="hidden" name="tipo" value="propiedad">
          <input type="submit" value="Eliminar" class="boton-rojo-block">
        </form>
        
          <a class="boton-amarillo-block" href="admin/vendedores/actualizar.php?id=<?php echo $propiedad-> id; ?>">Modificar</a>
        </td>
      </tr>
      <?php endforeach; ?>
    </tbody>

  </table>
  <h2>Vendedores de Caricias</h2>
    <table class="propiedades">
    <thead>
      <th>ID</th>
      <th>NOMBRE</th>
      <th>TELEFONO</th>
      <th>ACCIONES</th>
    </thead>
    <tbody ><!--Mostrar los resultados-->
      <?php foreach($vendedores as $vendedor):?>
      
        <tr>  
          <td><?php echo $vendedor-> id;?></td>
          <td><?php echo $vendedor-> nombre . " " . $vendedor->apellido;?></td>
          <td><?php echo $vendedor-> telefono;?></td>
          <td>
        
        <form  method="POST" class="w-100">
          <input type="hidden" name="id" value="<?php echo $vendedor-> id;?>">
          <input type="hidden" name="tipo" value="vendedor">
          <input type="submit" value="Eliminar" class="boton-rojo-block">
        </form>
        
          <a class="boton-amarillo-block" href="admin/vendedores/actualizar.php?id=<?php echo $vendedor-> id; ?>">Modificar</a>
        </td>
      </tr>
      <?php endforeach; ?>
    </tbody>

  </table>
</main>

<?php
  incluirTemplate('footer');
?>