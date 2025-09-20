<?php

    $number=$_POST['numbers'];
    $array = explode(",", $number);
    for($i = 0; $i<count($array); $i++){
         if (!is_int($array[$i])) {
            echo "El numero ".$array[$i]." es no es entero <br>";
        }else{
            if($array[$i] % 2 == 0){

                echo "El numero ".$array[$i]." es par <br>";
            }else{
                echo "El numero ".$array[$i]." es impar <br>";
            }
        }
    }
?>
<button><a href="index.html">Volver</a></button>