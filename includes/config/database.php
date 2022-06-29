<?php

function conectarDB(): mysqli
{
  $db = mysqli_connect('localhost', 'root', '', 'bienes_raices');

  if (!$db) {
    echo "Error en la conexion a la BD";
    exit;
  } else
    return $db;
}
