<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Loteria</title>

<style>
a {   
    color: black;   
}

a:visited {
    color: blue;
}

</style>
</head>

<body>

    <table>
      <?php
       echo "<tr>";
        for ($i=1; $i < 50 ; $i++) { 
            echo '<td><a href="index.php?method=alternar&numero='.$i.'"   >'.$i. '</a>';
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
