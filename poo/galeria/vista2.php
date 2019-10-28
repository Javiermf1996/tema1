<!DOCTYPE html>
<html>

<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Galeria de imagenes</title>
</head>

<body>
    <div>
        <?php
        $fichero = substr($file, strlen(Galeria::FOLDER_PATH));
        echo "<img src='$file' />";
        ?>

    </div>

    <div>
        <form action="index.php?method=delete" method="get" enctype="multipart/form-data">


            <h3>Quieres borrar esta imagen?</h3>
            <input name="file" type="hidden" value="<?php echo $file ?>">
            <input name="method" type="hidden" value="delete">
            <input type="submit" name="Borrar" value="Borrar">

        </form>



</body>

</html>