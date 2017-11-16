<ul id="single-slider" class="single-slider owl-carousel owl-theme">

<?php for ($i=0; $i < count($data); $i++) { ?> 

	<li>
	    <img src="<?php echo UPLOADSURL .'/'. $data[$i]; ?>">
	</li>

<?php }//for ?>

</ul>