<?php
    function formatearFecha($fecha)
    {
        //2024-06-24 21:39:20
        $dia=substr($fecha,8,2);
        $mes=substr($fecha,5,2);
        $anio=substr($fecha,0,4);

        $fechaformateada=$dia."/".$mes."/".$anio;

        return $fechaformateada;
    }
    function estado($nota)
    {
        if($nota>=61)
        {
            $estado="Aprobado";
        }
        else
        {
            $estado="Reprobado";
        }
        return $estado;
    }
?>