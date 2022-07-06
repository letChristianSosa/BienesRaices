<?php
require 'includes/app.php';
incluirTemplate('header');
?>


<!-- Main -->
<main class="contenedor seccion contenido-centrado">
  <h1>Nuestro Blog</h1>
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
          Maximiza el espacio en tu hogar con esta guia, aprende a combinar
          muebles y colores para darle vida a tu espacio.
        </p>
      </a>
    </div>
  </article>

  <article class="entrada-blog">
    <div class="imagen">
      <picture>
        <source srcset="build/img/blog3.webp" type="image/webp" />
        <source srcset="build/img/blog3.jpg" type="image/jpeg" />
        <img loading="lazy" src="build/img/blog3.jpg" alt="imagen blog" />
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
        <source srcset="build/img/blog4.webp" type="image/webp" />
        <source srcset="build/img/blog4.jpg" type="image/jpeg" />
        <img loading="lazy" src="build/img/blog4.jpg" alt="imagen blog" />
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
          Maximiza el espacio en tu hogar con esta guia, aprende a combinar
          muebles y colores para darle vida a tu espacio.
        </p>
      </a>
    </div>
  </article>
</main>

<!-- Footer -->
<?php
incluirTemplate('footer');
?>