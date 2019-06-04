<?php
	session_start();
	if(isset($_SESSION['tipo_usuario'])){
		header('Location:../index.php');
	}
?>
<!DOCTYPE html>

<html>
	<head>
		<meta charset = "utf-8"/>
		<meta name = "viewport" content = "width=device-width"/>
		<link rel = "stylesheet" href = "https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
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
													<a class="nav-link" href="#">Carrito</a>
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
				<form class="needs-validation" method="post" action="../control/altaUsuario.php">
					<div class="form-row">
						<div class="form-group col-4">
							<label for="nombre">Nombre</label>
							<input type="text" class="form-control" id="nombre" name="nombre" placeholder="Andres Manuel" required>
						</div>
						<div class="form-group col-4">
							<label for="aPaterno">Apellido Paterno</label>
							<input type="text" class="form-control" id="aPaterno" name="aPaterno" placeholder="Lopez" required>
						</div>
						<div class="form-group col-4">
							<label for="aMaterno">Apellido Materno</label>
							<input type="text" class="form-control" id="aMaterno" name="aMaterno" placeholder="Obrador" required>
						</div>
					</div>
					<div class="form-row">
						<div class="form-group col-10">
							<label for="direccion ">Direccion</label>
							<input type="text" class="form-control" id="direccion" name="direccion" placeholder="Direccion" required>
							<small class="form-text text-muted">Calle, N&uacute;mero, Colonia, Entidad federativa, Delegacion o municipio</small>
						</div>
						<div class="form-group col-2">
							<label for="telefono">Telefono</label>
							<input type="text" class="form-control" id="telefono" name="telefono" placeholder="5566778899" size="10" maxlength="10" required>
							<small class="form-text text-muted">10 digitos</small>
						</div>
					</div>
					<div class="form-row">
						<div class="form-group col-4">
							<label for="correo">Correo</label>
							<input type="email" class="form-control" id="correo" name="correo" placeholder="ejemplo@dominio.com" required>
						</div>
						<div class="form-group col-4">
							<label for="usuario">Usuario</label>
							<input type="text" class="form-control" id="usuario" name="usuario" placeholder="AMLO" required>
							<small class="form-text text-muted">Longitud minima de 6 caracteres</small>
						</div>
						<div class="form-group col-4">
							<label for="contrasena">Contrase&ntilde;a</label>
							<input type="password" class="form-control" id="contrasena" name="contrasena"  placeholder="Contrase&ntilde;a" required>
							<small class="form-text text-muted">Longitud minima de 8 caracteres, debe incluir al menos un digito y una letra mayuscula</small>
						</div>
					</div>
					
					<input class="invisible" value="3" name="tipoUsuario"/>
					<button type="submit" class="btn btn-primary" name="enviar">Enviar</button>
				</form>
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

