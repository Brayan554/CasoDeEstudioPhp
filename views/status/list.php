<main class="container">

	<section class="col-md-12 text-cemter">
		<center>

		<h1 class="font-family">Lista de Estados</h1>
		<div>
			<h2 class="font-family">Estados</h2>
			<a href="?controller=status&method=new" class="btn btn-success">Agregar</a>
			
		</div>
		</center>
		

		<section class="col-md-8 table-responsive">
		<table class="table table-bordered table-hover">
  <thead class="thead-dark">
			    <tr>
			      <th >#</th>
			      <th>Nombre Estado</th>
			      <th>tipo de estado</th>
			      <th>Acciones</th>
			    </tr>

			  </thead>
			  <tbody>
			  	<?php foreach ($statuses as $status) : ?> 
			    <tr>
			    
			      <td><?php echo $status->id_status?></td>
			      <td><?php echo $status->status?></td>
				  <td><?php echo $status->name_type_statuses ?></td>

			 
			      <td>
			      	<a href="?controller=status&method=edit&id_status=<?php
			      	echo $status->id_status?>" class="btn btn-primary">Editar</a>

			      	<a href="?controller=statusmethod=delete&id_status=<?php echo $status->id_status?>" class="btn btn-danger">Eliminar</a>
			      	
			      </td>
			    </tr>
			  <?php endforeach?>
			    
			  </tbody>
			</table>
			

		</section>
		</section>	
		
	</section>
</main>