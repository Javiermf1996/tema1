<?php
class App{
    
       const FOLDERP = "imagenes/";
    function subirImagen(){     
        
        $target_dir = "imagenes/";
        $target_file = $target_dir . basename($_FILES["imagen1"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        // Check if image file is a actual image or fake image
        if(isset($_POST["submit"])) {
            $check = getimagesize($_FILES["imagen1"]["tmp_name"]);
            if($check !== false) {
                echo "File is an image - " . $check["mime"] . ".";
                $uploadOk = 1;
            } else {
                echo "File is not an image.";
                $uploadOk = 0;
            }
        }
        // Check if file already exists
        if (file_exists($target_file)) {
            echo "Sorry, file already exists.";
            $uploadOk = 0;
        }
        // Check file size
        if ($_FILES["imagen1"]["size"] > 500000) {
            echo "Sorry, your file is too large.";
            $uploadOk = 0;
        }
        // Allow certain file formats
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif" ) {
            echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            $uploadOk = 0;
        }
        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            echo "Sorry, your file was not uploaded.";
        // if everything is ok, try to upload file
        } else {
            if (move_uploaded_file($_FILES["imagen1"]["tmp_name"], $target_file)) {
                header('Location: index.php?method=verGaleria');
                echo "La imagen ". basename( $_FILES["imagen1"]["name"]). " ha sido subido.";
            } else {
                header('Location: index.php?method=verGaleria');
                echo "Sorry, there was an error uploading your file.";
            }
        }
       
    }
    public function verGaleria()
    {
        $folder_path = 'imagenes/'; 
        
        $files = glob($folder_path . "*.{JPG,jpg,gif,png,bmp,jpeg}", GLOB_BRACE);
        // var_dump($num_files);
        // exit();
        // $folder = opendir($folder_path);
        
        // if($num_files > 0)
        // {
        //     while($num_files != 0 ) 
        //     {
        //         $file_path = $folder_path.$file;
        //         $extension = strtolower(pathinfo($file ,PATHINFO_EXTENSION));
        //         if($extension=='jpg' || $extension =='png' || $extension == 'gif' || $extension == 'bmp' ||$extension=='jpeg') 
        //         {
                    // 
                    // <a href="<?php echo $file_path; "><img src="<?php echo $file_path; "  height="250" /></a>
                    // 
        //   }
        //   $num_files--;
        // }
    // }
    // else
    // {
    //     echo "La carpeta esta vacia.";
    // }
    // closedir($folder);
    require('vista.php');
    }
    public function delete()
    {
        $file = $_GET['file'];
       
        
        unlink($file);
        
        header('Location: .');
    }
    public function show()
    {
       $file = $_GET['file'];
       $stats = stat($file);
       require 'vista2.php';
    }
}
    
    
$App = new App();
if (isset($_GET['method'])) {
    $method = $_GET['method'];
} else {
    $method = 'verGaleria';
}
$App->$method();
?>
