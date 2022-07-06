<?php
require 'includes/app.php';
incluirTemplate('header', $inicio = true);
?>

<!-- Main -->
<main class="contenedor seccion">
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
</main>

<!-- Casas y Departamentos en Venta -->
<section class="seccion contenedor">
  <h2>Casas y Departamentos en Venta</h2>


  <?php
  $limite = 3;
  include 'includes/templates/anuncios.php';
  ?>

  <div class="alinear-derecha">
    <a href="anuncios.php" class="boton-verde">Ver Todas</a>
  </div>
</section>

<!-- Imagen Contacto -->
<section class="imagen-contacto">
  <h2>Encuentra la Casa de tus Sueños</h2>
  <p>
    Llena el formulario de contacto y un asesor se pondra en contacto
    contigo a la brevedad
  </p>
  <a href="contacto.php" class="boton-amarillo">Contactanos</a>
</section>

<!-- Seccion Inferior -->
<div class="contenedor seccion seccion-inferior">
  <section class="blog">
    <h3>Nuestro Blog</h3>
    <article class="entrada-blog">
      <div class="imagen">
        <picture>
          <source srcset="build/img/blog1.webp" type="image/webp" />
          <source srcset="build/img/blog1.jpg" type="image/jpeg" />
          <img loading="lazy" src="build/img/blog1.jpg" alt="imagen blog" />
        </picture>
      </div>

      <div class="texto-entrada">
        <a href="entrada.php">
          <h4>Terraza en el Techo de tu Casa</h4>
          <p class="informacion-meta">
            Escrito el: <span>14/05/2022</span> Por:
            <span>Christian Sosa</span>
          </p>
          <p>
            Consejos para construir en el techo de tu casa con los mejores
            materiales y ahorrando dinero.
          </p>
        </a>
      </div>
    </article>

    <article class="entrada-blog">
      <div class="imagen">
        <picture>
          <source srcset="build/img/blog2.webp" type="image/webp" />
          <source srcset="build/img/blog2.jpg" type="image/jpeg" />
          <img loading="lazy" src="build/img/blog2.jpg" alt="imagen blog" />
        </picture>
      </div>

      <div class="texto-entrada">
        <a href="entrada.php">
          <h4>Guia para la decoracion de tu hogar</h4>
          <p class="informacion-meta">
            Escrito el: <span>14/05/2022</span> Por:
            <span>Ramses Sosa</span>
          </p>
          <p>
            Maximiza el espacio en tu hogar con esta guia, aprende a
            combinar muebles y colores para darle vida a tu espacio.
          </p>
        </a>
      </div>
    </article>
  </section>

  <section class="testimoniales">
    <h3>Testimoniales</h3>
    <div class="testimonial">
      <blockquote>
        El personal se comporto de una excelente forma, muy buena atencion y
        la casa que me ofrecieron cumple con todas mis expectativas.
      </blockquote>
      <p>- Christian Sosa</p>
    </div>
  </section>
</div>

<!-- Footer -->
<?php
mysqli_close($db);
incluirTemplate('footer');
?>