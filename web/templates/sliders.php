<?php 
//var_dump($data);

?>
<ul id="header-slider" class="header-slider owl-carousel owl-theme">

<?php for ($i=0; $i < count($data); $i++) { ?> 

	<li>
	    <img src="<?php echo UPLOADSURL .'/'. $data[$i]['slider_imagen']; ?>">
	</li>

<?php }//for ?>

</ul>