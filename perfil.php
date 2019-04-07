<?php 
session_start();
require('funciones.php');
require('clases/clases.php');
verificar_session();
require('header.php');

if(isset($_GET['CodUsua']))
{
	$usuario = usuarios::usuario_por_codigo($_GET['CodUsua']);
	if(empty($usuario)) header('location: index.php');
	$verificar_amigos = amigos::verificar($_SESSION['CodUsua'], $_GET['CodUsua'] );
	$post = post::post_por_usuario($_GET['CodUsua']);
}

if(isset($_GET['agregar']))
{
	amigos::agregar($_SESSION['CodUsua'], $_GET['CodUsua']);
	header('location: perfil.php?CodUsua='.$_GET['CodUsua']);
}



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

 ?>


<div id="perfil">
	<ul>
		<li><img src="<?php echo $usuario[0]['foto_perfil']; ?>" alt="" id="img"></li>
		<li>
			<h3><?php echo $usuario[0]['nombre']; ?></h3>
			<ul>
				<li>Edad: <span><?php echo $usuario[0]['edad']; ?></span></li>
				<li>Profesion: <span><?php echo $usuario[0]['profesion']; ?></span></li>
				<li>Pais: <span><?php echo $usuario[0]['pais']; ?></span></li>
				<li>Amigos: <span>
					<?php 
						if(!empty(amigos::cantidad_amigos($_GET['CodUsua'])))
							echo amigos::cantidad_amigos($_GET['CodUsua'])[0][0];
						else echo 0;
					 ?>
				</span></li>
			</ul>
		</li>
	<?php if($_GET['CodUsua'] != $_SESSION['CodUsua']): ?>
		<?php if(empty($verificar_amigos)): ?>
			<li><a href="perfil.php?CodUsua=<?php echo $_GET['CodUsua']; ?>&&agregar=<?php echo $_GET['CodUsua']; ?>">Agregar</a></li>
		<?php elseif($verificar_amigos[0]['status'] == true): ?>
			<li><a href="#">Amigos</a></li>
		<?php else: ?>
			<li><a href="#">Solicitud enviada</a></li>
		<?php endif; ?>
	<?php else: ?>
		<li><a href="editar_perfil.php">Editar</a></li>
	<?php endif; ?>
	</ul>

</div>


<?php require('publicacion.php'); ?>

 </body>
 </html>