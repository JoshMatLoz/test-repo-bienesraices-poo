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
    $this->  idVendedor = $args['idVendedor'] ?? '' ;
  }

  public function guardar(){

    //Sanitizar los datos o Atributos
    $atributos = $this->sanitizarAtributos();
  
    $query = "INSERT INTO propiedades( ";
    $query .= join(', ', array_keys($atributos));
    $query .= " ) VALUES ( '";
    $query .= join("' , '", array_values($atributos));
    $query .= " ')";

    $resultado = self::$db->query($query);
    return $resultado;

  }

  //Identificar y unir los atributos de la BD con su llave - valor
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
  //SUBIDA DE ARCHIVOS

  public function setImagen($imagen){
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
}