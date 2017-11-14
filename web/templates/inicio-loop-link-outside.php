<?php 
//variable $data tiene el contenido de la query, fue pasada mediante la función get_template:

for ($i=0; $i < count($data); $i++) { 
$item = $data[$i];
?>
<li>
    <article>
        <a href="<?php echo $item['post_link_externo']; ?>" target="_blank" title="<?php echo $item['post_titulo']; ?>">
            
            <img src="<?php echo UPLOADSURL .'/'. $item['post_imagen']; ?>" alt="<?php echo $item['post_categoria']; ?> - Municipio Vicente López" class="img-gris">
        
        
            <h1><?php echo $item['post_titulo']; ?></h1>
            
        </a>
    </article>
</li>
    
<?php }//for