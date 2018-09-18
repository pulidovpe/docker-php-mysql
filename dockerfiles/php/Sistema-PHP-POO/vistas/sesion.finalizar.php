<?php
/**
  * SESION OK
  * Archivo   : sesion.ok.php
  * Funcion   : Cierre de sesion exitoso.
  */

?>
<body>
	<header>
		<article id="encabezado">
			<h1><?php echo $aTitulos["t2"]; ?><h1>
		</article>
	</header>
	<section id="barra-titulo">
		<article id="titulo">
			<h2><?php echo $aTitulos["t3"]; ?></h2>
		</article>
	</section>
	<section id="contenedor">
		<article id="centro_contenedor">
		</article>    
		<article id="modulo-inicio" class="t-tabla">
			<center>
				<table>
					<tr>
						<th width="1000em">
							<h3>Desconexión</h3>
						</th>
					</tr>
				</table>
				<br />
				<label><?php echo $aMensajes["m01"]; ?></label>
				<br /><br /><br />
				<button type="button" onclick=" location='index.php?cnt=Sesion&act=inicio' ">Aceptar</button>
				<br />
			</center>
		</article>
	</section>
	<article id="usuarios">   
		<label><?php echo "<strong>Usuario:</strong> ..." ?></label>
	</article>