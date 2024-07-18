
<!DOCTYPE html>
<html lang="es">
<head>
	<title>Aviso de baja con sello</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="{{asset('css/estilo.css')}}">
</head>
<body style="
   margin: 0;
   padding: 0;">

   <a href="#" onclick="imprimirCon()" id="imprimirc">imprimir</a>
<div class="saltopagina">
   
</div> 

<b>

         <small style="position: absolute; top: 0.4cm;left:15cm;font-size: 2.2mm ">
            <i>
             File: {{(isset($persona->id_file)&&$persona->id_file)?$persona->filePer->nombre:'Sin asignar'}}
             </i>
        </small>
   <table border="0"   style="width: 18cm;text-align: center;padding-left: 5mm;">
      <tr style="height: 2.5cm;" ><td colspan="4"></td><td></td><td></td><td></td><td></td><td></td></tr>
      <tr><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td></tr>
      <tr><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td></tr>
      <tr><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td></tr>
      <tr><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td></tr>
      <tr><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td></tr>
      <tr style="height: 1cm;">
        <td colspan="3" style="width: 4.5cm">  {{$persona->a_paterno}}</td>
        <td style="width: 4.5cm" colspan="2"> {{$persona->a_materno}}</td>
        <td colspan="2" class="letrapeque" style="width: 4.5cm">{{$persona->nombres}}</td>
        <td style="width: 4.5cm"></td>
    </tr>
      <tr style="height: 0.5cm;"><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td></tr>
      <tr style="height: 0.5cm;"><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td></tr>
      
      <tr style="height:0.5cm;">
        <td colspan="3">BS. {{$nivel->salario}},00</td>
        <td colspan="5">
            <table border="0"  >
                    <tr >
                        <td style="width: :2cm;"> {{explode('-',$contrato->fechaFin)[2]}}</td>
                        <td style="width:3.1cm;"> {{strtoupper($ut->mesliteral(explode('-',$contrato->fechaFin)[1]))}}</td>
                        <td style="width:2cm;">   {{explode('-',$contrato->fechaFin)[0]}}</td>
                        <td style="width:4.5cm;" class="letrapeque">CONCLUSIÓN DE CONTRATO</td>
                    </tr>
                </table>
            </td>
        </tr>
      <tr style="height:1cm;"><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td></tr>
      <tr style="height:0.8cm;" ><td colspan="7">CAJA NACIONAL DE SALUD</td><td colspan="1">01 - 730 - 00001</td></tr>
      <tr style="height: 0.3cm;"><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td></tr>
      <tr><td colspan="6">*LA PAZ,  {{strtoupper($ut->mesliteral(date('n'))).' '.date('d').' DE '.date('Y') }}*</td><td></td><td></td></tr>
      
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
      <tr><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td></tr>
         
   
   </table>
</b>
<small style="font-size: 2mm;"><br>{{$contrato->hash1}}</small>
<small style="font-size: 2mm;">Usuario: {{Auth::user()->name}}</small><br>

   <a href="#" onclick="imprimirCon()" id="imprimirc">imprimir</a>



   <script type="text/javascript">
      function imprimirCon(){
      window.print()   
      }
   </script>
</body>
</html>