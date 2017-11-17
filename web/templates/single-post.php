<?php

/*va con imagen, video o galeria*/
if ( $data['post_video'] != '' ) {
	$medioTemplate = 'video';
} elseif ( $data['post_galeria'] == '1' ) {
	$medioTemplate = 'galeria';
} else {
	$medioTemplate = 'default';
}

/*FECHAS*/
$meses = array('Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre');
$dias = array('Domingo','Lunes','Martes','Mi&eacute;rcoles','Jueves','Viernes','S&aacute;bado');

if ( $data['post_categoria'] == 'gestion' ) :
$date = $data['post_fecha'];
$fecha = date("j", strtotime($date)) .' de '. $meses[date("n", strtotime($date))-1];
endif;

if ( $data['post_categoria'] == 'agenda' ) :

$date1 = $data['post_fecha_agenda'];
$date2 = $data['post_fecha_agenda_out'];

	if ( $date2 != null ) {
	    if ( date("n", strtotime($date1)) == date("n", strtotime($date2)) ) {
	        $fecha = 'Del ' . date("j", strtotime($date1)) .' al '. date("j", strtotime($date2)) . ' de '. $meses[date("n", strtotime($date2))-1];
	    } else {
	        $fecha = 'Del ' . date("j", strtotime($date1)) .' de '. $meses[date("n", strtotime($date1))-1] .' al '. date("j", strtotime($date2)) . ' de '. $meses[date("n", strtotime($date2))-1];
	    }
	} else {
	    $fecha = $dias[date("w", strtotime($date1))] .' '. date("j", strtotime($date1)) .' de '. $meses[date("n", strtotime($date1))-1];
	}

endif;
/*FIN FECHAS*/

?>

<div class="post-title-wrapper">
	<h1 class="single-post-title">
		<?php echo $data['post_titulo']; ?>
	</h1>
</div>


<div class="pre-date-wrapper">
	<h4 class="single-date">
	<?php if ( $fecha != '' ) {
		echo $fecha;
	} ?>
	</h4>

	<ul class="share-single">
		<?php getTemplate( 'social-menu' ); ?>
	</ul>
</div>


<!-- IMAGEN VIDEO O GALERIA -->
<?php
switch ($medioTemplate) {
	case 'video':
		$codigoVideo = explode('=', $data['post_video'] ); ?>
		<div class="wrapper-iframe-video">
			<iframe id="youtube-single-video" src="https://www.youtube.com/embed/<?php echo $codigoVideo[1]; ?>" frameborder="0" allowfullscreen width="100%" height="100%"></iframe>
		</div>
<?php break;
	
	case 'galeria': 
		$ImagenesGaleria = unserialize( $data['post_imagenesGal'] ); ?>
		<div class="galeria-single-wrapper">
		<?php getTemplate( 'sliders-imagenes-single', $ImagenesGaleria ); ?>
		</div>
<?php break;
	
	default:
		if ( $data['post_imagen'] != '' ) { ?>
	<figure class="single-post-image-wrapper">
		<img src="<?php echo UPLOADSURL . '/' . $data['post_imagen']; ?>"?>
	</figure>

<?php }
	break;

} ?>

<!-- CONTENIDO PRINCIPAL -->				
	<div class="single-content">
		<?php echo $data['post_contenido']; ?>
	</div>