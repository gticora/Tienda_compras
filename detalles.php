<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8"/>
	<title>Carrito de Compras</title>
	<link rel="stylesheet" type="text/css" href="./css/estilos.css">
	<script type="text/javascript"  src="./js/scripts0.js"></script>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
</head>
<body>
	<div  class="row col-lg-12">
		<?php include 'menu.php' ?>
	</div>
	<section>	
		<?php
			include 'conexion.php';
			//tomamos la id del enlace del index
			$id = $_GET['id'];
			$resultado = mysqli_query($con,"select * from productos where id=".$id)or die(mysqli_error());
			while ($f = mysqli_fetch_array($resultado)):
		?>
		<div class="card mb-3">
		<img src="./productos/<?php echo $f['imagen'];?>"  style="width: 400px;" class="card-img-top" alt="...">
		<div class="card-body">
			<h5 class="card-title"><span><?php echo $f['nombre'];?></span></h5>
			<p class="card-text"><span>Precio:&nbsp;&nbsp;$<?php echo $f['precio'];?></span></p>
			<p class="card-text">
				<small class="text-muted"><a href="./index.php" class="btn btn-primary">Volver a catalogo</a></small>
				<small class="text-muted"><a href="./carritodecompras.php?id=<?php echo $f['id'] ?>" class="btn btn-primary">Comprar</a></small>
			</p>
		</div>
		</div>
		<?php endwhile; ?>
	</section>
</body>
</html>