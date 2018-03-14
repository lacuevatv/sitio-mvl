<?php
/*
 * Sitio web: MVL
 * @LaCueva.tv
 * Since 1.0
 * PAGE TEMPLATE: PAGINA INICIO
 * Esta pagina tiene un diseño especial y no es loop ni single. La mayoría del contenido es estático haciendo distintas consultas a la base de datos para mostrar distintos loops
*/
include 'header.php';
$videos = getVideosFooter();
$video1 = explode('=', $videos['video1']);
$video2 = explode('=', $videos['video2']);

$video1 = isset($video1[1]) ? $video1[1] : '';
$video2 = isset($video2[1]) ? $video2[1] : '';
?>
<!--- .inner-wrapper: contenido principal y específico del template -->
<div class="inner-wrapper">
    <!-- HEADER -->
    <header class="home-header">
        
    <!-- buscar -->
        <div class="wrapper-buscar">
            <form action="<?php echo MAINSURL ?>/buscar/" method="POST">
                <input type="text" name="buscar" id="buscar" placeholder="buscar">
                <input type="submit"><span class="icon-submit-search"></span>
            </form>
        </div>

    <!-- slider -->
        <div class="header-slider-wrapper">
            
                <?php getSliders( 'home' ); ?>
                
        </div>

    <!-- título SEO -->
        <h1>Vivamos Vicente Lopez</h1>
    </header>

    <!-- AGENDA -->
    <section>
        <div class="home-section-wrapper">
            <h2 class="degradado-agenda">
                Agenda
            </h2>

            <div class="home-section-content-wrapper">
                
                <ul id="content-agenda" class="home-section-content owl-carousel owl-theme">
                    <?php

                    $loop = getPosts( 'agenda' );

                    getTemplate( 'inicio-loop-link-inside', $loop );
                        
                    ?>
                </ul>
            </div>
        </div>
    </section>

    <!-- TRAMITES Y SERVICIOS -->
    <section>
        <div class="home-section-wrapper">
            <h2 class="section-title-verde">
                <?php 
                if ( dispositivo () != 'pc' ) {
                    echo 'Trámites y Servicios';
                } else {
                    echo 'Trámites y<br> Servicios';
                }
                ?>
            </h2>

            <div class="home-section-content-wrapper">
                
                <ul id="content-tramites" class="home-section-content owl-carousel owl-theme">
                    <?php

                    $loop = getPosts( 'tramites-servicios' );

                    getTemplate( 'inicio-loop-link-outside', $loop );
                        
                    ?>
                </ul>
            </div>
        </div>
    </section>

    <!-- GESTIÓN -->
    <section>
        <div class="home-section-wrapper">
            <h2 class="section-title-azul degadado-gestion">
                Gestión
            </h2>

            <div class="home-section-content-wrapper">
                
                <ul id="content-gestion" class="home-section-content owl-carousel owl-theme">
                   <?php

                    $loop = getPosts( 'gestion' );

                    getTemplate( 'inicio-loop-link-inside', $loop );
                        
                    ?>
                </ul>
            </div>
        </div>
    </section>

    <!-- EDUCACION -->
    <section>
        <div class="home-section-wrapper">
            <h2 class="section-title-naranja degradado-educacion">
                Educación
            </h2>

            <div class="home-section-content-wrapper">
                
                <ul id="content-educacion" class="home-section-content owl-carousel owl-theme">
                   <?php

                    $loop = getPosts( 'educacion' );

                    getTemplate( 'inicio-loop-link-outside', $loop );
                        
                    ?>
                </ul>
            </div>
        </div>
    </section>

    
    <div class="col-2-wrapper">
    
            <!-- AGENDA CULTURAL -->
        <section>
            <div class="home-section-wrapper">
                <h2 class="section-title-amarillo degradado-cultura">
                    <?php 
                    if ( dispositivo () != 'pc' ) {
                        echo 'Agenda Cultural';
                    } else {
                        echo 'Agenda<br>Cultural';
                    }
                    ?>
                </h2>

                <div class="home-section-content-wrapper">
                    
                    <ul id="content-cultura" class="home-section-content owl-carousel owl-theme">
                        <?php

                        $loop = getPosts( 'cultura' );

                        getTemplate( 'inicio-loop-link-outside', $loop );
                            
                        ?>
                    </ul>
                </div>
            </div>
        </section>

        <!-- SALUD -->
        <section>
            <div class="home-section-wrapper">
                <h2 class="section-title-azul degradado-salud">
                    Salud
                </h2>

                <div class="home-section-content-wrapper">
                    
                    <ul id="content-salud" class="home-section-content owl-carousel owl-theme">
                        <?php

                        $loop = getPosts( 'salud' );

                        getTemplate( 'inicio-loop-link-outside', $loop );

                        ?>
                    </ul>
                </div>
            </div>
        </section>

    </div><!-- //.col-2-wrapper -->

        <!-- TELEFONOS -->
    <section>  
        <div class="home-section-wrapper">
            <h2 class="section-title-rojo">
                Teléfonos
            </h2>

            <div class="home-section-content-wrapper">
                
                <ul id="content-telefonos" class="home-section-content owl-carousel owl-theme">
                    <?php

                    $loop = getPosts( 'telefonos' );

                    for ($i=0; $i < count($loop); $i++) { 
                        $item = $loop[$i];
                        ?>

                    <li>
                        <article>
                            <a href="#" title="<?php echo $item['post_titulo']; ?>">
                                <img src="<?php echo UPLOADSURL .'/'. $item['post_imagen']; ?>" alt="Teléfonos - Municipio Vicente López" class="icon-content-circle">
                                <h4><?php echo $item['post_contenido']; ?></h4>
                                <h1>
                                    <?php echo $item['post_titulo']; ?>
                                </h1>
                            </a>
                        </article>
                    </li>
                    <?php } ?>
                </ul>
            </div>
        </div>
    </section>


    <footer class="home-footer">
        <div class="home-section-wrapper">
            
            <div class="home-section-content-wrapper">
                
                <ul id="content-links" class="home-section-content owl-carousel owl-theme">
                    <?php

                    $loop = getPosts( 'links-footer' );

                    getTemplate( 'inicio-loop-link-outside', $loop );

                    ?>
                </ul>
            </div>
        </div>
    </footer>
    

    <?php if ( $video1 != '' || $video2 != '' ) : ?>
        <aside class="wrapper-videos">
            <?php if ( $video1 != '') : ?>
            <iframe src="https://www.youtube.com/embed/<?php echo $video1; ?>?rel=0" frameborder="0" allowfullscreen></iframe>
            <?php endif; ?>

            <?php if ( $video2 != '') : ?>
            <iframe src="https://www.youtube.com/embed/<?php echo $video2; ?>?rel=0" frameborder="0" allowfullscreen></iframe>
            <?php endif; ?>
        </aside>

    <?php endif; ?>

</div><!--- //.inner-wrapper -->

<?php include 'footer.php'; ?>