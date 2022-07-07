<?php

function conectarDB(): mysqli
{
  $db = new mysqli('localhost', 'root', 'root', 'bienes_raices');

  if (!$db) {
    echo "Error en la conexion a la BD";
    exit;
  } else
    return $db;
}
