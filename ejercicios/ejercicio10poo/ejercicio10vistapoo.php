<!DOCTYPE html>
 <html lang="es">
 <head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <meta http-equiv="X-UA-Compatible" content="ie=edge">
     <title>Document</title>
 </head>
 <body> 
     <h1>Nuevo Jugador</h1>

     <form action ="index.php?method=respuesta" method="post">

    <label for="nombre">Nuevo jugador: </label>
   
    <input type="text" name="nombre" value=" <?php echo $nombre ?>" />
    <br>
    
    <input type="submit"/>
    </form>
 </body>
 </html>