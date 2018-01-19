<?php
/*
 * delete file
 * Since 2.0
*/
require_once('../functions.php');

if( isAjax() ) {
 		$connection = connectDB();
 		$tabla = 'boletines';
 		$id = $_POST['boletin_id'];
 		$boletin_text = $_POST['boletin_text'];
 		$boletin_date = $_POST['boletin_date'];
 		$boletin_number = $_POST['boletin_number'];

	    $query = "UPDATE ".$tabla." SET boletin_text='".$boletin_text."', boletin_date='".$boletin_date."', boletin_number='".$boletin_number."' WHERE boletin_id='".$id."' LIMIT 1";
		
		$result = mysqli_query($connection, $query);
   
		if ($result) {
			echo 'saved';
	   	} else {
	   		echo 'error';
	   	}
	
	
	mysqli_close($connection);

} else{
	//sino es peticion ajax
    throw new Exception("Error Processing Request", 1);   
}