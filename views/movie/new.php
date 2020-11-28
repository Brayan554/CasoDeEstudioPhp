<main class="container">
	<div class="row">
		<h1>Agregar Peliculas</h1>
	</div>
		<section class="row mt-5">
			<div class="card w-75 m-auto">
				<div class="card-header container">
				<h2 class="m-auto">Informacion peliculas</h2>	
				</div>
			
 <div class="card-body w-100">
	<!--<form action="?controller=movie&method=save" method="post">-->
						<div class="form-group">
							<label>Nombre</label>
							<input type="text" id="name_movie" class="form-control" placeholder="Ingrese Nombre">
						</div>
						<div class="form-group">
							<label>Descripcion Pelicula</label>
							<textarea class="form-control" rows="3" id="description_movie" placeholder="Ingrese La Descripcion "></textarea>
						</div>
	
	<div>
		<label>Usuario</label>
		  <select id="id_user" class="form-control">
			  <option value="">Seleccione</option>
							<?php
						foreach ($users as $user) 
							{
								
								 ?>
								   <option  value="<?php echo $user->id_user ?>"><?php echo $user->name
								    ?></option>			
							  <?php
													
							}
								 ?>
		  </select>
	</div>


	<div class="form-group row">
		<div class="col-md-8">
		<label>Categorias</label>
				
				 <select id="category" class="form-control">
				  <option value="">Seleccione</option>
					<?php
						foreach ($categories as $category) {
							
					?>
						<option value="<?php echo $category->id_categories?>"><?php echo $category->name_categories?></option>
					<?php

						}

					?>
			  </select>	
		</div>
		<div class="col-md-4 mt-4">
		<a href="#" id="addElement" class="btn btn-success">+</a>
		</div>
		 
	</div> 

	<?php  
			if (isset($categoriesMovie)) {
				
		?>
				<script>
	var arrCategories =<?php echo json_encode($categoriesMovie); ?>
				</script>

		<?php		
			}else{
		?>
				<script>
			var arrCategories = []
				</script>
		<?php			
			}
		?>

	<div class="form-group" id="list-Categories">
		
	</div>


	<div class="form-group">
	<button  class="btn btn-primary"  id="submit">Guardar</button>
	</div>
<!--</form> -->
			   </div>
			</div>
		</section>

</main>

<script src="assets/js/movie.js"></script>