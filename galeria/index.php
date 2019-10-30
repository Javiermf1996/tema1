<?php
class Galeria
{
    const FOLDER_PATH = 'Imagenes/';
    public function __construct()
    {

        session_start();
    }
    function galeria()
    {
        $files = glob(Galeria::FOLDER_PATH ."*.{jpg,png,jpeg,git}", GLOB_BRACE);
        // exit();
        require "vista.php";
    }
    function carga()
    {
        $target_file = Galeria::FOLDER_PATH. basename($_FILES["file"]["name"]);
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        if(file_exists($target_file)){
            $_SESSION['message'] = "La imagen ya existe.";
        }else if ($_FILES["file"]["size"] > 1000000) {
        }else{
            move_uploaded_file($_FILES["file"]["tmp_name"],$target_file);
        }
        header('Location: index.php?method=galeria');
    }
    

    function show()
    {
        $file = $_GET['file'];
        require 'vista2.php';
    }
    function delete()
    {
        $file = $_GET['file'];
        unlink($file);
        header('Location: index.php?method=galeria');
    }
}
$app = new Galeria();
if (isset($_GET['method'])) {
    $method = $_GET['method'];
} else {
    $method = 'galeria';
}
//$app->saludar();
if (method_exists($app, $method)) {
    $app->$method();
} else {
    die('metodo no encontrado');
    exit(3);
}
