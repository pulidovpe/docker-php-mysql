<?php 
	/**
	 * Archivo   : contacto.php
	 * Type      : vista 
	 * Function  : Vista de los Contactos
	 *             Ejempo 4 MVC
	 */
	if(!isset($_SESSION['S_MOD01']))
	{
		header("Location: index.php?cnt=Sesion&act=inicio");
		exit;
	} 

	$modificar  ="index.php?cnt=Usuario&act=modificar&id=";
	$eliminar   ="index.php?cnt=Usuario&act=eliminar&id=";

	$avanzar    ="index.php?cnt=Usuario&act=adelante&numPag=";
	$retroceder ="index.php?cnt=Usuario&act=atras&numPag=";

	$primero    ="index.php?cnt=Usuario&act=inicio";
	$ultimo     ="index.php?cnt=Usuario&act=fin";

?>
<body>
	<header>
		<article id="encabezado">
			<h1><?php echo $aTitulos["t2"]; ?><h1>
		</article>
	</header>
	<section id="barra-titulo">
		<article id="titulo">
			<h2><?php echo $aTitulos['t3']; ?></h2>
		</article>
	</section>
	<section id="contenedor"> 
		<article id="modulo-datos" class="t-tabla">
			<center>
				<table border=0 align="center">
					<tr>
						<th>ID/CEDULA</th>
						<th>NOMBRE</th>
						<th>ACTIVO</th>
						<th>EDITAR</th>
						<th>ELIMINAR</th>
					</tr>
					<?php 
						foreach($item as $fila) {
					?>
					<tr>
						<td width="40"><?php echo $fila['id_usu']; ?></td>
						<td width="370"><?php echo $fila['descrip_usu']; ?></td>
						<td width="130"><?php echo $fila['activo']; ?></td>
						<?php
						if ($_SESSION['S_MOD01']=='E') {
							echo "<td width='40'> <a title='Modificar' href=".$modificar.$fila['id_usu']." >";
							echo "<img src='inc/img/edit.png' width='15' height='15' border='0'></a>";
							echo "</td>";						
							echo "<td width='40'> <a title='Eliminar' href=".$eliminar.$fila['id_usu']." >";
							echo "<img src='inc/img/delete.gif' width='15' height='15' border='0'></a>";
							echo "</td>";
						} else { 
							echo "<td width='40'>S-A</td>";
							echo "<td width='40'>S-A</td>";
						} ?>
					</tr> 
					<?php
						}
					?>
				</table>
			</center>
		</article>
		<article>
			<center>
				<table width="330" border="0" align="center">
					<tr>
						<?php
						echo "<td align='center'>";
						if($numPag > 0) {
							echo "<a title='Primero' href=$primero >Primero</a>";
						} else { echo "Primero"; }
						echo "</td><td align='center'>";
						if($numPag > 0) {
							echo "<a title='Anterior' href=$retroceder"."$numPag>Anterior</a>";
						} else { echo "Anterior"; }
						echo "</td><td align='center'>Pag: ";
						echo $numPag+1;
						echo "</td><td align='center'>";
						if($numPag < ($ultimaPag-1)) {
							echo "<a title='Siguiente' href=$avanzar"."$numPag>Siguiente</a>";
						} else { echo "Siguiente"; }
						echo "</td><td align='center'>";
						if($numPag < ($ultimaPag-1)) {
							echo "<a title='Ultimo' href=$ultimo >Ultimo</a>";
						} else { echo "Ultimo"; }
						echo "</td>";
						?>
					</tr>
					<tr>
						<td colspan="5" align="center">
							<?php if ($S_MOD01=='E') { ?>
								<button type='button' onclick=" location='index.php?cnt=Usuario&act=incluir' ">Nuevo</button>
							<?php } else { ?>
								<button type='button' disabled='disabled' >Nuevo</button>
							<?php } ?>
							<button type="button" onclick=" ">Buscar</button>
							<button type="button" onclick=" ">Imprimir</button>
							<button type="button" onclick=" location='index.php?cnt=Sesion&act=conectado' ">Volver</button>
						</td>
					</tr>
				</table>
			</center>
		</article>
	</section>
	<article id="usuarios">   
		<label><?php echo "<strong>Usuario:</strong> ".$userNombre; ?></label>
	</article>