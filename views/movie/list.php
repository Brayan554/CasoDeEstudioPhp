<main class="container">

	
	<section class="col-md-12 text-center">
		<h1 class="font-family">Listado de Peliculas </h1>
		<div>
			<h2>Peliculas</h2>
			<a href="?controller=movie&method=new" class="btn btn-success">Agregar</a>
		</div>
	</section>

	<section class="col-md-12 table-responsive table-hover">
	<table class="table">
  <thead class="thead-dark">
    <tr>
      <th>#</th>
      <th>Nombre</th>
      <th>Descripcion</th>
      <th>Estado</th>
      <th>Usuario</th>
      
     
      <th>Acciones</th>
      <th>Cambiar Estado</th>
      <th>Categorias</th>
    </tr>
  </thead>
  <tbody>
  	<?php foreach ($movies as $movie) : ?>
		    <tr>
		      <td><?php echo $movie->id_movie?></td>
		      <td><?php echo $movie->name_movie?></td>
		      <td><?php echo $movie->description_movie?></td>
		      <td><?php echo $movie->status?></td>
		      <td><?php echo $movie->users?></td>
			 
			  
		      <td>
		      	<a href="?controller=movie&method=edit&id_movie=<?php echo $movie->id_movie?>" class="btn btn-info">Editar</a>

		      	<a href="?controller=movie&method=delete&id_movie=<?php echo $movie->id_movie?>" class="btn btn-warning">Eliminar</a>



		      	<?php  
		      	if ($movie->id_status == 1) {
		      		?>
		      	<td>
		      	<a href="?controller=movie&method=updateStatus&id_movie=<?php echo $movie->id_movie?>" class="btn btn-danger">Desactivar</a>
		      	</td>
		      	<?php 
		      	}elseif($movie->id_status == 2) {
		      	?>
		      	<td>
		      	<a href="?controller=movie&method=updateStatus&id_movie=<?php echo $movie->id_movie?>" class="btn btn-primary">Activar</a>
		      	</td>
		      	<?php 
		      	}
		      	?>

		      </td>
		      <td>
		<a href="#modal" id="show-modal">Categorias</a>
		      </td>
		    </tr>
  		<?php endforeach ?>
  </tbody>
</table>

<div class="ventana" id="vent">

            <div class="col-sm-10 main-section ">
                <div class="modal-content">
                    <div id="cerrar">
                     <a href="javascript:cerrar()"><img src="assets/img/cancel.png"></a>    
                    </div>
            <table class="table table-striped table-hover">
			  <thead>
			    <tr>
			      <th>#</th>
			      <th>Nombre</th> 
			    </tr>
			  </thead>
			  <tbody>
			  	<?php foreach ($categories as $categorie) : ?>
					    <tr>
					    <td><?php echo $categorie->id_categories?></td>
					    <td><?php echo $categorie->name_categories?></td>
					      
					    </tr>
				<?php endforeach ?>
			  </tbody>
			</table>
                	
            </div>   
        </div>
    </div>


<?php

if (isset($categories)) {
	
?>

		<aside id="modal" class="modal">
			<div class="content-modal">
				<header>
					<a href="#" class="close-modal">x</a>
					<h2>Categorias</h2>
				</header>
				<article></article>
			</div>

			<a href="#" class="btn btn-close-modal"></a>
		</aside>


<?php	
}

?>

	</section>

	

</main>
<script>

            function abrir(){
                document.getElementById("vent").style.display="block"; 
            }

            function cerrar(){
                document.getElementById("vent").style.display="none";
            }

</script>