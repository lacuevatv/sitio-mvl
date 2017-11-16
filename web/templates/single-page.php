

<!-- IMAGEN O GALERIA -->
<?php if ($data['post_imagen'] != '') { ?>
	<figure class="single-post-image-wrapper">
		<img src="<?php echo UPLOADSURL . '/' . $data['post_imagen']; ?>"?>
	</figure>
<?php } ?>

<!-- CONTENIDO PRINCIPAL -->				
<div class="single-content">
	<?php echo $data['post_contenido']; ?>
</div>
