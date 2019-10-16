<?php
class Loteria{
  

    public function __construct()
    {
       
        session_start();

        if (isset( $_SESSION['apuesta'])) {
            $this->apuesta = $_SESSION['apuesta'];
            $this-> apuestas;
        } else {
            $this->apuesta = [];
            
        }

    }

    function loteria()
    {
        require "vista.php";
    }

    function alternar(){


        if (isset($_GET['numero']) && !in_array($_GET['numero'], $this->apuesta)) {
            $this->apuesta[] = $_GET['numero'];
            header('Location: index.php?method=loteria');
        }else if(in_array($_GET['numero'], $this->apuesta)){ 
                unset($this->apuesta[$_GET['numero']]);
                header('Location: index.php?method=loteria');
        } else {
            die("otro caso");
        }

    }

    function flush(){
        if(count($this->apuesta[]) > 6){
        
        }else if(count($this->apuesta[]) < 6){

        }else{

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