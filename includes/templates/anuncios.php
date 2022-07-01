<?php

// Importar la Conexion
require 'includes/config/database.php';
$db = conectarDB();

// Consultar
$query = "SELECT * FROM propiedades LIMIT ${limite}";

// Obtener Resultado

$resultado = mysqli_query($db, $query);


?>
<div class="contenedor-anuncios">
  <?php while ($propiedad = mysqli_fetch_assoc($resultado)) : ?>
    <div class="anuncio">

      <img loading="lazy" src="/imagenes/<?php echo $propiedad['imagen']; ?>" alt="anuncio" />

      <div class="contenido-anuncio">
        <div>
          <h3><?php echo $propiedad['titulo'] ?></h3>
          <p>
            <?php echo $propiedad['descripcion'] ?>
          </p>
          <p class="precio">$<?php echo $propiedad['precio'] ?></p>
          <ul class="iconos-caracteristicas">
            <li>
              <img src="build/img/icono_dormitorio.svg" alt="icono habitaciones" loading="lazy" />
              <p><?php echo $propiedad['habitaciones'] ?></p>
            </li>
            <li>
              <img src="build/img/icono_wc.svg" alt="icono wc" loading="lazy" />
              <p><?php echo $propiedad['wc'] ?></p>
            </li>
            <li>
              <img src="build/img/icono_estacionamiento.svg" alt="icono estacionamiento" loading="lazy" />
              <p><?php echo $propiedad['estacionamiento'] ?></p>
            </li>
          </ul>
        </div>
        <div>

          <a href="anuncio.php?id=<?php echo $propiedad['id']; ?>" class="boton-amarillo-block">Ver Propiedad</a>
        </div>
      </div>
    </div>
  <?php endwhile; ?>
</div>