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
			<ul class="loop-noticias-backend">
        		<?php listaNoticias(10, 'all', true, 'gestion', true); ?>
        		
        	</ul>
        	</div><!-- // col -->
        </div><!-- // row -->
    	<div class="row">
    		<div class="col ver-mas-noticias">
    			<input type="hidden" name="post_categoria" id="post_categoria" value="gestion">
        		<button id="load-more" class="btn btn-primary">Ver más</button>
        		<p class="loading-news-ajax"></p>
        	</div>
    	</div>
		
	</div><!-- // container gral modulo -->
</div><!-- // container -->
<!-- botones del modulo -->
<footer class="footer-modulo container">
    <a type="button" href="index.php" class="btn">Volver al inicio</a>
    <a type="button" href="index.php?admin=editar-gestion" class="btn">Agregar nueva</a>
</footer>

<!---------- fin noticias ---------------->