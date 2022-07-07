<?php

namespace App;

class Propiedad
{

  protected static $db;
  protected static $columnasDB = ['id', 'titulo', 'precio', 'imagen', 'descripcion', 'habitaciones', 'wc', 'estacionamiento', 'creado', 'vendedorId'];

  protected static $errores = [];

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
    $atributos = $this->sanitizarAtributos();


    $query = "INSERT INTO propiedades ( ";
    $query .= join(", ", array_keys($atributos));
    $query .= " ) VALUES (' ";
    $query .= join("', '", array_values($atributos));
    $query .= " ')";

    $resultado = self::$db->query($query);
  }

  // Identificar y Unir los atributos de la BD
  public function atributos()
  {
    $atributos = [];
    foreach (self::$columnasDB as $columna) {
      if ($columna === 'id') continue;
      $atributos[$columna] = $this->$columna;
    }
    return $atributos;
  }

  public function sanitizarAtributos()
  {
    $atributos = $this->atributos();
    $sanitizado = [];

    foreach ($atributos as $key => $value) {
      $sanitizado[$key] = self::$db->escape_string($value);
    }

    return $sanitizado;
  }

  // Validacion

  public static function getErrores()
  {
    return self::$errores;
  }

  public function validar()
  {

    if (!$this->titulo) {
      self::$errores[] = 'La propiedad debe tener un titulo';
    }
    if (!$this->precio) {
      self::$errores[] = 'La propiedad debe tener un precio';
    }
    if (strlen($this->descripcion) < 30) {
      self::$errores[] = 'La propiedad debe tener una descripcion y debe ser mayor a 30 caracteres';
    }
    if (!$this->habitaciones) {
      self::$errores[] = 'La propiedad debe tener la cantidad de habitaciones';
    }
    if (!$this->wc) {
      self::$errores[] = 'La propiedad debe tener la cantidad de banos';
    }
    if (!$this->estacionamiento) {
      self::$errores[] = 'La propiedad debe tener la cantidad de estacionamiento';
    }
    if (!$this->vendedorId) {
      self::$errores[] = 'La propiedad debe tener vendedor';
    }
    // if (!$this->imagen['name'] || $this->imagen['error']) {
    //   self::$errores[] = 'La propiedad debe tener una imagen';
    // }
    // // imagen['size'] mayor a 100kb
    // if ($this->imagen['size'] > (10000000)) {
    //   self::$errores[] = 'La imagen debe ser menor a 10MB';
    // }
    return self::$errores;
  }
}
