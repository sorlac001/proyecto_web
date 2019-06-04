<?php
	session_start();
	$tipo_usuario = $_SESSION['tipo_usuario'];
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
						<a class="navbar-brand" href="#">Mochilas RiMo</a>
						<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
							<span class="navbar-toggler-icon"></span>
						</button>
						<div class="col-6"></div>
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
					<div id="slider" class="carousel slide" data-ride="carousel">
						<ol class="carousel-indicators">
							<li data-target="#slider" data-slide-to="0" class="active"></li>
							<li data-target="#slider" data-slide-to="1"></li>
							<li data-target="#slider" data-slide-to="2"></li>
						</ol>
						<div class="carousel-inner">
							<div class="carousel-item active">
								<img class="" src="../img/mochila1.jpg" alt="">
							</div>
							<div class="carousel-item">
								<img class="" src="../img/mochila2.jpg" alt="">
							</div>
							<div class="carousel-item">
								<img class="" src="../img/mochila3.jpg" alt="">
							</div>
						</div>
						<a class="carousel-control-prev" href="#slider" role="button" data-slide="prev">
							<span class="carousel-control-prev-icon" aria-hidden="true"></span>
							<span class="sr-only">Siguiente</span>
						</a>
						<a class="carousel-control-next" href="#slider" role="button" data-slide="next">
							<span class="carousel-control-next-icon" aria-hidden="true"></span>
							<span class="sr-only">Anterior</span>
						</a>
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