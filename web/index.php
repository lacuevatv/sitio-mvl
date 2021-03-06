<?php
/*
 * Sitio web: MVL
 * @LaCueva.tv
 * Since 1.0
 *
*/
require_once 'inc/functions.php';

global $pageActual;
$pageActual = pageActual( cleanUri() );

//tres tipos de páginas, una loop (agenda, gestión, teléfonos, una single que tiene la noticia o el artículo específico, con o sin sidebar y la especial, como la página de inicio
if ( es_categoria( cleanUri() ) ) {
	getPage( 'loop' );
} else {
	
	switch ( $pageActual ) {
		case 'inicio':
			getPage( 'inicio' );
			break;
		case 'buscar':
			getPage( 'loop' );
		break;
		default:
			getPage( 'single' );
			break;
	}
}