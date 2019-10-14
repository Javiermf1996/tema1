<?php
/* session_start() inicia la sesion si tiene una cookie 
si no hay cookie crea una cookie y su sesion con $_SESSION
session_destroy() */

class Calculadora
{
    public $numero1;
    public $numero2;
    public $resultado;
    public $calcular;

    public function __construct($numero1, $numero2, $resultado)
    {

        $this->numero1 = $numero1;
        $this->numero2 = $numero2;
        $this->resultado = $resultado;
        session_start();
    }

    function calculadora()
    {
        require "vista.php";
    }
    function calcular()
    {
        if (isset($_POST['numero1']) && isset($_POST['numero2'])) {
            $calcular = $_POST['Operaciones'];
            $numero1 = $_POST['numero1'];
            $numero2 = $_POST['numero2'];
            if (!is_numeric($numero1)) {
                $_SESSION['numero1'][] = $numero1;
                header('Location: index.php?method=calculadora');
            }else if (!is_numeric($numero2)) {
                $_SESSION['numero2'][] = $numero2;
                header('Location: index.php?method=calculadora');
            }else if(!is_numeric($numero1) && !is_numeric($numero2)){
                $_SESSION['numero1'][] = $numero1;
                $_SESSION['numero2'][] = $numero2;
                header('Location: index.php?method=calculadora');
            }else{
                switch ($calcular) {
                    case "suma":
                        $resultado = $numero1 + $numero2;
                        $_SESSION['resultados'][] = $resultado;
                        header('Location: index.php?method=calculadora');
                        break;
                    case "resta":
                        $resultado = $numero1 - $numero2;
                        $_SESSION['resultados'][] = $resultado;
                        header('Location: index.php?method=calculadora');
                        break;
                    case "multiplicacion":
                        $resultado = $numero1 * $numero2;
                        $_SESSION['resultados'][] = $resultado;
                        header('Location: index.php?method=calculadora');
                        break;
                    case "division":
                        $resultado = $numero1 / $numero2;
                        $_SESSION['resultados'][] = $resultado;
                        header('Location: index.php?method=calculadora');
                        break;
                }
            }
        }
    }
}

$app = new Calculadora('', '', '');

if (isset($_GET['method'])) {
    $method = $_GET['method'];
} else {
    $method = 'calculadora';
}


//$app->saludar();
if (method_exists($app, $method)) {
    $app->$method();
} else {
    die('metodo no encontrado');
    exit(3);
}
