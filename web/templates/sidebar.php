<?php

	$loop = getPosts( 'agenda', POSTPERPAG );
?>

<div class="sidebar-wrapper">
	<h2 class="sidebar-title degradado-agenda-vertical ">
		Agenda
	</h2>
	
	<ul id="content-sidebar" class="sidebar-items">
		
<?php for ($i=0; $i < count($loop); $i++) { 
	$item = $loop[$i];
	?>

		<li>
		    <article class="sidebar-item">
		        <a href="/<?php echo $item['post_categoria'] .'/'. $item['post_url']; ?>/" title="<?php echo $item['post_titulo']; ?>">
		            <figure>
		                <?php if ( $item['post_imagen'] != '' ) { ?>
		                <img src="<?php echo UPLOADSURL .'/'. $item['post_imagen']; ?>" alt="<?php echo $item['post_categoria']; ?> - Municipio Vicente López">
		                <?php } else {?> 
		                <img src="<?php echo MAINSURL .'/assets/images/noticia-img-default.png'; ?>" alt="<?php echo $item['post_categoria']; ?> - Municipio Vicente López">
		                <?php } ?>
		            </figure>
		            <div class="data-post-sidebar">
		            <?php if ( $item['post_categoria'] == 'agenda' ) { 

		            $date1  = $item['post_fecha_agenda'];
		            $date2  = $item['post_fecha_agenda_out'];
		            if ( $date2 != null ) {
		                if ( date("n", strtotime($date1)) == date("n", strtotime($date2)) ) {
		                    $fecha = date("j", strtotime($date1)) .'al'. date("j", strtotime($date2)) . '/'. date("n", strtotime($date2));
		                } else {
		                    $fecha = date("j", strtotime($date1)) .'/'. date("n", strtotime($date1)) .'<br>al'. date("j", strtotime($date2)) . '/'. date("n", strtotime($date2));
		                }
		            } else {
		                $fecha = date("j", strtotime($date1)) .'/'. date("n", strtotime($date1));
		            }
		            ?>
		                <p><?php echo $fecha; ?></p>
		            <?php } ?>
		                <h1><?php echo $item['post_titulo']; ?></h1>
		            </div>
		        </a>
		    </article>
		</li>
		
<?php }//for
?>
	
	</ul>
</div><!-- //.sidebar-wrapper -->