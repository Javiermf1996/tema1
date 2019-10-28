<?php   

 if (isset($_POST['nuevo'])) {
     $nuevo = $_POST['nuevo'];
     setcookie("miCookie", $nuevo ,time() +  3600);
     echo "hola" .  " " .  $nuevo;


 }else{
    echo "hola , nose quien eres";
 }
    
 ?>

 