<?php 
require 'includes/app.php';

$db = conectarDB();

//Autenticar Usuario
//Para poder leer los resultados de POST tenemos que colocar lo siguiente;

$errores = [];

if($_SERVER['REQUEST_METHOD']=== 'POST'){

  $email= mysqli_real_escape_string($db, filter_var($_POST['email'], FILTER_VALIDATE_EMAIL));
  // echo '<pre>';
  // var_dump($email);
  // echo'</pre>';
 
  $password = mysqli_real_escape_string($db, $_POST['password']);


  if(!$email){
    $errores[] =  "El E-milio es obligatorio o no es valido";
  }

  if(!$password){
    $errores[] = "Debes introducir el password";
  }
  
  if(empty($errores)){
    
    // revisar si el usuario existe
    $query = "SELECT * FROM usuarios WHERE email='${email}'";
    $resultado = mysqli_query($db, $query);
    
    if($resultado->num_rows){
      //Revisar si el password es correcto
      $usuario = mysqli_fetch_assoc($resultado);

      //password correcto
      $auth = password_verify($password, $usuario['password']);
      
      
      if($auth){
        
        //usuario autenticado
        session_start();

        //LLenar el arreglo de la sesion
        $_SESSION['usuario'] = $usuario['email'];
        $_SESSION['login'] = true;
        
        header('Location: admin/index.php');
      }else{
        $errores[] = "El password es incorrecto";
      }
    }else{
      $errores[]="El usuario no existe";
    }
  }
}
  //incluye header
  incluirTemplate('header');
?>

  <main class="contenedor seccion contenido-centrado">
    <h1>INICIAR SESION</h1>

      <?php foreach ($errores as $error): ?>
        <div class="alerta error">
          <?php echo $error; ?>
        </div>
        <?php  endforeach; ?>

    <form action="" class="formulario" method="POST" novalidate>
      
      <fieldset>
        <legend>Email y Password</legend>
        
        <label for="email">E-milio</label>
        <input type="email" name="email" id="email" placeholder="Tu E-milio" >
        
        <label for="password">Password</label>
        <input type="password" name="password" id="password" placeholder="Tu Password" >
      
      </fieldset>
      <input type="submit" value="Iniciar Sesion" class="boton-verde boton">
    </form>
  </main>

  <?php
    incluirTemplate('footer');
  ?>