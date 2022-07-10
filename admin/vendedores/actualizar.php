<?php  
  require '../../includes/app.php';  
  use App\Vendedor;
  estaAutenticado();

  //Validar un ID válido
  $id = $_GET['id'];
  $id = filter_var($id, FILTER_VALIDATE_INT);

  if(!$id){
    header('Location: ../index.php');
  }

  //Obtener el arreglo del vendedor
  $vendedor = Vendedor::find($id);

  $errores = Vendedor::getErrores();

  if($_SERVER['REQUEST_METHOD'] === "POST"){

    //asignar los valores
    $args = $_POST['vendedor'];
    
    //Sincronizar objeto en memoria con lo que el usuario escribió
    $vendedor->sincronizar($args);

    //validacion de errores en caso de que el usuario modifique algo mal
    $errores = $vendedor->validar();

    if(empty($errores)){
      $vendedor->guardar();
    }
  }


  incluirTemplate('header');
?>
<main class="contenedor seccion">
  <h1>Actualizar Vendedor</h1>
    <a href="admin/index.php" class="boton boton-amarillo">Regresar</a>

    <?php foreach($errores as $error):?>
      
      <div class="alerta error">
        <?php echo $error?>
      </div>
      
      <?php endforeach; ?>
      
      <form class="formulario" method="POST"  >
        <!-- enctype="multipart/form-data"> -->
        
        <?php include "../../includes/templates/formulario_vendedores.php"; ?>
        
        <input type="submit" value="Actualizar..." class="boton boton-amarillo">
      </form>
    </main>
    <?php incluirTemplate('footer'); ?>