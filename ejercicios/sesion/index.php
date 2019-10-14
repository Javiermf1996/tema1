<?php
/* session_start() inicia la sesion si tiene una cookie 
si no hay cookie crea una cookie y su sesion con $_SESSION
session_destroy() */

class Sesion
{
    public $nombre;
    public $creada;
    public $cookie;


    public function __construct($nombre)
    {

        $this->nombre = $nombre;

        session_start();
    }

    function login()
    {

        require "vista.php";
    }

    function delete()
    {

        if (isset($_GET['key'])) {
            $key = $_GET['key'];
            unset($_SESSION['deseos'][$key]);
            header('Location: index.php?method=home');
        }
    }

    function auth()
    {
        if (!empty($_POST['nombre'])) {
            $_SESSION[$nombre] = $_POST['nombre'];

            header('Location: index.php?method=home');
        } else {
            header('Location: index.php?method=login');
        }
    }

    function home()
    {
 
        $metodo = "index.php?method=delete";
        echo "hola $_SESSION[$nombre]";

       
 
        require "vista2.php";
    }

    function añadirDeseo()
    {
        $_SESSION['deseos'][] = $_POST['deseo'];

    }
}

$app = new Sesion('');

if (isset($_GET['method'])) {
    $method = $_GET['method'];
} else {
    $method = 'login';
}


//$app->saludar();
if (method_exists($app, $method)) {
    $app->$method();
} else {
    die('metodo no encontrado');
    exit(3);
}
