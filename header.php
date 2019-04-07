
 <!DOCTYPE html>
 <html lang="es">
 <head>
 	<meta charset="UTF-8">
 	<title>Red Social</title>
	<link rel="shortcut icon" href="img/favicon.png" type="image/x-icon">
 	<link rel="stylesheet" href="css/style.css">
 	<link rel="stylesheet" href="icomoon/style.css">
 </head>
 <body>
 	<header>
 		<h1 class="titulo">MyLittle</h1>

 		<form action="buscar.php" method="get" id="buscar">
 			<input type="text" name="busqueda" placeholder="Buscar personas...">

 		</form>
 		<nav>
 			<ul>
 				<li><a href="index.php">Inicio</a></li>

				<li id="info-solicitud">
				<?php $soli = amigos::solicitudes($_SESSION['CodUsua']); ?>
					<a href="#"><span class="icon-users"></span> <span class="no-leido"><?php if(count($soli) > 0) echo count($soli); ?></span></a>
					<?php if(count($soli) > 0): ?>
					<ul id="nav-solicitud">
						<?php foreach($soli as $solicitudes): ?>
						<li><a href="perfil.php?CodUsua=<?php echo $solicitudes['CodUsua']; ?>"><?php echo $solicitudes['nombre']; ?></a></li>
						<ul id="solicitud-confirmar">
							<li><a href="solicitud.php?CodAm=<?php echo $solicitudes['CodAm']; ?>&&accion=1" class="icon-checkmark"></a></li>
							<li><a href="solicitud.php?CodAm=<?php echo $solicitudes['CodAm']; ?>&&accion=2" class="icon-cross"></a></li>
						</ul>
					<?php endforeach; ?>
					</ul>
				<?php endif; ?>
				</li>

				<li id="info-notificaciones">
					<?php $not = notificaciones::mostrar($_SESSION['CodUsua']); ?>
					<a href="#" class="icon-bell"><span class="no-leido"><?php if(!empty($not)) echo count($not)?></span></a>
					<?php if(!empty($not)): ?>
						<ul id="nav-notificaciones">
							<li>
							<?php foreach($not as $noti): ?>
								<a href="post.php?CodPost=<?php echo $noti['CodPost']; ?>">
									<?php echo $noti['nombre']; ?>
									<?php if($noti['accion'] == 0): ?>
										<p>Le gusta una publicacion tuya</p>	
									<?php else: ?>
									<p>Comento una publicacion tuya</p>
								<?php endif; ?>
								</a>
							<?php endforeach; ?>
							</li>
						</ul>
						<?php endif; ?>
				</li>

 				<li class="info_usuario">
 					<a href="#"><?php echo $_SESSION['nombre']; ?></a>
 					<ul id="nav-perfil">
 						<li><a href="perfil.php?CodUsua=<?php echo $_SESSION['CodUsua']; ?>">Perfil</a></li>
 						<li><a href="cerrar.php">Salir</a></li>
 					</ul>
 				</li>
 			</ul>

 		</nav>
 	</header>