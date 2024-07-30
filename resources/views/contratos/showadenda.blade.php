<!DOCTYPE html>
<html lang="es">
<head>
	<title>Adenda Imprimible</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="{{asset('css/estilo.css')}}">
</head>
<body>

 <a href="#" onclick="window.close()"  id="listarcon">Volver</a>
<a href="#" onclick="imprimirCon()" id="imprimirc">imprimir</a>
 <div>	
</div> 
<p></p>
<div id="contrato1">
		<img src="{{asset('images/logocnsrlp.png')}}" alt="" class="logo">
        @if(isset($contrato->hash1) && $contrato->hash1)
            <div class="qr">
                {!! QrCode::size(135)->generate($contrato->hash1) !!}
            </div>
        @endif
	   <div> 
		<div class="titulo"><b><h2>CAJA NACIONAL DE SALUD</h2></b></div>
		<div class="subtitulo"><b>ADMINISTRACIÓN REGIONAL LA PAZ </b></div>
		
	</div>

<hr>
<div class="subtitulo2"><b>CONTRATO MODIFICATORIO DEL CONTRATO DE PRESTACIÓN DE SERVICIOS (TRABAJADOR EVENTUAL)<br>
    Nº C- {{$ut->rellenaceros($contratoOrigen->noCon)}} de {{$ut->cambiaformatofecha($contratoOrigen->fechaIni)}}</b></div>
<div class="parrafo" >
  <p><b>MAT-{{$personal->matricula}}</b></p>

<p>Conste por el presente acuerdo de partes que, suscrito al tenor del Art. 6 párrafo segundo 
    de La Ley General del Trabajo, formará parte integrante e indisoluble del contrato de trabajo 
    temporal signado con el código Nº C- {{$ut->rellenaceros($contratoOrigen->noCon)}} 
    suscrito en fecha {{$ut->cambiaformatofecha($contratoOrigen->fechaIni)}} 
    entre la Caja Nacional de Salud representada por el 
    {{$admair->cargo." REGIONAL LA PAZ - ".$admair->nombre.' '.$admair->user->nombres.' '.$admair->user->a_paterno .' '.$admair->user->a_materno}},  
    @if ($cargo->tipo =='medico') 
        &nbsp;{{$jefeaim->cargo." REGIONAL LA PAZ - ".$jefeaim->nombre.' '.$jefeaim->user->nombres.' '.$jefeaim->user->a_paterno .' '.$jefeaim->user->a_materno}}
	@else
        &nbsp;{{$jefeaiadm->cargo." REGIONAL LA PAZ - ".$jefeaiadm->nombre.' '.$jefeaiadm->user->nombres.' '.$jefeaiadm->user->a_paterno .' '.$jefeaiadm->user->a_materno}}
        
    @endif, 
    &nbsp;{{$jefeair->cargo." REGIONAL LA PAZ - ".$jefeair->nombre.' '.$jefeair->user->nombres.' '.$jefeair->user->a_paterno .' '.$jefeair->user->a_materno}}
    &nbsp;y el (la) Señor (a)&nbsp;<b>{{$personal->a_paterno}}&nbsp;{{$personal->a_materno}}&nbsp;
        {{$personal->nombres}}</b> sujetandose al tenor de las siguientes cláusulas:</p>

<p><b>PRIMERA: (DE LAS PARTES).-</b> Intervienen en la suscripción del presente Contrato modificatorio, 
por una parte, el 
{{$admair->cargo." REGIONAL LA PAZ - ".$admair->nombre.' '.$admair->user->nombres.' '.$admair->user->a_paterno .' '.$admair->user->a_materno}},   

    @if ($cargo->tipo =='medico') 
        &nbsp;{{$jefeaim->cargo." REGIONAL LA PAZ - ".$jefeaim->nombre.' '.$jefeaim->user->nombres.' '.$jefeaim->user->a_paterno .' '.$jefeaim->user->a_materno}}
    @else
        &nbsp;{{$jefeaiadm->cargo." REGIONAL LA PAZ - ".$jefeaiadm->nombre.' '.$jefeaiadm->user->nombres.' '.$jefeaiadm->user->a_paterno .' '.$jefeaiadm->user->a_materno}}
    @endif, 
    &nbsp;{{$jefeair->cargo." REGIONAL LA PAZ - ".$jefeair->nombre.' '.$jefeair->user->nombres.' '.$jefeair->user->a_paterno .' '.$jefeair->user->a_materno}}
    quienes en adelante se denominaran "CONTRATANTE"; y por otra, el (la) Señor (a) 
   
    <b>{{$personal->a_paterno}}&nbsp;{{$personal->a_materno}}&nbsp;{{$personal->nombres}}</b> 
    quien es mayor de edad, hábil por derecho, con C.I. Nº {{$personal->CI}}-{{$personal->departamento->sigla}} domiciliado en la(el) 
    {{$personal->direccion}}, calle&nbsp;{{$personal->calle}}, Número&nbsp;{{$personal->No}} 
    que en adelante se denominara <b>"TRABAJADOR(A) EVENTUAL"</b>.</p>

	<p><b>SEGUNDA: (DEL OBJETO).-</b> El objeto de la presente  es modificar la fecha de conclusión del contrato 
       de prestación de servicio signado con el código Nº C- {{$ut->rellenaceros($contratoOrigen->noCon)}}
       de fecha {{$ut->cambiaformatofecha($contratoOrigen->fechaIni)}} 
       establecida en la Cláusula “CUARTA”, por necesidad de temporada según informe técnico
        {{$requerimiento->motivo}} 
        (en este informe debe obligatoriamente existir indicadores variables que intenten medir en forma cuantitativa
         y cualitativa las necesidades para poder respaldar las acciones, en el tiempo especificando las funciones a ser cumplidas).</p>

	<p> <b>TERCERA: (DE LA AMPLIACIÓN DE LA VIGENCIA DEL CONTRATO).-</b> 
        Establecido el objeto  contractual en la cláusula segunda del presente documento,
          sin que medie vicio del consentimiento alguno en el (la) “TRABAJADOR EVENTUAL” 
          y en ejercicio de las facultades reconocidas por ley a la parte “CONTRATANTE”, 
          acuerdan y convienen en: Ampliar la vigencia del contrato de Prestación de Servicio , 
          Nº C- {{$ut->rellenaceros($contratoOrigen->noCon)}} de fecha {{$ut->cambiaformatofecha($contratoOrigen->fechaIni)}}
           contenida en la cláusula “CUARTA” comprometiéndose el “TRABAJADOR EVENTUAL” salvo causa legal permitida, 
           a prestar servicios hasta el <b>{{explode("-",$contrato->fechaFin)[2]}}  de 
            {{$ut->mesliteral(explode("-",$contrato->fechaFin)[1])}}  de 
            {{explode("-",$contrato->fechaFin)[0]}}</b> inclusive e indefectiblemente.<br>
A la modificación de la cláusula “TERCERA”, misma que, para su cumplimiento obligatorio y a 
los efectos legales correspondientes, queda redactada de la siguiente manera: 
</p>
<p>
	<div style="padding-left: 20px;">
	<b>TERCERA DEL OBJETO.-</b> El presente contrato de Trabajo Eventual tiene como único objeto 
    el contar con los servicios profesionales y/o administrativos de un(a) 
    <b> {{$cargo->cargo}}</b>,  para que trabaje en tal condición en el (la) 
    <b>{{$centrosal->nombre_cs}}</b>, dependiente de la Administración Regional La Paz, 
    en atención a requerimiento mediante Nota Nº {{$requerimiento->nota}} con una carga horaria de 
    <b>{{$nivel->horas_trab}}</b>.
	</div>
</p>
<p><b>CUARTA:(DE LAS DEMAS CLAUSULAS).-</b>Quedan firmes y subsistentes todos los demás 
    términos y cláusulas del contrato de trabajo a plazo fijo Nº C- {{$ut->rellenaceros($contratoOrigen->noCon)}}
     de fecha {{$ut->cambiaformatofecha($contratoOrigen->fechaIni)}}.</p>

<p> <b>QUINTA: (DE LA CONFORMIDAD).- Por una parte, el “CONTRATANTE”</b> representada por el
 {{$admair->cargo." REGIONAL LA PAZ - ".$admair->nombre.' '.$admair->user->nombres.' '.$admair->user->a_paterno .' '.$admair->user->a_materno}},    
 @if ($cargo->tipo =='medico') 
        &nbsp;{{$jefeaim->cargo." REGIONAL LA PAZ - ".$jefeaim->nombre.' '.$jefeaim->user->nombres.' '.$jefeaim->user->a_paterno .' '.$jefeaim->user->a_materno}}
	@else
        &nbsp;{{$jefeaiadm->cargo." REGIONAL LA PAZ - ".$jefeaiadm->nombre.' '.$jefeaiadm->user->nombres.' '.$jefeaiadm->user->a_paterno .' '.$jefeaiadm->user->a_materno}}
        
    @endif, 
    &nbsp;{{$jefeair->cargo." REGIONAL LA PAZ - ".$jefeair->nombre.' '.$jefeair->user->nombres.' '.$jefeair->user->a_paterno .' '.$jefeair->user->a_materno}},
    

    y por otra el (la) CONTRATADO (A), el (la) Señor (a) 
    <b>
        {{$personal->a_paterno}}&nbsp;{{$personal->a_materno}}&nbsp;
        {{$personal->nombres}}</b>,
    damos nuestra conformidad con todas y cada una de las cláusulas que anteceden, obligándonos a su fiel 
    cumplimiento, firmando en señal de conformidad en cinco ejemplares del mismo tenor. <p>


 @if ($copia != '1') 
<table  class= "firmas" >
	
	
	<tr>
        <td>&nbsp;</td>
        
        <td><img src="{{'/storage/firmas/'.$jefeair->img_firma}}" width="100" height="50"></td>
    </tr>

	<tr>
        <td>{{$personal->a_paterno}}&nbsp;{{$personal->a_materno}}&nbsp;{{$personal->nombres}}</td>
        <td>{{$jefeair->nombre.' '.$jefeair->user->nombres.' '.$jefeair->user->a_paterno.' '.$jefeair->user->a_materno}}</td>
    </tr>
	<tr>
        <td>CONTRATADO <br>C.I. Nº {{$personal->CI}}-{{$personal->departamento->sigla}}</td>
        <td>{{$jefeair->cargo}}</td>
    </tr>
	
	<tr><td>&nbsp;</td><td>&nbsp;</td></tr>
	<tr>
        <td>
            @if ($cargo->tipo=='medico')
            <img src="{{'/storage/firmas/'.$jefeaim->img_firma}}" width="100" height="50">
            @else
                <img src="{{'/storage/firmas/'.$jefeaiadm->img_firma}}" width="100" height="50">
		   @endif
		</td>
        <td>
            <img src="{{'/storage/firmas/'.$admair->img_firma}}" width="100" height="50">
        </td>
    </tr>
		
	<tr>
        <td>
            @if ($cargo->tipo=='medico') 
               {{$jefeaim->nombre.' '.$jefeaim->user->nombres.' '.$jefeaim->user->a_paterno .' '.$jefeaim->user->a_materno}}	
            @else 
                {{$jefeaiadm->nombre.' '.$jefeaiadm->user->nombres.' '.$jefeaiadm->user->a_paterno .' '.$jefeaiadm->user->a_materno}}	
            @endif
        </td>
        <td>
            {{$admair->nombre.' '.$admair->user->nombres.' '.$admair->user->a_paterno .' '.$admair->user->a_materno}}	
            
        </td>
    </tr>
	<tr>
        <td>
            @if ($cargo->tipo=='medico') 
              {{$jefeaim->cargo}}	
            @else 
              {{$jefeaiadm->cargo}} 
            @endif
        </td>
        <td>
            {{$admair->cargo}}
        </td>
    </tr>
</table><br>
@else
<table  class= "firmas" >
	
	
	<tr><td>&nbsp;</td><td>&nbsp;</td></tr>
	<tr><td>&nbsp;</td><td>&nbsp;</td></tr>
	<tr><td>&nbsp;</td><td>&nbsp;</td></tr>
    <tr>
        <td>{{$personal->a_paterno}}&nbsp;{{$personal->a_materno}}&nbsp;{{$personal->nombres}}</td>
        <td>{{$jefeair->nombre.' '.$jefeair->user->nombres.' '.$jefeair->user->a_paterno.' '.$jefeair->user->a_materno}}</td>
    </tr>
	<tr>
        <td>CONTRATADO <br>C.I. Nº {{$personal->CI}}-{{$personal->departamento->sigla}}</td>
        <td>{{$jefeair->cargo}}</td>
    </tr>	
	<tr><td>&nbsp;</td><td>&nbsp;</td></tr>
	<tr><td>&nbsp;</td><td>&nbsp;</td></tr>
	<tr><td>&nbsp;</td><td>&nbsp;</td></tr>	
    <tr>
        <td>
            @if ($cargo->tipo=='medico') 
               {{$jefeaim->nombre.' '.$jefeaim->user->nombres.' '.$jefeaim->user->a_paterno .' '.$jefeaim->user->a_materno}}	
            @else 
                {{$jefeaiadm->nombre.' '.$jefeaiadm->user->nombres.' '.$jefeaiadm->user->a_paterno .' '.$jefeaiadm->user->a_materno}}	
            @endif
        </td>
        <td>
            {{$admair->nombre.' '.$admair->user->nombres.' '.$admair->user->a_paterno .' '.$admair->user->a_materno}}	
            
        </td>
    </tr>
        <td>
            @if ($cargo->tipo=='medico') 
              {{$jefeaim->cargo}}	
            @else 
              {{$jefeaiadm->cargo}} 
            @endif
        </td>
        <td>
            {{$admair->cargo}}
        </td>
    </tr>

</table><br>
@endif
<small>cc. RRHH Retribución / Depto. Nal. Sistemas/ File Personal<br>
{{$iniciales.'/'.$usuario->name}} @switch($copia)
@case('1')
 ORIGINAL<br>
    @break
@case('2')
COPIA KARDEX
    @break
@case('3')
COPIA INTERESADO 
@break
@case('4')
COPIA RRHH 
     @break
@default
NO VALIDO
@endswitch</br> 
File Personal No:&nbsp;@if (isset($personal->filePer)) 
{{$personal->filePer->nombre}};
@else 'Sin asignar' @endif
</small>
</div>
<hr>
<i>{{$contrato->fechaCon}}</i>&nbsp;&nbsp;
		<i>{{$contrato->hash1."  ".$usuario->name}}</i>
</div>
<a href="#" onclick="imprimirCon()" id="imprimirc">imprimir</a>
</div>
<script type="text/javascript">
function imprimirCon(){
 window.print()	
}
</script>
</body>
</html>
