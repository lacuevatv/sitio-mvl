<?php
// BASE DE DATOS
define('DB_SERVER', 'localhost');
define('DB_USER', 'dbuser');
define('DB_PASS', '123');
define('DB_NAME', 'mvl_bd');
//CARPETAS
define ( 'TEMPLATEDIR', dirname( __FILE__ ) . '/../templates' );
define ( 'MODULOSDIR', dirname( __FILE__ ) . '/modulos' );
define ( 'UPLOADS', dirname( __FILE__ ) . '/../../contenido' );
define ( 'UPLOADSIMAGES', dirname( __FILE__ ) . '/../../contenido' );
define ( 'UPLOADSFILES', dirname( __FILE__ ) . '/../../contenido/archivos' );
//URL
define ('MAINURL', 'http://' . $_SERVER['HTTP_HOST'] );
define ('UPLOADSURL', MAINURL . '/contenido');
define ('UPLOADSURLIMAGES', MAINURL . '/contenido');
define ('UPLOADSURLFILES', MAINURL . '/contenido/archivos');

//DEFINICIONES HEAD Y SCRIPTS
define ( 'SITENAME', 'Municipio Vicente Lopez' );
define ( 'DATEPUBLISHED', '2017');
define ('LOGOSITE' , MAINURL . '/administrador/assets/images/logosite.png');
define ( 'SITETITLE', 'MVL - Panel de control' );
define ( 'FAVICONICO', MAINURL . '/favicon.ico' );

//variables de definicion de administrador
global $categorias;
$categorias = array(
	array( 'slug' => 'agenda', 'nombre' => 'Agenda'),
	array( 'slug' => 'tramites', 'nombre' => 'Trámites y Servicios'),
	array( 'slug' => 'gestion', 'nombre' => 'Gestión'),
	array( 'slug' => 'empleo', 'nombre' => 'Bolsa de Empleo'),
	array( 'slug' => 'telefonos', 'nombre' => 'Teléfonos'),
);
