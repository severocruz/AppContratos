 
  {{isset($personal->filePer)?$personal->filePer->nombre:'No tiene File'}}
<!DOCTYPE html>
<html lang="es">
<head>
	<title>Contrato imprimible</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="{{asset('css/estilo.css')}}">
</head>
<body>
 <a href="#" onclick="window.close()"  id="listarcon">Volver</a>
<a href="#" onclick="imprimirCon()" id="imprimirc">imprimir</a>
 <div>
  <div id="carta">  
    <img src="{{ asset('images/logocnsrlp.png') }}" alt="" class="logo">
  	{{-- <img src="./imagenes/logocnsrlp.png" class="logo" > --}}
<div> 
	<div class="titulo"><b><h1>CAJA NACIONAL DE SALUD</h1></b></div>
	<div class="subtitulo"><b>ADMINISTRACIÓN REGIONAL LA PAZ </b></div>
<div class="subtitulo2"><b>RECURSOS HUMANOS REGIONAL LA PAZ</b></div></div>

<p id="cod">SEC-C-{{$ut->rellenaceros ($contrato->noCon)}}</p>

<hr>				

{{-- <img src="'./codqr/temp/'.$this->data['contrato']['imagen']" class="qr" > --}}
@if(isset($contrato->hash1) && $contrato->hash1)
    <div class="qr">
        {!! QrCode::size(135)->generate($contrato->hash1) !!}
    </div>
@endif

<p id="f1">La Paz, {{substr(explode("-",$contrato->fechaCon)[2], 0, 2)}}&nbsp;de&nbsp;{{$ut->mesliteral(explode("-",$contrato->fechaCon)[1])}}&nbsp;de&nbsp;{{explode("-",$contrato->fechaCon)[0]}}</p>

Señor(a)<br>
{{strtoupper($centrosal->nombre_enc)}}<br>
<b>{{$centrosal->cargoEnc->cargo}} &nbsp;{{$centrosal->nombre_cs}}</b> <br> 
<p>Presente.-</p> 
 
<p>REF.:  <b> <u>{{$cargo->cargo}} NIVEL {{$nivel->nivel}}</u></b> </p>

<p>Señores:</p>

<p class="parrafo">El (a) Sr.(a) <b>{{$personal->a_paterno}}&nbsp;{{$personal->a_materno}}&nbsp;{{$personal->nombres}}</b> ,
     ha suscrito contrato temporal para cumplir funciones en la Institución en el Cargo de <b>{{$cargo->cargo}}</b> por <b>{{$tipocon->tipo}},
     DE ACUERDO A NOTA N° {{$requerimiento->nota}} DE FECHA {{$ut->cambiaformatofecha($requerimiento->fecha_nota)}} 
     EMITIDO POR LA ADMINISTRACION REGIONAL LA PAZ</b> con cargo a la Partida <b><i>{{$contrato->partPres}}</i></b>, 
     con <b>{{$nivel->horas_trab}}</b> a partir del <b>{{$ut->cambiaformatofecha($contrato->fechaIni)}}</b>  
     al <b>{{$ut->cambiaformatofecha($contrato->fechaFin)}}&nbsp;({{$ut->diasdifentrefechas($contrato->fechaIni,$contrato->fechaFin)}}&nbsp;días)</b>.
</p>
<p class="parrafo">En este sentido agradeceremos a usted, instruir la apertura en Biometrico, 
    previa presentación de su Carnet de Identidad y tomar nota del tiempo señalado, a objeto  
    evitar reclamos posteriores.</p> 

Atentamente,<br>

<p id="lema"><b>“LA REESTRUCTURACIÓN AVANZA”</b></p>
  
<table class= "firmas" border="0" >
	 
		@if ($copia!='1')
        		
            <tr>
                <td><img src="{{'/storage/firmas/'.$jefeair->img_firma}}" width="100" height="50"> </td>
                <td></td>
                <td>
                    @if ($cargo->tipo=='medico') 
                        <img src="{{'/storage/firmas/'.$jefeaim->img_firma}}" width="100" height="50"> 
                    @else
                        <img src="{{'/storage/firmas/'.$jefeaiadm->img_firma}}" width="100" height="50"> 
                    @endif
                </td>
            </tr> 
	    @endif 				
	<tr>
		<td>{{$jefeair->nombre.' '.$jefeair->user->nombres.' '.$jefeair->user->a_paterno.' '.$jefeair->user->a_materno }}</td>
		<td >&nbsp;</td>
		<td>@if ($cargo->tipo=='medico') 
		 {{$jefeaim->nombre.' '.$jefeaim->user->nombres.' '.$jefeaim->user->a_paterno.' '.$jefeaim->user->a_materno }}
		@else 	
		 {{$jefeaiadm->nombre.' '.$jefeaiadm->user->nombres.' '.$jefeaiadm->user->a_paterno.' '.$jefeaiadm->user->a_materno }} 
        @endif
        </td>
	</tr>
	<tr>
		<td><b>{{$jefeair->cargo}}</b></td>
		<td >&nbsp;</td>
		<td><b>@if ($cargo->tipo=='medico') 
		     {{$jefeaim->cargo}};	
		@else
             {{$jefeaiadm->cargo}}; 
        @endif
        </b></td>
	</tr>
	
@if ($copia=='1') 

 	<tr>
		<td colspan="3">&nbsp;</td>
	</tr>
	<tr>
		<td colspan="3">&nbsp;</td>
	</tr>
	<tr>
		<td colspan="3">&nbsp;</td>
	</tr>
	<tr>
		<td colspan="3">&nbsp;</td>
	</tr>

@else
 	
 <tr> 
  <td colspan="3"> <img src="{{'/storage/firmas/'.$admair->img_firma}}" width="100" height="50"></td>	
 </tr>
 @endif
  		 
    <tr>
		<td colspan="3">{{$admair->nombre.' '.$admair->user->nombres.' '.$admair->user->a_paterno.' '.$admair->user->a_materno }}</td>
	</tr>

	<tr>
		<td colspan="3"><b>{{$admair->cargo}}</b></td>
	</tr>
	<tr>
		<td colspan="3">&nbsp;</td>
	</tr>
	<tr>
		<td colspan="3">&nbsp;</td>
	</tr>
</table>


<small>{{$iniciales.'/'.$usuario->name}}<br>
    c.c. Arch.
    @switch($copia)
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
@endswitch
File Personal No:&nbsp; @if (isset($pesonal->filePer)) 
	 {{$personal->filePer->nombre}};
@else 'Sin asignar' @endif</small>
<hr>
		<i>{{$contrato->fechaCon}}</i>&nbsp;&nbsp;
		<i>{{$contrato->hash1."  ".$usuario->name}}</i>
</div>
<div class="saltopagina">
	
</div> 
<div id="contrato1">
		{{-- <img src="./imagenes/logocnsrlp.png" class="logo" > --}}
        <img src="{{ asset('images/logocnsrlp.png') }}" alt="" class="logo">
	 <div> 
		<div class="titulo"><b><h1>CAJA NACIONAL DE SALUD</h1></b></div>
		<div class="subtitulo"><b>ADMINISTRACIÓN REGIONAL LA PAZ </b></div>
		<div class="subtitulo2"><b>CONTRATO DE PRESTACIÓN DE SERVICIOS</b></div>
		<div class="subtitulo2"><b>(TRABAJADOR EVENTUAL)</b></div>
	</div>
<p id="cod"><b>C-{{$ut->rellenaceros($contrato->noCon)}}</b></p>

<hr>
<div class="parrafo">
  <p><b>MAT-{{$personal->matricula}}</b></p>	                          
<p>Conste por el presente Contrato de Trabajo Eventual, que se conviene y acuerda al tenor de las siguientes cláusulas:</p>
<p><b>PRIMERA DE LAS PARTES.-</b> Intervienen y suscriben el presente contrato, por una parte, la Caja Nacional de Salud, 
representada legalmente en este acto por los Señores 
{{$jefeair->nombre.' '.$jefeair->user->nombres.' '.$jefeair->user->a_paterno.' '.$jefeair->user->a_materno}} ,
 @if ($cargo->tipo=='medico') 
	 {{$jefeaim->nombre.' '.$jefeaim->user->nombres.' '.$jefeaim->user->a_paterno.' '.$jefeaim->user->a_materno }}
      @else  
      {{$jefeaiadm->nombre.' '.$jefeaiadm->user->nombres.' '.$jefeaiadm->user->a_paterno.' '.$jefeaiadm->user->a_materno}}
      @endif y
      {{$admair->nombre.' '.$admair->user->nombres.' '.$admair->user->a_paterno.' '.$admair->user->a_materno}}   
    , {{$jefeair->cargo}} Regional La Paz,
 @if ($cargo->tipo=='medico') {{$jefeaim->cargo;}}
 @else {{$jefeaiadm->cargo}} @endif Regional La Paz  y {{$admair->cargo}}
  Regional La Paz respectivamente, que en adelante se denominará <b>"CONTRATANTE"</b> y, 
  por otra, el (la) Señor (a) <b>{{$personal->a_paterno}}&nbsp;{{$personal->a_materno}}&nbsp;{{$personal->nombres}}</b>, 
  con C.I. Nº <b>{{$personal->CI}}-{{$personal->departamento->sigla}}</b> en lo sucesivo denominado <b>"Trabajador Eventual"</b>.</p>
<p><b>SEGUNDA: DE LOS ANTECEDENTES.-</b> La Caja Nacional de Salud, institución descentralizada de derecho público sin fines de lucro, 
    con personalidad Jurídica , autonomía de gestión y patrimonio independiente, encargada de la gestión, 
    aplicación y ejecución del régimen de Seguridad Social a Corto Plazo, para cuya finalidad se requiere el servicio de personal adecuado 
    en función de las necesidades y circunstancias, enmarcado en las previsiones establecidas en el Código de Seguridad Social, su Decreto 
    reglamentario y demás disposiciones conexas.</p>

<p><b>TERCERA: DEL OBJETO.-</b> El presente Contrato de Trabajo Eventual tiene como único objeto el contar con los servicios profesionales
     y/o administrativos de un (a) <b>{{$cargo->cargo}}</b> para que trabaje en tal condición en el (la)
      <b>{{$centrosal->nombre_cs}}</b> dependiente de la Administración Regional La Paz a 
      Nota: {{$requerimiento->nota}} de fecha {{$ut->cambiaformatofecha($requerimiento->fecha_nota)}} , 
      EN CUMPLIMIENTO A CIRCULAR INSTRUCTIVO N° {{$cirinsnal->no}} DE FECHA {{$ut->cambiaformatofecha($cirinsnal->fecha)}} 
      DEL DEPARTAMENTO NACIONAL DE RECURSOS HUMANOS, CIRCULAR INSTRUCTIVO {{$cireg->no}} DE FECHA {{$ut->cambiaformatofecha($cireg->fecha)}} 
      DEL DEPARTAMENTO REGIONAL DE RECURSOS HUMANOS,  DE ACUERDO A CITE N° {{$cite->no}} DE {{$ut->cambiaformatofecha($cite->fecha)}} 
      EMITIDO POR LA ADMINISTRACION REGIONAL LA PAZ, con <b>{{$nivel->horas_trab}}</b></p>
<P><b>CUARTA: DE LA VIGENCIA.-</b> El Contrato de Trabajo Eventual, tendrá una vigencia de 
    <b>{{$ut->diasdifentrefechas($contrato->fechaIni,$contrato->fechaFin)}}  días</b> computable a partir del 
    <b>{{$ut->cambiaformatofecha($contrato->fechaIni)}}</b>, fecha en la cual empezará a prestar servicios el 
    Trabajador Eventual, hasta el <b>{{$ut->cambiaformatofecha($contrato->fechaFin)}}</b>. 
Por sus características de eventualidad, el presente Contrato de Trabajo Eventual <b>NO ADMITE NI ES SUSCEPTIBLE DE TÁCITA RECONDUCCIÓN</b> 
y en la fecha establecida de culminación, ipso facto, sin necesidad de previo aviso concluye el presente contrato.</P>
<p><b>QUINTA: DEL PAGO POR SERVICIOS.-</b> El contratante pagará al Trabajador Eventual, por los servicios prestados la remuneración 
    mensual que asciende a la suma de <b>Bs {{$nivel->salario}} ({{$nivel->literal}} 00/100 BOLIVIANOS)</b>, 
    con cargo a la partida <i>Nº {{$contrato->partPres}}</i> y nivel salarial <b>{{$nivel->nivel}}, 
    {{$tipocon->tipo}}, DE ACUERDO A NOTA N°  {{$requerimiento->nota}} DE FECHA 
    {{$ut->cambiaformatofecha($requerimiento->fecha_nota)}} EMITIDO POR LA ADMINISTRACION REGIONAL LA PAZ.</b><br>
El contratante actuará como agente de retención de los descuentos establecidos por Ley sobre el total ganado mensual 
antes referido.</p>
<p>Todos los derechos del Trabajador Eventual emergentes del presente contrato, sin distinción alguna, se encuentran incluidos
     en el monto mencionado, como remuneración mensual, en la presente cláusula, no pudiendo, por tanto,
      reclamar ningún otro beneficio ni otra suma adicional por ningún otro concepto.</p>
<p><b>SEXTA: DE LA ACLARACION NECESARIA</b>.- El trabajador Eventual se compromete a prestar sus servicios 
    en la Caja Nacional de Salud, sujetándose a las disposiciones de la Ley General de Trabajo, 
    Decreto Reglamentario de la Ley General del Trabajo, Código de Seguridad Social y su Reglamento, 
    Reglamento Interno de trabajo del Personal de la C.N.S., Ley Nº 1178 de Administración y 
    Control Gubernamentales y demás disposiciones conexas, sin que pueda alegar desconocimiento de las mismas.</p>
<p><b>SEPTIMA: DE LAS OBLIGACIONES DEL TRABAJADOR EVENTUAL.-</b></p>

<p>7.1 El Trabajador Eventual se compromete y obliga a prestar los servicios, objeto del presente documento, con diligencia, eficiencia, ética, e integridad profesional, tomando en cuenta la naturaleza y propósito del contrato, de la confidencialidad de documentación que se maneja y someterse a las evaluaciones, controles y observaciones que realice su inmediato superior.</p>
<p>7.2 Asumirá total responsabilidad en la ejecución y resultados del trabajo encomendado, obligándose a la preservación de los documentos, equipos y materiales que se le confíen y devolverlos en iguales condiciones.</p>
<p>7.3 En caso de requerirse el trabajo y la colaboración del Trabajador Eventual en otra Policlínica, Centro Médico u otra dependencia de la C.N.S. podrá ser transferido sin observación ni cuestionamiento alguno y bajo las mismas condiciones estipuladas en el presente contrato.</p>
<p>7.4 Dedicarse exclusivamente al servicio que requiere el contrato y durante la vigencia establecida en el mismo; por consiguiente, no podrá ejercer actividades profesionales o de consultoría en forma simultánea al servicio que se obliga por el presente documento.</p>
</div>
<p>&nbsp;</p>
<small>{{$iniciales.'/'.$usuario->usuario}}<br>
c.c. Arch. 
@switch($copia)
@case('1') ORIGINAL @break
@case('2') COPIA KARDEX @break
@case('3') COPIA INTERESADO @break
@case('4') COPIA RRHH      @break
@default NO VALIDO
@endswitch<br>

File Personal No:&nbsp; {{isset($personal->filePer)? $personal->filePer->nombre:'Sin asignar'}}</small>
<hr>
<i>{{$contrato->fechaCon." ".$contrato->horaCon}}</i>&nbsp;&nbsp;
		<i>{{$contrato->hash1."  ".$usuario->name}}</i>
</div>
<div class="saltopagina"></div> 
<div id="contrato2">
<div class="parrafo">

<p><b>OCTAVA: DE LA CONCLUSION DEL CONTRATO.-</b> El presente contrato concluirá o se dará por terminado bajo una de las siguientes causales.</p>
<p>8.1 Por las causales previstas en las disposiciones Legales descritas en la cláusula sexta del presente documento.</p>
<p>8.2. Por incumplimiento parcial o total e injustificado de las estipulaciones convenidas en el presente documento.</p>
<p>8.3. Del informe que resultare de la auditoria que se realiza a Recursos Humanos Regional La Paz de la gestión 
    {{explode("-",$contrato->fechaCon)[0]}}.</p>
<p><b>NOVENA: DE LAS EVALUCIONES Y/O DECLARACIONES.- Los funcionarios de la Caja Nacional de Salud se encuentran
     dentro el marco de responsabilidad por la Función Pública establecido en la Ley Nº 1178 en tal sentido,
      de advertirse  la existencia de declaraciones Juradas que falten a la verdad, o cuenten con evaluaciones
       de desempeño negativas, la Institución procederá a iniciar las acciones administrativas, civiles y/o penales que correspondan.</b></p>
<p><b>DECIMA: DE LA CONFORMIDAD.-</b> La Caja Nacional de salud, representada por el/la
 {{$jefeair->nombre.' '.$jefeair->user->nombres.' '.$jefeair->user->a_paterno.' '.$jefeair->user->a_materno}}, 
 {{$cargo->tipo=='medico'? $jefeaim->nombre.' '.$jefeaim->user->nombres.' '.$jefeaim->user->a_paterno.' '.$jefeaim->user->a_materno :
 $jefeaiadm->nombre.' '.$jefeaiadm->user->nombres.' '.$jefeaiadm->user->a_paterno.' '.$jefeaiadm->user->a_materno }}  y
  {{$admair->nombre.' '.$admair->user->nombres.' '.$admair->user->a_paterno.' '.$admair->user->a_materno }}
 , {{$jefeair->cargo}} Regional La Paz, 
   {{$cargo->tipo=='medico'?$jefeaim->cargo:$jefeaiadm->cargo}} Regional La Paz  y 
  {{$admair->cargo}} Regional La Paz respectivamente y el (la) Señor (a) 
  <b>{{$personal->a_paterno}}&nbsp;{{$personal->a_materno}}&nbsp;
    {{$personal->nombres}}</b> mayor de edad, con domicilio en la zona&nbsp;
    {{$personal->direccion}}, calle&nbsp;{{$personal->calle}}, 
    Número&nbsp;{{$personal->No}}, con <b>C.I. N° {{$personal->CI}}-{{$personal->departamento->sigla}}</b>
     manifestando nuestra plena conformidad con el tenor integro de todo el documento, firmándolo en su señal a los 
     {{explode("-",$contrato->fechaCon)[2]}} 
     dias del mes de&nbsp;{{$ut->mesliteral(explode("-",$contrato->fechaCon)[1])}}&nbsp;
     de&nbsp;{{explode("-",$contrato->fechaCon)[0]}}.</p>
 @if ($copia!='1') 
<table  class= "firmas" >
	
	<tr><td>&nbsp;</td><td>&nbsp;</td></tr>
	<tr><td>&nbsp;</td><td><img src="{{'/storage/firmas/'.$jefeair->img_firma}}" width="100" height="50"></td></tr>

	<tr><td>{{$personal->a_paterno}}&nbsp;{{$personal->a_materno}}&nbsp;{{$personal->nombres}}</td>
        <td>{{$jefeair->nombre.' '.$jefeair->user->nombres.' '.$jefeair->user->a_paterno.' '.$jefeair->user->a_materno}}</td></tr>
	<tr><td>CONTRATADO <br>C.I. Nº {{$personal->CI}}-{{$personal->departamento->sigla}}</td>
        <td>{{$jefeair->cargo}}</td></tr>
	
	<tr><td>&nbsp;</td><td>&nbsp;</td></tr>
	<tr><td>@if ($cargo->tipo=='medico')
        <img src="{{'/storage/firmas/'.$jefeaim->img_firma}}" width="100" height="50">
        @else
        <img src="{{'/storage/firmas/'.$jefeaiadm->img_firma}}" width="100" height="50">
	    @endif	

		</td><td><img src="{{'/storage/firmas/'.$admair->img_firma}}" width="100" height="50"></td></tr>
		
	<tr><td>@if ($cargo->tipo=='medico') 
		 {{$jefeaim->nombre.' '.$jefeaim->user->nombres.' '.$jefeaim->user->a_paterno.' '.$jefeaim->user->a_materno }}
		@else
        {{$jefeaiadm->nombre.' '.$jefeaiadm->user->nombres.' '.$jefeaiadm->user->a_paterno.' '.$jefeaiadm->user->a_materno }} 
        @endif
        </td><td>{{$admair->nombre.' '.$admair->user->nombres.' '.$admair->user->a_paterno.' '.$admair->user->a_materno}}</td></tr>
	<tr><td>@if ($cargo->tipo=='medico') 
		 {{$jefeaim->cargo}}	
		@else $jefeaiadm->cargo @endif?></td><td>{{$admair->cargo}}</td></tr>
</table><br>
@else
<table  class= "firmas" >
	
	<tr><td>&nbsp;</td><td>&nbsp;</td></tr>
	<tr><td>&nbsp;</td><td>&nbsp;</td></tr>
	<tr><td>&nbsp;</td><td>&nbsp;</td></tr>
	<tr><td>&nbsp;</td><td>&nbsp;</td></tr>
	<tr><td>{{$personal->a_paterno}}&nbsp;{{$personal->a_materno}}&nbsp;{{$personal->nombres}}</td>
        <td>{{$jefeair->nombre.' '.$jefeair->user->nombres.' '.$jefeair->user->a_paterno.' '.$jefeair->user->a_materno}}</td>
    </tr> 
	<tr><td>CONTRATADO <br>C.I. Nº {{$personal->CI}}-{{$personal->departamento->sigla}}</td>
        <td>{{$jefeair->cargo}}</td></tr>
	
	<tr><td>&nbsp;</td><td>&nbsp;</td></tr>
	<tr><td>&nbsp;</td><td>&nbsp;</td></tr>
	<tr><td>&nbsp;</td><td>&nbsp;</td></tr>
	<tr><td>&nbsp;</td><td>&nbsp;</td></tr>	
	<tr><td>@if ($cargo->tipo=='medico') 
		{{$jefeaim->nombre.' '.$jefeaim->user->nombres.' '.$jefeaim->user->a_paterno.' '.$jefeaim->user->a_materno}}	
		@else
        {{$jefeaiadm->nombre.' '.$jefeaiadm->user->nombres.' '.$jefeaiadm->user->a_paterno.' '.$jefeaiadm->user->a_materno}}	
        @endif</td>
        <td>
            {{$admair->nombre.' '.$admair->user->nombres.' '.$admair->user->a_paterno.' '.$admair->user->a_materno}}	
        </td></tr>
	<tr><td>
        @if ($cargo->tipo=='medico') 
            {{$jefeaim->cargo}}	
		@else {{$jefeaiadm->cargo}}
        @endif</td><td>{{$admair->cargo}}</td></tr>
</table><br>

@endif
<small>cc. RRHH Retribución / Depto. Nal. Sistemas/ File Personal<br>
{{$iniciales.'/'.$usuario->name}} 
@switch($copia)
@case('1') ORIGINAL @break
@case('2') COPIA KARDEX @break
@case('3') COPIA INTERESADO @break
@case('4') COPIA RRHH      @break
@default NO VALIDO
@endswitch<br>
File Personal No:&nbsp;@if (isset($personal->fileper)) 
    {{$personal->filePer->nombre}}
@else  'Sin asignar' @endif</small>
</div>
<hr>
<i>{{$contrato->fechaCon." ".$contrato->horaCon}}</i>&nbsp;&nbsp;
		<i>{{$contrato->hash1."  ".$usuario->name}}</i>
</div>
{{-- <a  href="?action=verContrato&id=$this->data['contrato']['id_con']" id="listarcon">Volver</a> --}}
<a href="#" onclick="imprimirCon()" id="imprimirc">imprimir</a>
</div>
<script type="text/javascript">
function imprimirCon(){
 window.print()	
}
</script>
</body>
</html>
