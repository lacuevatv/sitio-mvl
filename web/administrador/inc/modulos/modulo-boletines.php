<?php

function listaBoletines ( $number = -1 ) {
	$connection = connectDB();
	$tabla = 'boletines';
	
	//queries según parámetros
	$query  = "SELECT * FROM " .$tabla. " ORDER by boletin_number desc";

	if ( $number != -1 ) {
		$query  .=	" LIMIT " . $number . " ";
	}

	$result = mysqli_query($connection, $query);
	

	if ( $result->num_rows == 0 ) {
		return '<li class="container error-tag">Todavía no hay ninguno cargado</li>';
	} else {
		
		while ($row = $result->fetch_array()) {
				$boletines[] = $row;
		}//while

		
		return $boletines;
	}//else 

	closeDataBase($connection);
	
} //showSliderToEdit()

//recupera el último numero del boletin
function getBoletinNumber( ) {
	$boletines = listaBoletines( 1 );

	return $boletines[0]['boletin_number'] + 1;

}