<?php
/*
 * Noticias recientes
 * Lista las noticias publicadas y con links para verlas, editarlas o publicarlas
 * Since 3.0
 * 
*/
global $userStatus;
if ($userStatus != '0' && $userStatus != '1' ) {
    echo 'No tiene permisos para ver esta sección';
    
    exit;
}
load_module( 'noticias' );
?>
<!---------- noticias ---------------->
<div class="contenido-modulo">
	<div class="container">
		
		<div class="row">
			<div class="col">
    			<ul class="loop-noticias-backend-small">
            		
                    <?php 
                
                $posts = listaNoticiasData(20, 'all', 'telefonos' ); 
                
                for ($i=0; $i < count($posts); $i++) { 
                      $post = $posts[$i]; ?>

                    <li>
                        <article>
                            <h1>
                                <?php echo $post['post_titulo']; ?>
                            </h1>
                            
                            <img src="<?php echo UPLOADSURL . '/' . $post['post_imagen']; ?>">
                            <div class="contenido-resumen big-text">
                                <?php echo $post['post_contenido']; ?>
                            </div>
                            <div class="wrapper-button">
                                <a href="index.php?admin=editar-telefono&slug=<?php echo $post['post_url']; ?>" class="btn btn-primary btn-sm">
                                    Editar
                                </a>
                            </div>
                        </article>
                    </li>

            <?php }//for
            ?>
            		
            	</ul>
        	</div><!-- // col -->
        </div><!-- // row -->
    	<div class="row">
    		<div class="col ver-mas-noticias">
    			<input type="hidden" name="post_categoria" id="post_categoria" value="telefonos">
        		<button id="load-more" class="btn btn-primary">Ver más</button>
        		<p class="loading-news-ajax"></p>
        	</div>
    	</div>
		
	</div><!-- // container gral modulo -->
</div><!-- // container -->
<!-- botones del modulo -->
<footer class="footer-modulo container">
    <a type="button" href="index.php" class="btn">Volver al inicio</a>
    <a type="button" href="index.php?admin=editar-telefono" class="btn">Agregar nueva</a>
</footer>

<!---------- fin noticias ---------------->