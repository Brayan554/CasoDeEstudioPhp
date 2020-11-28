<main class="container">
	<div class="row">
		<h1>Agregar Categoria</h1>
	</div>
	<section class="row mt-5">
		<div class="card w-75 m-auto">
			<div class="card-header container">
				<h1 class="m-auto">Informacion de la Categoria</h1>
				<div class="card-body">
					<form action="?controller=categorie&method=save"        method="post">
						<div class="form-group">
							<label>Categoria</label>
							<input type="text" name="name_categories" class="form-control" placeholder="Ingresa Categoria">
						</div>
	<div>
		<label>Estados</label>
		  <select name="id_status" class="form-control">
			  <option value="">Seleccione</option>
							<?php
						foreach ($statuses as $status) 
							{
								
								 ?>
							<option value="<?php echo $status->id_status?>">
								<?php echo $status->status?>
							</option>	
							  <?php
													
							}
								 ?>
		  </select>
	</div>
						
						<div class="form-group">
							<button class="btn btn-primary">Guardar</button>

						</div>
					</form>
				</div>
			</div>
		</div>
	</section>
</main>