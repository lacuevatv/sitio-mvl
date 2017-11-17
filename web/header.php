<?php
/*
 * Sitio web: MVL
 * @LaCueva.tv
 * Since 1.0
 * HEADER
*/
global $pageActual;
$activeMenuItem = ' class="active-page-menu"';

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title><?php echo SITETITLE; ?></title>

<!--favicon-->
    <link rel="apple-touch-icon" sizes="180x180" href="<?php echo MAINSURL; ?>/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="<?php echo MAINSURL; ?>/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo MAINSURL; ?>/favicon-16x16.png">
    <link rel="manifest" href="<?php echo MAINSURL; ?>/manifest.json">
    <link rel="mask-icon" href="<?php echo MAINSURL; ?>/safari-pinned-tab.svg" color="#5bbad5">
    <meta name="theme-color" content="#ffffff">

<!-- SEO SECCTION -->
    <meta name="keywords" content="<?php echo METAKEYS; ?>">
    <meta name="description" content="<?php echo METADESCRIPTION; ?>">
    <link rel="canonical" href="<?php echo MAINSURL; ?>" />
    <meta property="og:locale" content="es_ES" />
    <meta property="og:type" content="website" />
    <meta property="og:title" content="<?php echo SITETITLE; ?>" />
    <meta property="og:description" content="" />
    <meta property="og:url" content="<?php echo MAINSURL; ?>" />
    <meta property="og:site_name" content="<?php echo SITETITLE; ?>" />
    <meta property="og:image" content="" />
    <meta name="twitter:card" content="summary" />
    <meta name="twitter:description" content="<?php echo METADESCRIPTION; ?>" />
    <meta name="twitter:title" content="<?php echo SITETITLE; ?>" />
    <meta name="twitter:image" content="" />
<!-- // SEO SECCTION -->

<!-- OWL -->
<link href="<?php echo MAINSURL; ?>/inc/lib/owl/assets/owl.carousel.min.css" rel="stylesheet">
<!-- Custom CSS -->
    <link href="<?php echo MAINSURL; ?>/assets/css/style.css?<?php echo VERSION; ?>" rel="stylesheet">

<!--- modernizr -->
<script src="<?php echo MAINSURL; ?>/assets/js/modernizr-custom.js"></script>

</head>
<body>
<div class="wrapper-site">
<!--- header ---------------------->

    <header class="header-site" <?php if ( $pageActual != 'inicio' ) { echo 'style="border-bottom:1px solid #ececec;"'; } ?>>

        <nav class="header-nav" role="navigation">

            <button class="toggle_menu" role="button">
                <span class="sr-only">Menu</span>
            </button>

            <a href="<?php echo MAINSURL; ?>" title="" role="link" class="main-logo">
                <img src="<?php echo MAINSURL; ?>/assets/images/logo-color.png" alt="Municipio Vicente Lopez - Logo" class="image-responsive">
                <span class="sr-only">Vivamos Vicente López</span>
            </a>
            
            <div class="header-menus-wrapper">
            <!-- MAIN MENU -->
                <ul class="main-menu" role="menu">
                    <li role="menuitem">
                        <a href="<?php echo MAINSURL; ?>" title="inicio" <?php if ( $pageActual == 'inicio' ) { echo $activeMenuItem; } ?>>
                            inicio
                        </a>
                    </li>
                    <li role="menuitem">
                        <a href="<?php echo MAINSURL; ?>/vicente-lopez/" title="Vicente Lopez" <?php if ( $pageActual == 'vicente-lopez' ) { echo $activeMenuItem; } ?>>
                            Vicente&nbsp;Lopez
                        </a>
                    </li>
                    <li role="menuitem">
                        <a href="<?php echo MAINSURL; ?>/agenda/" title="Agenda" <?php if ( $pageActual == 'agenda' ) { echo $activeMenuItem; } ?>>
                            Agenda
                        </a>
                    </li>
                    <li role="menuitem">
                        <a href="<?php echo MAINSURL; ?>/tramites-servicios/" title="Trámites y servicios" <?php if ( $pageActual == 'tramites-servicios' ) { echo $activeMenuItem; } ?>>
                            Trámites&nbsp;y&nbsp;servicios
                        </a>
                    </li>
                    <li role="menuitem">
                        <a href="<?php echo MAINSURL; ?>/gestion/" title="Gestión" <?php if ( $pageActual == 'gestion' ) { echo $activeMenuItem; } ?>>
                            Gestión
                        </a>
                    </li>
                    <li role="menuitem">
                        <a href="<?php echo MAINSURL; ?>/empleo/" title="Bolsa de empleo" <?php if ( $pageActual == 'empleo' ) { echo $activeMenuItem; } ?>>
                            Bolsa&nbsp;de&nbsp;empleo
                        </a>
                    </li>
                    <li role="menuitem">
                        <a href="<?php echo MAINSURL; ?>/telefonos/" title="Teléfonos" <?php if ( $pageActual == 'telefonos' ) { echo $activeMenuItem; } ?>>
                            Teléfonos
                        </a>
                    </li>
                </ul>

            <!-- REDES SOCIALES -->
                <ul class="social-menu" role="menu">
                    
                    <?php getTemplate( 'social-menu' ) ?>

                </ul>

            </div><!-- //.header-menus-wrapper -->
        </nav>
        
    </header>

    <main role="main">
        <div class="main-wrapper">