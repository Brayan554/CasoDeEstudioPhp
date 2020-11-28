<main class="container">
	<section class="col-md-12 text-center">
		<h1 class="font-family">Listado de Roles</h1>
		<div>
			<h2>Roles </h2>
		</div>
	</section>

	<section class="col-md-6 table-responsive table-hover">
	<table class="table">
  <thead class="thead-dark">
    <tr>
      <th>#</th>
      <th>Rol</th>
      <th>Estado</th>
      <th>Cambiar Estado</th>
      
    </tr>
  </thead>
  <tbody>
  	<?php foreach ($roles as $rol) : ?>
		    <tr>
		      <td><?php echo $rol->id_rol?></td>
		      <td><?php echo $rol->name_rol?></td>
		      <td><?php echo $rol->status?></td>
		       <td>
		      	<?php  
		      	if ($rol->id_status == 1) {
		      		?>
		      	
		      	<a href="?controller=rol&method=updateStatus&id_rol=<?php echo $rol->id_rol?>" class="btn btn-danger">Desactivar</a>

		      	<?php 
		      	}elseif($rol->id_status == 2) {
		      	?>
		      	
		      	<a href="?controller=rol&method=updateStatus&id_rol=<?php echo $rol->id_rol?>" class="btn btn-primary">Activar</a>
		      	
		      	<?php 
		      	}
		      	?>

		      </td>
		    </tr>
    <?php endforeach ?>
  </tbody>
</table>
	</section>
	
</main>