<?php
class Galeria{
  

    public function __construct()
    {
       
        session_start();

        if (isset( $_SESSION['galeria'])) {
            $this->galeria = $_SESSION['galeria'];
           
        } else {
            $this->galeria = [];
            
        }

    }

    function galeria()
    {
        require "vista.php";
    }

    function carga(){
        $target_dir = "Imagenes/";
        $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        // Check if image file is a actual image or fake image
        if(isset($_POST["submit"])) {
            $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
            if($check !== false) {
                $uploadOk = 1;
                header('Location: index.php?method=galeria');
            } else {
                $uploadOk = 0;
                header('Location: index.php?method=galeria');
            }
        }
        // Check if file already exists
        if (file_exists($target_file)) {
            $uploadOk = 0;
            header('Location: index.php?method=galeria');
        }
        // Check file size
        if ($_FILES["fileToUpload"]["size"] > 2000) {
            $uploadOk = 0;
            header('Location: index.php?method=galeria');
        }
        // Allow certain file formats
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif" ) {
            $uploadOk = 0;
            header('Location: index.php?method=galeria');
        }
        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            header('Location: index.php?method=galeria');
        // if everything is ok, try to upload file
        } else {
            if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                header('Location: index.php?method=galeria');
            } else {
                header('Location: index.php?method=galeria');
            }
        }
    }
    
    function show(){
        
        require "vista2.php";
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
?>