<?php 

require('funciones.php');
require('clases/clases.php');


$error = "";
if(isset($_POST['registrar']))
{
	$pass = hash('sha512', $_POST['pass']);
	
	$datos= array(
			$_POST['nombre'],
			$_POST['usuario'],
			$pass,
			$_POST['pais'],
			$_POST['profe'],
			$_POST['edad']

		);
	
	if(datos_vacios($datos) == false)
	{
		if(!strpos($datos[1], " "))
		{
			if(empty(usuarios::verificar($datos[1])))
			{
				usuarios::registrar($datos);
			}
			else{
				$error .= "usuario existe";
			}
		}
		else
		{
			$error .= "usuario con espacios";
		}
	}else{
		$error .= "Hay campos vacios";
	}
}

 ?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Little - Registrate o Inicial Sesi&oacute;n</title>
	<link rel="shortcut icon" href="img/favicon.png" type="image/x-icon">
	<link rel="stylesheet" href="css/login.css">
</head>
<body>
	<div class="contenedor-form">
		<h1>Registrate</h1>
		<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
			<input type="text" name="nombre" class="input-control" placeholder="Nombre">
			<input type="text" name="usuario" class="input-control" placeholder="Usuario">
			<input type="password" name="pass" class="input-control" placeholder="Contrase&ntilde;a">
			<input type="text" class="input-control" name="pais" class="input-control" placeholder="Pa&iacute;s">
			<input type="text" class="input-control" name="profe" class="input-control" placeholder="Profesi&oacute;n">
			<p id="edad">Edad</p> <select name="edad" id="">
				<?php for($c = 1; $c <= 100; $c++): ?>
					<option><?php echo $c ?></option>
				<?php endfor; ?>
		
			</select>
			
			<input type="submit" value="Registrar" name="registrar" class="log-btn" >
		</form>
		<?php if(!empty($error)): ?>
			<p class="error"><?php echo $error ?></p>
		<?php endif; ?>
		<div class="registrar">
			<a href="login.php">¿Tienes cuenta?</a>
		</div>
	</div>
</body>
</html>