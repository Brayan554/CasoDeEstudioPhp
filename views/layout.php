<!DOCTYPE html>
<html lang="es">
<head>
	<title>App - Peliculas  </title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
</head>
<body>
<header>




<?php
if ($_SESSION['user']->id_rol == 1) {
	
?>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">

<a class="navbar-brand" href="?controller=home">Inicio</a>
<a class="navbar-brand" href="?controller=user">Usuarios</a>
<a class="navbar-brand" href="?controller=rental">Alquilados</a>
<a class="navbar-brand" href="?controller=movie">Peliculas</a>
<a class="navbar-brand" href="?controller=categorie">Categorias</a>
<a class="navbar-brand" href="?controller=rol">Roles</a>
<a class="navbar-brand" href="?controller=status">Estados</a>
<a class="navbar-brand" href="?controller=type_status">Tipos de Estados</a>
<a class="navbar-brand" href="?controller=login&method=logout">Cerrar Sesion</a>







			  

			  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			    <span class="navbar-toggler-icon"></span>
			  </button>

			  <div class="collapse navbar-collapse" id="navbarSupportedContent">
			    <ul class="navbar-nav mr-auto">
			     

			    </ul>
			  </div>
	</nav>


<?php


}elseif ($_SESSION['user']->id_rol == 2) {


?>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">

<a class="navbar-brand" href="?controller=home">Inicio</a>
<a class="navbar-brand" href="?controller=rental">Alquilados</a>
<a class="navbar-brand" href="?controller=movie">Peliculas</a>
<a class="navbar-brand" href="?controller=categorie">Categorias</a>
<a class="navbar-brand" href="?controller=login&method=logout">
Cerrar Sesion</a>


  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			    <span class="navbar-toggler-icon"></span>
			  </button>

			  <div class="collapse navbar-collapse" id="navbarSupportedContent">
			    <ul class="navbar-nav mr-auto">
			     

			    </ul>
			  </div>
</nav>

<?php
	
}elseif ($_SESSION['user']->id_rol == 3) {

?>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">

<a class="navbar-brand" href="?controller=home">Inicio</a>
<a class="navbar-brand" href="?controller=rental">Alquilados</a>
<a class="navbar-brand" href="?controller=movie">Peliculas</a>
<a class="navbar-brand" href="?controller=login&method=logout">
Cerrar Sesion</a>


<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			    <span class="navbar-toggler-icon"></span>
</button>

			  <div class="collapse navbar-collapse" id="navbarSupportedContent">
			    <ul class="navbar-nav mr-auto">
			     

			    </ul>
			  </div>
</nav>

<?php
}

?>


</header>
<script  src="assets/js/jquery.min.js"> </script>
<script src="assets/js/popper.min.js"> </script>
<script src="assets/js/bootstrap.min.js"> </script>

</body>
</html>
