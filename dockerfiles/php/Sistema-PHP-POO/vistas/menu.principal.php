<?php 
	/*
	* MENU
	* Archivo   : menu.principal.php
	* Vista     : vista
	* Funcion   : Crear el menu dinamicamente 
	*/
if(!isset($_SESSION['usuarioSesion']))
{
	header("Location: index.php?cnt=Sesion&act=inicio");
}
?>
<body>
	<header>
		<article id="encabezado">
			<h1><?php echo $aTitulos['t2']; ?></h1>
		</article>
	</header>
	<section id="barra-titulo">
		<article id="titulo">
			<h2><?php echo $aTitulos['t3']; ?></h2>
		</article>
	</section>
	<section id="contenedor">
		<section id="menuOp">
			<br />
			<?php
				echo $aMenu['op01']; 
				echo $aMenu['op02'];  
				echo $aMenu['op03'];
				echo $aMenu['op04']; 
				echo $aMenu['op05'];  
				echo $aMenu['op06'];
				echo $aMenu['op07']; 
				echo $aMenu['op08'];  
				echo $aMenu['op09'];
				echo $aMenu['op10']; 
				echo $aMenu['op11'];
				echo $aMenu['op12'];
				// Desconeccion
				echo $aMenu['op20'];
			?>
		</section>
	</section>
	<article id="usuarios">   
		<label><?php echo "<strong>Usuario:</strong> ".$userNombre; ?></label>
	</article>