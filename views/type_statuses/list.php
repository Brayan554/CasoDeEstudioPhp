<main class="container">
	<section class="col-md-12 text-center">
		<h1 class="font-family">Listado de Tipos de estados </h1>
		<div>
			<h2>Tipos de estados</h2>
			<a href="?controller=type_status&method=new" class="btn btn-success">Agregar</a>
		</div>
	</section>

	<section class="col-md-10 table-responsive table-hover">
	<table class="table">
  <thead class="thead-dark">
    <tr>
      <th>#</th>
      <th>Tipos de estados</th>
      <th>Acciones</th>
      
    </tr>
  </thead>
  <tbody>
  	<?php foreach ($tyoes as $type) : ?>
		    <tr>
		      <td><?php echo $type->id_type_statuses?></td>
		      <td><?php echo $type->name_type_statuses?></td>
		      
			  
		      <td>
		      	<a href="?controller=type_status&method=edit&id_type_statuses=<?php echo $type->id_type_statuses?>" class="btn btn-info">Editar</a>

		      	<a href="?controller=type_status&method=delete&id_type_statuses=<?php echo $type->id_type_statuses?>" class="btn btn-warning">Eliminar</a>
		      </td>
		    </tr>
  		<?php endforeach ?>
  </tbody>
</table>
	</section>
	
</main>