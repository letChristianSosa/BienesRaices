<?php
require 'includes/app.php';
incluirTemplate('header');
?>


<!-- Main -->
<main class="contenedor seccion contenido-centrado">
  <h1>Terraza en el Techo de tu Casa</h1>

  <picture>
    <source srcset="build/img/destacada2.webp" type="image/webp" />
    <source srcset="build/img/destacada2.jpg" type="image/jpeg" />
    <img loading="lazy" src="build/img/destacada2.jpg" alt="imagen de la propiedad" />
  </picture>
  <p class="informacion-meta">
    Escrito el: <span>14/05/2022</span> por: <span>Christian Sosa</span>
  </p>
  <div class="resumen-propiedad">
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