
<?php
$texto_completo = '';
$texto_buscar = '';
$resultado = '';
$num_coincidencias = 0;
    if(isset($_POST['texto_completo']) && isset($_POST['texto_buscar']))
    {$texto_completo = $_POST['texto_completo'];
    $texto_buscar = $_POST['texto_buscar'];}
    if (!empty($texto_completo) && !empty($texto_buscar)) {
        
        $patron = '/' . preg_quote($texto_buscar, '/') . '/i';
        
        $reemplazo = '<mark>$0</mark>';
        
        $resultado = preg_replace($patron, $reemplazo, $texto_completo, -1, $num_coincidencias);

    }
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <link rel = "stylesheet" href="CSS/principal.css">
    <title>Buscador de Contenido en Texto</title>
</head>
<body>
    <div class="container">
        <h1>Buscador de Contenido </h1>
        <form action="" method="post">
            <label for="texto_completo">Texto completo:</label>
            <textarea id="texto_completo" name="texto_completo" required><?php echo $texto_completo; ?></textarea>
            
            <br><br>
            
            <label for="texto_buscar">Texto a buscar:</label>
            <input type="text" id="texto_buscar" name="texto_buscar" value="<?php echo $texto_buscar; ?>" required>
            
            <input type="submit" value="Buscar y Resaltar">
        </form>
        <?php if (!empty($resultado)): ?>
        <div class="results">
            <h2>Resultado</h2>
            <?php if ($num_coincidencias > 0): ?>
                <p><strong>Se encontraron <?php echo $num_coincidencias; ?> coincidencia(s).</strong></p>
            <?php else: ?>
                <p><strong>No se encontraron coincidencias.</strong></p>
            <?php endif; ?>

            <div class="results-box">
                <?php
                    echo $resultado; 
                ?>
            </div>
        </div>
        <?php endif; ?>
    </div>
</body>
</html>