 <main class="container">
	<section class="col-md-12  text-center">

		<h1 class="font-family">Listado de Los Usuario</h1>
		<div>
			<h2 class="font-family">Usuarios</h2>
			<a href="?controller=user&method=new"  class="btn btn-success">Agregar</a>
		</div>

		<section class="col-md-12 table-responsive">
				<table class="table table-bordered table-hover">
			  <thead>
			    <tr>
			      <th >#</th>
			      <th >Nombre</th>
			      <th >Email</th>
			      <th >Estado</th>
			      <th >Rol</th>
			      <th>Acciones</th>
			      <th>Cambiar Estado</th>
			    </tr>

			  </thead>
			  <tbody>
			  	<?php foreach ($users as $user) : ?> 
			    <tr>
			    
			      <td><?php echo $user->id_user?></td>
			      <td><?php echo $user->name?></td>
			      <td><?php echo $user->email?></td>
			      <td><?php echo $user->status?></td>
			      <td><?php echo $user->rol?></td>
			      <td>
			      	<a href=" ?controller=user&method=edit&id_user=<?php echo $user->id_user?>" class="btn btn-info">Editar</a>
			      	 
			      	 
			      	<a href="?controller=user&method=delete&id_user=<?php echo $user->id_user ?>" class="btn btn-warning">Eliminar</a>
			      	<?php  
			      	if ($user->id_status == 1) {
			      		?>
			      		<td>
			      		<a href="?controller=user&method=updateStatus&id_user=<?php echo $user->id_user?>" class="btn btn-danger">Desactivar</a>
			      		</td>
			      		<?php  
			      	}else{
			      		?>
			      		<td>
			      		<a href="?controller=user&method=updateStatus&id_user=<?php echo $user->id_user?>" class="btn btn-primary">Activar</a>
			      		</td>
			      		<?php

			      	}
			      	?>

			      </td>	
			    </tr>
			  	
			  <?php endforeach?>
			    
			  </tbody>
			</table>
		</section>

	</section>
	

</main>