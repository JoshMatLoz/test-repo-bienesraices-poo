<?php

namespace App;

class Propiedad extends ActiveRecord{
  protected static $tabla = "propiedades";

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
      self::$errores[]="La imagen de la propiedad bacana es obligatoria";
    }
    
    return self::$errores;
  }

}