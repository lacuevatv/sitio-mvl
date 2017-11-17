<?php
/*
 * Sitio web: MVL
 * @LaCueva.tv
 * Since 1.0
 * PAGE TEMPLATE: LOOP
 * Esta página muestra todos los loops buscando en la base de datos de acuerdo al pedido en el url: agenda, gestión, tramites, empleo, teléfonos y también los resultados de la búsqueda.

 3 TEMPLATES: sin sidebar (agenda) y con sidebar. Y luego las noticias, que tienen 5 post por defecto y los otros elementos que tienen imágenes más pequeñas y 10 elementos por defecto
*/

$categoria = ver_categoria( cleanUri() );//define la categoria
$postPerPag = POSTPERPAG;

switch ($categoria) {
	case 'agenda':
	case 'gestion':
		$loop = getPosts( $categoria, $postPerPag );
		break;
	
	case 'tramites-servicios':
	case 'telefonos':
	case 'empleo':
		$postPerPag = '10';
		$loop = getPosts( $categoria, $postPerPag );
		$pagination = getPagination( $categoria, $postPerPag );
		break;

	case 'none':
		$slugUrl = getPageVar( cleanUri() );//variante de la pagina
		if ( $slugUrl == 'buscar' ) {
			//si es búsqueda
			$titulo =  'Resultados de la búsqueda';
			$loop = 'BUSCAR';
			$postPerPag = '10';
		} else {
			//sino es nada, se tira error y título por defecto
			$titulo = SITETITLE;
			$loop = null;
		}
	break;
}




include 'header.php';

?>
<!--- .inner-wrapper: contenido principal y específico del template -->
<div class="inner-wrapper">
	
	<header class="page-header">
		<?php if ( $categoria != 'none' ) { ?>
		<h1 class="main-title-page" data-categoria="<?php echo $categoria; ?>">
			<?php echo getNameCategoria($categoria); ?>
		</h1>
		<?php } else { ?>
		<h1 class="main-title-page" data-categoria="buscar">
			<?php echo $titulo; ?>
		</h1>
		<?php } ?>
	</header>

	<div class="page-content-wrapper">

	<?php if ( $categoria != 'agenda' ) : ?>

		<aside class="sidebar">
			<?php getTemplate( 'sidebar' ); ?>
		</aside>

	<?php endif ?>
		
		<section class="main-content">

			<div class="posts-content-wrapper">
				<!--posts -->
				<ul class="posts-content">
					<div id="page1" class="pages-posts">
					<?php
						if ( $categoria == 'agenda' || $categoria == 'gestion' ) {
							//en caso de agenda y gestión muestra el loop de noticias
						 getTemplate( 'posts-loop', $loop );
						
						} elseif( $loop == null ) {
							//si no se encuentra nada
							getTemplate( '404' );
						} else {
							//finalmente el ultimo template, de otras categorias y busqueda
							if ( $loop != 'BUSCAR' ) {
								getTemplate( 'posts-loop-mini', $loop );
							} else {
								$busqueda = getSearch ($_POST['buscar'], $postPerPag );

								getTemplate( 'posts-loop-mini', $busqueda );
							}
						}
					?>
					</div>
				</ul>
			</div>
		    <footer class="page-footer pagination-wrapper">
		    	
    		<?php if ( $categoria != 'none' ) {
	    		getPagination( $categoria, $postPerPag );
	    	} 
	    	if ( $loop == 'BUSCAR' ) { 
	    		getPaginationSearch( $_POST['buscar'], $postPerPag );

	    		echo '<input type="hidden" name="busqueda" id="busqueda" value="'.$_POST['buscar'].'">';
	    	}
	    	?>

		    </footer>

		</section><!--- //.main-content -->
	</div><!--- //.page-content-wrapper -->
</div><!--- //.inner-wrapper -->

<?php include 'footer.php';