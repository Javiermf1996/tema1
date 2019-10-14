<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Calculadora</title>
</head>

<body>

    <h1>Calculadora</h1>

    <form method="post" action="index.php?method=calcular">

        <label for="numero1">Primer número: </label>
        <br>
        <input type="text" name="numero1">
        <br>
        <label for="Operaciones"></label>
        <br>
        <select name="Operaciones">
            <option value="suma">+</option>
            <option value="resta">-</option>
            <option value="multiplicacion">*</option>
            <option value="division">/</option>
        </select>
        <br>
        <br>
        <label for="numero2">Segundo número: </label> <br>
        <input type="text" name="numero2">
        <br>
        <br>
        <input type="submit">


    </form>

    <ul> Lista de resultados:
        <?php
        foreach ($_SESSION['resultados'] as $key => $resultado) {
            echo "<li>El resultado es $resultado</li>";
        }
        ?>
    </ul>
    <ul> Fallos en el numero 1:
        <?php
        foreach ($_SESSION['numero1'] as $key => $numero1) {
            echo "<li>Fallos en el primer numero $numero1</li>";
        }
        ?>

    </ul>
    <ul> Fallos en el numero 2:
        <?php
        foreach ($_SESSION['numero2'] as $key => $numero2) {
            echo "<li>Fallos en el primer numero $numero2</li>";
        }
        ?>
    </ul>

</body>

</html>