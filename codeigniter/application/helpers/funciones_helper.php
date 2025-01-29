<?php
    function formatearFecha($fecha)
    {
        // Array de meses en formato literal abreviado
        $meses = [
            "01" => "ENE", "02" => "FEB", "03" => "MAR", 
            "04" => "ABR", "05" => "MAY", "06" => "JUN", 
            "07" => "JUL", "08" => "AGO", "09" => "SEP", 
            "10" => "OCT", "11" => "NOV", "12" => "DIC"
        ];

        // Extraer día, mes y año
        $dia = substr($fecha, 8, 2);
        $mes = substr($fecha, 5, 2);
        $anio = substr($fecha, 0, 4);

        // Convertir el mes a su forma literal
        $mesLiteral = isset($meses[$mes]) ? $meses[$mes] : $mes;

        // Formatear la fecha
        $fechaformateada = $dia . "-" . $mesLiteral . "-" . $anio;

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
    function fechaSoloMesAnio($fecha)
    {
        // Array de meses en formato literal abreviado
        $meses = [
            "01" => "ENE", "02" => "FEB", "03" => "MAR", 
            "04" => "ABR", "05" => "MAY", "06" => "JUN", 
            "07" => "JUL", "08" => "AGO", "09" => "SEP", 
            "10" => "OCT", "11" => "NOV", "12" => "DIC"
        ];

        // Extraer día, mes y año
        $mes = substr($fecha, 5, 2);
        $anio = substr($fecha, 0, 4);

        // Convertir el mes a su forma literal
        $mesLiteral = isset($meses[$mes]) ? $meses[$mes] : $mes;

        // Formatear la fecha
        $fechaformateada = $mesLiteral . "-" . $anio;

        return $fechaformateada;
    }
?>