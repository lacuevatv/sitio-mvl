<?php
/*
 * Subir varias imagenes o una sola
 * Since 2.0
*/

require_once('../functions.php');
require_once('../modulos/modulo-medios.php');
require_once('../modulos/modulo-boletines.php');

/*
	funcion principal, si es ajax se ejecuta sino se cancela
*/

//chequea si es peticion de ajax y ejecuta la funcion
if( isAjax() ) {

 	
	//variables principales
	$directorioFiles  = UPLOADSFILES;
	$connection       = connectDB();
	$tabla            = 'boletines';
	$archivos         = $_FILES['file'];
	
	//recorrer cada uno de los archivos a subir
	for ( $i = 0; $i < count( $archivos['name'] ); $i++ ) {
		
		//identificar tipo de archivo
		if ( strpos($archivos['type'][$i], "pdf") ) {
	 		//renombrar archivo
	 		
	 		

	 		$extension = explode(".", $archivos['name'][$i] );
			$boletinNumero = getBoletinNumber();
			$newFile =  'boletin-municipal-' . $boletinNumero . '.' . end($extension);
	 		$fechaActual = date("Y-m-d");
            $fechaFormat = date("d/m/Y");

	 		$texto = 'Boletín Municipal Nº ' . $boletinNumero . ' - '. $fechaFormat;

	 		//mover archivo
	 		if ($newFile && move_uploaded_file($archivos['tmp_name'][$i], $directorioFiles . '/' . $newFile)) {
	 			//si se movio al directorio ahora lo subimos a la base de datos
	 			
	 			$query = "INSERT INTO " .$tabla. " (boletin_text,boletin_file,boletin_date,boletin_number) VALUES ('".$texto."','".$newFile."','".$fechaActual."','".$boletinNumero."')";
			       
				//guardar archivo en base de datos
				$create = mysqli_query($connection, $query); 
	 			
	 			

	 		}

	 	} else{
	 		if ( $archivos['error'][$i] == 1) {
				echo 'big';
	 		} else {
	 			echo 'error-type';
	 		}
	 		return;
	 	}	

 	}//for

	//devuelvo un json con todas las imágenes subidas

//sino es peticion ajax se cancela
} else{
    throw new Exception("Error Processing Request", 1);   
}