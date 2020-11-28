
<main class="container">
	<div class="row">
		<h1>Editar Peliculas</h1>
	</div>
		<section class="row mt-5">
			<div class="card w-75 m-auto">
				<div class="card-header container">
				<h2 class="m-auto">Informacion peliculas</h2>	
				</div>
			
			     <div class="card-body">
			<!--<form action="?controller=movie&method=update" method="post">-->
						
						<input type="hidden" id="id_movie" value="<?php
						echo $data[0]->id_movie ?>">

						<div class="form-group">
							<label>Nombre</label>
							<input type="text" id="name_movie" class="form-control" placeholder="Ingrese Nombre"
							value="<?php echo $data[0]->name_movie?>">
						</div>

						<div class="form-group">
							<label>Descripcion</label>
							<input type="text" id="description_movie" class="form-control" placeholder="Ingrese Descripcion"
							value="<?php echo $data[0]->description_movie?>">
						</div>

	<div>
		<label>Estado</label>
		 <select id="id_status" class="form-control">
			 <option value="">Seleccione</option>
			  	<?php
					  foreach ($statuses as $status) 
				{
						 if ($status->id_status == $data[0]->id_status)
						  {
					?>
								<option selected value="<?php echo $status->id_status ?>"><?php echo $status->status?></option>
					<?php
						  } else {
					?>
			 						<option  value="<?php echo $status->id_status ?>"><?php echo $status->status?></option>			
					<?php
								 }
				}
					?>
		 </select>
	</div>
	<div>
		<label>Usuario</label>
		  <select id="id_user" class="form-control">
			  <option value="">Seleccione</option>
							<?php
						foreach ($users as $user) 
							{
								if ($user->id_user == $data[0]->id_user)
									{
								?>
				           <option selected value="<?php echo $user->id_user ?>"><?php echo $user->name?></option>
								<?php
									} else {
								 ?>
	                <option  value="<?php echo $user->id_user ?>"><?php echo $user->name?></option>			
							  <?php
													}
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
			if (count($categoriesMovie) > 0) {
				
		
		$arrCategoryMovie = [];

		foreach($categoriesMovie as $categoryMovie){
		array_push($arrCategoryMovie, ['id' => $categoryMovie->id_categories , "name_movie" => $categoryMovie->name]);
		}
		?>
				<script>
		var arrCategories =<?php echo json_encode($arrCategoryMovie); ?>

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
	<button id="update" class="btn btn-primary">Actualizar</button>
	</div>
					<!--</form>-->
			   </div>
			</div>
		</section>
</main>

<script src="assets/js/movie.js"></script>