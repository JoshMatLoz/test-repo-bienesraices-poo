<?php  
  require '../../includes/app.php';  

  use App\Vendedor;

  estaAutenticado();

  $vendedor = new Vendedor;

  $errores = Vendedor::getErrores();

  if($_SERVER['REQUEST_METHOD'] === "POST"){
    //Crear una nueva instancia
    $vendedor = new Vendedor($_POST['vendedor']);

    //Validar campos vacios
    $errores = $vendedor->validar();
  
    //Sin errores
    if(empty($errores)){
      $vendedor->guardar();
    }
  }


  incluirTemplate('header');
?>
<main class="contenedor seccion">
  <h1>Registrar Nuevo Vendedor</h1>
    <a href="admin/index.php" class="boton boton-amarillo">Regresar</a>

    <?php foreach($errores as $error):?>
      
      <div class="alerta error">
        <?php echo $error?>
      </div>
      
      <?php endforeach; ?>
      
      <form class="formulario" method="POST" action="admin/vendedores/crear.php" >
        <!-- enctype="multipart/form-data"> -->
        
        <?php include "../../includes/templates/formulario_vendedores.php"; ?>
        
        <input type="submit" value="Registrar Vendedor" class="boton boton-amarillo">
      </form>
    </main>
    <?php incluirTemplate('footer'); ?>