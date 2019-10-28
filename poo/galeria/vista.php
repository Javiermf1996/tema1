<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Galeria</title>
</head>

<body>
    <table>

        <?php
        echo "<tr>";
        foreach ($files as $key => $file) {  ?>
            <td>
                <?php echo '<td><a href="index.php?method=show&file=' . $file . '"><img src ="' . $file . '" width=100px /></a></td>'; ?>
            <td>
                <?php if ($key % 4 == 0) {
                        echo "</tr>";
                        echo "<tr>";
                    } ?>
            <?php } ?>

    </table>
    <form action="index.php?method=carga" method="post" enctype="multipart/form-data">
        Selecciona una imagen:
        <input type="file" name="file" >
        <input type="submit" name="carga">
    </form>


</body>

</html>