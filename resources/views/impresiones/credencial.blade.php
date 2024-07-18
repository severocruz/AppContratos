<!DOCTYPE html>
<html lang="es">
<head>
	<title>Credencial</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="{{asset('css/estilo.css')}}">
</head>
<body>
   <a href="#" onclick="imprimirCon()" id="imprimirc">imprimir</a>
   <div id="marcofrentev" >
   	 <div id="civ">{{$persona->CI}}-{{$persona->departamento->sigla}}</div>
   	<img src="{{'/storage/fotos/'.$persona->foto}}"  id="fotov">
   	 <div id="matv">{{$persona->matricula}}</div>
   	 <div id="nombrev">
   	 	{{$persona->a_paterno." ".$persona->a_materno." ".$persona->nombres}}<br>
   	 </div>
       <div id="datosv"><label >{{$cargo->cargo}}</label><br>
         <label >{{$centrosal->nombre_cs}}</label>
      </div>
       <label id="perev">PERSONAL EVENTUAL</label>
   	<small id="hashvf">{{$contrato->hash1}}</small>
    <img src="{{asset('images/fondocredfrente.jpg')}}" id="fondofrentev">

   </div>

   <div class="saltopagina"></div>
   <div id="marcoatrasv">
	   	 
	   	 <small id="hashv">{{$contrato->hash1}}</small> 
	   	 <img src="{{asset('images/fondocredespalda.jpg')}}" id="fondoatrasv">
        @if(isset($persona->hashDp) && $persona->hashDp)
            <div id="qrv">
                {!! QrCode::size(135)->generate($persona->hashDp) !!}
            </div>
        @endif
           {{-- <img src="./codqr/tempPersonal/$this->data['qrper']['imagen']" id="qrv"> --}}
   </div>
   <script type="text/javascript">
      function imprimirCon(){
      window.print()   
      }
   </script>
</body>
</html>