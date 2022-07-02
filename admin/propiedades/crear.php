<?php  
  require '../../includes/app.php';  
  
  use App\Propiedad;
  use Intervention\Image\ImageManagerStatic as Image;
  
  estaAutenticado();
  
  $db = conectarDB();
  
  $consulta = "SELECT * FROM vendedores";
  $resultado = mysqli_query($db, $consulta);

    $errores = Propiedad::getErrores();


    $titulo = '';
    $precio = '';
    $descripcion = '';
    $habitaciones = '';
    $wc = '';
    $estacionamiento = '';
    $idVendedor = '';
    
  //Ejecuta el codigo despues de que el usuario llena el formulario
  if($_SERVER['REQUEST_METHOD'] === "POST"){

    //Crea una nueva instancia
    $propiedad = new Propiedad($_POST);
  
    //Generar nombre unico
    $nombreImagen = md5(uniqid(rand(),true)) . ".jpg";
    
    //setea imagen
    //Realiza un resize de la imagen con intervention
    if($_FILES['imagen']['tmp_name']){
      $image = Image::make($_FILES['imagen']['tmp_name'])->fit(800,600);
      $propiedad->setImagen($nombreImagen);
    }
    
    //Validar
    $errores = $propiedad->validar();

    if(empty($errores)){

      
      //CREA CARPETA PARA SUBIR IMAGENES
      if(!is_dir(CARPETA_IMAGENES)){
        mkdir(CARPETA_IMAGENES);
      }

      //Guarda la imagen en el servidor
      $image->save(CARPETA_IMAGENES . $nombreImagen);

      //GUARDA EN LA BASE DE DATOS
      $resultado = $propiedad->guardar();

      //MENSAJE DE EXITO O ERROR
      if($resultado){
        header('Location: ../index.php?resultado=1');
      }
    }
  }
  incluirTemplate('header');
?>

<main class="contenedor seccion">
  <h1>Crear</h1>
    <a href="admin/index.php" class="boton boton-verde">Regresar</a>

    <?php foreach($errores as $error):?>
      
      <div class="alerta error">
      <?php echo $error?>
    
      </div>
    
      <?php endforeach;?>

    <form class="formulario" method="POST" action="admin/propiedades/crear.php" enctype="multipart/form-data">
      <fieldset>
        <legend>Informacion General</legend>

        <label for="titulo">Titulo</label>
        <input type="text" name="titulo" id="titulo" placeholder="Titulo Propiedad" value="<?php echo $titulo;?>">

        <label for="precio">Precio</label>
        <input type="number" name="precio" id="precio" placeholder="Precio Propiedad" value="<?php echo $precio;?>">        

        <label for="imagen">Imagen</label>
        <input type="file" name="imagen" id="imagen" accept="image/jpeg">

        <label for="descripcion" >Descripcion</label>
        <textarea name="descripcion" id="descripcion"><?php echo $descripcion;?></textarea>

      </fieldset>

      <fieldset>
        <legend>Informacion Propiedad</legend>

        <label for="habitaciones">Habitaciones</label>
        <input type="number" name="habitaciones" id="habitaciones" placeholder="Habitaciones Propiedad" minimal="1" value="<?php echo $habitaciones;?>">

        <label for="wc">Baños</label>
        <input type="number" name="wc" id="wc" placeholder="Baños Propiedad" minimal="1" value="<?php echo $wc;?>">

        <label for="estacionamiento">Estacionamiento</label>
        <input type="number" name="estacionamiento" id="estacionamiento" placeholder="Estacionamiento Propiedad" minimal="1" value="<?php echo $estacionamiento;?>">
      </fieldset>

      <fieldset>
        <legend>Vendedor</legend>

        <select name="idVendedor">
          <option value="" >---Seleccione---</option>
            <?php while($row = mysqli_fetch_assoc($resultado)):?>

              <option  <?php echo $idVendedor === $row['id'] ? "selected" : '';?> value="<?php echo $row['id'] ?>"><?php echo $row['nombre'] . ' ' . $row['apellido']; ?></option>
              <?php endwhile; ?>
        </select>

      </fieldset>
      <input type="submit" value="Crear Propiedad" class="boton boton-verde">
    </form>
</main>
<?php
  incluirTemplate('footer');
?>