

<!-- IMAGEN O GALERIA -->
<?php if ($data['post_imagen'] != '') { ?>
	<figure class="single-post-image-wrapper">
		<img src="<?php echo UPLOADSURL . '/' . $data['post_imagen']; ?>"?>
	</figure>
<?php } ?>

<!-- CONTENIDO PRINCIPAL -->				
<div class="single-content">

	<?php 

	switch ( $data['post_url'] ) {
		case 'contacto':
			
			echo $data['post_contenido'];

			getTemplate('contact-form');

			break;

		case 'licencias-de-conducir':
			
			echo $data['post_contenido'];

			?>
			<iframe src="http://citymis.co/web/adds/vicentelopez/turnoslicencias/index.php" width="100%" height="1500" frameborder="0" allowfullscreen="allowfullscreen"></iframe>

			<?php

			break;
		
		case 'boletin-municipal':
			
			echo $data['post_contenido'];

			

			break;

		default:

			echo $data['post_contenido'];

			break;


	} ?>

</div>