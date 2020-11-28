<main class="container">
	<div class="row">
		<h1>Agregar Alquiler</h1>
	</div>

	<section class="row mt-5">
		<div class="card w-75 m-auto">
			<div class="card-header container">
			<h2>Informacion del Alquiler</h2>
			</div>
			<div class="card-body ">


			<!--	<form action="?controller=user&method=save" method="post">-->


						<div class="form-group">
							<label>Fecha Inicial:</label>
								<input type="date" id="start_date_rentals" class="form-control" placeholder="fecha inicial">
						</div>
						<div>
							<label>Fecha De Entrega</label>
								<input type="date" id="end_date_rentals" class="form-control" placeholder="Ingrese fecha de entrega">
						</div>
					<div>
						<label>Total Alquileres</label>
						<input type="number" id="total_rentals" class="form-control" placeholder="Ingrese el total de alquileres">
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
	</div></br>

	
	<?php
		if (isset($movieRental) >0) {
	?>
		<script>
			var arrMovies = <?php echo json_encode($movieRental);?>
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


	<div>
	<button class="btn btn-primary" id="submit">Guardar</button>
	</div>
<!--</form>-->
			</div>
		</div>

	</section>
</main>
<script src="assets/js/Rental.js"></script>


