<?php
$A_str = '';
$B_str = '';
$A = [];
$B = [];
$union = [];
$interseccion = [];
$diferencia_A_B = [];
$diferencia_B_A = [];
$mostrar_resultados = false;
    if(isset($_POST['conjuntoA']) && isset($_POST['conjuntoB']))
    {$A_str = $_POST['conjuntoA'];
    $B_str = $_POST['conjuntoB'];}
    

    if ($A_str !== '' || $B_str !== '') {
        $A = array_unique(array_map('intval', array_filter(explode(',', $A_str), 'is_numeric')));
        $B = array_unique(array_map('intval', array_filter(explode(',', $B_str), 'is_numeric')));
        sort($A);
        sort($B);

        $union = array_unique(array_merge($A, $B));
        sort($union);

        $interseccion = array_intersect($A, $B);

        
        $diferencia_A_B = array_diff($A, $B);
        $diferencia_B_A = array_diff($B, $A);
        
        $mostrar_resultados = true;
    }

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Operaciones de Conjuntos</title>
</head>
<body>
    <h1>Operación de conjuntos</h1>
    <form method="POST">
        <fieldset>
            <legend>Conjunto A</legend>
            <input type="text" id="conjuntoA" name="conjuntoA" placeholder="Ej: 1,2,3,4">
        </fieldset>
    
        <br>
        <fieldset>
            <legend>Conjunto B</legend>
            <input type="text" id="conjuntoB" name="conjuntoB" placeholder="Ej: 3,4,5,6">
        </fieldset>
        <br>
        <button type="submit">Calcular Operaciones</button>
    </form>

    <?php if ($mostrar_resultados): ?>
    <div class="resultados">
        <h2>Resultados</h2>
        <p><strong>Conjunto A:</strong> {<?= implode(', ', $A) ?>}</p>
        <p><strong>Conjunto B:</strong> {<?= implode(', ', $B) ?>}</p>
        <hr>
        <p><strong>Unión (A U B):</strong> {<?= implode(', ', $union) ?>}</p>
        <p><strong>Intersección (A ∩ B):</strong> {<?= implode(', ', $interseccion) ?>}</p>
        <p><strong>Diferencia (A - B):</strong> {<?= implode(', ', $diferencia_A_B) ?>}</p>
        <p><strong>Diferencia (B - A):</strong> {<?= implode(', ', $diferencia_B_A) ?>}</p>
    </div>
    <?php endif; ?>
</body>
</html>
