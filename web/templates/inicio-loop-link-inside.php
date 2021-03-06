<?php 
//variable $data tiene el contenido de la query, fue pasada mediante la función get_template:
for ($i=0; $i < count($data); $i++) { 
$item  = $data[$i];

?>
<li>
    <article>
        <a href="<?php echo MAINSURL . '/' .  $item['post_categoria'] .'/'. $item['post_url']; ?>" title="<?php echo $item['post_titulo']; ?>">
            <figure>
                <?php if ( $item['post_imagen'] != '' ) { ?>
                <img src="<?php echo UPLOADSURL .'/'. $item['post_imagen']; ?>" alt="<?php echo $item['post_categoria']; ?> - Municipio Vicente López">
                <?php } else {?> 
                <img src="<?php echo MAINSURL .'/assets/images/noticia-img-default.png'; ?>" alt="<?php echo $item['post_categoria']; ?> - Municipio Vicente López">
                <?php } ?>
            </figure>
            <div class="data-agenda-content">
            <?php if ( $item['post_categoria'] == 'agenda' ) { 

            $date1  = $item['post_fecha_agenda'];
            $date2  = $item['post_fecha_agenda_out'];
            if ( $date2 != null ) {
                if ( date("n", strtotime($date1)) == date("n", strtotime($date2)) ) {
                    $fecha = date("j", strtotime($date1)) .'al'. date("j", strtotime($date2)) . '/'. date("n", strtotime($date2));
                } else {
                    $fecha = date("j", strtotime($date1)) .'/'. date("n", strtotime($date1)) .'<br>al'. date("j", strtotime($date2)) . '/'. date("n", strtotime($date2));
                }
            } else {
                $fecha = date("j", strtotime($date1)) .'/'. date("n", strtotime($date1));
            }
            ?>
                <p><?php echo $fecha; ?></p>
            <?php } ?>
                <h1><?php echo acortaTexto( $item['post_titulo'], 5 ); ?></h1>
            </div>
        </a>
    </article>
</li>
    
<?php }//for