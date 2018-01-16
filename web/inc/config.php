<?php 
/*
 * Sitio web: MVL
 * @LaCueva.tv
 * Since 1.0
 * CONFIG
 * Contenido: conneccion
*/
//BD
define('DB_SERVER', 'localhost');
define('DB_USER', 'dbuser');
define('DB_PASS', '123');
define('DB_NAME', 'mvl_bd');
//DEFINICIONES HEAD Y SCRIPTS
define ( 'VERSION', '1.0' );
//CARPETAS
define ( 'UPLOADS', dirname( __FILE__ ) . '/../contenido' );
define ( 'PAGESDIR', dirname( __FILE__ ) . '/../pages' );
define ( 'TEMPLATEDIR', dirname( __FILE__ ) . '/../templates' );
//urls
define ('CARPETASERVIDOR', '' );//esta variable se define si el sitio no está en el root del dominio y si está en una subcarpeta
define ('MAINSURL', 'http://' . $_SERVER['HTTP_HOST'] . CARPETASERVIDOR );
define ('UPLOADSURL', MAINSURL . '/contenido');
//META TAGS
define('SITETITLE', 'Municipio Vicente Lopez');
define('METADESCRIPTION', '');
define('METAKEYS', '');
//LINKS:
define('LINK_FACEBOOK', 'https://www.facebook.com/VivamosVL/');
define('LINK_INSTAGRAM', 'https://www.instagram.com/vivamosvl/');
define('LINK_TWITTER', 'https://twitter.com/VivamosVL');
define('LINK_FLICKR', '#');
define('LINK_YOUTUBE', 'https://www.youtube.com/channel/UCjcsomvElGuHkxPq6SKhhRw');

global $categorias;
$categorias = array(
	array( 'slug' => 'agenda', 'nombre' => 'Agenda'),
	array( 'slug' => 'tramites-servicios', 'nombre' => 'Trámites y Servicios'),
	array( 'slug' => 'gestion', 'nombre' => 'Gestión'),
	array( 'slug' => 'empleo', 'nombre' => 'Bolsa de Empleo'),
	array( 'slug' => 'telefonos', 'nombre' => 'Teléfonos'),
);

define('POSTPERPAG', '5');//indica al paginador cuantos se muestran por pagina para calcular el offset además de que el loop muestra solo esos
