<?php 
/*
 * Sitio web: MVL
 * @LaCueva.tv
 * Since 1.0
 * FUNCTIONS
 * 
*/

require_once 'config.php';
require_once 'lib/mobile-detect/Mobile_Detect.php';

//busca la página $name = nombre del archivo sin extensión
function getPage( $name ) {
	$error = '404';
	$namePage = PAGESDIR . '/'. $name. '.php';

	if (is_file($namePage)) {
		include $namePage;
	} else {
		include PAGESDIR . '/'. $error. '.php';		
	}
}

//busca el template $name = nombre del archivo sin extensión
function getTemplate ( $name ) {
	$namePage = TEMPLATEDIR . '/'. $name. '.php';

	if (is_file($namePage)) {
		include $namePage;
	}
}



//detecta el dispositivo
function dispositivo () {
	$dispositivo = 'pc';
	$detect = new Mobile_Detect;

	if ( $detect->isMobile() ) {
		$dispositivo = 'movil';
	}
		
	// Any tablet device.
	if( $detect->isTablet() ){
		$dispositivo = 'tablet';
	}

	return $dispositivo;

}

/*
* FUNCIÓN DE PERMALINKS
 * Define la page actual y redirecciona segun url, devuelve el slug o template part.
 * a) En el caso de que sean paginas, busca el template en la carpeta templates y listo.
 * b) En el caso de que sea noticia, categoria o curso, busca el template adecuado (cursos = curso.php / o en en el archivo index elige la primera opcion (la segunda es de paginas).
 * Pero ademas, e importante, busca en la base de datos mediante el slug. Si es noticia hace un loop de la categoria elegida o de todas las noticias y si es noticia single busca la noticia específica.
 *
*/
function pageActual () {
	$slug = 'inicio'; //slug por defecto
	
	//borramos la barra / luego del dominio:
	$url = $_SERVER['REQUEST_URI'];
	$parseUrl = explode('/', $url);
	$RequestURI = $parseUrl[1];
	
	//busca el simbolo ? en la url
	$permalink = strpos($RequestURI, '?');
	$permalink2 = strpos($RequestURI, '&');
	
	//si en el url no aparece ni ? ni & es porque es un link bonito
	if ( $permalink === false && $permalink2 === false ) {
		
		//si no está vacío, hay que procesar cual es
		if ( $url != '/' ) {

			$slug = $RequestURI;		
			
		}

		if ( $slug == 'edad-feliz' ) {
			$slug = 'noticias';
		}

	} 
	//en cambio, si aparece el ? o el & el url funciona con ids, ejecuta la segunda opcion
	else {
		//BUSCAR PAGE EN EL URL, por defecto sería home
		$slug = isset($_REQUEST['page'])?$_REQUEST['page']:'inicio';
		$noticia = isset($_REQUEST['noticia'])?$_REQUEST['noticia']:'none';
		$cat = isset($_REQUEST['cat'])?$_REQUEST['cat']:'none';

		if ( $noticia != 'none' ) {
			$slug = $noticia;
		}

		if ( $cat != 'none' ) {
			$slug = $cat;
		}
	}

	return $slug;

}//pageActual()

//esta funcion devuelve el nombre de la categoria o nada sino lo es 
function ver_categoria () {
	global $categorias;
	$cat = isset($_REQUEST['cat'])?$_REQUEST['cat']:'none';

	$url = $_SERVER['REQUEST_URI'];
	$parseUrl = explode('/', $url);
	$RequestURI = $parseUrl[1];

	for ($i=0; $i < count($categorias); $i++) { 
		if ( $categorias[$i]['slug'] == $RequestURI ) {
		$cat = $RequestURI;
		break;
		}
	}

	return $cat;

}

//esta funcion devuelve el nombre true si es categoria y false si no lo es
function es_categoria () {
	global $categorias;
	//ver si figura la variable cat en el url, en ese caso es categoria
	$cat = isset($_REQUEST['cat'])?$_REQUEST['cat']:'none';
	if ( $cat != 'none' ) {
		return true;
	} 
	//si el url es bonito hay que parsearlo para buscar las categorias
	$url = $_SERVER['REQUEST_URI'];
	$parseUrl = explode('/', $url);

	if ( count( $parseUrl ) >= 3 && $parseUrl[2] != '' ){
		//si el index 2 figura en el url significa que es single
		return false;
	} else {
		$RequestURI = $parseUrl[1];

		for ($i=0; $i < count($categorias); $i++) { 
			if ( $categorias[$i]['slug'] == $RequestURI ) {
			return true;
			break;
			}
		}
		//sino encuentra la categoria en el url, entonces no lo es
		return false;
	}	
}

/*
ESTA FUNCIÓN TOMA LA VARIANTE DE ALGUNAS PAGINAS POR EJEMPLO NOTICIAS, EL SLUG ES UNA CATEGORIA O EL URL DE UNA NOTICIA
@return: string
*/
function getPageVar () {
	$slug = '';

	//si es categoria, entonces no hay nada que decir
	if ( es_categoria() ){
		return;
	} 
	
	//si figura variable noticia en el url, entonces es facil:
	$noticia = isset($_REQUEST['noticia'])?$_REQUEST['noticia']:'none';
	if ( $noticia != 'none' ) {
		$slug = $noticia;
		return $slug;
	} 

	//si no hay variables hay que parsear el url para buscar informacion
	$url = $_SERVER['REQUEST_URI'];
	$parseUrl = explode('/', $url);
	
	//si por el contrario hay un indice 2 y este no es la "/" entonces hay info que rescatar
	if ( isset($parseUrl[2]) && $parseUrl[2] != '' ) {
		$slug = $parseUrl[2];
	} else {
		//y por ultimo la info a mostrar también puede estar en el indice 1 si este no es categoria
		$slug = $parseUrl[1];
	}

	return $slug;

}

//devuelve el título de la página para <head><title>
function SeoTitlePage ( $page ) {
    $tituloBase   = SITETITLE;

    //titulo cuando no es home ni noticias
    if ( $page != 'inicio' && $page != 'noticias' ) {
        //si la página no es home hay que separar la url que está unido por "-" para armar un nuevo título
        $pageActualTitle = explode('-', $page);
        $pageSEOTitle = ' |';
        for ($i=0; $i < count($pageActualTitle); $i++) { 
            $pageSEOTitle .= ' ';
            $pageSEOTitle .= ucfirst($pageActualTitle[$i]);
        }

        $tituloBase .= $pageSEOTitle;
    }

    return $tituloBase;
} //SeoTitlePage()


//define el metadescription en la etiqueta Head para SEO
function metaDescriptionText ( $pageActual, $noticia, $curso, $categoriaNoticias ) {
	$metaDescription = METADESCRIPTION;
	

	if ( $noticia != 'none') {
		global $dataNoticia;
		$base = ' | Asociación de trabajadores de la Sanidad Argentina, Buenos Aires.';
		$metaDescription = $dataNoticia['resumen'] . $base;
	}

	if ( $categoriaNoticias != 'none') {
		$metaDescription = 'Últimas noticias ' .$categoriaNoticias. '. Asociación de trabajadores de la Sanidad Argentina, Buenos Aires.';
	}

	return $metaDescription;

}//metaDescriptionText()



/*
 *
 * FUNCIONES CON BASE DE DATOS
 *
*/

function connectDB () {
	global $connection;
  $connection = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
  // Test if connection succeeded
  if( mysqli_connect_errno() ) {
    die("Database connection failed: " . mysqli_connect_error() . 
         " (" . mysqli_connect_errno() . ")"
    );
  }

  if (!mysqli_set_charset($connection, "utf8")) {
    printf("Error cargando el conjunto de caracteres utf8: %s\n", mysqli_error($connection));
    exit();
	} else {
		mysqli_character_set_name($connection);
	}
  return $connection;
}

//cierre base de datos
function closeDataBase( $connection ){
	if ( isset($connection) ) {
    	mysqli_close( $connection );
    }
}

//muestra las noticias recientes se puede especificar la cant de post, la categoria y se puede excluir una noticia. Además tiene estilo columna para sidebar por default o row
function NoticiasRecientesHTML ( $cantPosts, $categoria = 'none', $exclude = 'none', $style = false, $offset = 0 ) {
	$noticiasPorPagina = $cantPosts;
	$connection = connectDB();
	$fecha_actual = strtotime(date("d-m-Y H:i:00"));
	$tabla = 'noticias';

	if ( $offset != '0' ) {
		$noticiasPorPagina = $offset.','.$cantPosts;
		//$noticiasPorPagina = '3,2';
	}

	$query  = "SELECT * FROM " .$tabla. " WHERE post_status='publicado' ORDER by post_fecha desc LIMIT ".$noticiasPorPagina." ";

	if ( $categoria != 'none' ) {
		$query  = "SELECT * FROM " .$tabla. " WHERE post_status='publicado' AND post_categoria = '".$categoria."' ORDER by post_fecha desc LIMIT ".$noticiasPorPagina." ";
	}

	if ( $exclude != 'none' ) {
		$query  = "SELECT * FROM " .$tabla. " WHERE post_url!='".$exclude."' AND post_status='publicado' ORDER by post_fecha desc LIMIT ".$noticiasPorPagina." ";
	}
	
	$result = mysqli_query($connection, $query);
	
	if ( $result->num_rows == 0 ) {
		echo '<div>Ninguna noticia ha sido cargada todavía</div>';
		echo $query;
	} else {

		while ($row = $result->fetch_array()) {
				$rows[] = $row;
			}

		foreach ($rows as $row ) { 
			$imgDestacada = $row['post_imagen'];
			$resumen      = $row['post_resumen'];
			$url          = $row['post_url'];
			$id           = $row['post_ID'];
			$titulo       = $row['post_titulo'];
			$date         = $row['post_fecha'];
			$meses        = array('Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre');
			$fecha        = date("d", strtotime($date)) .' de '. $meses[date("n", strtotime($date))-1] .' de '. date("Y", strtotime($date));
			
			//si la fecha es posterior a hoy no se publica, y se saltea
			if($fecha_actual < strtotime($date) ){
			    continue;
			}

			//la versión style no tiene fecha y el formato es más cuadrado, el texto va sobre la imagen
			if ($style) {
			?>
		
		<li class="loop-recientes-item-row">
			<a href="/noticias/<?php echo $url; ?>" title="Leer noticia">
				<article class="noticia-recientes-item">
					
					<div class="recientes-img-loop-row">
						<?php 
						if ( $imgDestacada != '' ) { ?>
							<img src="uploads/images/<?php echo $imgDestacada; ?>" alt="<?php echo $titulo; ?> | Noticias-ATSA">
						
						<?php 
						
						} else { ?>
							<img src="assets/images/noticia-img-default.png" alt="Noticias-ATSA">
						<?php 
						} ?>

					</div>
					<div class="recientes-text-loop-row">
						<h1>
							<?php echo $titulo; ?>
						</h1>
					</div>
				</article>
			</a>
		</li>
		

		<?php } else {
				//stylo default (sidebar)
			?>
		<li class="loop-recientes-item">
			<a href="/noticias/<?php echo $url; ?>" title="Leer noticia">
				<article class="noticia-recientes-item">
					
					<div class="recientes-img-loop">
						<?php 
						if ( $imgDestacada != '' ) { ?>
							<img src="uploads/images/<?php echo $imgDestacada; ?>" alt="<?php echo $titulo; ?> | Noticias-ATSA">
						
						<?php 
						
						} else { ?>
							<img src="assets/images/noticia-img-default.png" alt="Noticias-ATSA">
						<?php 
						} ?>

					</div>
					<div class="recientes-text-loop">
						<h1>
							<?php echo $titulo; ?>
						</h1>
						
						<p>
							<?php echo $fecha ?>
						</p>
					</div>
				</article>
			</a>
		</li>
	<?php }
		}//cierra for each
	} //else
	closeDataBase( $connection );
}//NoticiasRecientesHTML()



//muestra html del loop de noticias de acuerdo a su categoría
function loopNoticiasHTML ( $categoria ) {
	$fecha_actual = strtotime(date("d-m-Y H:i:00"));
	$noticiasPorPagina = 3;
	$connection = connectDB();
	$tabla = 'noticias';
	$query  = "SELECT * FROM " .$tabla. " WHERE post_status='publicado' ORDER by post_fecha desc LIMIT ".$noticiasPorPagina." ";

	if ( $categoria != 'none' ) {
		$query  = "SELECT * FROM " .$tabla. " WHERE post_status='publicado' AND post_categoria = '".$categoria."' ORDER by post_fecha desc LIMIT ".$noticiasPorPagina." ";
	}
	
	$result = mysqli_query($connection, $query);
	
	if ( $result->num_rows == 0 ) {
		echo '<div>Ninguna noticia ha sido cargada todavía</div>';
	} else {

		while ( $row = $result->fetch_array() ) {
			$rows[] = $row;
		}

		foreach ($rows as $row ) { 
			$titulo       = $row['post_titulo'];
			$url          = $row['post_url'];
			$imgDestacada = $row['post_imagen'];
			$resumen      = $row['post_resumen'];
			$bajada       = $row['post_bajada'];
			$contenido    = $row['post_contenido'];
			$video        = $row['post_video'];
			$categoria    = $row['post_categoria'];
			$etiquetas    = $row['post_etiquetas'];
			$galeria      = $row['post_galeria'];
			$imgGaleria   = $row['post_imagenesGal'];
			$date         = $row['post_fecha'];

			$meses        = array('Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre');
			$dia          = date("d", strtotime($date));
			$mes          = $meses[date("n", strtotime($date))-1];
			$year         = date("Y", strtotime($date));
		
			if ( $resumen == '' ) {
				$resumen = $bajada;
			}

			//si la fecha es posterior a hoy no se publica, y se saltea
			if($fecha_actual < strtotime($date) ){
			    continue;
			}

			?>
			<li class="loop-noticias-item">
				<article class="noticia-index">
					<header>
						<h1>
							<?php echo $titulo; ?>
						</h1>
					</header>
					<section>
						<div class="meta-data-news">
							<div class="date-news">
								<p>
									<strong>
									<?php echo $dia; ?>
									</strong><br>
									de <?php echo $mes .' '. $year; ?>
								</p>
							</div>

							<?php 
							if ( $imgDestacada != '' ) { ?>
								<a href="/noticias/<?php echo $url; ?>" title="Leer noticia">
									<img src="uploads/images/<?php echo $imgDestacada; ?>" alt="<?php echo $titulo; ?> | Noticias-ATSA">
								</a>
							<?php 
							
							} else {

							?>
								<img src="assets/images/noticia-img-default.png" alt="Noticias-ATSA">
							<?php 
							} ?>
						</div>
						<p class="excerpt-news">
							<?php echo $bajada; ?>
						</p>
					</section>
					<footer>
						<div class="btn-noticia-index">
							<a href="/noticias/<?php echo $url; ?>" title="Leer noticia">Leer más</a>
						</div>
					</footer>
				</article>
			</li>
		<?php

		}//FOREACH
	}//ELSE
	closeDataBase( $connection );
} //loopNoticiasHTML()


//busca la noticia en particular y recoge los datos para pasar al template
function singlePostHTML ( $noticia ) {
	$connection = connectDB();
	$tabla = 'noticias';
	$query  = "SELECT * FROM " .$tabla. " WHERE post_url='".$noticia."' LIMIT 1 ";

	$result = mysqli_query($connection, $query);
	
	if ( $result->num_rows == 0 ) {
		header("Location: /404");
	} else {

		$data = mysqli_fetch_array($result);

		$date         = $data['post_fecha'];
		$meses        = array('Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre');
		$dia          = date("d", strtotime($date));
		$mes          = $meses[date("n", strtotime($date))-1];
		$year         = date("Y", strtotime($date));
		$resumen      = $data['post_resumen'];
		$bajada       = $data['post_bajada'];
		$galeria      = $data['post_galeria'];
 		$imgGaleria   = array();
		//si no hay resumen toma la bajada
		if ( $resumen == '' ) {
			$resumen = $bajada;
		}

		if ( $galeria ) {
			$imgGaleria = unserialize( $data['post_imagenesGal'] );
		}

		$dataNoticia = array(
			'titulo'       => $data['post_titulo'],
			'url'          => $data['post_url'],
			'imgDestacada' => $data['post_imagen'],
			'resumen'      => $resumen,
			'bajada'       => $bajada,
			'contenido'    => $data['post_contenido'],
			'video'        => $data['post_video'],
			'categoria'    => $data['post_categoria'],
			'etiquetas'    => $data['post_etiquetas'],
			'galeria'      => $data['post_galeria'],
			'imgGaleria'   => $imgGaleria,
			'dia'          => $dia,
			'mes'          => $mes,
			'year'         => $year,	
		);

		return $dataNoticia;
		
	}//ELSE
	closeDataBase( $connection );
} //singlePostHTML()




//busca el slider en base de datos de acuerdo a su 'ubicacion' pasada
function getSliders( $slider ) {

	$connection = connectDB();
	$tabla = 'sliders';
	$query  = "SELECT * FROM " .$tabla. " WHERE slider_ubicacion='".$slider."' ORDER by slider_orden asc";
		
	$result = mysqli_query($connection, $query);
	
	if ( $result->num_rows == 0 ) {
		echo '<div></div>';
	} else {

		while ( $row = $result->fetch_array(MYSQLI_ASSOC) ) {
			$dataSlider[] = $row;
		}
		
		//selecciona el template html y le pasa la info
		getTemplate( 'sliders', $dataSlider);

	}//else
	closeDataBase( $connection );
} //getSliders()