<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <h1>Tus cosas</h1>

    <ul> 
       <?php foreach ($_SESSION['deseos'] as $key => $deseo) {
            echo "<li> $deseo  <a href=$metodo&key=$key>Borrar</a> </li>";
        }
        ?>
    </ul>




    <form action="index.php?method=home" method="post">

        <label for="deseos">Lista de deseos: </label>

        <input type="text" name="deseo" value="" />
        <br>

        <input type="submit" />
    </form>
</body>

</html>