<?php 

function conexion($usuario, $pass)
{
	try {

		$con = new PDO('mysql:host=localhost;dbname=red_social', $usuario, $pass );
		return $con;
		
	} catch (PDOException $e) {
		return $e->getMessage();
	}
}


function datos_vacios($datos)
{
	$vacio = false;
	$tam = count($datos);
	for($c = 0; $c < $tam; $c++)
	{
		if(empty($datos[$c]))
		{
			$vacio = true;
			break;
		}
	}

	return $vacio;
}


function limpiar($limpio)
			{
				$limpio = htmlspecialchars($limpio); //quita caracteres de html
				$limpio = trim($limpio); //quita espacios
				$limpi0 = stripcslashes($limpio); //quitar barras invertidas
				return $limpio;
			}
		

function verificar_session()
{
	if(!isset($_SESSION['CodUsua']))
	{
		header('location: login.php');
	}
}
		
	

 ?>