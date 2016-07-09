<?php

class FechasComponent extends Object {
    function varMeses() {
        $meses=array(
            '01'=>'Enero',
            '02'=>'Febrero',
            '03'=>'Marzo',
            '04'=>'Abril',
            '05'=>'Mayo',
            '06'=>'Junio',
            '07'=>'Julio',
            '08'=>'Agosto',
            '09'=>'Septiembre',
            '10'=>'Octubre',
            '11'=>'Noviembre',
            '12'=>'Diciembre
        ');
        return $meses;
    }
    function getMes($mes) {
        switch($mes){
            case '01':
                $mes="ENERO";
            break;
            case '02':
                $mes="FEBRERO";
            break;
            case '03':
                $mes="MARZO";
            break;
            case '04':
                $mes="ABRIL";
            break;
            case '05':
                $mes="MAYO";
            break;
            case '06':
                $mes="JUNIO";
            break;
            case '07':
                $mes="JULIO";
            break;
            case '08':
                $mes="AGOSTO";
            break;
            case '09':
                $mes="SEPTIEMBRE";
            break;
            case '10':
                $mes="OCTUBRE";
            break;
            case '11':
                $mes="NOVIEMBRE";
            break;
            case '12':
                $mes="DICIEMBRE";
            break;
        }
        return $mes;
    }
    function voltearFecha($fecha){
        //11-02-1983
        $ano=substr($fecha,0,4);
        $mes=substr($fecha,5,2);
        $dia=substr($fecha,8,2);
        $fecha=$dia.'-'.$mes.'-'.$ano;
        return $fecha;
    }

    function fechaAbase($fecha){
        //dd-mm-aaaa
        $ano=substr($fecha,6,4);
        $mes=substr($fecha,3,2);
        $dia=substr($fecha,0,2);
        $fecha=$ano.'-'.$mes.'-'.$dia;
        return $fecha;   
    }
    
    function diasemana($ano,$mes,$dia){
        $fecha=$ano."/".$mes."/".$dia;
        $fechats = strtotime($fecha); //a timestamp
    
        switch (date('w', $fechats)){
            case 0: $dia="DOMINGO"; break;
            case 1: $dia= "LUNES"; break;
            case 2: $dia= "MARTES"; break;
            case 3: $dia= "MIERCOLES"; break;
            case 4: $dia= "JUEVES"; break;
            case 5: $dia= "VIERNES"; break;
            case 6: $dia= "SABADO"; break;
        }
        return $dia;
    }
    
    function getMonthDays($Month, $Year){
       if(is_callable("cal_days_in_month")){
          return cal_days_in_month(CAL_GREGORIAN, $Month, $Year);
       }else{
          return date("d",mktime(0,0,0,$Month+1,0,$Year));
       }
    }
}

?>