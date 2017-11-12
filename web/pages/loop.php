<?php
/*
 * Sitio web: MVL
 * @LaCueva.tv
 * Since 1.0
 * PAGE TEMPLATE: LOOP
 * Esta página muestra todos los loops buscando en la base de datos de acuerdo al pedido en el url: agenda, gestión, tramites, empleo, teléfonos
*/
$slugUrl = getPageVar();//variante de la pagina
$categoria = ver_categoria();//define la categoria

include 'header.php';
?>
<!--- .inner-wrapper: contenido principal y específico del template -->
<div class="inner-wrapper">
    
	<?php if ( $categoria == 'agenda' ) : ?>
		<h1>agenda</h1>
		<p>Loop</p>
	<?php else : ?>

		<h1>otras categorias</h1>	
		<p>Loop</p>
	<?php endif ?>

</div><!--- //.inner-wrapper -->

<?php include 'footer.php';