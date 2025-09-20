<?php
    $numbers = $_POST['numbers'];
    $array_numbers = explode(",", $numbers);
    function calcular_media($array_numbers) {
        $suma =0;
        foreach($array_numbers as $num){
            $suma += $num;
        }
        $cantidad = count($array_numbers);
        $media = $suma / $cantidad;
        return "Media: ".$media;
    }
    function calcular_mediana($array_numbers) {
        sort($array_numbers);
        $cantidad = count($array_numbers);
        if ($cantidad % 2 == 0) {
            $mediana = ($array_numbers[$cantidad / 2 - 1] + $array_numbers[$cantidad / 2]) / 2;
        } else {
            $mediana = $array_numbers[floor($cantidad / 2)];
        }
        return "Mediana: {$mediana}";
    }
    function calcular_moda($array_numbers) {
        $frecuencia = array_count_values($array_numbers);
        arsort($frecuencia);
        $moda = key($frecuencia);
        return "Moda: {$moda}";
    }

    $media = calcular_media($array_numbers);
    $mediana = calcular_mediana($array_numbers);
    $moda = calcular_moda($array_numbers);  
    echo $media;
    echo "<br>";
    echo $mediana;
    echo "<br>";
    echo $moda;
    echo "<br>";
?>
<button><a href="index.html">Volver</a></button>