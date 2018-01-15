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
	$columnas = isset($_POST['columnas']) ? $_POST['columnas'] : '';
	$columnaA = array();
	$columnaB = array();
	$columnaC = array();
	$columnaD = array();
	$tablas = 0;
	//columna a
	isset($columnas[0]['column-orden']) ? $columnaA['orden'] = $columnas[0]['column-orden'] : $columnaA['orden'] = '0';
	$titulo = isset($columnas[0]['column-title']) ? $columnas[0]['column-title'] : '';
	
	$columnaA['titulo'] = filter_var($titulo,FILTER_SANITIZE_STRING);
	
	//columna a links
	if ( isset($columnas[0]['links'] ) ) {
		$links = array();
		for ($i=0; $i < count($columnas[0]['links']); $i++) { 
			$link = array(
				'url' => filter_var($columnas[0]['links'][$i]['link-url'],FILTER_SANITIZE_URL),
				'texto' => filter_var($columnas[0]['links'][$i]['link-texto'],FILTER_SANITIZE_STRING),
			);

			array_push($links, $link);
		}

		$columnaA['links'] = $links;
		
	}


	//columna B
	isset($columnas[1]['column-orden']) ? $columnaB['orden'] = $columnas[1]['column-orden'] : $columnaB['orden'] = '0';
	$titulo = isset($columnas[1]['column-title']) ? $columnas[1]['column-title'] : '';
	
	$columnaB['titulo'] = filter_var($titulo,FILTER_SANITIZE_STRING);

	isset($columnas[1]['column-title']) ? $columnaB['titulo'] = $columnas[1]['column-title'] : $columnaB['titulo'] = '';
	//columna B links
	if ( isset($columnas[1]['links'] ) ) {
		$links = array();
		for ($i=0; $i < count($columnas[1]['links']); $i++) { 
			$link = array(
				'url' => filter_var($columnas[1]['links'][$i]['link-url'],FILTER_SANITIZE_URL),
				'texto' => filter_var($columnas[1]['links'][$i]['link-texto'],FILTER_SANITIZE_STRING),
			);

			array_push($links, $link);
		}

		$columnaB['links'] = $links;
		
	}


	//columna C
	isset($columnas[2]['column-orden']) ? $columnaC['orden'] = $columnas[2]['column-orden'] : $columnaC['orden'] = '0';
	$titulo = isset($columnas[2]['column-title']) ? $columnas[2]['column-title'] : '';
	
	$columnaC['titulo'] = filter_var($titulo,FILTER_SANITIZE_STRING);
	
	//columna C links
	if ( isset($columnas[2]['links'] ) ) {
		$links = array();
		for ($i=0; $i < count($columnas[2]['links']); $i++) { 
			$link = array(
				'url' => filter_var($columnas[2]['links'][$i]['link-url'],FILTER_SANITIZE_URL),
				'texto' => filter_var($columnas[2]['links'][$i]['link-texto'],FILTER_SANITIZE_STRING),
			);

			array_push($links, $link);
		}

		$columnaC['links'] = $links;
		
	}


	//columna D
	isset($columnas[3]['column-orden']) ? $columnaD['orden'] = $columnas[3]['column-orden'] : $columnaD['orden'] = '0';
	$titulo = isset($columnas[3]['column-title']) ? $columnas[3]['column-title'] : '';
	
	$columnaD['titulo'] = filter_var($titulo,FILTER_SANITIZE_STRING);
	
	//columna D links
	if ( isset($columnas[3]['links'] ) ) {
		$links = array();
		for ($i=0; $i < count($columnas[3]['links']); $i++) { 
			$link = array(
				'url' => filter_var($columnas[3]['links'][$i]['link-url'],FILTER_SANITIZE_URL),
				'texto' => filter_var($columnas[3]['links'][$i]['link-texto'],FILTER_SANITIZE_STRING),
			);

			array_push($links, $link);
		}

		$columnaD['links'] = $links;
		
	}
	
	/*
	 * actualizamos base de datos en tabla options, 
	 * en options_name va los nombres de las columnas
	 * en options_value el orden
	 * en options note van los links serializados y el título
	*/

	$columnaASerialize = serialize($columnaA);

	$queryTablaA = "UPDATE ".$tabla." SET options_value = '".$columnaA['orden']."', options_note='".$columnaASerialize."' WHERE options_name = 'columnaA'";	

	$updateTablaA = mysqli_query($connection, $queryTablaA);
	if ( $updateTablaA ) {
		$tablas = $tablas+1;
	}

	$columnaBSerialize = serialize($columnaB);

	$queryTablaB = "UPDATE ".$tabla." SET options_value = '".$columnaB['orden']."', options_note='".$columnaBSerialize."' WHERE options_name = 'columnaB'";	

	$updateTablaB = mysqli_query($connection, $queryTablaB);
	if ( $updateTablaB ) {
		$tablas = $tablas+1;
	}

	$columnaCSerialize = serialize($columnaC);

	$queryTablaC = "UPDATE ".$tabla." SET options_value = '".$columnaC['orden']."', options_note='".$columnaCSerialize."' WHERE options_name = 'columnaC'";	

	$updateTablaC = mysqli_query($connection, $queryTablaC);
	if ( $updateTablaC ) {
		$tablas = $tablas+1;
	}

	$columnaDSerialize = serialize($columnaD);

	$queryTablaD = "UPDATE ".$tabla." SET options_value = '".$columnaD['orden']."', options_note='".$columnaDSerialize."' WHERE options_name = 'columnaD'";	

	$updateTablaD = mysqli_query($connection, $queryTablaD);
	if ( $updateTablaD ) {
		$tablas = $tablas+1;
	}

	echo $tablas;

	isset($connection) ? mysqli_close($connection) : exit;
	

} else{
    throw new Exception("Error Processing Request", 1);   
}