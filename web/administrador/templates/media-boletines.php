<?php
/*
 * Archivo de imagenes / inserta imagen nueva
 * versión reducida para el editor TinyMCE
 * Since 3.0
 * 
*/
require_once("../inc/functions.php");
load_module( 'medios' );

?>

<article>
	<div class="container">

		<div id="tabs">
  			
			<div id="upload">
			  	<div class="container">
			    	<h3>Subir nuevo medio:</h3>	
					<p class="text-aclaracion">Archivo pdf.</p>
			    	
		    		<div class="load-ajax"></div>
		    		<form id="upload_boletin" name="upload_boletin">
		    			
	    				<div class="row">
		    				<div class="col-50-sm">
					    		<div class="form-group">
				    				<label for="file"></label>
				    				<input type="file" name="file[]" id="file" required multiple>
				    			</div>
		    				</div>
		    				<div class="col-50-sm">
			    				<div class="preview-wrapper">
			    					
			    				</div>
		    				</div>
	    				</div>
		    			
		    			<div class="form-group">
		    				<input type="submit" value="subir archivo" class="btn">
		    			</div>
		    		</form>
			    	<ul class="new-image-loaded"></ul>
			    </div>
			</div>
			
		</div>
	</div><!-- //.container-fluid -->
</article>

<script src="assets/js/modulo-medios.js"></script>