<?php
	session_start();
	$tipo_usuario = $_SESSION['tipo_usuario'];

	if($tipo_usuario != 'A'){
		header('Location:../index.php');
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
						<div class="col-6"></div>
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
					<div class = "row">
						<div class = "col">
						<h2>Nueva Marca</h2>
						<form class="needs-validation" method="post" action="../control/altaMarca.php">
							<div class="form-row">
								<div class="form-group col-4">
									<label for="nombre">Nombre</label>
									<input type="text" class="form-control" id="nombre" name="nombre" placeholder="" required>
								</div>
							</div>
							<button type="submit" class="btn btn-primary" name="enviar">Enviar</button>
						</form>
					</div>
					</div>

					<div class = "row">
						<div class = "col">
						<h2>Marcas Registradas</h2>
						<table class="table table-striped">
						  <thead>
						    <tr>
						      <th scope="col">Nombre</th>
						      <th scope="col">Modificar</th>
						      <th scope="col">Eliminar</th>
						    </tr>
						  </thead>
						  <tbody>
						  	<?php
						  		include_once('../model/conexion.php');

						  		$con = aConectar();
	                    		$query=("SELECT id_marca,nombre FROM marcas");
	                    		$res=pg_query($con,$query);

	                    		while ($f=pg_fetch_array($res)) {
						  	?>
						  		<tr>
						  			<form action="../control/modificarMarca.php" method="post">
							      <td><input type = "text" placeholder="<?php echo $f['nombre']?>" name="nombre"/><input name="id_marca" value="<?php echo $f['id_marca']?>" style="display:none;"/></td>
							      <td><button type="submit" name="enviar"><i class="fas fa-edit"></i></button></td>
							      	</form>
							      <td><a href="../control/bajaMarca.php?marca=<?php echo $f['id_marca']?>"><i class="fas fa-trash-alt"></i></a></td>
							    </tr>
						  	<?php
			                    }
			                ?>
						  </tbody>
						</table>
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