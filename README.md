# Municipio Vicente Lopez
(Sitio auto administrable)

## Versiones:
* 1.1 - Maquetado el single page y single post. Faltan detalles y admin

* 1.0 - Funcionando todos sus links, maquetado hasta single, falta la parte de las paginas y entradas individuales:  
-En la tabla de 'noticias' tuve que agregar 'post_type', 'agenda_out', 'agenda_lugar'. Pero solo en el front, todavía falta la parte del backend.  
-El loop tiene dos templates, agenda y gestion y las otras categorías.  

* 0.0 - Template Init

## Notas:
La estructura funciona con permalinks y redireccionamiento a través de htaccess.
Todos llegan al index.php y desde ahí se redirecciona a loop.php y single.php. También hay páginas especiales como inicio. En loop.php funcionan todas los loops de todas las categorias y las busquedas. En single van las páginas y entradas individuales.  
En el index la función escanea el url para buscar a donde tiene que ir, depende de si es categoria o si hay otra indicación.  
Las entradas se guardan en la tabla noticias y están divididas en pages y posts. A su vez los post estan divididos en las distintas categorias: 'agenda', 'gestion', 'tramites-servicios', 'telefonos', empleo. Pages son las que no entran en ninguna categoria.  

### Librerias utilizadas

#### PHP version 5.6
* Mobile Detect Master 2.8.26 (Detecta si es movil o pc)
* PHP Mailer - 6.0.1
* phpmyadmin 4.7.2 en versión local para administrar Base de datos mysql

#### Javascript
* jQuery v3.2.1
* jQuery UI 1.12.1
* modernizr-custom

#### MySQL version 5.6


### BACKEND:
* Versión 5.0 mejorado 10/11/2017

#### Módulos:
* Noticias
* Sliders
* Manejo de medios (subir imágenes y archivos)
