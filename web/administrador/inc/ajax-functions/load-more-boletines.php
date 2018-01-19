<?php 
/*
 * Sitio web: ATSA
 * @LaCueva.tv
 * Since 3.0
 * carga mas noticias
*/
require '../functions.php';
$postPorPagina = 20;
$connection = connectDB();
$tabla = 'boletines';
$pageActual = isset( $_POST['page'] ) ? intval( $_POST['page'] ) : 2;

$query  = "SELECT *  FROM " .$tabla. " ORDER by boletin_number desc LIMIT ".( ($pageActual-1 )*$postPorPagina).", ".$postPorPagina." ";

$result = mysqli_query($connection, $query);
//print_r($connection);
if ( $result->num_rows == 0 ) {
	echo 'No hay más boletines para cargar';
} else {

	while ( $row = $result->fetch_array() ) {
		$boletines[] = $row;
	}

	for ($i=0; $i < count($boletines); $i++) { ?>
                            
        <li>
            <article>
                <div class="row">
                    <div class="col-50">
                        <div class="row">
                            <div class="col-40">
                                <label for="boletin_text">Texto:</label>
                                <input class="boletin_text" type="text" name="boletin_text" value="<?php echo $boletines[$i]['boletin_text']; ?>">
                                <a class="boletin-archivo" href="<?php echo UPLOADSURLFILES .'/' . $boletines[$i]['boletin_file']; ?>" target="_blank">
                                    Ver archivo
                                </a>
                            </div>

                            <div class="col-30">
                                <label for="boletin_text">Número:</label>
                                <input class="boletin_number" type="text" name="boletin_text" value="<?php echo $boletines[$i]['boletin_number']; ?>">
                            </div>
                            <div class="col-30">
                            
                                <label for="boletin_text">Fecha:</label>
                                <input class="boletin_date" name="boletin_date" type="date" value="<?php echo $boletines[$i]['boletin_date']; ?>">
                            </div>
                        </div>
                    </div>

                    <div class="col-30">
                        <button data-id="<?php echo $boletines[$i]['boletin_id']; ?>" class="btn btn-primary save-boletin-btn">
                            Guardar cambios
                        </button>
                        <button data-id="<?php echo $boletines[$i]['boletin_id']; ?>" class="btn btn-danger del-boletin-btn">
                            Borrar
                        </button>
                    </div>
                    <div class="col-20">
                        <span class="error-tag"></span>
                    </div>
                </div>
            </article>
        </li>

    <?php }//for

}//ELSE

closeDataBase( $connection );