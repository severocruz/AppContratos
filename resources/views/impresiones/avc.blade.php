
<!DOCTYPE html>
<html lang="es">
<head>
	<title>AVC</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="{{asset('css/estilo.css')}}">
</head>
<body style="
   margin: 0;
   padding: 0;">

<b>
   <div style="position: absolute; top: 0cm;left:10cm; font-size: 2.7mm;"> CONTRATO TEMPORAL DEL 
    {{$ut->cambiaformatofecha($contrato->fechaIni)}} AL 
    {{$ut->cambiaformatofecha($contrato->fechaFin)}}</div>
    
         <small style="position: absolute; top: 0.4cm;left:15cm;font-size: 2.2mm ">
            <i>
             File: {{(isset($persona->id_file) && $persona->id_file)? $persona->filePer->nombre:'Sin asignar'}}
            </i>
        </small>
    
      
   <table border="0"  style="width: 18cm;text-align: center; padding-left: 5mm;">
      <tr style="height: 1cm;" ><td></td><td></td><td></td><td></td><td colspan="4">&nbsp;</td></tr>
      <tr><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td></tr>
      <tr><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td></tr>
      <tr><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td></tr>
      <tr><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td></tr>
      <tr><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td></tr>
      <tr style="height: 1cm"><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td></tr>
      <tr style="height: 1cm;">
        <td colspan="3" style="width: 4.5cm"> {{$persona->a_paterno}}</td>
        <td style="width: 4.5cm" colspan="2">{{$persona->a_materno}}</td>
        <td colspan="2" class="letrapeque" style="width: 4.5cm">{{$persona->nombres}}</td>
        <td style="width: 4.5cm"></td>
      </tr>
      <tr style="height: 0.5cm;"><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td></tr>
      <tr style="height: 0.5cm;"><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td></tr>
      <tr>
        <td style="width: 1.5cm;">{{explode("-",$persona->fecha_nac)[2]}}</td>
        <td style="width: 1.5cm;">{{explode("-",$persona->fecha_nac)[1]}}</td>
        <td style="width: 1.5cm;">{{explode("-",$persona->fecha_nac)[0]}}</td>
        <td colspan="5">
            <table  border="0">
                <tr>
                    <td style="width: 2cm;">{{$persona->sexo}}</td>
                    <td style="width: 2.5cm;" class="letrapeque">{{$persona->direccion}}</td>
                    <td style="width: 3.5cm;" class="letrapeque">{{$persona->calle}}</td>
                    <td style="width: 1.8cm;">{{$persona->No}}</td>
                    <td>{{$persona->localidad}}</td>
                </tr>
            </table>
        </td>
    </tr>
      <tr style="height:0.5cm;"><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td></tr>
      <tr style="height:0.3cm;"><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td></tr>
      <tr style="height:0.5cm;">
        <td colspan="3">BS. {{$nivel->salario}},00</td>
        <td colspan="5">
            <table border="0"  >
            <tr >
                <td style="width:6.2cm;" class="letrapeque"> {{$cargo->cargo}}</td>
                <td style="width: :2cm;">{{explode('-',$contrato->fechaIni)[2]}}</td>
                <td style="width:3.1cm;">{{strtoupper($ut->mesliteral(explode('-',$contrato->fechaIni)[1]))}}</td>
                <td>{{explode('-',$contrato->fechaIni)[0]}}</td>
            </tr>
        </table>
    </td>
</tr>
      <tr style="height:0.7cm;"><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td></tr>
      <tr style="height:0.8cm;" ><td colspan="5">CAJA NACIONAL DE SALUD</td><td colspan="3">01 - 730 - 00001</td></tr>
      
      <tr><td colspan="7">LA PAZ, {{strtoupper($ut->mesliteral(date('n'))).' '.date('d').' DE '.date('Y') }}</td><td></td></tr>
      @if($cop=='1')
       <tr><td colspan="5"><img src="{{'/storage/firmas/'.$rrhh->img_firma}}" width="120" height="60" ></td><td></td><td></td><td></td></tr>
      @else
       {{-- <tr><td colspan="5">firma</td><td></td><td></td><td></td></tr> --}}
       <tr><td colspan="5" style="height: 60px;" class="letrapeque"><br><br><br><br>
        {{$rrhh->nombre." ".$rrhh->user->nombres." ".$rrhh->user->a_paterno." ".$rrhh->user->a_materno}}<br>
        {{$rrhh->cargo}}</td><td></td><td></td><td></td></tr>
      @endif
      <tr><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td></tr>
      <tr><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td></tr>
      
   </table>
</b>
<small style="font-size: 2mm;"><br>{{$contrato->hash1}}</small>
<small style="font-size: 2mm;">Usuario: {{Auth::user()->name}}</small>
<br>


   <a href="#" onclick="imprimirCon()" id="imprimirc">imprimir</a>



   <script type="text/javascript">
      function imprimirCon(){
      window.print()   
      }
   </script>
</body>
</html>