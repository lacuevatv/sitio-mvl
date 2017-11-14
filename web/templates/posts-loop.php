<?php 
for ($i=0; $i < count($data); $i++) { 
	echo '<a href="'.$data[$i]['post_url'].'">'.$data[$i]['post_titulo'].'</a><br>';
}