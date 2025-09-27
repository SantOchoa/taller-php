<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Verificador de Divisibilidad</title>
    <link rel = "stylesheet" href="CSS/principal.css">
</head>
<body>
    <div class="container">
        <h2>Verificador de Divisibilidad</h2>
        <form method="POST" action="">
            <input type="number" name="num_a" placeholder="Ingresa el primer número (a)">
            <input type="number" name="num_b" placeholder="Ingresa el segundo número (b)">
            <button type="submit">Verificar</button>
        </form>

        <div class="result">
            <?php
            
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                if (!empty($_POST["num_a"]) && !empty($_POST["num_b"])) {
                    $a = $_POST["num_a"];
                    $b = $_POST["num_b"];
                    if ($a > 0 && $b > 0) {
                        if ($a % $b == 0) {
                            echo "<p class='success'>El número $a es divisible entre el número $b.</p>";
                        } elseif ($b % $a == 0) {
                            echo "<p class='success'>El número $b es divisible entre el número $a.</p>";
                        } else {
                            echo "<p class='info'>Los números $a y $b no son divisibles entre sí.</p>";
                        }
                    } else {
                        
                        echo "<p class='error'>Error: Ambos números deben ser enteros positivos.</p>";
                    }
                } else {
                    
                    echo "<p class='error'>Error: Por favor, ingresa ambos números.</p>";
                }
            }
            ?>
        </div>
    </div>
</body>
</html>