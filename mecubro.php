<?php

require_once './mongodb.php';


    function sum (array $ar, int $x)
    {
        $db = new mongodb;
        $c=0;
        for ($i=0; $i <count($ar) - 1 ; $i++) { 
            for ($k=1; $k <count($ar) ; $k++) { 
                if (($ar[$i] + $ar[$k]) == $x){
                    $c = $ar[$i] + $ar[$k];
                    echo 'Los valores encontrados en el array que cumplen con la suma son:' . "\n";
                    echo $ar[$i] . ' y ' . $ar[$k] . "\n";
                    $db->insert([
                        'registros' => $c,
                        'valor' => true
                    ]);
                    
                }
                else{
                    $c = $ar[$i] + $ar[$k];
                    $db->insert([
                        'registros' => $c,
                        'valor' => false
                    ]);
                    
                }
            }
        }
    }
    
$ar = [3,1,9,5,22,12,-12];
$db = new mongodb;
sum($ar,13);
$db->estadisticas();

