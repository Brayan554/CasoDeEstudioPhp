<main class="container">
	<div class="row">
		<h1>Editar Categoria</h1>
	</div>
	<section class="row mt-5">
		<div class="card w-75 m-auto">
			<div class="card-header container">
				<h1 class="m-auto">Informacion de la Categoria</h1>
				<div class="card-body">

					<form action="?controller=categorie&method=update"        method="post">

					<input type="hidden" name="id_categories" 
					value="<?php echo $data[0]->id_categories ?>">

						<div class="form-group">
							<label>Categoria</label>
							<input type="text" name="name_categories" class="form-control" placeholder="Ingresa Categoria" 
							value="<?php echo $data[0]->name_categories ?>">
						</div>
						
	<div>
		<label>Estado</label>
		 <select name="id_status" class="form-control">
			 <option value="">Seleccione</option>
			  	<?php
					  foreach ($statuses as $status) 
				{
						 if ($status->id_status == $data[0]->id_status)
						  {
					?>
								<option selected value="<?php echo $status->id_status?>"><?php echo $status->status?></option>
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



						<div class="form-group">
							<button class="btn btn-primary">Actualizar</button>

						</div>
					</form>
				</div>
			</div>
		</div>
	</section>
</main>