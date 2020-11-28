<main class="container">
	<div class="row">
		<h1>Agregar Usuario</h1>
	</div>

	<section class="row mt-5">
		<div class="card w-75 m-auto">
			<div class="card-header container">
			<h2>Informacion del usuario</h2>
			</div>
			<div class="card-body ">
				<form action="?controller=user&method=save" method="post">
						<div class="form-group">
							<label>Nombre</label>
								<input type="text" name="name" class="form-control" placeholder="Ingrese Nombre Comnpleto">
						</div>
						<div>
							<label>Email</label>
								<input type="email" name="email" class="form-control" placeholder="Ingrese Email">
						</div>
					<div>
						<label>Contraseña</label>
						<input type="password" name="password" class="form-control" placeholder="Ingrese Contraseña">
					</div>
					<div>
		<label>Roles</label>
		 <select name="id_status" class="form-control">
			 <option value="">Seleccione</option>
			  	<?php
					  foreach ($roles as $rol) 
				{
						 if ($rol->id_rol == $data[0]->rol)
						  {
					?>
								<option selected value="<?php echo $rol->id_rol ?>"><?php echo $rol->name_rol?></option>
					<?php
						  } else {
					?>
			 						<option  value="<?php echo $rol->id_rol ?>"><?php echo $rol->name_rol?></option>			
					<?php
								 }
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