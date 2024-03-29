<?php
require 'includes/app.php';
incluirTemplate('header');
?>

<!-- Main -->
<main class="contenedor seccion">
  <h1>Conoce Sobre Nosotros</h1>
  <div class="contenido-nosotros">
    <div class="imagen">
      <picture>
        <source srcset="build/img/nosotros.webp" type="image/webp" />
        <source srcset="build/img/nosotros.jpg" type="image/jpeg" />
        <img loading="lazy" src="build/img/nosotros.jpg.jpg" alt="Imagen Nosotros" />
      </picture>
    </div>
    <div class="texto-nosotros">
      <blockquote>25 anios de experiencia</blockquote>
      <p>
        Lorem ipsum dolor sit amet consectetur adipisicing elit. Magni quos
        nisi numquam, ullam neque libero possimus exercitationem? Distinctio
        vero laborum molestiae ducimus accusamus nam fugit reiciendis esse
        numquam consequatur! Laborum. Lorem ipsum dolor sit amet
        consectetur, adipisicing elit. Ex esse voluptatum dolore quae, atque
        enim, vel minima fugit aperiam accusamus placeat. Nulla, veritatis
        aliquid reprehenderit porro vero molestiae dolorem non.
      </p>
      <p>
        Lorem ipsum dolor sit amet consectetur adipisicing elit. Unde aut
        dolor voluptas corporis officiis atque tenetur voluptates animi
        cupiditate, fugiat sit rerum doloremque dolorum ipsum quaerat
        laboriosam. Cumque, iure possimus.
      </p>
    </div>
  </div>
</main>

<section class="contenedor seccion">
  <h1>Mas Sobre Nosotros</h1>
  <div class="iconos-nosotros">
    <div class="icono">
      <img src="build/img/icono1.svg" alt="Icono Seguridad" loading="lazy" />
      <h3>Seguridad</h3>
      <p>
        Lorem ipsum dolor sit amet, Labore esse et, quaerat ex dolor
        architecto neque eaque iusto modi eveniet tenetur sed.
      </p>
    </div>
    <div class="icono">
      <img src="build/img/icono2.svg" alt="Icono Precio" loading="lazy" />
      <h3>Precio</h3>
      <p>
        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Odio
        molestias eius deleniti. Labore esse et, quaerat.
      </p>
    </div>
    <div class="icono">
      <img src="build/img/icono3.svg" alt="Icono Tiempo" loading="lazy" />
      <h3>A Tiempo</h3>
      <p>
        Labore esse et, quaerat ex dolor architecto neque eaque iusto modi
        eveniet tenetur sed, iure, qui fugit asperiores?
      </p>
    </div>
  </div>
</section>

<!-- Footer -->
<?php
incluirTemplate('footer');
?>