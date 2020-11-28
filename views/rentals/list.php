<main class="container">
	<section class="col-md-12 text-center">
		<h1 class="font-family">Listado de Alquileres</h1>
		<div>
			<h2>Alquileres</h2>
			<a href="?controller=rental&method=new" class="btn btn-success">Agregar</a>
		</div>
	</section>

	<section class="col-md-12 table-responsive table-hover">
	<table class="table">
  <thead class="thead-dark">
    <tr>
      <th>#</th>
      <th>Fecha Inicial</th>
      <th>Fecha De Entrega</th>
      <th>Total Alquileres</th>
      <th>Estado</th>
      <th>Usuario</th>
      <th>Acciones</th>
      <th>Cambiar Estado</th>
      <th>Peliculas</th>

    </tr>
  </thead>
  <tbody>
  	<?php foreach ($rentals as $rental) : ?>
		    <tr>
		      <td><?php echo $rental->id_rentals?></td>
		      <td><?php echo $rental->start_date_rentals?></td>
		      <td><?php echo $rental->end_date_rentals?></td>
		      <td><?php echo $rental->total_rentals?></td>
		      <td><?php echo $rental->status?></td>
			  <td><?php echo $rental->user?></td>

		      <td>
		      	<a href="?controller=rental&method=edit&id_rentals=<?php echo $rental->id_rentals ?>" class="btn btn-info">Editar</a>

		      	<a href="?controller=rental&method=delete&id_rentals=<?php echo $rentals->id_rentals?>" class="btn btn-warning">Eliminar</a>

		      </td>
		      <td>
		      <?php 
		      if ($rental->id_status == 1) {
		      	?>
				<a href="?controller=rental&method=updateStatus&id_rentals=<?php echo $rental->id_rentals ?>" class="btn btn-danger">Desactivar</a>

		      	<?php 
		      }elseif ($rental->id_status == 2 ) {
		      	?>
		      	<a href="?controller=rental&method=updateStatus&id_rentals=<?php echo $rental->id_rentals ?>" class="btn btn-primary">Activar</a>

		      	<?php
		      }{


		      }
		       ?>
		       </td>

		      <td>
		      	<a href="javascript:abrir()">Peliculas</a>
		      </td>

		    </tr>
  		<?php endforeach ?>
  </tbody>
</table>

<div class="ventana" id="vent">

            <div class="col-sm-10 main-section ">
                <div class="modal-content">
                    <div id="cerrar">
                     <a href="javascript:cerrar()"><img src="assets/img/cancel.png"></a>    
                    </div>
            <table class="table table-striped table-hover">
			  <thead>
			    <tr>
			      <th>#</th>
			      <th>Nombre</th> 
			    </tr>
			  </thead>
			  <tbody>
			  	<?php foreach ($movies as $movie) : ?>
					    <tr>
					      <td><?php echo $movie->id_movie?></td>
					      <td><?php echo $movie->name_movie?></td>
					      
					    </tr>
				<?php endforeach ?>
			  </tbody>
			</table>
                	
            </div>   
        </div>
    </div>
	</section>
	
</main>
<script>

            function abrir(){
                document.getElementById("vent").style.display="block"; 
            }

            function cerrar(){
                document.getElementById("vent").style.display="none";
            }

</script>