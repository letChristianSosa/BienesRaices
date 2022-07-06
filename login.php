<?php

require 'includes/app.php';
$db = conectarDB();

$errores = [];

if ($_SERVER['REQUEST_METHOD'] === "POST") {
  // echo "<pre>";
  // var_dump($_POST);
  // echo "</pre>";

  // real_escape_string forza la variabla a ser un string
  $email = mysqli_real_escape_string($db, filter_var($_POST['email'], FILTER_VALIDATE_EMAIL));
  $password = mysqli_real_escape_string($db, $_POST['password']);

  if (!$email) {
    $errores[] = "El email es obligatorio o es invalido";
  }

  if (!$email) {
    $errores[] = "La contraseña es obligatoria";
  }

  if (empty($errores)) {
    // Revisar si un usuario existe

    $query = "SELECT * FROM usuarios WHERE email = '${email}'";
    $resultado = mysqli_query($db, $query);

    if ($resultado->num_rows) {
      $usuario = mysqli_fetch_assoc($resultado);

      // Verificar si el password es correcto
      $auth = password_verify($password, $usuario['password']);
      if ($auth) {
        // El usuario esta autenticado
        session_start();

        // Llenar el arreglo de la sesion
        $_SESSION['usuario'] = $usuario['email'];
        $_SESSION['login'] = true;

        // echo "<pre>";
        // var_dump($_SESSION);
        // echo "</pre>";

        header('Location: /admin');
      } else {
        $errores[] = "La contraseña es incorrecta";
      }
    } else {
      $errores[] = "El usuario no existe";
    }
  }
}


// Incluye el Header
incluirTemplate('header');




?>

<!-- Main -->
<main class="contenedor seccion contenido-centrado">
  <h1>Iniciar Sesion</h1>

  <?php foreach ($errores as $error) : ?>
    <div class="alerta error">
      <?php echo $error; ?>
    </div>
  <?php endforeach; ?>

  <form method="POST" class="formulario" novalidate>
    <fieldset>
      <legend>Email y Password</legend>
      <label for="email">Email</label>
      <input type="email" name="email" placeholder="Tu email" id="email" />
      <label for="password">Contraseña</label>
      <input type="password" name="password" placeholder="Tu contraseña" id="password" />
    </fieldset>


    <input type="submit" value="Iniciar Sesion" class="boton boton-verde">
  </form>
</main>

<!-- Footer -->
<?php
incluirTemplate('footer');
?>