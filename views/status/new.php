<main class="container">
	<div class="row">
		<h1>Agregar Estado </h1>
	</div>

	<section class="row mt-5">
		<div class="card w-75 m-auto">
			<div class="card-header container">
			<h2>Informacion de Estado</h2>
			</div>
			<div class="card-body ">
				<form action="?controller=status&method=save" method="post">
						<div class="form-group">
							<label>Nombre</label>
								<input type="text" name="status" class="form-control" placeholder="Ingrese Nombre Comnpleto">
						</div>
	<div>
		<label>Tipo de Estado</label>
		  <select name="id_type_statuses" class="form-control">
			  <option value="">Seleccione</option>
							<?php
						foreach ($types as $type) 
							{
								
								 ?>
								   <option  value="<?php echo $type->id_type_statuses?>"><?php echo 
								   $type->name_type_statuses
								    ?></option>			
							  <?php
													
							}
								 ?>
		  </select>
	</div>
					<div>
						<button class="btn btn-primary">Guardar</button>
					</div>
				</form>
			</div>
		</div>

	</section>
</main>