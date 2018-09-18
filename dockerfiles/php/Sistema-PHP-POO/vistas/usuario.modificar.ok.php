<?php //session_start();
	/**
	* Archivo	: contacto.eliminar.php
	* Type      : vista 
	* Funcion 	: acepta datos para modificarlos
	* 
	*/
	//if(($_SESSION["nivelSesion"]!='1') and ($_SESSION["nivelSesion"]!='2'))
	//{
	//	header("Location: index.php?cnt=Sesion&act=inicio");
	//	exit;
	//} 

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
		<article id="centro">
		</article>    
		<article id="modulo-inicio" class="t-tabla">
			<center>
				<table><tr>
					<th width="1000em">
						<h3><?php echo $aTitulos["t4"]; ?></h3></th></tr>
				</table>
				<br />
				<label>Registro modificado exitosamente!</label>
				<br /><br /><br />
				<button type="button" onclick=" location='index.php?cnt=Usuario&act=inicio' ">Aceptar</button>
				<br />
			</center>
		</article>
	</section>
	<article id="usuarios">   
		<label><?php echo "<strong>Usuario:</strong> ".$userNombre; ?></label>
	</article>
