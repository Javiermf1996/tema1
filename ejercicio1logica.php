<?php   

 if (isset($_REQUEST['lista'])) {
        $lista = $_REQUEST['lista'];
 } else {
     $lista = array();
 }
 if (isset($_REQUEST['nuevo'])) {
     $nuevo = $_REQUEST['nuevo'];
     $lista[] = $nuevo;
 }
     require "ejercicio1vista.php";


     /**
     *require_once
     *include_once
     
      */
     ?>
