<?php
require 'includes/app.php';
incluirTemplate('header');
?>

<!-- Main -->
<main class="seccion contenedor">
  <h2>Casas y Departamentos en Venta</h2>
  <?php
  $limite = 10;
  include 'includes/templates/anuncios.php';
  ?>
</main>

<!-- Footer -->
<?php
mysqli_close($db);
incluirTemplate('footer');
?>