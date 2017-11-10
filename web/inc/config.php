<?php 
/*
 * Sitio web: MVL
 * @LaCueva.tv
 * Since 1.0
 * CONFIG
 * Contenido: conneccion
*/
//DEFINICIONES HEAD Y SCRIPTS


//DEFINICIONES HEAD Y SCRIPTS
define ( 'VERSION', '1.0' );
//CARPETAS
define ( 'UPLOADS', dirname( __FILE__ ) . '/../contenido' );
define ('UPLOADSURL', 'http://' . $_SERVER['HTTP_HOST'] . '/contenido');
define ( 'TEMPLATEDIR', dirname( __FILE__ ) . '/../templates' );
//BD
define('DB_SERVER', 'localhost');
define('DB_USER', 'dbuser');
define('DB_PASS', '123');
define('DB_NAME', 'mvl_bd');
//META TAGS
define('SITETITLE', 'Municipio Vicente Lopez');
define('METADESCRIPTION', '');
define('METAKEYS', '');
//LINKS:
define('LINK_FACEBOOK', '#');
define('LINK_INSTAGRAM', '#');
define('LINK_TWITTER', '#');
define('LINK_FLICKR', '#');
define('LINK_YOUTUBE', '#');


/*
define ( 'VERSION', '1.0' );
//CARPETAS
define ( 'UPLOADS', dirname( __FILE__ ) . '/../contenido' );
define ('UPLOADSURL', 'http://' . $_SERVER['HTTP_HOST'] . '/mvl/contenido');
define ( 'TEMPLATEDIR', dirname( __FILE__ ) . '/../templates' );
//META TAGS
define('SITETITLE', 'Municipio Vicente Lopez');
define('METADESCRIPTION', '');
define('METAKEYS', '');
//LINKS:
define('LINK_FACEBOOK', '#');
define('LINK_INSTAGRAM', '#');
define('LINK_TWITTER', '#');
define('LINK_FLICKR', '#');
define('LINK_YOUTUBE', '#');
*/