<?php
// Definir la función generarFibonacci que recibe un número entero n
function generarFibonacci($n) {
    // Crear un array para almacenar los términos de la serie Fibonacci
    $fibonacci = [];

    // Verificar si n es menor o igual a 0, en cuyo caso no generamos nada
    if ($n <= 0) {
        return $fibonacci; // Retornamos un array vacío
    }
    
    // Agregar los primeros dos términos de la serie Fibonacci
    $fibonacci[0] = 0; // Primer término
    if ($n > 1) {
        $fibonacci[1] = 1; // Segundo término
    }

    // Utilizar un bucle para calcular los términos restantes de la serie
    for ($i = 2; $i < $n; $i++) {
        // Cada término es la suma de los dos anteriores
        $fibonacci[$i] = $fibonacci[$i - 1] + $fibonacci[$i - 2];
    }

    // Retornar el array con los términos de la serie Fibonacci
    return $fibonacci;
}

// Inicializar la variable para almacenar el resultado
$resultado = [];

// Verificar si el formulario ha sido enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener el número ingresado por el usuario y lo convertimos a entero
    $n = intval($_POST['numero']);
    
    // Generar la serie Fibonacci
    $resultado = generarFibonacci($n);
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Serie Fibonacci</title>
</head>
<body>
    <h1>Generador de la Serie Fibonacci</h1>
    <form method="post" action="">
        <label for="numero">Ingrese el número de términos:</label>
        <input type="number" id="numero" name="numero" min="1" required>
        <input type="submit" value="Generar">
    </form>

    <?php
    // SMostrar Resultados
    if (!empty($resultado)) {
        echo "<h2>Los primeros " . count($resultado) . " términos de la serie Fibonacci son:</h2>";
        echo implode(", ", $resultado);
    }
    ?>
</body>
</html>