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
						<div class="col-7"></div>
						<div class="collapse navbar-collapse justify-content-end" id="navbar">
                        </div>
					</nav>
				</header>
				<main>
                    <form class="needs-validation" action="../control/autenticar.php" method="post">
                        <div class="form-group">
                            <label for="usuario">Usuario</label>
                            <input type="text" class="form-control" id="usuario" name="usuario" placeholder="AMLO" required/>
                        </div>
                        <div class="form-group">
                            <label for="contrasena">Contrase&ntilde;a</label>
                            <input type="password" class="form-control" id="contrasena" name="contrasena" required/>
                        </div>
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
