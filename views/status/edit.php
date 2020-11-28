<main class="container">
	<div class="row">
		<h1>Editar Estado</h1>
	</div>
		<section class="row mt-5">
			<div class="card w-75 m-auto">
				<div class="card-header container">
				<h2 class="m-auto">Informacion Estados</h2>	
				</div>
			
			     <div class="card-body">
					<form action="?controller=status&method=update" method="post">
						
						<input type="hidden" name="id_status"
						 value="<?php echo $data[0]->id_status?>" >
						   
						<div class="form-group">
							<label>Nombre </label>
							<input type="text" name="status" class="form-control" placeholder="Ingrese Nombre Del Estado"
							value="<?php echo $data[0]->status?>">
						</div>
	<div>
		<label>Tipo de Estado</label>
		 <select name="id_type_statuses" class="form-control">
			 <option value="">Seleccione</option>
			  	<?php
					  foreach ($types as $type) 
				{
						 if ($type->id_type_statuses == $data[0]->id_type_statuses)
						  {
					?>
								<option selected value="<?php echo $type->id_type_statuses ?>"><?php echo $type->name_type_statuses?></option>
					<?php
						  } else {
					?>
			 						<option  value="<?php echo $type->id_type_statuses ?>"><?php echo $type->name_type_statuses?></option>			
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
		</section>
</main>