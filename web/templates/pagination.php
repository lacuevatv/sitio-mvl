<ul class="pagination-items" data-post-per-page="<?php echo POSTPERPAG; ?>" data-categoria-loop="<?php echo $data['categoria']; ?>">
	<div class="items-wrapper">
	<?php 
	for ($i=0; $i < $data['numberPages']; $i++) { ?>
		<li>
			<a href="<?php echo $i+1; ?>" class="page-click-btn"><?php echo $i+1; ?></a>
		</li>
	<?php } ?>
		<span class="pagination-nav-left">
			<?php if (dispositivo() == 'tablet') { ?>
			Ant
			<?php } else { ?>
			Anterior
			<?php } ?>
		</span>
		<span class="pagination-nav-right">
			<?php if (dispositivo() == 'tablet') { ?>
			Sig
			<?php } else { ?>
			Siguiente
			<?php } ?>
		</span>
	</div>
</ul>