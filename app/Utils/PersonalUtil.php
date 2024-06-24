<?php
namespace App\Utils;
class PersonalUtil{
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
}
