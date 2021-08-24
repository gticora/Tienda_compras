<!-- ponemos la variable de sesión antes de todo -->
<?php 
  session_start();
  include './conexion.php';

  // comprobamos si existe la variable de sesión
  if (isset($_SESSION['carrito'])) {

  	// por si queremos acceder al carrito
  	if (isset($_GET['id'])) {
  		// ponemos lo que hay en la sesión (que es un arreglo de objetos productos) en una variable
	    $arreglo = $_SESSION['carrito'];
	    $encontro = false;     
	    $numero = 0;

	    // recorremos el arreglo buscando si el producto camprado ya estaba en el carrito con anterioridad
	    for ($i=0; $i < count($arreglo) ; $i++) { 
	    	if ($arreglo[$i]['id'] == $_GET['id']) {
	    		$encontro = true;
	    		// guardamos la posición del producto
	    		$numero = $i;
	    	}
	    }

        // si el producto ya estaba en el carrito, incrementamos la cantidad del mismo
	    if ($encontro) {
	    	$arreglo[$numero]['cantidad']++;
	    	$_SESSION['carrito'] = $arreglo;
	    }
        // si no estaba, lo ponemos en la sesión
        else{
        	$nombre = "";
       	    $precio = 0;
       	    $imagen = "";
       	    $resultado = mysqli_query($con,"select * from productos where id =". $_GET['id']);
            // guardamos algunos datos del producto en variables
            while($resulset=mysqli_fetch_array($resultado)){
            	$nombre = $resulset['nombre'];
            	$precio = $resulset['precio'];
            	$imagen = $resulset['imagen'];
            }
            // ponemos esas variables como atributos de un objeto de tipo producto
            // como es la primera vez que entra el producto al carrito el valor de cantidad por defecto es uno 
            $nuevoproducto = array('id'=>$_GET['id'],
            	               'nombre'=>$nombre,
            	               'precio'=>$precio,
            	               'imagen'=>$imagen,
            	               'cantidad'=>1);

            // metemos al objeto producto en el vector
            array_push($arreglo, $nuevoproducto);
            
            // ponemos el arreglo en la sesión 
            $_SESSION['carrito'] = $arreglo;
        }
  	}
	  	 

  	 
  }else{
       // si no existe, comprobamos que recibimos un producto
       if (isset($_GET['id'])) {
       	    $nombre = "";
       	    $precio = 0;
       	    $imagen = "";
       	    $resultado = mysqli_query($con,"select * from productos where id =". $_GET['id']);
            // guardamos algunos datos del resultado en variables
            while($resulset=mysqli_fetch_array($resultado)){
            	$nombre = $resulset['nombre'];
            	$precio = $resulset['precio'];
            	$imagen = $resulset['imagen'];
            }
            // ponemos esas variables como atributos de un objeto de un array de objetos
            // como es la primera vez que entra (por condición de condicional) el valor de cantidad por defecto es uno 
            $arreglo[] = array('id'=>$_GET['id'],
            	               'nombre'=>$nombre,
            	               'precio'=>$precio,
            	               'imagen'=>$imagen,
            	               'cantidad'=>1);

            // metemos al vector en la sesión
            $_SESSION['carrito'] = $arreglo;
       }

  }
  $datos = $_SESSION['carrito'];
  $cantidad=$datos[0]['cantidad'];
 ?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8"/>
	<title>Carrito de Compras</title>
	<!-- las rutas siempre pivotea con index.php -->
	<link rel="stylesheet" type="text/css" href="./css/estilos.css">
	<script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
	<!-- <script type="text/javascript"  src="./js/scripts.js"></script> -->
	<!-- <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script> -->
	<script type="text/javascript"  src="./js/scripts0.js"></script>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
</head>
<body>
	<div  class="row col-lg-12">
		<?php include 'menu.php' ?>
	</div>
	<section>
	<div class="container">
		<div class="row">
			<div class="col-md-7">
				<?php  
					// suma del precio de los productos comprados
					$total = 0;

					// si está definida la variable de sesión
					// la variable de sesión trae un arreglo
					if (isset($_SESSION['carrito'])){
						
						$total = 0;
						// guardamos la sesión en un array de objetos productos
						$datos = $_SESSION['carrito'];
						//print_r($datos);
						
						for ($i=0; $i < count($datos); $i++) { 
				?>     
					
						<div class="toast" role="alert" aria-live="assertive" aria-atomic="true" data-bs-autohide="false" style="width: 800px;">
							<div class="toast-header">
								<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-tags-fill" viewBox="0 0 16 16">
								<path d="M2 2a1 1 0 0 1 1-1h4.586a1 1 0 0 1 .707.293l7 7a1 1 0 0 1 0 1.414l-4.586 4.586a1 1 0 0 1-1.414 0l-7-7A1 1 0 0 1 2 6.586V2zm3.5 4a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3z"/>
								<path d="M1.293 7.793A1 1 0 0 1 1 7.086V2a1 1 0 0 0-1 1v4.586a1 1 0 0 0 .293.707l7 7a1 1 0 0 0 1.414 0l.043-.043-7.457-7.457z"/>
								</svg>
								<small>&nbsp;</small>
								<strong class="me-auto"><span><?php echo($datos[$i]['nombre']) ?></span></strong>
								<button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
							</div>
							<div class="toast-body">
								<div class="row">
									<div class="col-md-6"><img src="./productos/<?php echo($datos[$i]['imagen']) ?>" style="width: 100px;" class="img-fluid rounded-start" alt="..."></div>
									<div class="col-md-6"><p class="card-text"><span>Precio:&nbsp;$<?php echo(number_format($datos[$i]['precio'],1)) ?></span></p>
										<p class="card-text"><span>Cantidad:
										<!-- ponemos el data-attribute precio e id -->
										<!-- ponemos una clase cantidad porque iterando y no puede usarse una id; para que jquery la reconozca-->
											<input type="text" value="<?php echo($datos[$i]['cantidad'])?>" size='3' data-precio="<?php echo($datos[$i]['precio']) ?>" data-id="<?php echo($datos[$i]['id']) ?>" class="cantidad" >
										</span></p>
										<p class="card-text"><span class="subtotal">Total Producto:&nbsp;$<?php echo(number_format($datos[$i]['cantidad']*$datos[$i]['precio'],1))?></span></p>
									</div>
								</div>
							</div>
						</div>
				<?php    
							// para cada vuelta de producto, sumamos los precios de las unidades compradas
							$total = $total + $datos[$i]['precio'] * $datos[$i]['cantidad'];    
						}
				
					} // si no está definida la variable de sesión
					else{
						echo "<center><h2>El Carrito de Compras está vacío</h2></center>";
					}
					// calculamos la suma total de todas las unidades de todos los productos
					//echo "<center><h4 id='total'>Total Compra:  &nbsp" .$total. "</h4></center><br>";
				?>	
				<!-- volvemos al index -->
			</div>
			<div class="col-md-5">
				<div class="card h-100">
					<div class="card-body">
						<h5 class="card-title">Resumen de Compra</h5>
						<p class="card-text"> Subtotal:        <?=number_format($total,1)?></p>
						<p class="card-text"> Descuentos:      $0</p>
						<p class="card-text"> Gastos de envio: $0</p>
						<p class="card-text"> <hr></p>
						<p class="card-text"> Total:         $  <?=number_format($total,1)?></p>
					</div>
					<div class="card-footer">
						<small class="text-muted"><a href="./" class="btn btn-primary">Volver</a></small>
						<small class="text-muted"><a href="./formu_pago.php" class="btn btn-primary">Pagar</a></small>
					</div>
					
				</div>
			</div>

		</div>
		
	</div>	
	</section>

	
</body>
<script>
$(document).ready(function(){
  $('.toast').toast('show');
});
</script>
</html>