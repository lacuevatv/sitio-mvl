<?php
/*
 * Subir varias imagenes o una sola
 * Since 2.0
*/

require_once('../functions.php');

/*
	funcion principal, si es ajax se ejecuta sino se cancela
*/

//chequea si es peticion de ajax y ejecuta la funcion
if( isAjax() ) {
	$connection = connectDB();
	$tabla = 'options';
	

	$videos = array(
		'video1' => filter_var($_POST['video1'],FILTER_SANITIZE_URL),
		'video2' => filter_var($_POST['video2'],FILTER_SANITIZE_URL),
	);

	$urlbasica = 'https://www.youtube.com/watch?v=';

	if ( $videos['video1'] != '' && strpos($videos['video1'], '=') === false ) {
		$videos['video1'] = $urlbasica . explode('/',$videos['video1'])[3];
	}

	if ( $videos['video2'] != '' && strpos($videos['video2'], '=') === false ) {
		$videos['video2'] = $urlbasica . explode('/',$videos['video2'])[3];
	}

	$videos = serialize($videos);
	
	$queryVideo = "UPDATE ".$tabla." SET options_note='".$videos."' WHERE options_name = 'videos_inicio'";	

	$update = mysqli_query($connection, $queryVideo);
	if ( $update ) {
		echo 'Videos guardados correctamente';
	} else {
		echo 'Hubo un error, intente más adelante';
	}


	isset($connection) ? mysqli_close($connection) : exit;

} else{
    throw new Exception("Error Processing Request", 1);   
}