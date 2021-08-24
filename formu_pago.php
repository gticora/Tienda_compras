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
    <?php  
	session_start();
	$datos = $_SESSION['carrito'];
	$cantidad=$datos[0]['cantidad'];
	?>
	<div  class="row col-lg-12">
		<?php include 'menu.php' ?>
	</div>
	<section>	
		<div class="card mb-3">
            <div class="card-body">
            <form class="row g-3">
                <div class="col-md-6">
                    <label for="inputEmail4" class="form-label">Datos de pago</label>
                    <input type="email" class="form-control" id="inputEmail4" placeholder="Nombres Completos">
                    <label for="inputAddress2" class="form-label"></label>
                    <input type="text" class="form-control" id="inputAddress2" placeholder="Documento de identidad">
                    <label for="inputAddress2" class="form-label"></label>
                    <input type="text" class="form-control" id="inputAddress2" placeholder="Direccion">
                    <label for="inputAddress2" class="form-label"></label>
                    <input type="text" class="form-control" id="inputAddress2" placeholder="Numero de tarjeta">
                    <label for="inputAddress2" class="form-label"></label>
                    <input type="text" class="form-control" id="inputAddress2" placeholder="Nombre del titular">
                    <label for="inputAddress2" class="form-label"></label>
                    <div class="row">
                        <div class="col-md-6"><input type="text" class="form-control" id="inputAddress" placeholder="(MM/AA)"></div>
                        <div class="col-md-6"><input type="text" class="form-control" id="inputAddress2" placeholder="CVV"></div>
                    </div>
                </div>
                <div class="col-12">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    Finalizar compra
                </button>
                <small class="text-muted"><a href="./" class="btn btn-primary">Volver</a></small>
                </div>
                </form>
            </div>
		</div>
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
            </div>
            <div class="modal-body">
                <div class="alert alert-success" role="alert">
                    Pago efectuado correctamente
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal">Cerrar</button>
            </div>
            </div>
        </div>
        </div
	</section>
</body>
</html>