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

$videos = getVideosAdmin();
$video1 = explode('=', $videos['video1']);
$video2 = explode('=', $videos['video2']);

$video1 = isset($video1[1]) ? $video1[1] : '';
$video2 = isset($video2[1]) ? $video2[1] : '';

?>
<!---------- noticias ---------------->
<div class="contenido-modulo">
    <h1 class="titulo-modulo">
        Administrar Videos
    </h1>
	<div class="container">
    	<div class="row">
            <div class="col">
                <div class="error-tag"></div>
            </div>
        </div>

        <div class="row">
            <div class="col-50">
            <?php if ( $video1 != '') : ?>
                <iframe width="100%" height="315" src="https://www.youtube.com/embed/<?php echo $video1; ?>?rel=0" frameborder="0" allowfullscreen></iframe>

            <?php else : ?>
                <img src="<?php echo URLADMINISTRADOR; ?>/assets/images/videodefault.png" alt="no hay video" class="image-responsive image-temp">
            <?php endif; ?>

                <div class="form-group">
                    <label>Url Video 1:</label>
                    <input type="url" name="video_1" value="<?php echo $videos['video1']; ?>" class="video-url-input">
                </div>
            </div>

            <div class="col-50">
            <?php if ( $video2 != '') : ?>
                <iframe width="100%" height="315" src="https://www.youtube.com/embed/<?php echo $video2; ?>?rel=0" frameborder="0" allowfullscreen></iframe>
            <?php else : ?>
                <img src="<?php echo URLADMINISTRADOR; ?>/assets/images/videodefault.png" alt="no hay video" class="image-responsive image-temp">
            <?php endif; ?>
                <div class="form-group">
                    <label>Url Video 2:</label>
                    <input type="url" name="video_2" value="<?php echo $videos['video2']; ?>" class="video-url-input">
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <p>
                    <small>* Copie y pegue el links de Youtube.</small>
                </p>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col">
                <div class="form-group save-button-right">
                    <button type="submit" class="btn btn-primary btn-save-videos">Guardar Cambios</button>

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