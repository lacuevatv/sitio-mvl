<?php
/*
 * Noticias recientes
 * Lista las noticias publicadas y con links para verlas, editarlas o publicarlas
 * Since 3.0
 * 
*/
load_module( 'noticias' );
?>
<!---------- noticias ---------------->
<div class="contenido-modulo">
	<div class="container">
		
		<div class="row">
			<div class="col">
    			<ul class="loop-noticias-backend-small">
            		
            <?php 
                
                $posts = listaNoticiasData(20, 'all', 'tramites-servicios' ); 
                
                for ($i=0; $i < count($posts); $i++) { 
                      $post = $posts[$i]; ?>

                    <li>
                        <article>
                            <h1>
                                <?php echo $post['post_titulo']; ?>
                            </h1>
                            
                            <img src="<?php echo UPLOADSURL . '/' . $post['post_imagen']; ?>">
                            <h5>
                                <a href="<?php echo $post['post_link_externo']; ?>" target="_blank">
                                    <?php echo $post['post_link_externo']; ?>
                                </a>
                            </h5>
                            <div class="wrapper-button">
                                <a href="index.php?admin=editar-tramites&slug=<?php echo $post['post_url']; ?>" class="btn btn-primary btn-sm">
                                    Editar
                                </a>
                                <a href="<?php echo $post['post_link_externo']; ?>" target="_blank" class="btn btn-danger btn-sm">
                                    Ver link
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
    			<input type="hidden" name="post_categoria" id="post_categoria" value="tramites">
        		<button id="load-more" class="btn btn-primary">Ver más</button>
        		<p class="loading-news-ajax"></p>
        	</div>
    	</div>
		
	</div><!-- // container gral modulo -->
</div><!-- // container -->
<!-- botones del modulo -->
<footer class="footer-modulo container">
    <a type="button" href="index.php" class="btn">Volver al inicio</a>
    <a type="button" href="index.php?admin=editar-tramites" class="btn">Agregar nueva</a>
</footer>

<!---------- fin noticias ---------------->