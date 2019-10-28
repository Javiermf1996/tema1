<?php
class Loteria{
  
    //Contructor loteria
    public function __construct()
    {
       
        session_start();

    }
    //lleva a la vista en primer lugar
    function loteria()
    {
        require "vista.php";
    }
   
    function alternar(){
        //si el array existe 
        if(!isset( $_SESSION['apuesta'])) { 
            $_SESSION['apuesta'] = array();
        }
        //si el numero existe y no esta en el array
        if (isset($_GET['numero']) && !in_array($_GET['numero'],  $_SESSION['apuesta'])) {
            $_SESSION['apuesta'][$_GET['numero']] = $_GET['numero'];
            header('Location: index.php?method=loteria');
        //si el numero esta en el array
        }else if(in_array($_GET['numero'],  $_SESSION['apuesta'])){ 
                unset( $_SESSION['apuesta'][$_GET['numero']]);
                header('Location: index.php?method=loteria');
        } else {
            die("otro caso");
        }

    }

    function flush(){
        //marca como es la apuesta
        if (isset( $_SESSION['apuesta'])) {
            if(count( $_SESSION['apuesta']) < 6){
                 echo "La apuesta esta incompleta.";
                }else if(count( $_SESSION['apuesta']) > 6){
                  echo "La apuesta es multiple.";
                }else{
                  echo "La apuesta esta completa.";    
                 }
                 unset($_SESSION['apuesta']);
                 header('Location: index.php?method=loteria');
            }
        }
}

$app = new Loteria();

if (isset($_GET['method'])) {
    $method = $_GET['method'];
} else {
    $method = 'loteria';
}
//$app->saludar();
if (method_exists($app, $method)) {
    $app->$method();
} else {
    die('metodo no encontrado');
    exit(3);
}
?>