<?php

namespace App;

class Propiedad
{

  protected static $db;
  protected static $columnasDB = ['id', 'titulo', 'precio', 'imagen', 'descripcion', 'habitaciones', 'wc', 'estacionamiento', 'creado', 'vendedorId'];

  public $id;
  public $titulo;
  public $precio;
  public $imagen;
  public $descripcion;
  public $habitaciones;
  public $wc;
  public $estacionamiento;
  public $creado;
  public $vendedorId;

  public static function setDB($database)
  {
    self::$db = $database;
  }

  public function __construct($args = [])
  {
    $this->id = $args['id'] ?? '';
    $this->titulo = $args['titulo'] ?? '';
    $this->precio = $args['precio'] ?? '';
    $this->imagen = $args['imagen'] ?? 'imagen.jpg';
    $this->descripcion = $args['descripcion'] ?? '';
    $this->habitaciones = $args['habitaciones'] ?? '';
    $this->wc = $args['wc'] ?? '';
    $this->estacionamiento = $args['estacionamiento'] ?? '';
    $this->creado = date('Y/m/d');
    $this->vendedorId = $args['vendedorId'] ?? '';
  }

  public function guardar()
  {
    //Sanitizar datos
    $atributos = $this->sanitizarDatos();


    $query = "INSERT INTO propiedades (titulo, precio, imagen, descripcion, habitaciones, wc, estacionamiento, creado, vendedorId) VALUES ('$this->titulo', '$this->precio', '$this->imagen', '$this->descripcion', '$this->habitaciones', '$this->wc', '$this->estacionamiento', '$this->creado', '$this->vendedorId')";

    $resultado = self::$db->query($query);
    debugger($resultado);
  }

  public function atributos()
  {
    $atributos = [];
    foreach (self::$columnasDB as $columna) {
    }
  }

  public function sanitizarDatos()
  {
  }
}