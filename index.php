<?php 
session_start();
require('funciones.php');
require('clases/clases.php');
verificar_session();

require('header.php');
require('subir.php');


if(isset($_POST['publicar']) and !empty($_FILES) and !empty($_POST['contenido']))
{
	$destino = 'subidos/';
	$contenido = $_POST['contenido'];
	$img = $destino . $_FILES['archivo']['name'];
	$tmp = $_FILES['archivo']['tmp_name'];
	post::agregar($_SESSION['CodUsua'], $contenido, $img);
	move_uploaded_file($tmp, $img);
	header('location: index.php');
}

$amigos = amigos::codigos_amigos($_SESSION['CodUsua']);

$post = post::mostrarTodo($amigos[0]['amigos']);


if(isset($_POST['comentario']))
{
	if(!empty($_POST['comentario']))
	{
		comentarios::agregar($_POST['comentario'], $_SESSION['CodUsua'], $_POST['CodPost']);
		notificaciones::agregar(1, $_POST['CodPost'], $_SESSION['CodUsua']);
		header('location: index.php');
	}

}

if(isset($_GET['mg']))
{
	mg::agregar($_GET['CodPost'], $_SESSION['CodUsua']);
	notificaciones::agregar(false, $_GET['CodPost'], $_SESSION['CodUsua']);
		header('location: index.php');
}


require('publicacion.php');

 ?>


	


	
 	
 </body>
 </html>