<?php 
session_start();
require('funciones.php');
require('clases/clases.php');
verificar_session();

	
	$usuario = usuarios::usuario_por_codigo($_SESSION['CodUsua']);


	if(isset($_POST['editar']))
	{
		$destino = 'subidos/';
		$foto_perfil = !empty($_FILES) ? $destino . $_FILES['foto']['name'] : $usuario[0]['foto_perfil'];
		$tmp = $_FILES['foto']['tmp_name'];
		$datos = array(
				$_POST['nombre'],
				$_POST['usuario'],
				$_POST['profesion'],
				$_POST['pais'],
				$foto_perfil
			);

		if(strpos($datos[1], " ")  == false)
		{
			usuarios::editar($_SESSION['CodUsua'], $datos);
			//move_uploaded_file($tmp, $foto_perfil);
			//header('location: editar_perfil.php');
		}
	}

 ?>
 <!DOCTYPE html>
 <html lang="es">
 <head>
 	<meta charset="UTF-8">
 	<title>Editar Perfil</title>
 	<link rel="stylesheet" href="css/login.css">
 </head>
 <body>
 	<div class="contenedor-form">
 		<h1>Editar perfil</h1>
 		<form action="<?php echo $_SERVER['PHP_SELF'] ?>" enctype="multipart/form-data" method="post">
 			<input type="text" name="nombre" class="input-control" value="<?php echo $usuario[0]["nombre"]; ?>">
 			<input type="text" name="usuario" class="input-control" value="<?php echo $usuario[0]["usuario"]; ?>">
 			<input type="text" name="profesion" class="input-control" value="<?php echo $usuario[0]["profesion"]; ?>">
 			<input type="text" name="pais" class="input-control" value="<?php echo $usuario[0]["pais"]; ?>">

 			<input type="file" name="foto" >
 			<input type="submit" value="Editar" name="editar" class="log-btn">
 		</form>
 		<div class="registrar">
 			<a href="perfil.php?CodUsua=<?php echo $_SESSION['CodUsua']; ?>">Volver al perfil</a>
 		</div>
 	</div>
 </body>
 </html>