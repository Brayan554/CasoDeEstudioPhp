<main class="container">
	<div class="row">
		<h1>Editar Tipos De Estados</h1>
	</div>
		<section class="row mt-5">
			<div class="card w-75 m-auto">
				<div class="card-header container">
				<h2 class="m-auto">Informacion Tipos de Estado</h2>	
				</div>
			
			     <div class="card-body">
					<form action="?controller=type_status&method=update" method="post">
						
						<input type="hidden" name="id_type_statuses" value="<?php
						echo $data[0]->id_type_statuses ?>">

						<div class="form-group">
							<label>Tipo de Estado</label>
							<input type="text" name="name_type_statuses" class="form-control" placeholder="Ingrese Nombre del Tipo Estado"
							value="<?php echo $data[0]->name_type_statuses?>">
						</div>

						<div class="form-group">
							<button class="btn btn-primary">Actualizar</button>
						</div>
					</form>
			   </div>
			</div>
		</section>
</main>