<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Calculadora</title>
</head>

<body>

    <table  >
      <?php
       echo "<tr>";
        for ($i=1; $i < 50 ; $i++) { 
            echo '<td><a href="index.php?method=alternar&numero='.$i.'" >'.$i. '</a>';
           if($i%7==0){
            echo"</tr>";
            echo "<tr>";
           }
        }
        
      ?>
    </table>
    


</body>

</html>