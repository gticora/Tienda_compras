<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8"/>
	<title>Carrito de Compras</title>
	<!-- las rutas pivotean con index.php -->
	<link rel="stylesheet" type="text/css" href="./css/estilos.css">
	<script type="text/javascript"  src="./js/scripts0.js"></script>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
</head>
<body>
	<?php  
	session_start();
	$datos = $_SESSION['carrito'];
	$cantidad=$datos[0]['cantidad'];
	?>
	<div  class="row col-lg-12">
		<?php include 'menu.php' ?>
	</div>
	<section>
		<div class="row row-cols-1 row-cols-md-3 g-4">
			<?php
				include 'conexion.php';
				// seleccionamos a todos los registros de la base
				$resultado = mysqli_query($con,"select * from productos")or die(mysqli_error());
				while ($f = mysqli_fetch_array($resultado)):
				?>
				<div class="col">
					<div class="card h-100">
						<img src="./productos/<?=$f['imagen'];?>" class="card-img-top" alt="...">
						<div class="card-body">
							<h5 class="card-title"><?=$f['nombre'];?></h5>
							<p class="card-text"><?=$f['descripcion'];?></p>
						</div>
						<div class="card-footer">
							<small class="text-muted"><a href="./detalles.php?id=<?php echo $f['id'] ?>" class="btn btn-primary">Ver</a></small>
						</div>
					</div>
				</div>
			<?php endwhile;?>
		</div>
	</section>
</body>
</html>