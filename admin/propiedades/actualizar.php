<?php

require '../../includes/funciones.php';
$auth = estaAutenticado();

// Si no esta autenticado, regresa a /
if (!$auth) {
  header('Location: /');
}
// Leer el valor pasado por Query y verifica si es un numero valido
$id = $_GET['id'];
$id = filter_var($id, FILTER_VALIDATE_INT);

// Si no es un numero, retorna a /admin
if (!$id) {
  header('Location: /admin');
}

require '../../includes/config/database.php';
$db = conectarDB();

// Consulta para obtener los datos de la propiedad
$consulta = "SELECT * FROM propiedades WHERE id = ${id}";
$resultado = mysqli_query($db, $consulta);
$propiedad = mysqli_fetch_assoc($resultado);

// Consulta para obtener los vendedores
$consulta = "SELECT * FROM vendedores";
$resultado = mysqli_query($db, $consulta);

//  Crear la variable que va a contener los errores
$errores = [];

// Variables de los campos
$titulo = $propiedad['titulo'];
$precio = $propiedad['precio'];
$descripcion = $propiedad['descripcion'];
$habitaciones = $propiedad['habitaciones'];
$wc = $propiedad['wc'];
$estacionamiento = $propiedad['estacionamiento'];
$vendedorId = $propiedad['vendedorId'];
$imagenPropiedad = $propiedad['imagen'];

if ($_SERVER['REQUEST_METHOD'] === "POST") {
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

  if ($imagen['size'] > 10000000) {
    $errores[] = 'La imagen es muy pesada. Debe pesar maximo 10MB';
  }

  // La funcion empty revisa si el array esta vacio
  if (empty($errores)) {

    // Subida de ARCHIVOS {
    // Si no existe la carpeta imagenes, Crearla
    $carpetaImagenes = "../../imagenes/";
    if (!is_dir($carpetaImagenes)) {
      mkdir($carpetaImagenes);
    }

    if ($imagen['name']) {
      // Eliminar la imagen previa
      unlink($carpetaImagenes . $propiedad['imagen']);

      // Generar un nombre unico para la imagen
      $nombreImagen = md5(uniqid(rand(), true)) . ".jpg";

      // Sube la imagen al servidor
      move_uploaded_file($imagen['tmp_name'], $carpetaImagenes . $nombreImagen);
    } else {
      $nombreImagen = $propiedad['imagen'];
    }
    // } Fin subida de archivos 


    $query = "UPDATE propiedades SET titulo = '${titulo}', precio = '${precio}', imagen = '${nombreImagen}', descripcion = '${descripcion}', habitaciones = ${habitaciones}, wc = ${wc}, estacionamiento = ${estacionamiento}, vendedorId = ${vendedorId} WHERE id = ${id}";

    $resultado = mysqli_query($db, $query);
    if ($resultado) {
      // Redirecciona a la ruta /admin
      header('Location: /admin?resultado=2');
    }
  }
};


incluirTemplate('header');
?>

<!-- Main -->
<main class="contenedor seccion">
  <h1>Actualizar</h1>

  <a href="/admin" class="boton boton-verde">Volver</a>

  <?php foreach ($errores as $error) : ?>
    <div class="alerta error">
      <?php echo $error; ?>
    </div>
  <?php endforeach;  ?>

  <form class="formulario" method="POST" enctype="multipart/form-data">
    <fieldset>
      <legend>Informacion General</legend>

      <label for="titulo">Titulo:</label>
      <input type="text" id="titulo" name="titulo" placeholder="Titulo Propiedad" value="<?php echo $titulo ?>">

      <label for="precio">Precio:</label>
      <input type="number" id="precio" name="precio" placeholder="Precio Propiedad" value="<?php echo $precio ?>">

      <label for="imagen">Imagen:</label>
      <input type="file" id="imagen" name="imagen" accept="image/jpeg, image/png">

      <img src="/imagenes/<?php echo $imagenPropiedad; ?>" alt="Imagen Propiedad" class="imagen-small">

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
        <?php while ($vendedor = mysqli_fetch_assoc($resultado)) : ?>
          <option <?php echo $vendedorId === $vendedor['id'] ? 'selected' : '' ?> value="<?php echo $vendedor['id']; ?>"> <?php echo $vendedor['nombre'] . " " . $vendedor['apellido']; ?></option>
        <?php endwhile; ?>
      </select>
    </fieldset>

    <input type="submit" value="Actualizar Propiedad" class="boton boton-verde">
  </form>

</main>

<!-- Footer -->
<?php
incluirTemplate('footer');
?>