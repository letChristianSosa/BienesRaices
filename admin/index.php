<?php

require '../includes/funciones.php';
$auth = estaAutenticado();

if (!$auth) {
  header('Location: /');
}

// Importar la conexion
require('../includes/config/database.php');
$db = conectarDB();

// Escribir el Query
$query = "SELECT * FROM propiedades";

// Consultar la BD
$resultadoConsulta = mysqli_query($db, $query) ?? null;

// SuperGlobal $_GET sirve para leer datos del Query
// Si no existe, se asigna null
// Muestra mensaje condicional
$resultado = $_GET['resultado'] ?? null;

if ($_SERVER['REQUEST_METHOD'] === "POST") {
  $id = $_POST['id'];
  $id = filter_var($id, FILTER_VALIDATE_INT);

  if ($id) {

    $query = "SELECT imagen FROM propiedades WHERE id = ${id}";
    $resultado = mysqli_query($db, $query);
    $propiedad = mysqli_fetch_assoc($resultado);
    unlink('../imagenes/' . $propiedad['imagen']);

    $query = "DELETE FROM propiedades WHERE id = ${id}";
    $resultado = mysqli_query($db, $query);

    if ($resultado) {
      header('Location: /admin?resultado=3');
    }
  }
}



incluirTemplate('header');
?>



<!-- Main -->
<main class="contenedor seccion">
  <h1>Administrador de Bienes Raices</h1>

  <!-- intval convierte el string a numero -->
  <!-- Verifica si existe un resultado en el query ? Se imprime : No hace nada -->
  <?php if (intval($resultado) === 1) : ?>
    <p class="alerta exito">Anuncio Creado Correctamente.</p>
  <?php elseif (intval($resultado) === 2) : ?>
    <p class="alerta exito">Anuncio Actualizado Correctamente.</p>
  <?php elseif (intval($resultado) === 3) : ?>
    <p class="alerta exito">Anuncio Eliminado Correctamente.</p>
  <?php endif; ?>

  <a href="/admin/propiedades/crear.php" class="boton boton-verde">Agregar Nueva Propiedad</a>

  <table class="propiedades">
    <thead>
      <tr>
        <th>ID</th>
        <th>Titulo</th>
        <th>Imagen</th>
        <th>Precio</th>
        <th>Acciones</th>
      </tr>
    </thead>

    <!-- Mostrar los resultados -->
    <tbody>
      <?php while ($propiedad = mysqli_fetch_assoc($resultadoConsulta)) : ?>
        <tr>
          <td><?php echo $propiedad['id'] ?></td>
          <td><?php echo $propiedad['titulo'] ?></td>
          <td><img src="/imagenes/<?php echo $propiedad['imagen'] ?>" alt="imagen propiedad" class="imagen-tabla"></td>
          <td>$<?php echo $propiedad['precio'] ?></td>
          <td>
            <a href="propiedades/actualizar.php?id=<?php echo $propiedad['id'] ?>" class="boton-amarillo-block">Actualizar</a>
            <form method="POST">
              <input type="hidden" name="id" value="<?php echo $propiedad['id']; ?>">
              <input type="submit" class="boton-rojo-block w-100" value="Eliminar">
            </form>
          </td>
        </tr>
      <?php endwhile; ?>
    </tbody>
  </table>
</main>

<!-- Footer -->
<?php
//TODO: Cerrar la conexion
mysqli_close($db);
incluirTemplate('footer');
?>