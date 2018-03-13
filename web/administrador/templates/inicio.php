<!---------- ACCESOS DIRECTOS A LOS MODULOS ---------------->
<div class="container">
  <div class="row">

    <div class="col-30">
      <!-- modulo -->
      <section>
        <div class="modulo-wrapper">
          <h2>Agenda</h2>
          <p>Administrar la agenda: Borrar, cargar y editar.</p>
          <p><a class="btn btn-primary" href="index.php?admin=agenda" role="button">Ver lista de publicados</a></p>
        </div>
      </section><!-- //modulo -->
    </div><!-- //columna -->

    <div class="col-30">
      <!-- modulo -->
      <section>
        <div class="modulo-wrapper">
          <h2>Gestion</h2>
          <p>Administrar las noticias: Borrar, cargar y editar.</p>
          <p><a class="btn btn-primary" href="index.php?admin=gestion" role="button">Ver lista de publicados</a></p>
        </div>
      </section><!-- //modulo -->
    </div><!-- //columna -->

    <div class="col-30">
      <!-- modulo -->
      <section>
        <div class="modulo-wrapper">
          <h2>Boletín Municipal</h2>
          <p>Administrar los boletines municipales.</p>
          <p><a class="btn btn-primary" href="index.php?admin=boletin-municipal" role="button">Modificar boletines</a></p>
        </div>
      </section><!-- //modulo -->
    </div><!-- //columna -->

    <div class="col-30">
      <!-- modulo -->
      <section>
        <div class="modulo-wrapper">
          <h2>Iconos Footer</h2>
          <p>Administrar los iconos al final de la página.</p>
          <p><a class="btn btn-primary" href="index.php?admin=links-footer" role="button">Ver lista de publicados</a></p>
        </div>
      </section><!-- //modulo -->
    </div><!-- //columna -->

    <div class="col-30">
      <!-- modulo -->
      <section>
        <div class="modulo-wrapper">
          <h2>Menú del Footer</h2>
          <p>Modificar el menú del pie, hasta 4 columnas.</p>
          <p><a class="btn btn-primary" href="index.php?admin=footer-menu" role="button">Modificar Menú</a></p>
        </div>
      </section><!-- //modulo -->
    </div><!-- //columna -->

    <div class="col-30">
      <!-- modulo -->
      <section>
        <div class="modulo-wrapper">
          <h2>Administrar Videos</h2>
          <p>Agregar, quitar o borrar url del video.</p>
          <p><a class="btn btn-primary" href="index.php?admin=videos" role="button">Modificar</a></p>
        </div>
      </section><!-- //modulo -->
    </div><!-- //columna -->

    <div class="col-30">
      <!-- modulo -->
      <section>
        <div class="modulo-wrapper">
          <h2>Trámites</h2>
          <p>Modificar la lista de tramites disponibles.</p>
          <p><a class="btn btn-primary" href="index.php?admin=tramites" role="button">Modificar tramites</a></p>
        </div>
      </section><!-- //modulo -->
    </div><!-- //columna -->

    <div class="col-30">
      <!-- modulo -->
      <section>
        <div class="modulo-wrapper">
          <h2>Teléfonos</h2>
          <p>Modificar la lista de teléfonos disponibles.</p>
          <p><a class="btn btn-primary" href="index.php?admin=telefonos" role="button">Modificar telefonos</a></p>
        </div>
      </section><!-- //modulo -->
    </div><!-- //columna -->

    <div class="col-30">
      <!-- modulo -->
      <section>
        <div class="modulo-wrapper">
          <h2>Cultural</h2>
          <p>Modificar sección agenda cultural.</p>
          <p><a class="btn btn-primary" href="index.php?admin=cultura" role="button">Modificar empleo</a></p>
        </div>
      </section><!-- //modulo -->
    </div><!-- //columna -->

    <div class="col-30">
      <!-- modulo -->
      <section>
        <div class="modulo-wrapper">
          <h2>Educación</h2>
          <p>Modificar la sección de educación.</p>
          <p><a class="btn btn-primary" href="index.php?admin=educacion" role="button">Modificar educación</a></p>
        </div>
      </section><!-- //modulo -->
    </div><!-- //columna -->

    <div class="col-30">
      <!-- modulo -->
      <section>
        <div class="modulo-wrapper">
          <h2>Salud</h2>
          <p>Modificar sección salud.</p>
          <p><a class="btn btn-primary" href="index.php?admin=salud" role="button">Modificar salud</a></p>
        </div>
      </section><!-- //modulo -->
    </div><!-- //columna -->

    <div class="col-30">
      <!-- modulo -->
      <section>
        <div class="modulo-wrapper">
          <h2>Slider Inicio</h2>
          <p>Modificar el slider de inicio.</p>
          <p><a class="btn btn-primary" href="index.php?admin=editar-slider&slug=home" role="button">Modificar sliders</a></p>
        </div>
      </section><!-- //modulo -->
    </div><!-- //columna -->

    <div class="col-30">
      <!-- modulo -->
      <section>
        <div class="modulo-wrapper">
          <h2>Popup Home</h2>
          <p>Administrar Popup Home, agregar imagen.</p>
          <p><a class="btn btn-primary" href="index.php?admin=promociones" role="button">Modificar Popup Home</a></p>
        </div>
      </section><!-- //modulo -->
    </div><!-- //columna -->

    <div class="col-30">
      <!-- modulo -->
      <section>
        <div class="modulo-wrapper">
          <h2>Biblioteca de medios</h2>
          <p>Subir, borrar y manipular archivos e imagenes.</p>
          <p><a class="btn btn-primary" href="index.php?admin=biblioteca-medios" role="button">Ir a la Biblioteca</a></p>
        </div>
      </section><!-- //modulo -->
    </div><!-- //columna -->

  <?php 
  global $userStatus;
  if ( $userStatus == '0' ) : ?>
    <div class="col-30">
      <!-- modulo -->
      <section>
        <div class="modulo-wrapper">
          <h2>Administrar Paginas</h2>
          <p>Modificar textos de algunas páginas.</p>
          <p><a class="btn btn-primary" href="index.php?admin=pages" role="button">Pages</a></p>
        </div>
      </section><!-- //modulo -->
    </div><!-- //columna -->
  <?php endif; ?>
  </div><!-- //row -->
</div><!-- //containre -->