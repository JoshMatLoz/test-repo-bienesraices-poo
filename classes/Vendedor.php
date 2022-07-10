<?php

namespace App;

class Vendedor extends ActiveRecord{
  protected static $tabla = 'vendedores';

  protected static $columnasDB = ['id', 'nombre', 'apellido', 'telefono'];

  public $id;
  public $nombre;
  public $apellido;
  public $telefono;

  public function __construct($args = [])
  {
    $this-> id = $args['id'] ?? '' ;
    $this-> nombre= $args['nombre'] ?? '';
    $this-> apellido= $args['apellido'] ?? '';
    $this-> telefono = $args['telefono'] ?? '' ;
  }

  public function validar(){
    if(!$this->nombre){
      self::$errores[]="El nombre del Vendedor es obligatorio";
    }

    if(!$this->apellido){
      self::$errores[]="El Apedillo del Vendedor es obligatorio";
    }    

    if(!$this->telefono){
      self::$errores[]="El Pololo del Vendedor es obligatorio";
    }   
    
    if(!preg_match('/[0-9]{10}/', $this->telefono)) {
      self::$errores[]="El Telesforo debe tener solo Digitos";
    }
    return self::$errores; 
  }
}