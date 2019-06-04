<?php
	session_start();
	$tipo_usuario = $_SESSION['tipo_usuario'];

	if($tipo_usuario != 'V'){
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
                        <h2 id="titulo">Nueva mochila</h2>
                        <form class="needs-validation" method="post" action="../control/altaMochila.php">
                            <div class="form-row">
                                <div class="form-group col-4">
                                    <label for="nombre">Nombre</label>
                                    <input type="text" class="form-control" id="nombre" name="nombre" placeholder=""  value="" required>
                                </div>
                                <div class="form-group col-4">
                                    <label for="descripcion">Descripcion</label>
                                    <input type="text" class="form-control" id="descripcion" name="descripcion" placeholder=""  value="" required>
                                </div>
                                <div class="form-group">
                                    <label for="id_marca">Marca</label>
                                    <select class="form-control" id="id_marca" name="id_marca" placeholder=""  value="">
                                <?php
                                    include '../model/conexion.php';

                                    $con = vConectar();

                                    $marca = ("SELECT id_marca,nombre FROM marcas");

                                    $guarda_marca = pg_query($con, $marca);

                                    if(!$guarda_marca){
                                        echo '<option readonly>No hay marcas registradas</option>';
                                    } else {
                                        while ($row = pg_fetch_row($guarda_marca)){
                                            echo '<option value="'.$row[0].'">'.$row[1].'</option>';
                                        }
                                    }
                                ?>
                                    </select>
                                </div>
                                <div class="form-group col-4">
                                    <label for="descuento">Descuento</label>
                                    <input type="number" class="form-control" id="descuento" name="descuento" max="1" min="0" step="0.01" placeholder=""  value=""required>
                                </div>
                                <div class="form-group">
                                    <label for="tamano">Tama&ntilde;o</label>
                                    <select class="form-control" id="tamano" name="tamano" placeholder="" value="">
                                        <option value="G">Grande</option>
                                        <option value="M">Mediana</option>
                                        <option value="C">Chica</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-10">
                                    <label for="precio">Precio</label>
                                    <input type="text" class="form-control" id="precio" name="precio" placeholder="" value="" required>
                                </div>
                                <div class="form-group col">
                                    <label for="cantidad">Cantidad</label>
                                    <input type="number" class="form-control" id="cantidad" name="cantidad" max="10000" min="0" step="1" placeholder="" value="" required>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group">
                                    <label for="imagen">Imagen</label>
                                    <input type="file" class="form-control-file" id="imagen" name="imagen" value="" required>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary" name="enviar">Enviar</button>
                        </form>
					</div>
					</div>

					<div class = "row">
						<div class = "col">
						<h2>Mochilas Registradas</h2>
						<table class="table table-striped">
						  <thead>
						    <tr>
                              <th scope="col">Imagen</th>
						      <th scope="col">Nombre</th>
						      <th scope="col">Marca</th>
                              <th scope="col">Descuento</th>
                              <th scope="col">Tama&ntilde;o</th>
                              <th scope="col">Precio</th>
                              <th scope="col">Cantidad</th>
						      <th scope="col">Modificar</th>
						      <th scope="col">Eliminar</th>
						    </tr>
						  </thead>
						  <tbody>
						  	<?php
						  		include_once('../model/conexion.php');

						  		$con = vConectar();
	                    		$query=("SELECT id_mochila,imagen,nombre,descripcion,descuento,tamano,precio,cantidad,id_marca FROM mochilas");
	                    		$res=pg_query($con,$query);

	                    		while ($f=pg_fetch_array($res)) {
	                    			$id_marca = $f['id_marca'];
	                    			$cons_marca=("SELECT nombre FROM marcas WHERE id_marca = $id_marca");
	                    			$marc=pg_query($con,$cons_marca);
	                    			$m=pg_fetch_array($marc);
						  	?>
						  		<tr>
                                    <td><img class="imagenConsulta" src="../img/<?php echo $f['imagen']?>"></td>
                                    <td><?php echo $f['nombre']?></td>
                                    <td><?php echo $m['nombre']?></td>
                                    <td><?php echo $f['descuento'] * 100;?>%</td>
                                    <td><?php switch($f['tamano']){ 
                                                    case 'G':   echo 'Grande'; 
                                                                break;
                                                    case 'M':   echo 'Mediana'; 
                                                                break;
                                                    case 'C':   echo 'Chica'; 
                                                                break;
                                                }?></td>
                                    <td>$<?php echo $f['precio']?></td>
                                    <td><?php echo $f['cantidad']?></td>
                                    <td><a class = "editar" href="editarMochila.php?nombre=<?php echo $f['nombre']?>&descripcion=<?php echo $f['descripcion']?>&id_marca=<?php echo $f['id_marca']?>&marca=<?php echo $m['nombre']?>&descuento=<?php echo $f['descuento']?>&tamano=<?php echo $f['tamano']?>&precio=<?php echo $f['precio']?>&cantidad=<?php echo $f['cantidad']?>&imagen=<?php echo $f['imagen']?>&id_mochila=<?php echo $f['id_mochila']?>"><i class="fas fa-edit"></i></a></td>
							        <td><a href="../control/bajaMochila.php?mochila=<?php echo $f['id_mochila']?>"><i class="fas fa-trash-alt"></i></a></td>
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