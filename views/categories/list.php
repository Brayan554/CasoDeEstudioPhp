<main class="container">
	<section class="col-md-12 text-center">
		<h1 class="font-family">Listado Categoria </h1>

		<div>
			<h2 class="font-family">Categorias-Pelis</h2>
			<a href="?controller=categorie&method=new" class="btn btn-success">Agregar</a>

		</div>
	</section>
		<section class="col-md-7 table-responsive">
			<table class="table table-striped table-hover">
			  <thead>
			    <tr>
			      <th>#</th>
			      <th>Nombre</th>
			      <th>Estado</th>
			      <th>Acciones</th>
			      <th>Cambiar Estado</th>
			    </tr>
			  </thead>
			  <tbody>
			  	<?php foreach ($categories as $categorie) : ?>
					    <tr>
					      <td><?php echo $categorie->id_categories?></td>
					      <td><?php echo $categorie->name_categories?></td>
					      <td><?php echo $categorie->status?></td>
					      <td>
					      	<a href="?controller=categorie&method=edit&id_categories=<?php echo $categorie->id_categories?>" class="btn btn-info">Editar</a>

					      	<a href="?controller=categorie&method=delete&id_categories=
					      	<?php echo $categorie->id_categories ?>" class="btn btn-warning">Eliminar</a>
					      </td>	
					      	<?php  
					      	if ($categorie->id_status == 1) {
					      	
					      	?>
					      	<td>
					      	<a href="?controller=categorie&method=updateStatus&id_categories=<?php echo $categorie->id_categories?>" class="btn btn-danger">Desactuvar</a>
					      	</td>
					      	<?php  }elseif($categorie->id_status == 2){

					      	?>
					      	<td>
					      	<a href="?controller=categorie&method=updateStatus&id_categories=<?php echo $categorie->id_categories?>" class="btn btn-primary">Activar</a>
					      	</td>
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