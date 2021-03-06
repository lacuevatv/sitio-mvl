<?php
/*
 * editor
 * Since 3.0
 * Maneja el backend del editor de noticias, ya sea para una nueva noticia o editar alguna
*/
session_start();
require_once('../functions.php');
if ( isAjax() ) {

	//se toman los datos para variables
	$connection          = connectDB();
	$tabla               = 'noticias';
	$user                = $_SESSION['user_id'];
	$postID              = isset( $_POST['post_ID'] ) ? $_POST['post_ID'] : '';
	$newPost             = isset( $_POST['new_post'] ) ? $_POST['new_post'] : '';
	$postType            = isset( $_POST['post_type'] ) ? $_POST['post_type'] : 'post';
	$postTitulo          = isset( $_POST['post_title'] ) ? $_POST['post_title'] : '';
	$postCategoria       = isset( $_POST['post_categoria'] ) ? $_POST['post_categoria'] : '';
	$postUrl             = isset( $_POST['post_url'] ) ? $_POST['post_url'] : 'none';
	$postStatus          = isset( $_POST['post_status'] ) ? $_POST['post_status'] : 'none';
	$postDate            = isset( $_POST['post_date'] ) ? $_POST['post_date'] : 'none';
	$postResumen         = isset( $_POST['post_resumen'] ) ? $_POST['post_resumen'] : 'none';
	$postContenido       = isset( $_POST['post_contenido'] ) ? $_POST['post_contenido'] : 'none';
	$postImagen          = isset( $_POST['post_imagen'] ) ? $_POST['post_imagen'] : 'none';
	$postVideo           = isset( $_POST['post_video'] ) ? $_POST['post_video'] : 'none';
	$postGaleria         = isset( $_POST['post_galeria'] ) ? $_POST['post_galeria'] : '0';//si es true hay que pasarlo a 1 para que se guarde correctamente
	$imgGaleria          = isset( $_POST['imgGaleria'] ) ? $_POST['imgGaleria'] : '';
	$linkExterno         = isset( $_POST['post_link_externo'] ) ? $_POST['post_link_externo'] : '';
	$agendaLugar         = isset( $_POST['post_lugar_agenda'] ) ? $_POST['post_lugar_agenda'] : '';
	$fechaAgenda         = isset( $_POST['post_fecha_agenda'] ) ? $_POST['post_fecha_agenda'] : '';
	$fechaAgendaOut      = isset( $_POST['post_fecha_agenda_out'] ) ? $_POST['post_fecha_agenda_out'] : '';

	if ( $fechaAgenda == '2015-02-21' || $fechaAgenda == '' || $fechaAgenda == '0000-00-00' ) {
		$fechaAgenda = 'none';
	} /*else {
		$fechaAgenda = "'".$fechaAgenda."'";//le agrego las comillas a mano para no tener problemas luego en el query con el null del mysql
	}*/

	if ( $fechaAgendaOut == '2015-02-21' || $fechaAgendaOut == '' || $fechaAgendaOut == '0000-00-00' ) {
		$fechaAgendaOut = 'none';
	} /*else {
		$fechaAgendaOut = "'".$fechaAgendaOut."'";//le agrego las comillas a mano para no tener problemas luego en el query con el null del mysql
	}*/
	
    //saneamiento
	$postResumen         = mysqli_real_escape_string($connection, $postResumen);
	$postContenido       = mysqli_real_escape_string($connection, $postContenido);
	$postTitulo          = mysqli_real_escape_string($connection, $postTitulo);
	$postResumen         = filter_var($postResumen,FILTER_SANITIZE_STRING);
	$postTitulo          = filter_var($postTitulo,FILTER_SANITIZE_STRING);

	//si hay una galería hay que armar un array con las imagenes y luego serializarlas
	if ( $postGaleria == 'true' ) {
		//en la base de datos se escribe como 1 y 0 así que traduzco a 1 y 0 para que se guarde correctamente
		$postGaleria = '1';
	}	else {
		//en la base de datos se escribe como 1 y 0 así que traduzco a 1 y 0 para que se guarde correctamente
		$postGaleria = '0';
	}
	if ( $imgGaleria != '' ) {
		$imagenesGaleria = explode(',', $imgGaleria );
		
		for ($i=0; $i < count($imagenesGaleria)-1; $i++) { 
			$imagenesGaleria[$i] = trim($imagenesGaleria[$i]);
		}
		
		$imagenesGaleria = serialize($imagenesGaleria);
	} else {
		$imagenesGaleria = '';
	}
	

/*
* GUARDAR POST
*/

	//es nuevo post
	if ($newPost == 'true') {
		//primero hay que ver si el url no está tomado y si está tomado enviar un mensaje
		$query  = "SELECT * FROM " .$tabla. " WHERE post_url='".$postUrl."' ";
		$result = mysqli_query($connection, $query);
		if ( $result->num_rows != 0 ) {
			echo 'error-url';
			exit;
		}


		$query = "INSERT INTO $tabla (post_autor,post_fecha,post_titulo,post_url,post_contenido,post_resumen,post_imagen,post_video,post_categoria,post_galeria,post_imagenesGal,post_link_externo,post_fecha_agenda,post_fecha_agenda_out,post_agenda_lugar,post_status,post_type) VALUES ('$user', '$postDate', '$postTitulo', '$postUrl', '$postContenido', '$postResumen', '$postImagen', '$postVideo', '$postCategoria', '$postGaleria', '$imagenesGaleria', '$linkExterno', ";//continua debajo

		//este arreglo es porque no toma el null bien mysql
		if ( $fechaAgenda == 'none' ) {
				
			$query .= "NULL, ";
		} else {
			$query .= "'".$fechaAgenda."',";
		}

		if ( $fechaAgendaOut == 'none' ) {
				
			$query .= "NULL, ";
		} else {
			$query .= "'".$fechaAgendaOut."',";
		}

		//termina el query anterior
		$query .=  "'$agendaLugar','$postStatus','$postType')";

		$nuevoPost = mysqli_query($connection, $query); 
		$postID = mysqli_insert_id($connection);

		echo 'saved';

	} //es viejo post
		else {

		$query = "UPDATE ".$tabla." SET post_autor='".$user."',post_fecha='".$postDate."', post_titulo='".$postTitulo."',post_url='".$postUrl."',post_contenido='".$postContenido."',post_resumen='".$postResumen."',post_imagen='".$postImagen."',post_video='".$postVideo."',post_categoria='".$postCategoria."',post_galeria='".$postGaleria."',post_imagenesGal='".$imagenesGaleria."',post_link_externo='".$linkExterno."',";

		//agregado para que el null se inserte correctamente
		if ( $fechaAgenda == 'none' ) {
				
			$query .= "post_fecha_agenda=NULL,";
		} else {
			$query .= "post_fecha_agenda='".$fechaAgenda."',";
		}

		if ( $fechaAgendaOut == 'none' ) {
				
			$query .= "post_fecha_agenda_out=NULL,";
		} else {
			$query .= "post_fecha_agenda_out='".$fechaAgendaOut."',";
		}

		//continua el query
		$query .=  "post_agenda_lugar='".$agendaLugar."', post_status='".$postStatus."', post_type='".$postType."' WHERE post_ID='".$postID."' LIMIT 1";

		$updatePost = mysqli_query($connection, $query); 
		
		echo 'updated';
		
	}

//cierre base de datos
mysqli_close($connection);


} //if not ajax
else {
	exit;
}