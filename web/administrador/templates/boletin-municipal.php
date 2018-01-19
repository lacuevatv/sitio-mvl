<?php
/*
 * para modificar el menú del footer
 * 
 * Since 3.0
 * 
*/
global $userStatus;
if ($userStatus != '0' && $userStatus != '1' ) {
    echo 'No tiene permisos para ver esta sección';
    
    exit;
}
load_module( 'boletines' );

?>
<!---------- noticias ---------------->
<div class="contenido-modulo">
    <h1 class="titulo-modulo">
        Boletín Municipal
    </h1>
	
    <div class="container">

        <div class="row">
            <div class="col">
                <button id="new-boletin" class="btn btn-danger">Agregar nuevo</button>
            </div>
        </div>

        <div class="row">
            <!-- col -->
            <div class="col">
                <ul class="list-boletines">
                    <?php
                     
                        $boletines = listaBoletines ( 20 );

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

                        <?php }//for ?>
                </ul>
            </div><!-- //col -->
        </div><!-- //row -->


        <div class="row">
            <div class="col">
                <button id="more-boletines" class="btn btn-primary">Ver más</button>
                <p class="loading-news-ajax"></p>
            </div>
        </div>

    </div><!-- // container -->

</div><!-- // contenido-modulo -->
<div id="dialog"></div>
<!-- botones del modulo -->
<footer class="footer-modulo container">
    <a type="button" href="index.php" class="btn">Volver al inicio</a>
</footer>

<!---------- fin noticias ---------------->