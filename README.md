# Municipio Vicente Lopez
(Sitio auto administrable)

## Versiones:
*2.3 Modulo boletines, admin y front  

*2.3 Front editado con nuevas paginas: contacto y otras  

*2.2 Admin de pages solo en usuario administrador  

*2.1 Footer autoadministrable, videos del footer autoadministrable  

*2.0 Versión con Gestión de usuarios

*1.7 Arreglo Front:  
-Tuve que agregar unos captions para el slider

*1.6 Arreglo Front:  
-agregado un icono de teléfonos  

*1.5 Arreglo Admin:  
-Habilitación de promociones  

* 1.4 Arreglo front:  
-ajustes pagina de inicio  

* 1.3 Arreglo administrador:  
-Separé las categorias como si fueran distintos módulos y los diferencié cada uno con sus características, por ejemplo, la agenda tiene fechas in, out y lugar, gestión no. Pero el script que guarda o actualiza los post es el mismo siempre.  
-como no se usa el orden de las imágenes puse que lo muestre de acuerdo al ultimo id, así mientras no se ordenen se van a ver las últimas cargadas primero  
* 1.2 Arreglo de funciones y links  
-Tuve que arreglar las funciones que redirigen porque sino estaba en la raiz del servidor no funcionaba. Entonces actualizé las variables constantes y le agregue carpeta del servidor, ahí hay que poner la carpeta o las carpetas en donde se encuentra luego del dominio (Por Ej: demo.lacueva.tv/mvl/ => en este caso iría '/mvl'). Además tuve que corregir las funciones para que en vez de buscar en el url busque en la variable que yo le paso
-Cree una función que limpia el url quitando el dominio y la carpeta anterior, así puede buscar en donde importa
-corregí los links y le agregue a todos la constante mainsurl para que los links siempre funcionene no importa donde se instale

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
