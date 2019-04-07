<?php 

class usuarios{

	function registrar($datos)
	{
		$con = conexion("root", "");
		$consulta = $con->prepare("insert into usuarios(CodUsua, nombre, usuario, pass, pais, profesion, edad, foto_perfil) values(null, :nombre, :usuario, :pass, :pais, :profe, :edad, :foto_perfil)");
		$consulta->execute(array(':nombre' => $datos[0],
								  ':usuario' => $datos[1],
								  ':pass' => $datos[2],
								  ':pais' => $datos[3],
								  ':profe' => $datos[4],
								  ':edad' => $datos[5],
								  ':foto_perfil' => 'img/sin foto de perfil.jpg'
							));
	}


	function verificar($usuario)
	{
		$con = conexion("root", "");
		$consulta = $con->prepare("select * from usuarios where usuario = :usuario");
		$consulta->execute(array(':usuario' => $usuario));
		$resultado = $consulta->fetchAll();
		return $resultado;
	}

	function editar($CodUsua, $datos)
	{
		$con = conexion("root", "");
		$consulta = $con->prepare("update usuarios set nombre = :nombre, usuario = :usuario, profesion = :profesion, pais = :pais, foto_perfil = :foto_perfil where CodUsua = :CodUsua");
		$consulta->execute(array(':nombre' => $datos[0],
								  ':usuario' => $datos[1],
								  ':profesion' => $datos[2],
								   ':pais' => $datos[3],
								  ':foto_perfil' => $datos[4],
								  ':CodUsua' => $CodUsua

							));

		//aqui habia un error en el indice profesion
	}


	function usuario_por_codigo($CodUsua)
	{
		$con = conexion("root", "");
		$consulta = $con->prepare("select * from usuarios where CodUsua = :CodUsua");
		$consulta->execute(array(':CodUsua' => $CodUsua));
		$resultado = $consulta->fetchAll();
		return $resultado;
	}
}


class post{

	function agregar($CodUsua, $contenido, $img)
	{
		$con = conexion("root", "");
		$consulta = $con->prepare("insert into post(CodPost, CodUsua, contenido, img) values(null, :CodUsua, :contenido, :img)");
		$consulta->execute(array(':CodUsua' => $CodUsua,
								 ':contenido' => $contenido,
								 ':img' => $img	
			));
	}


	function post_por_usuario($CodUsua)
	{
		$con = conexion("root", "");
		$consulta = $con->prepare("select U.CodUsua, U.nombre, U.foto_perfil, P.CodPost, P.contenido, P.img from usuarios U inner join post P on U.CodUsua = P.CodUsua where P.CodUsua = :CodUsua ORDER BY P.CodPost DESC");
		$consulta->execute(array(':CodUsua' => $CodUsua));
		$resultado = $consulta->fetchAll();
		return $resultado;
	}

	function mostrarTodo($amigos)
	{
		$con = conexion("root", "");
		$consulta = $con->prepare("select U.CodUsua, U.nombre, U.foto_perfil, P.CodPost, P.contenido, P.img from usuarios U inner join post P on U.CodUsua = P.CodUsua where P.CodUsua in($amigos) ORDER BY P.CodPost DESC");
		$consulta->execute();
		$resultado = $consulta->fetchAll();
		return $resultado;
	}

	function mostrar_por_codigo_post($CodPost)
	{
		$con = conexion("root", "");
		$consulta = $con->prepare("select U.CodUsua, U.nombre, U.foto_perfil, P.CodPost, P.contenido, P.img from usuarios U inner join post P on U.CodUsua = P.CodUsua where P.CodPost = :CodPost ORDER BY P.CodPost DESC");
		$consulta->execute(array(':CodPost' => $CodPost));
		$resultado = $consulta->fetchAll();
		return $resultado;
	}


}


class comentarios{

	function agregar($comentario, $CodUsua, $CodPost)
	{
		$con = conexion("root", "");
		$consulta = $con->prepare("insert into comentarios(comentario, CodUsua, CodPost) values(:comentario, :CodUsua, :CodPost) ");
		$consulta->execute(array(
					':comentario' => $comentario,
					':CodUsua' => $CodUsua,
					':CodPost' => $CodPost

					));
	}


	function mostrar($CodPost)
	{
		$con = conexion("root", "");
		$consulta = $con->prepare("select U.nombre, C.comentario from usuarios U inner join comentarios C on U.CodUsua = C.CodUsua where C.CodPost = :CodPost");
		$consulta->execute(array(':CodPost' => $CodPost));
		$resultado = $consulta->fetchAll();
		return $resultado;
	}
	

}



class mg
{
	function agregar($CodPost, $CodUsua)
	{
		$con = conexion("root", "");
		$consulta = $con->prepare("insert into mg(CodLike, CodPost, CodUsua) values(null, :CodPost, :CodUsua)");
		$consulta->execute(array(':CodPost' => $CodPost, ':CodUsua' => $CodUsua));
	}


	function mostrar($CodPost)
	{
		$con = conexion("root", "");
		$consulta = $con->prepare("select count(*) from mg where CodPost = :CodPost");
		$consulta->execute(array(':CodPost' => $CodPost));
		$resultados = $consulta->fetchAll();
		return $resultados;
	}


	function verificar_mg($CodPost, $CodUsua)
	{
		$con = conexion("root", "");
		$consulta = $con->prepare("select CodLike from mg where CodPost = :CodPost and CodUsua = :CodUsua");
		$consulta->execute(array(':CodPost' => $CodPost, ':CodUsua' => $CodUsua));
		$resultados = $consulta->fetchAll();
		return count($resultados);
	}

}



class notificaciones
{
	function agregar($accion, $CodPost, $CodUsua)
	{
		$con = conexion("root", "");
		$consulta = $con->prepare("insert into notificaciones(CodNot, accion, CodPost, CodUsua, visto) values(null, :accion, :CodPost, :CodUsua, 0)");
		$consulta->execute(array(
			':accion' => $accion, 
			':CodPost' => $CodPost, 
			':CodUsua' => $CodUsua
			));
	}


	function mostrar($CodUsua)
	{
		$con = conexion("root", "");
		$consulta = $con->prepare("select U.CodUsua, U.nombre, N.CodNot, N.accion, N.CodPost from notificaciones N inner join usuarios U on U.CodUsua = N.CodUsua where N.CodPost in(select CodPost from post where CodUsua = :CodUsua) and N.visto = 0 and N.CodUsua != :CodUsua");
		$consulta->execute(array(
			':CodUsua' => $CodUsua
			));
		$resultados = $consulta->fetchAll();
		return $resultados;

	}

	function vistas($CodPost)
	{
		$con = conexion("root", "");
		$consulta = $con->prepare("update notificaciones set visto = 1 where CodPost = :CodPost");
		$consulta->execute(array(
			':CodPost' => $CodPost
			));
	}
}


class amigos
{
	function agregar($usua_enviador, $usua_receptor)
	{
		$con = conexion("root", "");
		$consulta = $con->prepare("insert into amigos(CodAm, usua_enviador, usua_receptor, status, solicitud) values(null, :usua_enviador, :usua_receptor, :status, :solicitud)");
		$consulta->execute(array(
							':usua_enviador' => $usua_enviador,
							':usua_receptor' => $usua_receptor,
							':status' => '',
							':solicitud' => 1

			));
	}

	function verificar($usua_enviador, $usua_receptor)
	{
		$con = conexion("root", "");
		$consulta = $con->prepare("select * from amigos where (usua_enviador = :usua_enviador and usua_receptor = :usua_receptor) or (usua_enviador = :usua_receptor and usua_receptor = :usua_enviador) ");
		$consulta->execute(array(
							':usua_enviador' => $usua_enviador,
							':usua_receptor' => $usua_receptor,
				

			));

		$resultados = $consulta->fetchAll();
		return $resultados;
	}

	function codigos_amigos($CodUsua)
	{
		$con = conexion("root", "");
		$consulta = $con->prepare(" select group_concat(usua_enviador,',', usua_receptor) as amigos from amigos where (usua_enviador = :CodUsua or usua_receptor = :CodUsua) and status = 1 ");
		$consulta->execute(array(
						':CodUsua' => $CodUsua
			));

		$resultados = $consulta->fetchAll();
		return $resultados;
	}


	function solicitudes($CodUsua)
	{
		$con = conexion("root", "");
		$consulta = $con->prepare(" select U.CodUsua, U.nombre, A.CodAm from usuarios U inner join amigos A on U.CodUsua = A.usua_enviador where A.usua_receptor = :CodUsua and A.status != 1");
		$consulta->execute(array(
						':CodUsua' => $CodUsua
			));

		$resultados = $consulta->fetchAll();
		return $resultados;
	}

	function aceptar($CodAm)
	{
		$con = conexion("root", "");
		$consulta = $con->prepare(" update amigos set status = 1 where CodAm = :CodAm");
		$consulta->execute(array(
						':CodAm' => $CodAm
			));
	}

	function eliminar_solicitud($CodAm)
	{
		$con = conexion("root", "");
		$consulta = $con->prepare("delete from amigos where CodAm = :CodAm");
		$consulta->execute(array(
						':CodAm' => $CodAm
			));
	}

	function cantidad_amigos($CodUsua)
	{
		$con = conexion("root", "");
		$consulta = $con->prepare(" select count(*) from amigos where (usua_enviador = :CodUsua or usua_receptor = :CodUsua) and status = 1 ");
		$consulta->execute(array(
						':CodUsua' => $CodUsua
			));

		$resultados = $consulta->fetchAll();
		return $resultados;
	}
}



 ?>