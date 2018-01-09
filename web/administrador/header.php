<?php
global $userStatus;
//chequea que no se acceda directo
if(!defined("SECUREACCESS"))
{
    die("El acceso directo a este archivo no está permitido.");
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title><?php echo SITETITLE; ?></title>
<link rel="shortcut icon" href="<?php echo FAVICONICO; ?>">

<!-- Custom CSS -->
  <link href="assets/css/style-admin.css" rel="stylesheet">

<!------- jquery 3.1.1 ------>
<script src="assets/js/jquery-3.1.1.min.js"></script>
<!-- jQquery UI css -->
  <link href="assets/css/jquery-ui.min.css" rel="stylesheet">

</head>
<body>

<!------- header ------>
<header>
<!-- Fixed navbar -->
    <nav class="navbar-wrapper navbar-inverse navbar-fixed-top">
      
      <div class="container main-nav-top-wrapper">

        <a class="navbar-brand-name" href="index.php">
          <?php echo SITENAME; ?>
        </a>

        <button type="button" class="toggle" aria-expanded="false" aria-controls="menu-top">
          <span class="graph-menu-1"></span>
          <span class="graph-menu-2"></span>
          <span class="graph-menu-3"></span>
        </button>

        <div id="menu-top" class="menus-top-wrapper">
          <!--LEFT MENU-->
          <ul class="menu-top menu-left">
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Noticias<span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li>
                  <a href="index.php?admin=editar-noticias" role="button">Agregar nueva</a>
                  </li>
                <li>
                  <a href="index.php?admin=noticias" role="button">Ver todas</a>
                </li>
              </ul>
            </li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Administrar Página<span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li>
                  <a href="index.php?admin=biblioteca-medios" role="button">Medios</a>
                </li>
                <li>
                  <a href="index.php?admin=promociones" role="button">promociones</a>
                </li>
                <li>
                  <a href="index.php?admin=editar-slider&slug=home" role="button">Slider Inicio</a>
                </li>
              </ul>
            </li>
          <?php if ($userStatus == 0) : ?>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Usuarios<span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="index.php?admin=change-password" role="button">Cambiar contraseña</a></li>
                <li><a href="index.php?admin=nuevo-usuario" role="button">Registrar nuevo usuario</a></li>
              </ul>
            </li>
          <?php endif; ?>
          <li><a href="../" target="_blank">Ver página</a></li>
          </ul>
          <!--RIGHT MENU-->
          <ul class="menu-top menu-right">
            <li class="dropdown">
            <?php if ( isset($_SESSION['nombre']) && $_SESSION['nombre'] != '' ) : ?>
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?php echo $_SESSION['nombre']; ?><span class="caret"></span></a>
            <?php else : ?>
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Usuario<span class="caret"></span></a>
            <?php endif; ?>
              <ul class="dropdown-menu">
                <li><a id="logout" href="#">Salir</a></li>
              </ul>
            </li>
          </ul>
        </div><!--/.menu-top -->
      </div><!--/.container -->
    </nav>
</header>
<!-- main contenido -->
<main role="main" class="main">

<?php if ( $modulo == '') : ?>
  <div class="container titulo-gral-admin">
    <h1>
      <?php echo SITENAME; ?>
    </h1>
  </div>
<?php endif; ?>
