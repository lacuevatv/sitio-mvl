<?php
/*
 * Sitio web: MVL
 * @LaCueva.tv
 * Since 1.0
 * PAGE TEMPLATE: LOOP
 * Esta página muestra todos los loops buscando en la base de datos de acuerdo al pedido en el url: agenda, gestión, tramites, empleo, teléfonos
*/
$categoria = ver_categoria();//define la categoria
$loop = getPosts( $categoria, POSTPERPAG );
include 'header.php';

?>
<!--- .inner-wrapper: contenido principal y específico del template -->
<div class="inner-wrapper">
	<div class="page-content-wrapper">
	<?php if ( $categoria != 'agenda' ) : ?>

		<aside class="sidebar">
			<?php getTemplate( 'sidebar' ); ?>
		</aside>

	<?php endif ?>
		
		<section class="main-content">
			<header class="page-header">
				<h1 class="main-title-page" data-categoria="<?php echo $categoria; ?>">
					<?php echo $categoria; ?>
				</h1>
			</header>
			<div class="posts-content">

				<?php getTemplate( 'posts-loop', $loop ); ?>

			</div>
		    <footer class="page-footer pagination-wrapper">
		    	
	    		<?php getPagination( $categoria, POSTPERPAG ); ?>

		    </footer>

		</section><!--- //.main-content -->
	</div><!--- //.page-content-wrapper -->
</div><!--- //.inner-wrapper -->

<?php include 'footer.php';