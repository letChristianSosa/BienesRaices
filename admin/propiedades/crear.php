<?php

require '../../includes/funciones.php';
$auth = estaAutenticado();

if (!$auth) {
  header('Location: /');
}

require '../../includes/config/database.php';
$db = conectarDB();
// var_dump($db);

$consulta = "SELECT * FROM vendedores";
$resultado = mysqli_query($db, $consulta);

//  Crear la variable que va a contener los errores
$errores = [];

// Variables de los campos
$titulo = '';
$precio = '';
$descripcion = '';
$habitaciones = '';
$wc = '';
$estacionamiento = '';
$vendedorId = '';

if ($_SERVER['REQUEST_METHOD'] === "POST") {
  // echo "<pre>";
  // var_dump($_POST);
  // echo "</pre>";

  // echo "<pre>";
  // var_dump($_FILES);
  // echo "</pre>";

  // exit;


  $titulo = mysqli_real_escape_string($db, $_POST['titulo']);
  $precio = mysqli_real_escape_string($db, $_POST['precio']);
  $descripcion = mysqli_real_escape_string($db, $_POST['descripcion']);
  $habitaciones = mysqli_real_escape_string($db, $_POST['habitaciones']);
  $wc = mysqli_real_escape_string($db, $_POST['wc']);
  $estacionamiento = mysqli_real_escape_string($db, $_POST['estacionamiento']);
  $vendedorId = mysqli_real_escape_string($db, $_POST['vendedor']) ?? null;
  $creado = date('Y/m/d');

  // Variable para la imagen
  $imagen = $_FILES['imagen'];

  // Validaciones {
  if (!$titulo) {
    $errores[] = 'La propiedad debe tener un titulo';
  }
  if (!$precio) {
    $errores[] = 'La propiedad debe tener un precio';
  }
  if (strlen($descripcion) < 30) {
    $errores[] = 'La propiedad debe tener una descripcion y debe ser mayor a 30 caracteres';
  }
  if (!$habitaciones) {
    $errores[] = 'La propiedad debe tener la cantidad de habitaciones';
  }
  if (!$wc) {
    $errores[] = 'La propiedad debe tener la cantidad de banos';
  }
  if (!$estacionamiento) {
    $errores[] = 'La propiedad debe tener la cantidad de estacionamiento';
  }
  if (!$vendedorId) {
    $errores[] = 'La propiedad debe tener vendedor';
  }

  if (!$imagen['name'] || $imagen['error']) {
    $errores[] = 'La propiedad debe tener una imagen';
  }

  // imagen['size'] mayor a 100kb
  if ($imagen['size'] > (10000000)) {
    $errores[] = 'La imagen debe ser menor a 10MB';
  }
  // }

  // echo "<pre>";
  // var_dump($errores);
  // echo "</pre>";
  // exit;


  // La funcion empty revisa si el array esta vacio
  if (empty($errores)) {
    // Subida de ARCHIVOS {
    $carpetaImagenes = "../../imagenes/";
    if (!is_dir($carpetaImagenes)) {
      mkdir($carpetaImagenes);
    }

    // Generar un nombre unico para la imagen
    $nombreImagen = md5(uniqid(rand(), true)) . ".jpg";

    // Sube la imagen al servidor
    move_uploaded_file($imagen['tmp_name'], $carpetaImagenes . $nombreImagen);

    // } Fin subida de archivos 


    $query = "INSERT INTO propiedades (titulo, precio, imagen, descripcion, habitaciones, wc, estacionamiento, creado, vendedorId) VALUES ('$titulo', '$precio', '$nombreImagen', '$descripcion', '$habitaciones', '$wc', '$estacionamiento', '$creado', '$vendedorId')";


    $resultado = mysqli_query($db, $query);
    echo $resultado;
    // exit;
    if ($resultado) {
      // Redirecciona a la ruta /admin
      header('Location: /admin?resultado=1');
    }
  }
};



incluirTemplate('header');
?>


<!-- Main -->
<main class="contenedor seccion">
  <h1>Crear</h1>

  <a href="/admin" class="boton boton-verde">Volver</a>

  <?php foreach ($errores as $error) : ?>
    <div class="alerta error">
      <?php echo $error; ?>
    </div>
  <?php endforeach;  ?>

  <form class="formulario" method="POST" action="/admin/propiedades/crear.php" enctype="multipart/form-data">
    <fieldset>
      <legend>Informacion General</legend>

      <label for="titulo">Titulo:</label>
      <input type="text" id="titulo" name="titulo" placeholder="Titulo Propiedad" value="<?php echo $titulo ?>">

      <label for="precio">Precio:</label>
      <input type="number" id="precio" name="precio" placeholder="Precio Propiedad" value="<?php echo $precio ?>">

      <label for="imagen">Imagen:</label>
      <input type="file" id="imagen" name="imagen" accept="image/jpeg, image/png">

      <label for="descripcion">Descripcion:</label>
      <textarea id="descripcion" name="descripcion"><?php echo $descripcion ?></textarea>
    </fieldset>

    <fieldset>
      <legend>Informacion de la propiedad</legend>

      <label for="habitaciones">Habitaciones:</label>
      <input type="number" id="habitaciones" name="habitaciones" placeholder="Ej: 3" min="1" max="9" value="<?php echo $habitaciones ?>">

      <label for="wc">Baños:</label>
      <input type="number" id="wc" name="wc" placeholder="Ej: 3" min="1" max="9" value="<?php echo $wc ?>">

      <label for="estacionamiento">Estacionamiento:</label>
      <input type="number" id="estacionamiento" name="estacionamiento" placeholder="Ej: 3" min="0" max="9" value="<?php echo $estacionamiento ?>">
    </fieldset>
    <fieldset>
      <legend>Vendedor</legend>
      <select name="vendedor">
        <option value="" <?php echo $vendedorId === '' ? 'selected' : '' ?> disabled>Seleccione un vendedor</option>

        <!-- <option value="1">Chris</option>
        <option value="2">Sheyla</option> -->
        <?php while ($vendedor = mysqli_fetch_assoc($resultado)) : ?>
          <option <?php echo $vendedorId === $vendedor['id'] ? 'selected' : '' ?> value="<?php echo $vendedor['id']; ?>"> <?php echo $vendedor['nombre'] . " " . $vendedor['apellido']; ?></option>
        <?php endwhile; ?>
      </select>
    </fieldset>

    <input type="submit" value="Crear Propiedad" class="boton boton-verde">
  </form>

</main>

<!-- Footer -->
<?php
incluirTemplate('footer');
?>