{{--  --}}
{{-- @dump($requerimiento) --}}


<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<title>Req.{{$cadNroReq}}</title>
	<style type="text/css">
		input{
			width: 400px;
			border: none;
		} readonly
		label{
			font-weight: bold;
		}
	</style>
	<link rel="stylesheet" type="text/css" href="{{asset('css/estilo.css')}}">
</head>
<body>
<div class="">
	 <a href="#" onclick="imprimirCon()" id="imprimirc">imprimir</a>
	 <a href="#" onclick="window.close()" id="listarcon">cerrar</a>
</div>
<img src="{{ asset('images/logocnsrlp.png') }}" alt="" class="logo">
 {{-- if (isset($this->data ['qr']): }} --}}
  {{-- <img src="./codqr/tempPersonal/" class="qr" >	 --}}
 {{-- endif }} --}}

	 <div> 
		<div class="titulo"><b><h1>CAJA NACIONAL DE SALUD</h1></b></div>
		<div class="subtitulo"><b>ADMINISTRACIÓN REGIONAL LA PAZ </b></div>
		<div class="subtitulo2"><b>RECURSOS HUMANOS REGIONAL LA PAZ</b></div>
		<div class="subtitulo2">{{$centroSalud->nombre_cs}}</div>
	</div>
		<div >Nro Req: {{$cadNroReq}}  </div>
		<div id="cod">Centro:{{$centroSalud->codigo_cs}}</div>			
<div class="grid">
<div class="subtitulo2"><b>(HOJA DE REQUERIMIENTO)</b></div>	
 <hr>
<h2>Datos del Requerimiento</h2>
		<table cellspacing="3" border="0" >
		<tr>
			
			<td ><label for="tipocon"><b>Tipo de contrato :</b> </label></td>
			<td ><input type="text" name="tipocon" id="tipocon" value="{{$tipoContrato->tipo}}" readonly></td>
		</tr>
		<tr>
			<td><label for="nota"><b>Nota de req. :</b> </label></td>
			<td><input type="text" name="nota" id="nota" value="{{$requerimiento->nota}}" readonly></td>
		</tr>
		<tr>
			
			<td><label for="fecha_nota"><b>Fecha de nota :</b> </label></td>
			<td><input type="date" name="fecha_nota" id="fecha_nota" value="{{$requerimiento->fecha_nota}}" readonly></td>
		</tr>
		<tr>
			<td><label for="cargo"><b>Cargo :</b> </label></td>
			<td><input type="text" name="cargo" id="cargo" value="{{$cargo->cargo}}" readonly></td>
			
		</tr>
		<tr>
			<td><label for="nivel"><b>Nivel :</b> </label></td>
			<td><input type="text" name="nivel" id="nivel" value="{{$nivel->nivel}}" readonly></td>
		</tr>
		<tr>
			<td><label for="salario"><b>Salario :</b> </label></td>
			<td><input type="text" name="salario" id="salario" value="{{$nivel->salario.'   '.$nivel->literal.' Bs.'}}" readonly></td>
		</tr>
		<tr>
			<td><label for="horas_trab"><b>Horas de trabajo :</b> </label></td>
			<td><input type="text" name="horas_trab" id="horas_trab" value="{{$nivel->horas_trab}}" readonly></td>
			
		</tr>
		<tr>
			<td><label for="motivo"><b>Motivo de contrato :</b> </label></td>
			<td><input type="text" name="motivo" id="motivo" value="{{$requerimiento->motivo}}" readonly></td>
		</tr>
		<tr>
			
			<td><label for="fechareq"> <b>Fecha del Requerimiento :</b> </label></td>
			<td><input type="date" name="fechareq" id="fechareq" value="{{$requerimiento->fechareq}}" readonly></td>
			
		</tr>
		<tr>
			<td><label for="fechaIni"><b>Fecha de Inicio :</b> </label></td>
			<td><input type="date" name="fechaIni" id="fechaIni" value="{{$requerimiento->fechaIni}}" readonly></td>
			
		</tr>
		<tr>
			<td><label for="fechaFin"><b>Fecha de Finalización :</b> </label></td>
			<td><input type="date" name="fechaFin" id="fechaFin" value="{{$requerimiento->fechaFin}}" readonly></td>
		</tr>
		</table>
		<hr>
	<div class="cell"> <h2>Datos personales</h2></div>	
	<table cellpadding ="3">
		<tr >
			<td><label for="nombre"><b>Nombre :</b> </label></td><td><input type="text" name="nombre" id="nombre" value="{{$persona->nombres.' '.$persona->a_paterno.' '.$persona->a_materno}}" readonly></td>
		</tr>
		<tr >
			<td><label for="nombre"><b>No.CI :</b> </label></td><td><input type="text" name="CI" id="CI" value="{{$persona->CI.'-'.$depa->sigla}}" readonly></td>
		</tr>
		<tr>
			<td><label for="matricula"><b>Matricula :</b> </label></td><td><input type="text" name="matricula" id="matricula" value="{{$persona->matricula}}" readonly></td>
		</tr>
		<tr>
			<td><label for="est_civil"><b>Estado Civil :</b> </label></td><td><input type="text" name="est_civil" id="est_civil" value="{{$persona->est_civil}}" readonly></td>
		</tr>
		<tr>
			<td><label for="direccion"><b>Domicilio :</b> </label></td><td><input type="text" name="direccion" id="direccion" value="{{$persona->direccion}} calle {{$persona->calle}} Nro. {{$persona->No}}" readonly></td>
		</tr>
		<tr>
			<td><label for="AFP"><b>AFP Aportes :</b> </label></td><td><input type="text" name="AFP" id="AFP" value="{{$afpa->nombre}}" readonly></td>
		</tr>
		<tr>
			<td><label for="telefono"><b>Telf/Cel :</b> </label></td><td><input type="text" name="telefono" id="telefono" value="{{$persona->telefono}}" readonly></td>
		</tr>
		<tr>
			<td><label for="email"><b>Correo Electrónico :</b> </label></td>
			<td><input type="text" name="email" id="email" value="{{$persona->email}}" readonly></td>
		</tr>
		
	</table>	
</div>


 <p>&nbsp;</p>
 <p>&nbsp;</p>
 <p>&nbsp;</p>
  <p>&nbsp;</p>
 <p>&nbsp;</p>
 <p>&nbsp;</p>

 fecha y hora de impresion {{ date('d/m/Y H:i:s')}} <br>
 usuario {{Auth::user()->name}}
 <script type="text/javascript">
 	function imprimirCon(){
 	window.print()	
}
 </script>
</body>
</html>
