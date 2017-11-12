<?php
/*
 * Sitio web: MVL
 * @LaCueva.tv
 * Since 1.0
 * PAGE TEMPLATE: SINGLE
 * Esta página muestra el articulo simple buscando en la base de datos. De acuerdo a la categoria u otras variables el diseño puede ser distinto, teniendo sidebar o no.
*/
$slugUrl = getPageVar();//variante de la pagina
$categoria = ver_categoria();//define la categoria

include 'header.php';
?>
<!--- .inner-wrapper: contenido principal y específico del template -->
<div class="inner-wrapper">
    
	<h1><?php echo $slugUrl; ?></h1>

	<p>single</p>

</div><!--- //.inner-wrapper -->

<?php include 'footer.php';