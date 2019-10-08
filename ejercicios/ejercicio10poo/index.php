<?
class Formulario{
var $nombre;


public function __construct($nombre){
 
 $this->$nombre = $nombre;
 
}

function formulario(){
    if (isset($__COOKIE['nombre'])) {
        $nombre = $__COOKIE['nombre'];
    }else{
       $nombre="";
    }
    require "ejercicio10vistapoo.php";
 
}

function respuesta(){
    if (isset($_POST['nombre'])) {
        $nombre = $_POST['nombre'];
        
        setcookie('nombre', $nombre, time() + 3600);
        
        // setcookie("nombre", $nombre ,time() +  3600);
        echo "hola $nombre";
    }else{
       echo "hola , nose quien eres";
    }
}

}

print_r($__COOKIE); 

$app = new Formulario('Javier');

if (isset($_GET['method'])) {
    $method = $_GET['method'];
} else {
   $method = 'formulario';
}


//$app->saludar();
if(method_exists($app,$method)){
   $app->$method();
} else{
    die('metodo no encontrado');
    exit(3);
}



