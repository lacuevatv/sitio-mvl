<ul class="pagination-items" data-post-per-page="<?php echo POSTPERPAG; ?>" data-categoria-loop="<?php echo $data['categoria']; ?>">
	<div class="items-wrapper">
	<?php 
	for ($i=0; $i < $data['numberPages']; $i++) { ?>
		<li>
			<a href="<?php echo $i+1; ?>" class="page-click-btn"><?php echo $i+1; ?></a>
		</li>
	<?php } ?>
		<span class="pagination-nav-left">
			<a href="#">Anterior</a>
		</span>
		<span class="pagination-nav-right">
			<a href="#">Siguiente</a>
		</span>
	</div>
</ul>