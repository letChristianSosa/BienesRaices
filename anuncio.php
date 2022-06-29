<?php
require 'includes/funciones.php';
incluirTemplate('header');
?>

<!-- Main -->
<main class="contenedor seccion contenido-centrado">
  <h1>Casa en Venta frente al Bosque</h1>
  <picture>
    <source srcset="build/img/destacada.webp" type="image/webp" />
    <source srcset="build/img/destacada.jpg" type="image/jpeg" />
    <img loading="lazy" src="build/img/destacada.jpg" alt="imagen de la propiedad" />
  </picture>
  <div class="resumen-propiedad">
    <p class="precio">$3,000,000</p>
    <ul class="iconos-caracteristicas">
      <li>
        <img src="build/img/icono_wc.svg" alt="icono wc" loading="lazy" />
        <p>3</p>
      </li>
      <li>
        <img src="build/img/icono_estacionamiento.svg" alt="icono estacionamiento" loading="lazy" />
        <p>3</p>
      </li>
      <li>
        <img src="build/img/icono_dormitorio.svg" alt="icono habitaciones" loading="lazy" />
        <p>4</p>
      </li>
    </ul>
    <p>
      Lorem ipsum dolor sit amet consectetur adipisicing elit. Aut nostrum
      quod amet ut, molestias soluta, debitis eveniet est dicta vel,
      perspiciatis fugit laborum animi laboriosam? Molestias vel numquam
      non. Lorem ipsum dolor sit amet consectetur adipisicing elit.
      Similique aspernatur eligendi iste, commodi et sunt vitae fuga
      suscipit consectetur dolor ea laboriosam dolore exercitationem
      excepturi veritatis animi veniam harum neque.
    </p>
    <p>
      Lorem ipsum dolor sit amet consectetur adipisicing elit. Hic ipsum,
      veritatis quos repudiandae voluptas magnam iure voluptate dolore ipsam
      totam rem autem unde reprehenderit dignissimos doloribus quod
      doloremque sequi aspernatur.
    </p>
  </div>
</main>

<!-- Footer -->
<?php
incluirTemplate('footer');
?>