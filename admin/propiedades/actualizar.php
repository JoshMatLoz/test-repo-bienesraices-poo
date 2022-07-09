<?php  
  require '../../includes/funciones.php';
  estaAutenticado();

  //Validar URL
  $id = $_GET['id'];
  $id = filter_var($id, FILTER_VALIDATE_INT);

  if(!$id){
    header('location: ../');
  }

  require '../../includes/config/database.php';
  $db = conectarDB();

  incluirTemplate('header');

  $consulta = "SELECT * FROM propiedades WHERE id=${id}";
  $resultado = mysqli_query($db, $consulta);
  $propiedad = mysqli_fetch_assoc($resultado);


  //Consulta de vendedores
  $consulta = "SELECT * FROM vendedores";
  $resultado = mysqli_query($db, $consulta);

  $errores = [];

  $titulo = $propiedad['titulo'];
  $precio = $propiedad['precio'];
  $descripcion = $propiedad['descripcion'];
  $habitaciones = $propiedad['habitaciones'];
  $wc = $propiedad['wc'];
  $estacionamiento = $propiedad['estacionamiento'];
  $idVendedor = $propiedad['idVendedor'];
  $imagenPropiedad = $propiedad['imagen'];

  //Ejecuta el codigo despues de que el usuario llena el formulario
  if($_SERVER['REQUEST_METHOD'] === "POST"){
    // echo '<prep>';
    // var_dump($_POST);
    // echo '<prep>';

    $titulo = mysqli_real_escape_string($db, $_POST['titulo']);
    $precio = mysqli_real_escape_string($db, $_POST['precio']);
    $descripcion = mysqli_real_escape_string($db, $_POST['descripcion']);
    $habitaciones = mysqli_real_escape_string($db, $_POST['habitaciones']);
    $wc = mysqli_real_escape_string($db, $_POST['wc']);
    $estacionamiento = mysqli_real_escape_string($db, $_POST['estacionamiento']);
    $idVendedor = mysqli_real_escape_string($db, $_POST['vendedor']);
    $creado = date('Y/m/d');

    //Asignar files hacia una variable
    $imagen = $_FILES['imagen'];

    if(!$titulo){
      $errores[]="Debes añadir un titulo";
    }

    if(!$precio){
      $errores[]="Debes añadir un precio";
    }

    if(!$descripcion){
      $errores[]="Debes añadir una descripcion";
    }
    
    if(!$habitaciones){
      $errores[]="Debes añadir el número habitaciones";
    }

    if(!$wc){
      $errores[]="Debes añadir la cantidad de  Baños";
    }

    if(!$estacionamiento){
      $errores[]="Debes añadir el numero de estacionamientos";
    }

    if(!$idVendedor){
      $errores[]="Debes elegir al vendedor";
    }


    //Validar por tamaño 100kb máximo

    $medida = 100000;

    if($imagen['size']> $medida){
      $errores[] = "La imagen es muy grande";
    }
    if(empty($errores)){
      
      /**SUBIDA DE ARCHIVOS */
      $carpetaImagenes = '../../imagenes/';

      if(!is_dir($carpetaImagenes)){
        mkdir($carpetaImagenes);
      }

      $nombreImagen = '';

      if($imagen['name']){
        //Eliminar imagen previa
        unlink($carpetaImagenes. $propiedad['imagen']);

         //Generar nombre unico
        $nombreImagen = md5(uniqid(rand(),true)) . ".jpg";
      
        //Subir Imagen
        move_uploaded_file($imagen['tmp_name'], $carpetaImagenes . $nombreImagen);
      }else{
        $nombreImagen = $propiedad['imagen'];
      }

      $query = "UPDATE propiedades SET titulo =  '${titulo}', precio = '${precio}', imagen= '${nombreImagen}', descripcion = '${descripcion}', habitaciones = ${habitaciones}, wc = ${wc}, estacionamiento = ${estacionamiento}, idVendedor = ${idVendedor} WHERE id = ${id} ";

      $resultado = mysqli_query($db, $query);

      if($resultado){
        header('Location: ../index.php?resultado=2');
      }
    }
  }
?>

<main class="contenedor seccion">
  <h1>Modificar Anuncio</h1>
    <a href="admin/" class="boton boton-verde">Regresar</a>

    <?php foreach($errores as $error):?>
      
      <div class="alerta error">
      <?php echo $error?>
    
      </div>
    
      <?php endforeach;?>

    <form class="formulario" method="POST" enctype="multipart/form-data">
      <fieldset>
        <legend>Informacion General</legend>

        <label for="titulo">Titulo</label>
        <input type="text" name="titulo" id="titulo" placeholder="Titulo Propiedad" value="<?php echo $titulo;?>">

        <label for="precio">Precio</label>
        <input type="number" name="precio" id="precio" placeholder="Precio Propiedad" value="<?php echo $precio;?>">        

        <label for="imagen">Imagen</label>
        <input type="file" name="imagen" id="imagen" accept="image/jpeg">
        <img class="thumb" src="../../imagenes/<?php echo $imagenPropiedad;?>" alt="Imagen de la propiedad" >

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

        <select name="vendedor">
          <option value="" >---Seleccione---</option>
            <?php while($row = mysqli_fetch_assoc($resultado)):?>

              <option  <?php echo $idVendedor === $row['id'] ? "selected" : '';?> value="<?php echo $row['id'] ?>"><?php echo $row['nombre'] . ' ' . $row['apellido']; ?></option>
              <?php endwhile; ?>
        </select>

      </fieldset>
      <input type="submit" value="Modificar  Propiedad" class="boton boton-verde">
    </form>
</main>
<?php
  incluirTemplate('footer');
?>