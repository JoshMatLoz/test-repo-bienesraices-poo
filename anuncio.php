<?php 
  require 'includes/app.php';

  $id = $_GET['id'];
  $id = filter_var($id, FILTER_VALIDATE_INT);

  if(!$id){
    header('Location: ./');
  }

    //importar conexion
  $db = conectarDB();

  //consultar
  $query = "SELECT * FROM propiedades WHERE id = ${id}";
  $resultado = mysqli_query($db, $query);
  
  //obtener los resultados
  $propiedad = mysqli_fetch_assoc($resultado);

  if(!$resultado->num_rows){
    header('Location: ./');
  }


  incluirTemplate('header');

?>

<body>
<main class="contenedor seccion contenido-centrado">
  <h1><?php echo $propiedad['titulo'];?></h1>

    <img loading="lazy" src="./imagenes/<?php echo $propiedad['imagen'];?>" >

  <div class="resumen-propiedad">
    <p class="precio">$<?php echo $propiedad['precio'];?></p>
    <ul class="iconos-caracteristicas">
      <li>
        <img loading="lazy" src="build/img/icono_wc.svg" alt="Icono WC">
        <p><?php echo $propiedad['wc'];?></p>
      </li>
      <li>
        <img loading="lazy" src="build/img/icono_estacionamiento.svg" alt="Icono Estacionamiento">
        <p><?php echo $propiedad['estacionamiento'];?></p>
      </li>
      <li>
        <img loading="lazy" src="build/img/icono_dormitorio.svg" alt="Icono Habitaciones">
        <p><?php echo $propiedad['habitaciones'];?></p>
      </li>
    </ul>
    <p>
      <?php echo $propiedad['descripcion'];?>
    </p>
  </div>
</main>

  <?php 
    mysqli_close($db);
    incluirTemplate('footer'); ?>