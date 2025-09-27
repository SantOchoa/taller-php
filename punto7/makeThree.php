<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Resultado del Árbol Binario</title>
    <link rel="stylesheet" href="CSS/index.css">
</head>
<body>

<div class="container results-container">
<?php

    // --- CLASES Y FUNCIONES DE CONSTRUCCIÓN (SIN CAMBIOS) ---
    class Node {
        public $data; public $left = null; public $right = null;
        public function __construct($data) { $this->data = $data; }
    }

    // --- 2. Funciones para construir el árbol (SIN CAMBIOS) ---
    function buildTreeFromPreIn(&$preorden, &$inorden) {
        if (empty($preorden) || empty($inorden)) return null;
        $rootData = array_shift($preorden);
        $root = new Node($rootData);
        $rootIndexInorden = array_search($rootData, $inorden);
        $leftInorden = array_slice($inorden, 0, $rootIndexInorden);
        $rightInorden = array_slice($inorden, $rootIndexInorden + 1);
        $root->left = buildTreeFromPreIn($preorden, $leftInorden);
        $root->right = buildTreeFromPreIn($preorden, $rightInorden);
        return $root;
    }

    function buildTreeFromPostIn(&$postorden, &$inorden) {
        if (empty($postorden) || empty($inorden)) return null;
        $rootData = array_pop($postorden);
        $root = new Node($rootData);
        $rootIndexInorden = array_search($rootData, $inorden);
        $leftInorden = array_slice($inorden, 0, $rootIndexInorden);
        $rightInorden = array_slice($inorden, $rootIndexInorden + 1);
        $root->right = buildTreeFromPostIn($postorden, $rightInorden);
        $root->left = buildTreeFromPostIn($postorden, $leftInorden);
        return $root;
    }

    // --- 3. NUEVA FUNCIÓN para imprimir el árbol visualmente ---
   
   function printVisualTree($node) {
        if ($node === null) {
            return; // No imprimir nada si el nodo de inicio es nulo.
        }

        // Imprime el nodo actual
        echo '<li>';
        echo '<span>' . htmlspecialchars($node->data) . '</span>';

        // Solo crea una lista <ul> para los hijos si existe al menos uno.
        if ($node->left !== null || $node->right !== null) {
            echo '<ul>';
            
            // Imprime el subárbol izquierdo o un marcador de posición
            if ($node->left !== null) {
                printVisualTree($node->left);
            } else {
                echo '<li class="placeholder"></li>';
            }

            // Imprime el subárbol derecho o un marcador de posición
            if ($node->right !== null) {
                printVisualTree($node->right);
            } else {
                echo '<li class="placeholder"></li>';
            }
            
            echo '</ul>';
        }
        
        echo '</li>';
    }


    // --- 4. Lógica principal: procesar la entrada (LIGERAMENTE MODIFICADO) ---

    function parseInput($input) {
        return array_map('trim', explode(',', $input));
    }

    $preorden_str = !empty($_POST['preorden']) ? $_POST['preorden'] : null;
    $inorden_str = !empty($_POST['inorden']) ? $_POST['inorden'] : null;
    $postorden_str = !empty($_POST['postorden']) ? $_POST['postorden'] : null;

    $root = null;

    echo "<h2>Resultado de la Construcción</h2>";

    try {
        if ($preorden_str && $inorden_str) {
            $preorden = parseInput($preorden_str);
            $inorden = parseInput($inorden_str);
            $root = buildTreeFromPreIn($preorden, $inorden);
        } elseif ($postorden_str && $inorden_str) {
            $postorden = parseInput($postorden_str);
            $inorden = parseInput($inorden_str);
            $root = buildTreeFromPostIn($postorden, $inorden);
        } elseif ($preorden_str && $postorden_str) {
            echo "<p><strong>Advertencia:</strong> La construcción a partir de Preorden y Postorden no es soportada. Por favor, proporcione <strong>Preorden e Inorden</strong> o <strong>Postorden e Inorden</strong>.</p>";
        } else {
            echo "<p><strong>Error:</strong> Debes proporcionar al menos dos recorridos válidos.</p>";
        }

        // --- SECCIÓN DE SALIDA MODIFICADA ---
        if ($root) {
            echo "<p>Árbol construido exitosamente. Esta es su representación visual:</p>";
            // Se crea el contenedor y la lista principal, y se llama a la función recursiva
            echo '<div class="tree">';
            echo '<ul>';
            printVisualTree($root); // Usamos la nueva función mejorada
            echo '</ul>';
            echo '</div>';
        }
    } catch (Exception $e) {
        echo "<p><strong>Error durante la construcción:</strong> " . $e->getMessage() . ". Asegúrate de que los recorridos sean consistentes.</p>";
    }

    ?>
    <a href="index.html" class="btn-back">Construir Otro Árbol</a>
</div>

</body>
</html>