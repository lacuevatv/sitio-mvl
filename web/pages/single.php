<?php
/*
 * Sitio web: MVL
 * @LaCueva.tv
 * Since 1.0
 * PAGE TEMPLATE: SINGLE
 * Esta página muestra el articulo simple buscando en la base de datos. De acuerdo a la categoria u otras variables el diseño puede ser distinto, teniendo sidebar o no.
*/
$slugUrl = getPageVar( cleanUri() );//variante de la pagina
$singlePost = singlePostData( $slugUrl );
$postType = $singlePost['post_type'];



include 'header.php';
?>
<!--- .inner-wrapper: contenido principal y específico del template -->
<div class="inner-wrapper">

	<header class="page-header">
		
		<?php if ( $postType == 'post' ) : 		
			
			echo '<h3 class="main-title-page" >'. $singlePost['post_categoria'] . '</h3>';

		else : ?>
		<h1 class="main-title-page" >
		<?php if ( $singlePost['post_titulo'] != '' || $singlePost != null ) { 
				echo $singlePost['post_titulo'];
			} else {
				echo SITETITLE;
			} ?>
		</h1>
		<?php endif; ?>
		
	</header>

    <div class="page-content-wrapper">

<!-- SIDEBAR -->
    	<aside class="sidebar">
			<?php getTemplate( 'sidebar' ); ?>
		</aside>


<!--- .main-content -->
		<section class="main-content">
			
			<div class="single-content-wrapper">

			<?php if ( $postType == 'post' ) :
				
				getTemplate( 'single-post', $singlePost );
			
			elseif ( $postType == 'page' ) :
				getTemplate( 'single-page', $singlePost );
			else : 
				getTemplate( '404' );
			endif;
			?>
			

			</div>

		</section><!--- //.main-content -->

    </div>	

</div><!--- //.inner-wrapper -->

<?php include 'footer.php';