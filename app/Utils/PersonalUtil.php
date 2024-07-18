<?php
namespace App\Utils;
class PersonalUtil{
	function __construct()
	{
		# code...
	}
    public function generaMatricula($se,$f_n,$pat,$mat,$nom)
	{
	   	list($anio,$mes,$dia)=explode('-', $f_n);
	   		if($se=='F')
	   		{
	   		$mes=$mes+50;	
	   		}
	   	$a=substr($anio,-2);
	   	
	   	if ( trim($mat)=='') {
	   	  $p=substr($pat,0,2);	
	   	}else{
           $p=substr($pat,0,1);
	   	}
	   	
	   	if ( trim($pat)=='') {
	   	   $m=substr($mat,0,2);	
	   	}else{
           $m= substr($mat,0,1);
	   	}
	   	$n=substr($nom,0,1);
	   	$matri=$a.$mes.$dia.$p.$m.$n;
	   	//echo $mat;
	   	return $matri; 
	}

	public function mesliteral($nmes)
	{$lmes="Enero";
		switch ($nmes) {
			case "1":
				$lmes="Enero";
				break;
			case "2":
				$lmes="Febrero";
				break;
			case "3":
				$lmes="Marzo";
				break;
			case "4":
				$lmes="Abril";
				break;
			case "5":
				$lmes="Mayo";
				break;
			case "6":
				$lmes="Junio";
				break;
			case "7":
				$lmes="Julio";
				break;
			case "8":
				$lmes="Agosto";
				break;
			case "9":
				$lmes="Septiembre";
				break;
			case "10":
				$lmes="Octubre";
				break;
			case "11":
				$lmes="Noviembre";
				break;
			case "12":
				$lmes="Diciembre";
				break;	
			default:
				
				break;
		}
		return $lmes;
	}
	function diasdifentrefechas($fechaIni,$fechaFin){
		$ini = date_create($fechaIni);
		$fin = date_create($fechaFin);
		$intervalo = date_diff($ini,$fin);
		$diasdif =$intervalo->format('%R%a')+0;
		return $diasdif;
	}
	function cambiaformatofecha($fecha){
		return $fechaIni= explode('-', $fecha)[2]."/".explode('-', $fecha)[1]."/".explode('-', $fecha)[0];
	}
	function rellenaceros($var){	
	 $mas = 8 - strlen($var);
	 $cad = '';
	 for ($i=0; $i < $mas ; $i++) { 
	 	$cad .= "0";
	 }
	 $cad.=$var;
	 return $cad;
	}
	function codificar($dato) {
            $resultado = $dato;
            $arrayLetras = array('');
            $limite = count($arrayLetras) - 1;
            $num = mt_rand(0, $limite);
            for ($i = 1; $i <= $num; $i++) {
                $resultado = base64_encode($resultado);
            }
            $resultado = $resultado . '+' . $arrayLetras[$num];
            $resultado = base64_encode($resultado);
            return $resultado;
        }
     function decodificar($dato) {
            $resultado = base64_decode($dato);
            list($resultado, $letra) = explode('+', $resultado);
            $arrayLetras = array('');
            for ($i = 0; $i < count($arrayLetras); $i++) {
                if ($arrayLetras[$i] == $letra) {
                    for ($j = 1; $j <= $i; $j++) {
                        $resultado = base64_decode($resultado);
                    }
                    break;
                }
            }
            return $resultado;
        }
}
