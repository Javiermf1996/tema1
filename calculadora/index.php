<?php
 
class Calculadora
{
    public function __construct()
    {

        session_start();
    }

    function calculadora()
    {
        require "vista.php";
    }
    function calcular()
    {
        if (isset($_POST['numero1']) && isset($_POST['numero2'])) {
            
            if (!is_numeric($_POST['numero1'])) {
                $_SESSION['numero1'][] = $_POST['numero1'];
                header('Location: index.php?method=calculadora');
            }else if (!is_numeric($_POST['numero2'])) {
                $_SESSION['numero2'][] = $_POST['numero2'];
                header('Location: index.php?method=calculadora');
            }else{
                switch ($_POST['Operaciones']) {
                    case "+":
                        $_SESSION['resultado'][] = $_POST['numero1'] + $_POST['numero2'];
                        header('Location: index.php?method=calculadora');
                        break;
                    case "-":
                        $_SESSION['resultado'][] = $_POST['numero1'] - $_POST['numero2'];
                        header('Location: index.php?method=calculadora');
                        break;
                    case "*":
                        $_SESSION['resultado'][] = $_POST['numero1']  * $_POST['numero2'];
                        header('Location: index.php?method=calculadora');
                        break;
                    case "/":
                        $_SESSION['resultado'][] = $_POST['numero1'] / $_POST['numero2'];
                        header('Location: index.php?method=calculadora');
                        break;
                }
            }
        }
    }
}

$app = new Calculadora();

if (isset($_GET['method'])) {
    $method = $_GET['method'];
} else {
    $method = 'calculadora';
}
 
if (method_exists($app, $method)) {
    $app->$method();
} else {
    die('metodo no encontrado');
    exit(3);
}
