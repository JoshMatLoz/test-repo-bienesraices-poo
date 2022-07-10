<?php  
  require '../../includes/app.php';  
  
  use App\Propiedad;
  use Intervention\Image\ImageManagerStatic as Image;
  
  estaAutenticado();
  $db = conectarDB();
  
  $propiedad = new Propiedad();

  $consulta = "SELECT * FROM vendedores";
  $resultado = mysqli_query($db, $consulta);

    $errores = Propiedad::getErrores();
    
  //Ejecuta el codigo despues de que el usuario llena el formulario
  if($_SERVER['REQUEST_METHOD'] === "POST"){

    //Crea una nueva instancia
    $propiedad = new Propiedad($_POST['propiedad']);
    
    //Generar nombre unico
    $nombreImagen = md5(uniqid(rand(),true)) . ".jpg";
    
    //setea imagen
    //Realiza un resize de la imagen con intervention
    if($_FILES['propiedad']['tmp_name']['imagen']){
      $image = Image::make($_FILES['propiedad']['tmp_name']['imagen'])->fit(800,600);
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
      $propiedad->guardar();
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
      
      <?php endforeach; ?>
      
      <form class="formulario" method="POST" action="admin/propiedades/crear.php" enctype="multipart/form-data">
        
        <?php include "../../includes/templates/formulario_propiedades.php"; ?>
        
        <input type="submit" value="Crear Propiedad" class="boton boton-verde">
      </form>
    </main>
    <?php incluirTemplate('footer'); ?>
    