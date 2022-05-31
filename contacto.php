<?php
include 'includes/header.php';
?>

<!-- Main -->
<main class="contenedor seccion">
  <h1>Contacto</h1>
  <picture>
    <source srcset="build/img/destacada3.webp" type="image/webp" />
    <source srcset="build/img/destacada3.jpg" type="image/jpeg" />
    <img loading="lazy" src="build/img/destacada3.jpg" alt="imagen contacto" />
  </picture>
  <h2>Llene el Formulario de Contacto</h2>
  <form class="formulario">
    <fieldset>
      <legend>Informacion Personal</legend>
      <label for="nombre">Nombre</label>
      <input type="text" placeholder="Tu Nombre" id="nombre" />
      <label for="email">E-mail</label>
      <input type="email" placeholder="Tu E-mail" id="email" />
      <label for="telefono">Telefono</label>
      <input type="tel" placeholder="Tu Telefono" id="telefono" />
      <label for="mensaje">Mensaje</label>
      <textarea id="mensaje"></textarea>
    </fieldset>
    <fieldset>
      <legend>Informacion Sobre la Propiedad</legend>
      <label for="opciones">Vende o Compra</label>
      <select id="opciones">
        <option value="" disabled selected>Elija una opcion</option>
        <option value="Vende">Vende</option>
        <option value="Compra">Compra</option>
      </select>
      <label for="presupuesto">Tu precio o Presupuesto</label>
      <input type="number" placeholder="Tu precio o Presupuesto" id="presupuesto" />
    </fieldset>
    <fieldset>
      <legend>Contacto</legend>
      <p>Como desea ser contactado?</p>
      <div class="forma-contacto">
        <label for="contactar-telefono">Telefono</label>
        <input name="contacto" type="radio" value="telefono" id="contactar-telefono" />
        <label for="contactar-e-mail">E-mail</label>
        <input name="contacto" type="radio" value="email" id="contactar-e-mail" />
      </div>

      <p>Si eligio telefono, elija la fecha y la hora</p>
      <label for="fecha">Fecha</label>
      <input type="date" id="fecha" />
      <label for="hora">Hora</label>
      <input type="time" id="hora" min="09:00" max="20:00" />
    </fieldset>
    <input type="submit" value="Enviar" class="boton-verde" />
  </form>
</main>

<!-- Footer -->
<footer class="footer seccion">
  <div class="contenedor contenedor-footer">
    <nav class="navegacion">
      <a href="nosotros.php">Nosotros</a>
      <a href="anuncios.php">Anuncios</a>
      <a href="blog.php">Blog</a>
      <a href="contacto.php">Contacto</a>
    </nav>
  </div>
  <p class="copyright">Todos los derechos reservados 2022 &copy;</p>
</footer>

<script src="build/js/bundle.min.js"></script>
</body>

</html>