<main class="container">
	<div>
		<h1>Editar Usuario</h1>
	</div>
	<section>
		<div class="card w-75 m.auto">
			<div class="card-header container">
			<h2>Informacion del usuario</h2>
			</div>
			<div>
				<form action="?controller=user&method=update" method="post">
						<input type="hidden" name="id_user" value="<?php 
						echo $data[0]->id_user ?>">
					<div>
							<label>Nombre</label>
							<input type="text" name="name" class=" form-control" placeholder="Ingrese Nombre Comnpleto"
							value="<?php echo $data[0]->name ?>">
					</div>
					<div>
							<label>Email</label>
							<input type="email" name="email" class=" form-control" placeholder="Ingrese Email"
							value="<?php echo $data[0]->email ?>">
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
		<label>Rol</label>
		  <select name="id_rol" class="form-control">
			  <option value="">Seleccione</option>
							<?php
						foreach ($roles as $rol) 
							{
								if ($rol->id_rol == $data[0]->id_rol)
									{
								?>
				           <option selected value="<?php echo $rol->id_rol ?>"><?php echo $rol->name_rol ?></option>
								<?php
									} else {
								 ?>
								   <option  value="<?php echo $rol->id_rol ?>"><?php echo $rol->name_rol ?></option>			
							  <?php
													}
							}
								 ?>
		  </select>
	</div>

	<div>
		   <button class="btn btn-primary">Actualizar</button>
	</div>
				</form>
			</div>
		</div>
	</section>
</main>