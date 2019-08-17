<?php
require_once './vendor/autoload.php';

class mongodb
{

    public function __construct()
    {
        $this->db =  (new MongoDB\Client)->mecubro->statistics;

    }

    public function insert($id=[])
    {
       if (empty($id)){
           return false;
       }
       if (is_array($id)){
           $this->db->insertOne([
                'registros' => $id['registros'],
                'valor' => $id['valor']
            ]);
        return true;
        }else{
            return false;
        }
    }
    public function estadisticas (){
        $filter = array('valor'=>true);
        $total = $this->db->count();
        $positivos = $this->db->count($filter);
        echo 'la cantidad de ejecuciones es de: ' . $total . "\n";
        echo 'la cantidad de casos positivos es de: ' . $positivos . "\n";
        echo 'el ratio de casos positivos es de: ' . ($positivos/$total) . "\n"; 
        return $total;
    }

}