<?php
/*
 * delete file
 * Since 2.0
*/
require_once('../functions.php');

if( isAjax() ) {
 		$connection     = connectDB();

 		$id = $_POST['boletin_id'];

	    $query = "DELETE FROM boletines WHERE boletin_id= '".$id."'";
		
	    $result = mysqli_query($connection, $query); 
	    
	       if ($result) {
	    		echo 'elemento borrado';
	       } else {
	       		echo 'error de borrado';
	       }
	
	
	mysqli_close($connection);

} else{
	//sino es peticion ajax
    throw new Exception("Error Processing Request", 1);   
}