<?php
class CostoControlador
{

    public static function CrearIdCosto()
    {
        $rowCount = CostoModelo::obtenerCostos();

        $rowCount = count($rowCount);
        if ($rowCount === false) {
            $id = "COST-1";
        } else {
            $num = $rowCount;
            $num += 1;
            if ($num < 10) {
                $id = "COST-0000" . $num;
            } else if ($num < 100) {
                $id = "COST-000" . $num;
            } else if ($num < 1000) {
                $id = "COST-00" . $num;
            } else if ($num < 10000) {
                $id = "COST-0" . $num;
            } else {
                $id = "COST-" . $num; //yaaaaaa
            }
            return $id;
        }
    }
}
