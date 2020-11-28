
<main class="container">
	<div class="row">
		<h1>Editar Alquiler</h1>
	</div>
		<section class="row mt-5">
			<div class="card w-75 m-auto">
				<div class="card-header container">
				<h2 class="m-auto">Informacion Del Alquiler</h2>	
				</div>
			
			     <div class="card-body">
		<!--<form action="?controller=rental&method=update" method="post">-->
						
						<input type="hidden" id="id_rentals" value="<?php
						echo $data[0]->id_rentals?>">

						<div class="form-group">
							<label>Fecha De Inicio Alquiler</label>
							<input type="text" id="start_date_rentals" class="form-control" placeholder="Ingrese Nombre"
							value="<?php echo $data[0]->start_date_rentals?>">
						</div>

						<div class="form-group">
							<label>Fecha de Entrega</label>
							<input type="text" id="end_date_rentals" class="form-control" placeholder="Ingrese Descripcion"
							value="<?php echo $data[0]->end_date_rentals?>">
						</div>
							<div class="form-group">
							<label>Total de Alquileres</label>
							<input type="text" id="total_rentals" class="form-control" placeholder="Ingrese Descripcion"
							value="<?php echo $data[0]->total_rentals?>">
						</div>
						<div>
							<label>Estado</label>
							<select id="id_status" class="form-control">
								<option value="">Seleccione</option>
								<?php 
									foreach ($statuses as $status) {
												
										if ($status->id_status == $data[0]->id_status) {
											?>
						<option selected value="<?php echo $status->id_status ?>"><?php echo $status->status ?></option>
											<?php 
															
										} else {
											?>
							<option value="<?php echo $status->id_status?>"><?php echo $status->status ?></option>
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
								foreach ($users as $user) {

									if ($user->id_user == $data[0]->id_user) {
										?>
										<option selected value="<?php echo $user->id_user ?>"><?php echo $user->name ?></option>
										<?php 
									} else {
										?>
										<option value="<?php echo $user->id_user?>"><?php echo $user->name?></option>

										<?php  
									}
									
								}
							 ?>
							 </select>
						</div>

<div class="form-group row">
			<div class="col-md-8">	
		<label>Movies</label>
		  <select id="movie" class="form-control">
			  <option value="">Seleccione</option>
							<?php
						foreach ($movies as $movie) 
							{
								
								 ?>
								   <option  value="<?php echo $movie->id_movie ?>"><?php echo $movie->name_movie
								    ?></option>			
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
		if (count($moviesRental) >0) {
	
		$arrmovieRental = [];

		foreach($moviesRental as $movieRental ){
		array_push($arrmovieRental, ['id' => $movieRental->id_movie , "name_movie" => $movieRental->name]);

	}
	?>	
		<script>
			var arrMovies = <?php echo json_encode($arrmovieRental); ?>

		</script>

	<?php	

	
		}else{
	?>
		<script>
			var arrMovies = []
		</script>
	<?php		
		}
	?>



	


	<div class="form-group" id="list-movies">
				
	</div>

	<div class="form-group">
	<button id="update" class="btn btn-primary">Actualizar</button>
	</div>
					<!--</form>-->
			   </div>
			</div>
		</section>
</main>

<script src="assets/js/Rental.js"></script>
