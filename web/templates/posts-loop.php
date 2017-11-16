<?php 
//se procesa la fecha primero:
$meses = array('Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre');
$dias = array('Domingo','Lunes','Martes','Mi&eacute;rcoles','Jueves','Viernes','S&aacute;bado');

for ($i=0; $i < count($data); $i++) { 
	$post = $data[$i];
	?>

	<li>
		<a href="<?php echo MAINSURL .'/'. $post['post_categoria'] .'/'. $post['post_url']; ?>" tittle="<?php echo $post['post_titulo']; ?>">
			<article class="post-loop">
				<figure class="post-imagen-loop">
				<!-- IMAGEN DESTACADA -->
				<?php if ( $post['post_imagen'] != '' ) { ?>
					<img src="<?php echo UPLOADSURL . '/' . $post['post_imagen']; ?>" alt="<?php echo $post['post_titulo']; ?>">
				<?php } else { ?>
					<img src="<?php echo MAINSURL . '/assets/images/noticia-img-default.png'; ?>" alt="<?php echo $post['post_titulo']; ?>">
			    <?php } ?>
				</figure>
				
				<div class="post-data-loop">
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

					<div class="post-date">
				
				<?php if ( $post['post_categoria'] == 'gestion' ) :
					
						if ( $post['post_fecha'] != '' ) { 
							$date = $post['post_fecha'];
							$fecha = date("j", strtotime($date)) .' de '. $meses[date("n", strtotime($date))-1];
							?>

							<!-- FECHA POST -->
							<h5><?php echo $fecha; ?></h5>

					<?php } ?>
				
				<?php endif; ?>

				<?php if ( $post['post_categoria'] == 'agenda' ) :

					$date1 = $post['post_fecha_agenda'];
					$date2 = $post['post_fecha_agenda_out'];

					if ( $date2 != null ) {
		                if ( date("n", strtotime($date1)) == date("n", strtotime($date2)) ) {
		                    $fecha = 'Del ' . date("j", strtotime($date1)) .' al '. date("j", strtotime($date2)) . ' de '. $meses[date("n", strtotime($date2))-1];
		                } else {
		                    $fecha = 'Del ' . date("j", strtotime($date1)) .' de '. $meses[date("n", strtotime($date1))-1] .' al '. date("j", strtotime($date2)) . ' de '. $meses[date("n", strtotime($date2))-1];
		                }
		            } else {
		                $fecha = $dias[date("w", strtotime($date1))] .' '. date("j", strtotime($date1)) .' de '. $meses[date("n", strtotime($date1))-1];
		            } ?>
					
	            	<!-- FECHA AGENDA -->
						<h5><?php echo $fecha; ?></h5>

					<?php if ( $post['post_agenda_lugar'] != '' ) : ?>
						<h6><?php echo $post['post_agenda_lugar']; ?></h6>
					<?php endif; ?>
				
				
				
				<?php endif; ?>
					</div><!-- //.post-date -->
				</div><!-- //.post-data-loop -->	
			</article>
		</a>
	</li>



<?php }//for ?>