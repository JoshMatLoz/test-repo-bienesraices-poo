<?php

namespace App;

class Propiedad{

  //Base de Datos
  protected static  $db;

  //Errores o Validaciones
  protected static $errores = [];

  #Creamos este arreglo de columnas que nos permite identificar que forma p que columnas van a tener los datos para mapear el objeto que estamos creando.
  protected static $columnasDB = ['id', 'titulo', 'precio', 'imagen', 'descripcion', 'habitaciones', 'wc', 'estacionamiento', 'creado', 'idVendedor'];

  public $id;
  public $titulo;
  public $precio;
  public $imagen;
  public $descripcion;
  public $habitaciones;
  public $wc;
  public $estacionamiento;
  public $creado;
  public $idVendedor;


    //DEFINIR LA CONEXION A LA BASE DE DDATOS
  public static function setDB($database){
    self::$db = $database;
  }


  public function __construct($args = [])
  {
    $this-> id = $args['id'] ?? '' ;
    $this-> titulo= $args['titulo'] ?? '';
    $this-> precio= $args['precio'] ?? '';
    $this-> imagen = $args['imagen'] ?? '' ;
    $this-> descripcion = $args['descripcion'] ?? '' ;
    $this-> habitaciones = $args['habitaciones'] ?? '' ;
    $this-> wc = $args['wc'] ?? '' ;
    $this-> estacionamiento = $args['estacionamiento'] ?? '' ;
    $this-> creado = date('Y/m/d') ;
    $this->  idVendedor = $args['idVendedor'] ?? 1 ;
  }

    public function guardar(){
      if($this->id){
        $this->actualizar();
      }else{
        //crear
        $this->crear();
      }
    }

  public function crear(){

    //Sanitizar los datos o Atributos
    $atributos = $this->sanitizarAtributos();
  
    $query = "INSERT INTO propiedades( ";
    $query .= join(', ', array_keys($atributos));
    $query .= " ) VALUES ( '";
    $query .= join("' , '", array_values($atributos));
    $query .= " ')";

    $resultado = self::$db->query($query);

    if($resultado){
      header('Location: ../index.php?resultado=1');
      // return $resultado;
    }


  }

  public function actualizar(){
   //Sanitizar los datos o Atributos
    $atributos = $this->sanitizarAtributos();

    $valores = [];
    foreach ($atributos as $key => $value) {
      $valores[] = "{$key} = '{$value}'";
    }
    //  debuguear($valores);
  
    $query = "UPDATE propiedades SET ";
    $query .= join(', ',$valores);
    $query .= "WHERE id = '" . self::$db->escape_string($this->id) . "' ";
    $query .= "LIMIT 1 ";


    $resultado = self::$db->query($query);
  
    if($resultado){
      // return $resultado;
      header('Location: ../index.php?resultado=2');
    }
  }

  public function eliminar(){
    //Eliminar la propiedad
      $query = "DELETE FROM propiedades where id=". self::$db->escape_string($this->id)." LIMIT 1";
      $resultado = self::$db->query($query);

      if($resultado){
        $this->borrarImagen();
        header("Location: ./?resultado=3");
      }
  }

  //Identificar y unir los atributos de la BD con su llave - valor y mapearlos a la memoria
  public function atributos(){
    $atributos = [];

    foreach (self::$columnasDB as $columna) {
      if($columna === 'id') continue;
      $atributos[$columna] = $this->$columna;
    }
    return $atributos;
  }


  public function sanitizarAtributos(){
    $atributos = $this->atributos();
    $sanitizado = [];

    foreach ($atributos as $key => $value) {
      $sanitizado[$key] = self::$db->escape_string($value);
    }
    return $sanitizado;
  }

  //Eliminar Archivo
  public function borrarImagen(){
    $existeArchivo = file_exists(CARPETA_IMAGENES . $this->imagen);
    
    if($existeArchivo){
      unlink(CARPETA_IMAGENES . $this->imagen);
    }
  }

  //SUBIDA DE ARCHIVOS
  public function setImagen($imagen){
    //Eliminar la imagen previa

    if(!empty($this->id)){
      //Comprobar si existe el archivo
      $this->borrarImagen();
    }

    //Asiganr al atributo la imagen y su nombre
    if($imagen){
      $this->imagen = $imagen;
    }
  }

  //Validacion
  public static function getErrores(){
    return self::$errores;
  }

  public function validar(){
    if(!$this->titulo){
      self::$errores[]="Debes añadir un titulo";
    }
    #self hace referencia al mismo atributo de la clase
    if(!$this->precio){
      self::$errores[]="Debes añadir un precio";
    }
    // if(strlen($this->descripcion < 50))
    if(!$this->descripcion){
      self::$errores[]="Debes añadir una descripcion de más de 50 caracteres";
    }
    
    if(!$this->habitaciones){
      self::$errores[]="Debes añadir el número habitaciones";
    }

    if(!$this->wc){
      self::$errores[]="Debes añadir la cantidad de  Baños";
    }

    if(!$this->estacionamiento){
      self::$errores[]="Debes añadir el numero de estacionamientos";
    }

    if(!$this->idVendedor){
      self::$errores[]="Debes elegir al vendedor";
    }

    if(!$this->imagen){
      self::$errores[]="La imagen es obligatoria";
    }
    
    return self::$errores;
  }

  //Lista todos los registros
  public static function all(){
    $query = "SELECT * FROM propiedades";
    $resultado = self::consultaSQL($query);
    return $resultado;
  }

  //Busca registro por su ID
public static function find($id){
  $query = "SELECT * FROM propiedades WHERE id = ${id}";

  $resultado = self::consultaSQL($query);

  return array_shift($resultado);
}

  public static function consultaSQL($query){
    //Consulta la Base de Datos
    $resultado = self::$db->query($query);

    //Iterar los resultados
    $array = [];
    while($registro = $resultado->fetch_assoc()){
      $array[] = self::crearObjeto($registro);
    }

    //Liberar la memoria
    $resultado->free();

    //Retornar los resultados
    return $array;
  }

  protected static function crearObjeto($registro){
    $objeto = new self;
    
    foreach($registro as $key => $value){
      if(property_exists($objeto, $key)){
        $objeto->$key = $value;
      }
    }
    return $objeto;
  }

  //Sincroniza el objeto en memoria con los cambios realizados por el usuario
  public function sincronizar($args = []){
    foreach ($args as $key => $value) {

     if(property_exists($this, $key) && !is_null($value)){//Revisa que una propiedad del objeto exista
      $this->$key = $value;
    }
      
    }
  }
}