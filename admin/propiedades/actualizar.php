<?php  
  use App\Propiedad;
  use Intervention\Image\ImageManagerStatic as Image;

  require '../../includes/app.php';
  estaAutenticado();

  //Validar URL
  $id = $_GET['id'];
  $id = filter_var($id, FILTER_VALIDATE_INT);

  if(!$id){
    header('location: ../');
  }

  $propiedad = Propiedad::find($id);
   
  //Consulta de vendedores
  $consulta = "SELECT * FROM vendedores";
  $resultado = mysqli_query($db, $consulta);

  $errores = Propiedad::getErrores();
  
  //Ejecuta el codigo despues de que el usuario llena el formulario
  if($_SERVER['REQUEST_METHOD'] === "POST"){

    //Asignar los atributos
    $args = $_POST['propiedad'];

    $propiedad->sincronizar($args);

    //Validacion subida de archivos
    $errores = $propiedad->validar();
    //Subida de Archivos
    if($_FILES['propiedad']['tmp_name']['imagen']){
      //Generar nombre unico
      $nombreImagen = md5(uniqid(rand(),true)) . ".jpg";
      $image = Image::make($_FILES['propiedad']['tmp_name']['imagen'])->fit(800,600);
      $propiedad->setImagen($nombreImagen);
    } 

    if(empty($errores)){
      //Almacenar Imagen
      if(!is_null($image)){
        $image->save(CARPETA_IMAGENES . $nombreImagen);
      }
   
      
      $propiedad -> guardar();
    }
  }
  incluirTemplate('header');
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
       <?php include "../../includes/templates/formulario_propiedades.php"; ?>
    <input type="submit" value="Modificar  Propiedad" class="boton boton-verde">
    </form>
</main>
<?php
  incluirTemplate('footer');
?>