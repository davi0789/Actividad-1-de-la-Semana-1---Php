<?php
// Definir la función esPrimo que recibe un número entero
function esPrimo($numero) {
    // Un número menor o igual a 1 no es primo
    if ($numero <= 1) {
        return false;
    }

    // Verificar divisibilidad desde 2 hasta la raíz cuadrada del número
    for ($i = 2; $i <= sqrt($numero); $i++) {
        if ($numero % $i == 0) {
            return false; // Si es divisible, no es primo
        }
    }

    return true; // Si no se encontró ningún divisor, es primo
}

// Inicializar la variable para almacenar el resultado
$resultado = '';

// Verificar si el formulario ha sido enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtenemos el número ingresado por el usuario y lo convertimos a entero
    $numero = intval($_POST['numero']);

    // Llamar a la función esPrimo y almacenar el resultado
    $resultado = esPrimo($numero) ? "$numero es un número primo." : "$numero no es un número primo.";
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verificador de Números Primos</title>
</head>
<body>
    <h1>Verificador de Números Primos</h1>
    <form method="post" action="">
        <label for="numero">Ingrese un número:</label>
        <input type="number" id="numero" name="numero" min="1" required>
        <input type="submit" value="Verificar">
    </form>

    <?php
    // Mostrar Resultados
    if ($resultado) {
        echo "<h2>Resultado:</h2>";
        echo "<p>$resultado</p>";
    }
    ?>
</body>
</html>