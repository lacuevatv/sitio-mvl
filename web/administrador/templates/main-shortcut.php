<!---------- ACCESOS DIRECTO DESTACADO A UN MODULO IMPORTANTE ---------------->
<div class="main-shortcut-wrapper"> 
    <div class="container">
      <div class="row">
        <div class="col-30">
          <div class="logo">
            <img src="<?php echo LOGOSITE; ?>" alt="<?php echo SITENAME; ?>">
            <p><?php echo SITENAME; ?> <?php echo DATEPUBLISHED; ?></p>
            <p><a class="btn btn-info btn-sm" href="../" target="_blank">volver a pagina principal</a></p>
          </div>
        </div>
        <div class="col-70">
          <h2 class="">Noticias Recientes</h2>
          <p>Estas son las últimas 3 noticias cargadas:</p>
          
          <div class="container">
<!---------- noticias ---------------->
            <ul class="loop-noticias-backend-excerpt">

              <?php mainshorcutIndex(); ?>
              
            </ul>
<!---------- fin noticias ---------------->
          </div>
          <hr>
          
          <div class="row">
            <div class="col-30">
              <p>
                <a class="btn btn-inverse" href="index.php?admin=noticias" role="button">Ver todas</a>
              </p>
            </div>
            <div class="col-30">
              <p>
                <a class="btn btn-inverse" href="index.php?admin=editar-noticias" role="button">Agregar nueva</a>
              </p>
            </div>
          </div>
            
        </div>
      </div>
        
     </div>
  
</div>