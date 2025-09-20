<?php
$operacion = $_POST['operation'];
$number = $_POST['number'];

if ($operacion == "fibonacci"){
    $fibonacci = 0;
    $last = 0;
    $arrayFibonacci = [];
    for ($i=0; $i <= $number; $i++) { 
        if ($i == 0){
            $fibonacci = 0;
        }else if ($i == 1){
           
            $fibonacci = 1;
            $last = $fibonacci;
        }else if ($i == 2){
            $fibonacci = 2;
        }else{
            $temp= $fibonacci;
            $fibonacci = $fibonacci + $last;
            $last = $temp;
        }
        array_push($arrayFibonacci, $fibonacci);
    }
    foreach($arrayFibonacci as $text){
        echo $text;
        echo "<br>";
    }

}else if ($operacion == "factorial"){
    $fact = 0;
    $array_numbers = [];
    for($i=0; $i<=$number;$i++){
        if($i== 1){
            $fact = 1;
        }else{
            $fact = $fact*$i;
        }
        array_push($array_numbers,$fact);
    }
    foreach($array_numbers as $text){
        echo $text;
        echo "<br>";
    }

}

?>
<button><a href="index.html">Volver</a></button>