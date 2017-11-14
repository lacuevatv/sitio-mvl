<?php
/*
 * Sitio web: MVL
 * @LaCueva.tv
 * Since 1.0
 * HEADER
*/

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title><?php echo SITETITLE; ?></title>

<!--favicon-->
    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
    <link rel="manifest" href="/manifest.json">
    <link rel="mask-icon" href="/safari-pinned-tab.svg" color="#5bbad5">
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
<!-- <link href="inc/lib/owl/assets/owl.theme.default.css" rel="stylesheet">-->
<!-- Custom CSS -->
    <link href="<?php echo MAINSURL; ?>/assets/css/style.css?<?php echo VERSION; ?>" rel="stylesheet">

<!--- modernizr -->
<script src="<?php echo MAINSURL; ?>/assets/js/modernizr-custom.js"></script>

</head>
<body>
<div class="wrapper-site">
<!--- header ---------------------->
    <header class="header-site">
    
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
                        <a href="<?php echo MAINSURL; ?>" title="inicio">
                            inicio
                        </a>
                    </li>
                    <li role="menuitem">
                        <a href="/vicente-lopez/" title="Vicente Lopez">
                            Vicente&nbsp;Lopez
                        </a>
                    </li>
                    <li role="menuitem">
                        <a href="/agenda/" title="Agenda">
                            Agenda
                        </a>
                    </li>
                    <li role="menuitem">
                        <a href="/tramites-servicios/" title="Trámites y servicios">
                            Trámites&nbsp;y&nbsp;servicios
                        </a>
                    </li>
                    <li role="menuitem">
                        <a href="/gestion/" title="Gestión">
                            Gestión
                        </a>
                    </li>
                    <li role="menuitem">
                        <a href="/empleo/" title="Bolsa de empleo">
                            Bolsa&nbsp;de&nbsp;empleo
                        </a>
                    </li>
                    <li role="menuitem">
                        <a href="/telefonos/" title="Teléfonos">
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