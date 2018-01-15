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

$menuColumna1 = getMenuAdmin( 'columnaA' );
$menuColumna2 = getMenuAdmin( 'columnaB' );
$menuColumna3 = getMenuAdmin( 'columnaC' );
$menuColumna4 = getMenuAdmin( 'columnaD' );

$menuColumna1 = unserialize($menuColumna1['options_note']);
$menuColumna2 = unserialize($menuColumna2['options_note']);
$menuColumna3 = unserialize($menuColumna3['options_note']);
$menuColumna4 = unserialize($menuColumna4['options_note']);

?>
<!---------- noticias ---------------->
<div class="contenido-modulo">
    <h1 class="titulo-modulo">
        Menú footer
    </h1>
	<div class="container">
    	<div class="row">
            <div class="col">
                <div class="error-tag"></div>
            </div>
        </div>
        <ul id="footer-menu-wrapper" class="row row-same-height">

        <!-- COLUMNA -->
            <li class="col-20 column-wrapper" data-columna-orden="<?php echo $menuColumna1['orden']; ?>">
                <h2>Columna <span class="number-column-data"><?php echo $menuColumna1['orden']; ?></span></h2>

                <div class="form-group">    
                    <label for="">Titulo Columna:</label>
                    <input type="text" name="columna_1_titulo" value="<?php echo $menuColumna1['titulo']; ?>">
                </div>

                <ol class="links-footer">
                    <button class="btn btn-danger btn-sm btn-new-link">Nuevo link</button>
                    
                    <?php
                        if (isset( $menuColumna1['links']) ) {
                            $links = $menuColumna1['links'];
                            for ($i=0; $i < count($links); $i++) { ?>
                                <li>
                                    <a href="<?php echo $links[$i]['url'] ?>" target="_blank">
                                        <input type="hidden" name="link_texto" value="<?php echo $links[$i]['texto'] ?>" class="link-texto">
                                        <input type="hidden" name="link_url" value="<?php echo $links[$i]['url'] ?>" class="link-url">
                                        <?php echo $links[$i]['texto'] ?>
                                    </a>
                                    <button class="delete-link-btn"><span class="icon-del-link"></span></button>
                                </li>
                            <?php }
                        }
                    ?>

                </ol>
                
            </li>

        <!-- COLUMNA -->
            <li class="col-20 column-wrapper" data-columna-orden="<?php echo $menuColumna2['orden']; ?>">
                <h2>Columna <span class="number-column-data"><?php echo $menuColumna2['orden']; ?></span></h2>

                <div class="form-group">    
                    <label for="">Titulo Columna:</label>
                    <input type="text" name="columna_2_titulo" value="<?php echo $menuColumna2['titulo']; ?>">
                </div>

                <ol class="links-footer">
                    <button class="btn btn-danger btn-sm btn-new-link">Nuevo link</button>
                    
                    <?php
                        if (isset( $menuColumna2['links']) ) {
                            $links = $menuColumna2['links'];
                            for ($i=0; $i < count($links); $i++) { ?>
                                <li>
                                    <a href="<?php echo $links[$i]['url'] ?>" target="_blank">
                                        <input type="hidden" name="link_texto" value="<?php echo $links[$i]['texto'] ?>" class="link-texto">
                                        <input type="hidden" name="link_url" value="<?php echo $links[$i]['url'] ?>" class="link-url">
                                        <?php echo $links[$i]['texto'] ?>
                                    </a>
                                    <button class="delete-link-btn"><span class="icon-del-link"></span></button>
                                </li>
                            <?php }
                        }
                    ?>

                </ol>
                
            </li>

        <!-- COLUMNA -->
            <li class="col-20 column-wrapper" data-columna-orden="<?php echo $menuColumna3['orden']; ?>">
                <h2>Columna <span class="number-column-data"><?php echo $menuColumna3['orden']; ?></span></h2>

                <div class="form-group">    
                    <label for="">Titulo Columna:</label>
                    <input type="text" name="columna_3_titulo" value="<?php echo $menuColumna3['titulo']; ?>">
                </div>

                <ol class="links-footer">
                    <button class="btn btn-danger btn-sm btn-new-link">Nuevo link</button>
                    
                    <?php
                        if (isset( $menuColumna3['links']) ) {
                            $links = $menuColumna3['links'];
                            for ($i=0; $i < count($links); $i++) { ?>
                                <li>
                                    <a href="<?php echo $links[$i]['url'] ?>" target="_blank">
                                        <input type="hidden" name="link_texto" value="<?php echo $links[$i]['texto'] ?>" class="link-texto">
                                        <input type="hidden" name="link_url" value="<?php echo $links[$i]['url'] ?>" class="link-url">
                                        <?php echo $links[$i]['texto'] ?>
                                    </a>
                                    <button class="delete-link-btn"><span class="icon-del-link"></span></button>
                                </li>
                            <?php }
                        }
                    ?>

                </ol>
                
            </li>

        <!-- COLUMNA -->
            <li class="col-20 column-wrapper" data-columna-orden="<?php echo $menuColumna4['orden']; ?>">
                <h2>Columna <span class="number-column-data"><?php echo $menuColumna4['orden']; ?></span></h2>

                <div class="form-group">    
                    <label for="">Titulo Columna:</label>
                    <input type="text" name="columna_4_titulo" value="<?php echo $menuColumna4['titulo']; ?>">
                </div>

                <ol class="links-footer">
                    <button class="btn btn-danger btn-sm btn-new-link">Nuevo link</button>
                    
                    <?php
                        if (isset( $menuColumna4['links']) ) {
                            $links = $menuColumna4['links'];
                            for ($i=0; $i < count($links); $i++) { ?>
                                <li>
                                    <a href="<?php echo $links[$i]['url'] ?>" target="_blank">
                                        <input type="hidden" name="link_texto" value="<?php echo $links[$i]['texto'] ?>" class="link-texto">
                                        <input type="hidden" name="link_url" value="<?php echo $links[$i]['url'] ?>" class="link-url">
                                        <?php echo $links[$i]['texto'] ?>
                                    </a>
                                    <button class="delete-link-btn"><span class="icon-del-link"></span></button>
                                </li>
                            <?php }
                        }
                    ?>

                </ol>
                
            </li>           

		</ul>

        <p>
            <small>* Las columnas o los links se pueden ordenar moviéndolos.</small>
        </p>
        <hr>
        <div class="row">
            <div class="col">
                <div class="form-group save-button-right">
                    <button type="submit" class="btn btn-primary btn-save-footer">Guardar Cambios</button>

                </div>
            </div>
        </div>
		
	</div><!-- // container gral modulo -->
</div><!-- // container -->
<!-- botones del modulo -->
<footer class="footer-modulo container">
    <a type="button" href="index.php" class="btn">Volver al inicio</a>
</footer>

<!---------- fin noticias ---------------->