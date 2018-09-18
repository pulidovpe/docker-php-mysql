<?php

/**
  * INICIAR SESION
  *Archivo   : sesion.inicior.php
  *Funcion   : Acepta datos para ininiciar sesion.
  */

$sesion = "index.php?cnt=Sesion&act=conecta";

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
		<article id="modulo-inicio">
			<center>
				<form action=<?php echo $sesion; ?> method="post">
					<table border=0 width="90%">
						<tr>
							<th colspan=3 width="95%">&nbsp;</th>
						</tr> 
						<tr>
							<td >Usuario :</td>
							<td ><input type="text" name="usuario" size=11 maxlength=15 value ="<?php echo $usuario ?>" /> 
							<td rowspan=2>
								<figure>
									<img src="inc/img/hacer-llave.png" width=110 height=80>
								</figure>
							</td>
						</tr>				
						<tr>
							<td >Clave :</td>
							<td ><input type="password" name="clave" size=11 maxlength=15 value ="<?php echo $clave ?>" />
						</tr>
						<tr>
							<td colspan=3 align="center">	
								<?php if($errorInicio != "") {
									echo "</br> <label class=rojo>$errorInicio</label>";
								}
								?>
							</td>
						<tr>
							<td colspan=3 align="center">
								<input type="submit" value="Aceptar"/>
							</td>
						</tr>
					</table>
				</form>
			</center>
		</article>
	</section>
	<article id="usuarios">   
		<label><?php echo "<strong>Usuario:</strong> ..." ?></label>
	</article>