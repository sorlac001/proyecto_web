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
						<div class = "col">
	                        <h2 id="titulo">Nuevo usuario</h2>
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
								<div class="form-check">
									<input class="form-check-input" type="radio" name="tipoUsuario" id="uAdministrador" value="1">
									<label class="form-check-label" for="uAdministrador">
									Usuario administrador
									</label>
								</div>
								<div class="form-check col-6">
									<input class="form-check-input" type="radio" name="tipoUsuario" id="uVentas" value="2">
									<label class="form-check-label" for="uVentas">
									Usuario de ventas
									</label>
								</div>
								<div class="form-check col-6">
									<input class="form-check-input" type="radio" name="tipoUsuario" id="uCliente" value="3" checked>
									<label class="form-check-label" for="uCliente">
									Usuario cliente
									</label>
								</div>		
								
								<button type="submit" class="btn btn-primary" name="enviar">Enviar</button>
							</form>
						</div>
					</div>

					<div class = "row">
						<div class = "col">
						<h2>Usuarios Registrados</h2>
						<table class="table table-striped">
						  <thead>
						    <tr>
                              <th scope="col">Nombre</th>
						      <th scope="col">Apellido Paterno</th>
						      <th scope="col">Apellido Materno</th>
                              <th scope="col">Telefono</th>
                              <th scope="col">Correo</th>
                              <th scope="col">Usuario</th>
                              <th scope="col">Tipo usuario</th>
						      <th scope="col">Modificar</th>
						      <th scope="col">Eliminar</th>
						    </tr>
						  </thead>
						  <tbody>
						  	<?php
						  		include_once('../model/conexion.php');

						  		$con = aConectar();
	                    		$query=("SELECT id_usuario,nombre,ap_paterno,ap_materno,telefono,correo,usuario,id_tipo_usuario FROM usuarios");
	                    		$res=pg_query($con,$query);

	                    		while ($f=pg_fetch_array($res)) {
	                    			$id_tipo_usuario = $f['id_tipo_usuario'];
	                    			$cons_tipo=("SELECT tipo FROM tipo_usuarios WHERE id_tipo_usuario = $id_tipo_usuario");
	                    			$marc=pg_query($con,$cons_tipo);
	                    			$m=pg_fetch_array($marc);
						  	?>
						  		<tr>
                                    <td><?php echo $f['nombre']?></td>
                                    <td><?php echo $f['ap_paterno']?></td>
                                    <td><?php echo $f['ap_materno']?></td>
                                    <td><?php echo $f['telefono']?></td>
                                    <td><?php echo $f['correo']?></td>
                                    <td><?php echo $f['usuario']?></td>
                                    <td><?php echo $m['tipo']?></td>
                                    <td><a class = "editar" href="editarUsuario.php?nombre=<?php echo $f['nombre']?>&ap_paterno=<?php echo $f['ap_paterno']?>&ap_materno=<?php echo $f['ap_materno']?>&telefono=<?php echo $f['telefono']?>&correo=<?php echo $f['correo']?>&usuario=<?php echo $f['usuario']?>&id_usuario=<?php echo $f['id_usuario']?>"><i class="fas fa-edit"></i></a></td>
							        <td><a href="../control/bajaUsuario.php?usuario=<?php echo $f['id_usuario']?>"><i class="fas fa-trash-alt"></i></a></td>
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
			<script src="../js/main.js"></script>
      	</body>
</html>