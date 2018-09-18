<?php 
/**
 *  Archivo  :   classVista.php
 *  Funcion  :   Definicion de la clase Vista
 *
 *  Nota     :   La clase Vista permite crear plantillas, que
 *               hacen la funcion de Vista en sistemas con el patron MVC. 
 *               Los datos de variables se pasan como $data. 
 *               El conjunto resultado como $rs. 
 *
 */

  class Vista 
  { 
    public $data=array();

    function __construct($template,$data=array()) { 

    if( is_array($data) ) {
      extract($data);
    }
      
    $cabeceras  = "vistas/cabeceras.php";
    $template   = "vistas/".$template;
    $pie        = "vistas/pie.php";

    include($cabeceras); 
    include($template);
    include($pie); 
    } 
} 

?>
