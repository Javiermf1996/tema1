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
        $files = glob(Galeria::FOLDER_PATH . "*.{jpg,png,jpeg,git}", GLOB_BRACE);
        // exit();
        require "vista.php";
    }
    function carga()
    {
        $target_file = Galeria::FOLDER_PATH . basename($_FILES["file"]["tmp_name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        // Check if image file is a actual image or fake image
        if (isset($_POST["submit"])) {
            $check = getimagesize($_FILES["file"]["tmp_name"]);
            if ($check !== false) {
                $uploadOk = 1;
            } else {
                $uploadOk = 0;
            }
        }
        // Check if file already exists
        if (file_exists($target_file)) {
            $uploadOk = 0;
        }
        // Check file size
        if ($_FILES["file"]["size"] > 1000) {
            $uploadOk = 0;
        }
        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            header('Location: index.php?method=galeria');
            // if everything is ok, try to upload file
        } else {
            if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
                header('Location: index.php?method=galeria');
            } else {
                header('Location: index.php?method=galeria');
            }
        }
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
