<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Loteria</title>

<style>
.unselect a:link{
    color:black;
}
.select a:visited{
    color:blue;
}
.unselect a:visited{
    color:black;
}
</style>
</head>

<body>

    <table>
      <?php
       echo "<tr>";
        for ($i=1; $i < 50 ; $i++) { 
            //alternando entre clases de css para el color de los enlaces
            if($_SESSION['apuesta'][$i] == $i){
            echo '<td class="select"><a href="index.php?method=alternar&numero='.$i.'"   >'.$i. '</a>';
             }else{
            echo '<td class="unselect"><a href="index.php?method=alternar&numero='.$i.'"   >'.$i. '</a>';
            }
           if($i%7==0){
            echo"</tr>";
            echo "<tr>";
           }
        }
        
      ?>
      </table>
      <form action="index.php?method=flush">
      <input type="submit">
      </form> 
     
        <?php
       
    
        if(count( $_SESSION['apuesta']) < 6){ echo"<ul> La apuesta esta incompleta.";}
        else if(count( $_SESSION['apuesta']) == 6){ echo"<ul> La apuesta esta completa.";}
        else{ echo"<ul>La apuesta es multiple.";}
        foreach ($_SESSION['apuesta'] as $key => $resul ) {
            echo "<li> $resul </li>";
        }
    
        ?>
    </ul>

</body>
</html>