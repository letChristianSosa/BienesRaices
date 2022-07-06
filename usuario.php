<?php

// Importar la Conexion
require 'includes/app';
$db = conectarDB();

// Crear un email y un password;
$email = "correo@correo.com";
$password = "123456";
// Los password Hasheados siempre son de 60 caracteres (Hacer la columna de la BD con CHAR(60))
// $passwordHash = password_hash($password, PASSWORD_DEFAULT);
$passwordHash = password_hash($password, PASSWORD_BCRYPT);

// Query para crear el usuario;
$query = "INSERT INTO usuarios (email, password) VALUES ('${email}', '${passwordHash}');";

// echo $query;
// exit;

// Agregarlo a la BD;
mysqli_query($db, $query);
