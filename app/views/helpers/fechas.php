<?php
class FechasHelper extends Helper{
    var $helpers=array('Time');
    var $dias = array('lunes', 'martes', 'miercoles', 'jueves', 'viernes', 'sábado', 'domingo');
    var $meses = array('Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic');

    function voltearFecha($fecha){
        $ano=substr($fecha,0,4);
        $mes=substr($fecha,5,2);
        $dia=substr($fecha,8,2);
        $fecha=$dia.'-'.$mes.'-'.$ano;
        return $fecha;
    }

    function mostrarNombreMes($fecha)
    {
        $mes = substr($fecha,5,2);
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

    function becaFin($fecha){
        $ano=substr($fecha,0,4);
        $mes=substr($fecha,5,2);
        $fecha=$mes.'-'.$ano;
        return $fecha;
    }
   
    function FormatoFecha($fecha = null, $formato=null){
        $time_fecha = strtotime($fecha);
        $m = date('m', $time_fecha);
        $N = date('N', $time_fecha);
        $d = date('d', $time_fecha);
        $y = date('y', $time_fecha);
        $Y = date('Y', $time_fecha);
        $F = $this->meses[$m -1];
        $M = substr($this->meses[$m -1],0,3);
        
		
		$hora=time($fecha);
        /*switch($formato){
            case "completo":
                $salida = "$l $d de $F de $Y";
                break;
            case 'd-F-Y':
                $salida = "$d-$F-$Y";
                break;
            case 'd-F-y':
                $salida = "$d-$F-$y";
                break;
            case "d-M-Y":
                $salida = "$d-$M-$Y";
                break;
            case "d-M-y":
                $salida = "$d-$M-$y";
                break;
            case "d-m-y":
                $salida = "$d-$m-$y";
                break;
            case "M-y":
                $salida = "$M-$y";
                break;
            case "F-Y":
                $salida = "$F-$Y";
                break;
            case "F":
                $salida = "$F";
                break;
            default:
                $salida = "$d-$m-$y";
        }
        return $salida;*/
        switch ($formato){
            case 'nice':
                if($this->Time->isToday($fecha)){
                    $salida = "$d $F $Y";
                }elseif($this->Time->wasYesterday($fecha)){
                    $salida = "$d $F $Y";
                }else{
                    $salida = "$d $F $Y";
                }
                
                break;
            default:
                $salida = "$d-$m-$Y";
        }
        return $salida;
    }  
   
}
?>