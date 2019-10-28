<?php
 class App {

    public $nombre;
    public $apellido;

    public function __construct($nombre,$apellido){

        $this->nombre = $nombre;
        $this->apellido = $apellido;

    }

    public static function poo(){

        echo "Ejemplo POO <br>";
    }
    public function saludar()
    {
       echo "Hola, me llamo $this->nombre";
       //atributos y metodos de objeto $objeto
       //objeto->metodo
       //$objeto->metodo 
       //atributos de clase static
       //Clase::atributo
       //Clase::metodoestatico
       //Clase::constante
    }
    
    public function vista(){
        require('vista.php');
    }

 }
 //App::poo();
 $app = new App('Javier','Martinez');

 if (isset($_GET['method'])) {
     $method = $_GET['method'];
 } else {
    $method = 'saludar';
 }
 //$app->saludar();
 if(method_exists($app,$method)){
    $app->$method();
 } else{
     die('metodo no encontrado')
     exit(3);
 }

 //echo App::class;
?>