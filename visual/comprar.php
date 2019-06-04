<?php
    session_start();
    $tipo_usuario = $_SESSION['tipo_usuario'];
    $id_usuario = $_SESSION['id_usuario'];
    if($tipo_usuario == 'V'){
    	header("Location:../index.php");
    } else {
    	$arreglo=$_SESSION['carrito'];
    }
?>

<!DOCTYPE html>

<html>
    <head>
        <meta charset = "utf-8"/>
        <meta name = "viewport" content = "width=device-width"/>
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
        <link rel = "stylesheet" href = "../css/bootstrap.css"/>
        <link rel = "stylesheet" href = "../css/main.css"/>
    </head>
    <body>
        <div class = "container pagina">
            <header>
                <nav class="navbar navbar-expand-lg navbar-light">
                    <a class="navbar-brand" href="../index.php">Mochilas RiMo</a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="col-7"></div>
                    <div class="collapse navbar-collapse justify-content-end" id="navbar">
                    <ul class="navbar-nav mr-auto">
							<li class="nav-item">
								<a class="nav-link" href="mochilas.php">Mochilas</a>
							</li>
							<?php 
								switch($tipo_usuario){
									case 'C': echo '<li class="nav-item">
													<a class="nav-link" href="carrito.php">Carrito</a>
												</li>
												<li class="nav-item dropdown">
													<a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
														Cuenta
													</a>
													<div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
														<a class="dropdown-item" href="#">Mis datos</a>
														<a class="dropdown-item" href="compras.php">Mis compras</a>
														<a class="dropdown-item" href="../control/cerrarSesion.php">Cerrar sesi&oacute;n</a>
													</div>
												</li>
											';
											break;
									case 'A': echo '<li class="nav-item">
													<a class="nav-link" href="gestionarUsuarios.php">Usuarios</a>
												</li>
												<li class="nav-item">
													<a class="nav-link" href="gestionarMarcas.php">Marcas</a>
												</li>
												<li class="nav-item">
													<a class="nav-link" href="../control/cerrarSesion.php">Cerrar Sesion</a>
												</li>
											';
											break;
									case 'V': echo '<li class="nav-item">
													<a class="nav-link" href="gestionarMochilas.php">Gestionar Articulos</a>
												</li>
												<li class="nav-item">
													<a class="nav-link" href="../control/cerrarSesion.php">Cerrar Sesion</a>
												</li>
											';
											break;
									default: echo '<li class="nav-item">
													<a class="nav-link" href="iniciarSesion.php">Autenticarse</a>
												</li>
												<li class="nav-item">
													<a class="nav-link" href="registrarUsuario.php">Registrate</a>
												</li>
											';
												break;
								}
							?>
						</ul>
                    </div>
                </nav>
            </header>
            <main>
            	<div class = "row">
            		<div class="col-6">
            			<?php
							$total=0;
						if(isset($_SESSION['carrito'])){
							$datos=$_SESSION['carrito'];
							
							$total=0;
							for($i=0;$i<count($datos);$i++){
							
						?>
							<div class="card">
								<img class = "card-img-top" src="../img/<?php echo $datos[$i]['Imagen'];?>"><br>
								<div class = "card-body">
									<span><?php echo $datos[$i]['Nombre'];?></span><br>
									<span>Precio: <?php echo $datos[$i]['Precio'];?></span><br>
									<span>Cantidad: <input type="text" value="<?php echo $datos[$i]['Cantidad'];?>"></span><br>
									<span>Subtotal:<?php echo $datos[$i]['Cantidad']*$datos[$i]['Precio'];?></span><br>
								</div>
							</div>
								
						<?php
						$total=($datos[$i]['Cantidad']*$datos[$i]['Precio'])+$total;
					}
					}
					
				?>
            		</div>
					<div class = "col-6">
                        <h2 id="titulo">Confirmar compra</h2>
		                <form class="needs-validation" method="post" action="../control/altaVenta.php">
		                	<div class="form-group">
                                    <label for="precio_unitario">Precio total unitario</label>
                                    <input type="text" class="form-control" id="precio_unitario" name="precio_unitario" placeholder="<?php echo $total; ?>" value="<?php echo $total; ?>" readonly required>
                                </div>
		                	<h3>Tipo de envio</h3>
		                	<div class="form-check">
								<input class="form-check-input" type="radio" name="tipo_envio" id="teExpres" value="1">
								<label class="form-check-label" for="teExpres">
								Exprés
								</label>
							</div>
							<div class="form-check col-6">
								<input class="form-check-input" type="radio" name="tipo_envio" id="teEstandar" value="2">
								<label class="form-check-label" for="teEstandar">
								Estándar
								</label>
							</div>

							<h3>Forma de pago</h3>
							<div class="form-check">
								<input class="form-check-input" type="radio" name="forma_pago" id="fpEfectivo" value="1">
								<label class="form-check-label" for="fpEfectivo">
								Pago en efectivo
								</label>
							</div>
							<div class="form-check col-6">
								<input class="form-check-input" type="radio" name="forma_pago" id="fpDebito" value="2">
								<label class="form-check-label" for="fpDebito">
								Tarjeta de débito
								</label>
							</div>
							<div class="form-check col-6">
								<input class="form-check-input" type="radio" name="forma_pago" id="fpCredito" value="3">
								<label class="form-check-label" for="fpCredito">
								Tarjeta de crédito
								</label>
							</div>
							<input class="invisible" value="<?php echo $id_usuario; ?>" />
							<button type="submit" class="btn btn-primary" name="enviar">Comprar</button>
						</form>
					</div>
				</div>
           	</main>
            <footer>
                <div class="row">
                    <div class="col">
                        <p>Proyecto final de Web2.0</p>
                    </div>
                    <div class="col">
                        <p>P&aacute;gina creada por: </p>
                        <p>Carlos Armando Garc&iacute;a Mart&iacute;nez</p>
                    </div>
                    <div class="col">
                        <p>Siguenos en nuestras redes sociales: </p>
                        <a href="https://www.facebook.com"><i class="fab fa-facebook-square"></i></a>
                        <a href="https://www.twitter.com"><i class="fab fa-twitter-square"></i></a>
                    </div>
                </div>
            </footer>
        </div>
        <script src="../js/jquery-3.1.1.js"></script>
        <script src="../js/bootstrap.js"></script>

    </body>
</html>