<?php
// Definir la función esPalindromo que recibe una cadena de texto
function esPalindromo($cadena) {
    // Eliminar espacios y convertimos la cadena a minúsculas
    $cadena = strtolower(str_replace(' ', '', $cadena));

    // Invertir la cadena
    $cadenaInvertida = strrev($cadena);

    // Comparar la cadena original con la invertida
    return $cadena === $cadenaInvertida;
}

// Inicializar la variable para almacenar el resultado
$resultado = '';

// Verificar si el formulario ha sido enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener la cadena ingresada por el usuario
    $cadena = $_POST['cadena'];

    // Llamar a la función esPalindromo y almacenamos el resultado
    $resultado = esPalindromo($cadena) ? "'$cadena' es un palíndromo." : "'$cadena' no es un palíndromo.";
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verificador de Palíndromos</title>
</head>
<body>
    <h1>Verificador de Palíndromos</h1>
    <form method="post" action="">
        <label for="cadena">Ingrese una cadena de texto:</label>
        <input type="text" id="cadena" name="cadena" required>
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

