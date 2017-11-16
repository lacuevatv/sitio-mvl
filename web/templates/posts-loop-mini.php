<?php 

$btnVerMas = 'Ver más';

for ($i=0; $i < count($data); $i++) { 
	$post = $data[$i];
	?>

	<li class="li-mini-loop">
		<article class="post-loop-mini">
			<figure class="post-imagen-loop-mini">
			<!-- IMAGEN DESTACADA -->
			<?php if ( $post['post_imagen'] != '' ) { ?>
				<img src="<?php echo UPLOADSURL . '/' . $post['post_imagen']; ?>" alt="<?php echo $post['post_titulo']; ?>">
			<?php } else { ?>
				<img src="<?php echo MAINSURL . '/assets/images/noticia-img-default.png'; ?>" alt="<?php echo $post['post_titulo']; ?>">
		    <?php } ?>
			</figure>
			
			<div class="post-data-loop-mini">
			<!-- TITULO -->
				<h1>
					<?php echo $post['post_titulo']; ?>
				</h1>

			<!-- RESUMEN -->
				<p>
					<?php 
					if ( $post['post_resumen'] != '' ) {
						echo acortaTexto( $post['post_resumen'] );
					} else {
						echo acortaTexto( $post['post_contenido'] ); 	
					}
					?>
				</p>

				<p>
				<?php 
			if ($post['post_categoria'] != 'telefonos' ) : 
				if ( $post['post_link_externo'] != '' ) {
					echo '<a href="'.$post['post_link_externo'].'" target="_blank">'.$post['post_link_externo'].'</a>';
				} else {
					if ( $post['post_type'] == 'post' ) {
					echo '<a href="' . MAINSURL . '/' . $post['post_categoria'] . '/' . $post['post_url'].'">' . $btnVerMas . '</a>';
					} else {
						echo '<a href="' . MAINSURL . '/' .$post['post_url'].'">'.$btnVerMas.'</a>';
					}
				}
			endif;
				?>
				</p>
			</div><!-- //.post-data-loop -->	
		</article>
	</li>



<?php }//for ?>