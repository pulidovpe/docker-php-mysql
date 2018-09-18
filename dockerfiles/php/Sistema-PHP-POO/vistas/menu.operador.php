<?php 
  /**
  * MENU
  * Archivo   : menu.php
  * Vista     : vista
  * Funcion   : Crear menu para la aplicacion mis contactos.
  */

  $casos      = "index.php?cnt=Casos&act=inicio";
  $equipos    = "index.php?cnt=Equipos&act=inicio";
  $desconectar= "index.php?cnt=Sesion&act=desconecta";

?>
<body>
  <header>
    <div id="encabezado">
      <h1><?php echo $aTitulos["t2"]; ?><h1>
    </div>
    <div id="fondo-sesion">
      <label><?php echo "USUARIO: ".$userNombre; ?><label>
    </div>
  </header>
  <nav id="menu">
    <ul>
      <li><a href ="<?php echo $casos;?>"   >Casos</a></li>
      <li><a href ="<?php echo $equipos;?>" >Equipos</a></li>
      <li class="cerrar_sesion">
        <a href ="<?php echo $desconectar; ?>" >Desconectar</a>
      </li>
    </ul>
  </nav>
  <section>
    <div id="contenedor">
      <article>
        <div id="centro_contenedor"></div>
      </article>
    </div>
  </section>