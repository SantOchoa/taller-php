<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Verificador de Divisibilidad</title>
    <style>
        .container {
            border-color: red;
            display: flex;
            
        }
    </style>
</head>
<body>

    <div class="container">
        <h2>Verificador de Divisibilidad</h2>
        <form method="POST" action="">
            <input type="number" name="num_a" placeholder="Ingresa el primer número (a)" >
            <input type="number" name="num_b" placeholder="Ingresa el segundo número (b)" >
            <button type="submit">Verificar</button>
            
        </form>

        <div class="result">
            <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $a = $_POST["num_a"];
                $b = $_POST["num_b"];

                if ($a === false || $b === false || $a <= 0 || $b <= 0) {
                    echo "<p class='error'>Error: Por favor, ingresa dos números enteros positivos.</p>";
                } else {
                    if ($a % $b == 0) {
                        echo "<br>";
                        echo "El número $a es divisible entre el número $b.";
                    } elseif ($b % $a == 0) {
                        echo "<br>";
                        echo "El número $b es divisible entre el número $a.";
                    } else {
                        echo "<br>";
                        echo "Los números $a y $b no son divisibles entre sí.";
                    }
                }
            }
            ?>
        </div>
    </div>
</body>
</html>