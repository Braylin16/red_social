<div class="subir">
	<div class="publi-info-perfil">
		<table>
			<tr>
				<td><a href="#"><img src="<?php echo $_SESSION['foto_perfil']; ?>" alt="" class="publi-img-perfil"></a></td>
				<td><a href="#" class="nombre-usuario"><?php echo $_SESSION['nombre']; ?></a></td>
			</tr>
		</table>
		</div>
		<form action="<?php echo $_SERVER['PHP_SELF']; ?>" enctype="multipart/form-data" method="post">
			<input type="text" name="contenido" id="contenido" placeholder="Contenido de la foto">
			<label for="archivo" class="boton-subir icon-camera"></label>
			<input type="file" name="archivo" id="archivo" style="display: none">
			<input type="hidden" name="publicar">
		</form>
	</div>