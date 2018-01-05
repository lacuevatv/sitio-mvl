<?php 

?>
<ul id="header-slider" class="header-slider owl-carousel owl-theme">

<?php for ($i=0; $i < count($data); $i++) { 
		$caption = false;
	if ( $data[$i]['slider_titulo'] != '' || $data[$i]['slider_texto'] != '' ) {
		$caption = true;
	}

	?> 

	<li>
	    <img src="<?php echo UPLOADSURL .'/'. $data[$i]['slider_imagen']; ?>">

	<?php if ($caption) : ?>
	    <div class="caption">
	    	<a href="<?php echo $data[$i]['slider_link']; ?>" target="_blank">
		    	<h3>
			    	<?php echo $data[$i]['slider_titulo']; ?>
			    </h3>
			</a>
	    	<p>
	    		<?php echo $data[$i]['slider_texto']; ?>
	    	</p>
	    	<a href="<?php echo $data[$i]['slider_link']; ?>" target="_blank">
		    	<?php echo $data[$i]['slider_textoLink']; ?>
		    </a>
	    	
	    </div>
	<?php endif; ?>
	</li>

<?php }//for ?>

</ul>