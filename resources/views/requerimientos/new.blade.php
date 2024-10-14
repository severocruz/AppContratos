<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('New requeriment') }}
        </h2>
    </x-slot>

    <div class="py-3 px-0">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="px-0 py-4 text-gray-900 dark:text-gray-100">
                    {{-- @dump(old()) --}}
                    
                    <form action="{{route('requerimiento.store')}}" method="POST">
                        @csrf
                        <div class="bg-emerald-100 shadow-md rounded px-6 pt-2 pb-2 mb-4 flex flex-col">
                            <div class="-mx-3 md:flex mb-1">
                                
                                <div class="md:w-1/3 px-3">
                                    <label class="uppercase tracking-wide text-black text-xs font-bold mb-2" for="id_cs">
                                        {{ __('Workplace') }}
                                    </label>
                                    <div>
                                        <select name="id_cs" id="id_cs"
                                            class="w-full bg-emerald-50 border border-lime-900 text-black text-md py-2 px-4 pr-8 mb-2 rounded">
                                            <OPTION selected disabled>{{__('Choose a Workplace')}}</OPTION>
                                            @foreach ($centrosSalud as $centro)
                                                <OPTION value="{{$centro->id_cs}}" {{old('id_cs')==$centro->id_cs?'selected':''}} >{{$centro->nombre_cs}}</OPTION>
                                            @endforeach
                                            
                                        </select>
                                        <x-input-error :messages="$errors->get('id_cs')" />
                                    </div>
                                </div>
                                <div class="md:w-1/3 px-3 mb-6 md:mb-0">
                                    <label for="id_tic" class="uppercase tracking-wide text-black text-xs font-bold mb-2">
                                        {{__('Type of contract')}}</label>
                                    <div>        
                                        <select id="id_tic" name="id_tic" onchange="habilitar()" class="w-full bg-emerald-50 border border-lime-900 text-black text-md py-2 px-4 pr-8 mb-2 rounded">
                                                <OPTION selected disabled>{{__('Choose a Type of contract')}}</OPTION>
                                                    @foreach ($tiposContrato as $tipo)
                                                        @if ($tipo->id_tic != '9')   
                                                            <OPTION value="{{$tipo->id_tic}}" {{old('id_tic')==$tipo->id_tic?'selected':''}}>{{$tipo->tipo}}</OPTION>
                                                        @endif
                                                    @endforeach
                                        </select>
                                         <x-input-error :messages="$errors->get('id_tic')"/>
                                    </div>
                                </div>
                                <div class="md:w-1/3 px-3 mb-6 md:mb-0">
                                    <label for="id_car" class="uppercase tracking-wide text-black text-xs font-bold mb-2">{{__('Position')}}</label>
                                    <div>        
                                        <select id="id_car" name="id_car" class="w-full bg-emerald-50 border border-lime-900 text-black text-md py-2 px-4 pr-8 mb-2 rounded">
                                                <OPTION selected disabled>{{__('Choose a Position')}}</OPTION>
                                                    @foreach ($cargos as $cargo)
                                                        <OPTION value="{{$cargo->id_car}}" {{old('id_car')==$cargo->id_car?'selected':''}}>{{$cargo->cargo}}</OPTION>
                                                    @endforeach
                                        </select>
                                         <x-input-error :messages="$errors->get('id_car')"/>
                                    </div>
                                </div>
                            </div>
                            <div class="-mx-3 md:flex mb-1">
                                <div class="md:w-2/5 px-3 mb-6 md:mb-0">
                                    <label for="id_niv" class="uppercase tracking-wide text-black text-xs font-bold mb-2">{{__('Level')}}</label>
                                    <div>        
                                        <select id="id_niv" name="id_niv" class="w-full bg-emerald-50 border border-lime-900 text-black text-md py-2 px-4 pr-8 mb-2 rounded">
                                                <OPTION selected disabled>{{__('Choose a Level')}}</OPTION>
                                                    @foreach ($niveles as $nivel)
                                                        <OPTION value="{{$nivel->id_niv}}" {{old('id_niv')==$nivel->id_niv?'selected':''}}>{{$nivel->nivel}}|{{$nivel->horas_trab}}|{{$nivel->descripcion}}</OPTION>
                                                    @endforeach
                                        </select>
                                         <x-input-error :messages="$errors->get('id_niv')"/>
                                    </div>
                                </div>
                                <div class="md:w-2/5 px-3">

                                    <label class=" uppercase tracking-wide text-black text-xs font-bold mb-2"
                                        for="motivo">
                                        {{ __('Reason for contract') }}
                                    </label>
                                    <textarea type="text" name="motivo" id="motivo"  
                                        class="w-full bg-emerald-50 text-black border border-lime-900 rounded py-1 px-3 mb-1 ">
                                        {{old('motivo')}}
                                    </textarea>
                                        <x-input-error :messages="$errors->get('motivo')" />

                                </div>
                                <div class="md:w-1/5 px-3">
                                    <label for="nroReq" class="tracking-wide text-black text-xs font-bold mb-2" >
                                        Número de Requerimiento
                                    </label>
                                    <input type="text" name="nroReq" id="nroReq" value="{{old('nroReq')}}" class="w-full bg-emerald-50 text-black border border-lime-900 rounded py-1 px-3 mb-1 ">
                                    
                                </div>
                                
                            </div>
                            <div class="-mx-3 md:flex mb-1">
                                <div class="md:w-1/4 px-3 mb-6 md:mb-0">
                                    <label class="uppercase tracking-wide text-black text-xs font-bold mb-2" for="fechaIni">
                                        {{ __('Start date') }}
                                    </label>
                                    <input type="date" name="fechaIni" id="fechaIni"  value="{{old('fechaIni')}}"
                                        class="w-full bg-emerald-50 text-black border border-lime-900 rounded py-1 px-3 mb-1 ">
                                        <x-input-error :messages="$errors->get('fechaIni')" />
                                </div>

                                <div class="md:w-1/4 px-3 mb-6 md:mb-0">
                                    <label class="uppercase tracking-wide text-black text-xs font-bold mb-2" for="fechaFin">
                                        {{ __('Finish date') }}
                                    </label>
                                    <input type="date" name="fechaFin" id="fechaFin"  value="{{old('fechaFin')}}"
                                        class="w-full bg-emerald-50 text-black border border-lime-900 rounded py-1 px-3 mb-1 ">
                                        <x-input-error :messages="$errors->get('fechaFin')" />
                                </div>
                                <div class="md:w-1/4 px-3 mb-6 md:mb-0">
                                    <label for="nota" class="uppercase tracking-wide text-black text-xs font-bold mb-2" >
                                        {{__('Note')}}
                                    </label>
                                    <input type="text" name="nota" id="nota" value="{{old('nota')}}" class="w-full bg-emerald-50 text-black border border-lime-900 rounded py-1 px-3 mb-1 ">
                                    <x-input-error :messages="$errors->get('nota')" />  
                                </div>
                                <div class="md:w-1/4 px-3 mb-6 md:mb-0">
                                    <label class="uppercase tracking-wide text-black text-xs font-bold mb-2" for="fecha_nota">
                                        {{ __('Note Date') }}
                                    </label>
                                    <input type="date" name="fecha_nota" id="fecha_nota"  value="{{old('fecha_nota')}}"
                                        class="w-full bg-emerald-50 text-black border border-lime-900 rounded py-1 px-3 mb-1 ">
                                        <x-input-error :messages="$errors->get('fecha_nota')" />
                                </div>
                            </div>                      
                            
                            <div class="-mx-3 md:flex mb-1">
                                <div class=" md:w-11/12 px-3 mb-6 md:mb-0 ">
                                    <label class="uppercase tracking-wide text-black text-xs font-bold mb-2"
                                    for="observaciones">
                                    {{ __('Observations') }}
                                    </label>
                                    <textarea type="text" name="observaciones" id="observaciones"  
                                    class="uppercase w-full bg-emerald-50 text-black border border-lime-900 rounded py-1 px-3 mb-1 ">
                                    {{old('observaciones')}}
                                    </textarea>
                                    <x-input-error :messages="$errors->get('observaciones')" />                              
                                </div>
                              
                            </div>
                            
                        </div>
                        <div id="residencia" class="{{(old('id_tic','')=='10'||old('id_tic','')=='11')?'collapse':'visible'}}">
                            <h1 class="font-bold mx-5"> Datos de Residencia Médica o ASSO</h1>
                            <div class="bg-emerald-100 shadow-md rounded px-6 pt-2 pb-2 mb-4 flex flex-col">
                                <div class="-mx-3 md:flex mb-1">
                                    <div class="md:w-1/6 px-3">
                                        <label for="id_residente" class="uppercase tracking-wide text-black text-sm font-bold mb-2" >
                                            Id de Residente
                                        </label>
                                        <input type="text" name="id_residente" id="id_residente" value="{{old('id_residente')}}" class="w-full bg-emerald-50 text-black border border-lime-900 rounded py-1 px-3 mb-1 ">
                                    </div>
                                    <div class="md:w-2/6 px-3">
                                        <label class="uppercase tracking-wide text-black text-xs font-bold mb-2" for="id_esp">
                                            Especialidad
                                        </label>
                                        <div>
                                            <select name="id_esp" id="id_esp" 
                                                class="sel w-full bg-emerald-50 border border-lime-900 text-black text-md py-2 px-4 pr-8 mb-2 rounded">
                                                <OPTION selected disabled>Elija una especialidad</OPTION>
                                                @foreach ($especialidades as $especialidad)
                                                    <OPTION value="{{$especialidad->id}}" {{old('id_esp')==$especialidad->id_esp?'selected':''}} >{{$especialidad->nombre}}</OPTION>
                                                @endforeach
                                                
                                            </select>
                                            <x-input-error :messages="$errors->get('id_esp')" />
                                        </div>
                                    </div>
                                    <div class="md:w-1/6 px-3">
                                        <label class="uppercase tracking-wide text-black text-xs font-bold mb-2" for="cargo">
                                            Cargo
                                        </label>
                                        <div>
                                            <select name="cargo" id="cargo"
                                                class="w-full bg-emerald-50 border border-lime-900 text-black text-md py-2 px-4 pr-8 mb-2 rounded">
                                                <OPTION selected disabled>Elija un Cargo</OPTION>
                                                <OPTION  values="1">R I</OPTION>
                                                <OPTION  values="2">R II</OPTION>
                                                <OPTION  values="3">R III</OPTION>
                                                <OPTION  values="4">R IV</OPTION>
                                                {{-- @foreach ($centrosSalud as $centro)
                                                    <OPTION value="{{$centro->id_cs}}" {{old('id_cs')==$centro->id_cs?'selected':''}} >{{$centro->nombre_cs}}</OPTION>
                                                @endforeach --}}
                                                
                                            </select>
                                            <x-input-error :messages="$errors->get('id_esp')" />
                                        </div>
                                    </div>
                                    <div class="md:w-1/6 px-3">
                                        <label class="uppercase tracking-wide text-black text-xs font-bold mb-2" for="duracion">
                                            Duración
                                        </label>
                                        <div>
                                            <select name="duracion" id="duracion"
                                                class="w-full bg-emerald-50 border border-lime-900 text-black text-md py-2 px-4 pr-8 mb-2 rounded">
                                                <OPTION selected disabled>Elija una Duración</OPTION>
                                                <OPTION  values="1">1 año</OPTION>
                                                <OPTION  values="2">2 años</OPTION>
                                                <OPTION  values="3">3 años</OPTION>
                                                <OPTION  values="4">4 años</OPTION>
                                                {{-- @foreach ($centrosSalud as $centro)
                                                    <OPTION value="{{$centro->id_cs}}" {{old('id_cs')==$centro->id_cs?'selected':''}} >{{$centro->nombre_cs}}</OPTION>
                                                @endforeach --}}
                                                
                                            </select>
                                            <x-input-error :messages="$errors->get('id_esp')" />
                                        </div>
                                    </div>
                                    <div class="md:w-1/6 px-3">
                                        <label for="gestion" class="uppercase tracking-wide text-black text-sm font-bold mb-2" >
                                            Gestión
                                        </label>
                                        <input type="number" name="gestion" id="gestion" min="{{date('Y')}}" value="{{old('gestion',date('Y'))}}" class="w-full bg-emerald-50 text-black border border-lime-900 rounded py-1 px-3 mb-1 ">
                                    </div>
                                </div>
                            {{-- </div>
                            <div class="bg-emerald-100 shadow-md rounded px-6 pt-2 pb-2 mb-4 flex flex-col"> --}}
                                <div class="-mx-3 md:flex mb-1">
                                    
                                    
                                    <div class="md:w-1/6 px-3">
                                        <label class="uppercase tracking-wide text-black text-xs font-bold mb-2" for="cigari">
                                            CI Garante 1
                                        </label>
                                        <input type="hidden" name="id_gari" id="id_gari" value="{{old('id_gari')}}" >
                                        <input type="text" name="cigari" id="cigari"  value="{{old('cigari')}}" onchange="buscagarByCI(1)" class="w-full bg-emerald-50 text-black border border-lime-900 rounded py-1 px-3 mb-1 ">
                                    </div>
                                    <div class="md:w-2/6 px-3">
                                        <label class="uppercase tracking-wide text-black text-xs font-bold mb-2" for="nombregari">
                                            Nombre Garante 1
                                        </label>
                                        <input type="text" name="nombregari" id="nombregari" value="{{old('nombregari')}}" class="w-full bg-emerald-50 text-black border border-lime-900 rounded py-1 px-3 mb-1 ">
                                    </div>
                                    <div class="md:w-1/6 px-3">
                                        <label class="uppercase tracking-wide text-black text-xs font-bold mb-2" for="cigarii">
                                            CI Garante 2
                                        </label>
                                        <input type="hidden" name="id_garii" id="id_garii" value="{{old('id_garii')}}" >
                                        <input type="text" name="cigarii" id="cigarii" onchange="buscagarByCI(2)" value="{{old('cigarii')}}" class="w-full bg-emerald-50 text-black border border-lime-900 rounded py-1 px-3 mb-1 ">
                                    </div>
                                    <div class="md:w-2/6 px-3">
                                        <label class="uppercase tracking-wide text-black text-xs font-bold mb-2" for="nombregarii">
                                            Nombre Garante 2
                                        </label>
                                        <input type="text" name="nombregarii" id="nombregarii" value="{{old('nombregarii')}}" class="w-full bg-emerald-50 text-black border border-lime-900 rounded py-1 px-3 mb-1 ">
                                    </div>
                                    
                                </div>
                                
                            </div>
                            
                        </div>
                        <div class="md:w-2/6 px-3">
                            <x-primary-button>Guardar Requerimiento</x-primary-button>
                        </div>
                    </form>
                    <div class="-mx-3 md:flex mb-1 justify-end">
 
                        <div class="md:w-1/6 px-3">
                            <div x-data="{ 'showModal': false }"
                                @keydown.escape="showModal = false"
                                >
                                <!-- Trigger for Modal -->

                                <button class=" p-1 m-2 rounded text-blue-600 bg-blue-50 font-extrabold" type="button" @click="showModal = true">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 10.5v6m3-3H9m4.06-7.19-2.12-2.12a1.5 1.5 0 0 0-1.061-.44H4.5A2.25 2.25 0 0 0 2.25 6v12a2.25 2.25 0 0 0 2.25 2.25h15A2.25 2.25 0 0 0 21.75 18V9a2.25 2.25 0 0 0-2.25-2.25h-5.379a1.5 1.5 0 0 1-1.06-.44Z" />
                                    </svg>               
                                    Nuevo Garante
                                </button>

                                <!-- Modal -->
                                <div
                                    class="fixed inset-0 z-30 flex items-center justify-center overflow-auto bg-black bg-opacity-50"
                                    x-show="showModal"
                                >
                                    <!-- Modal inner -->
                                    <div
                                        class="max-w-3xl px-5 py-4 mx-auto text-left bg-white rounded shadow-xl"
                                        @click.away="showModal = false"
                                        x-transition:enter="motion-safe:ease-out duration-300"
                                        x-transition:enter-start="opacity-0 scale-90"
                                        x-transition:enter-end="opacity-100 scale-100"
                                    >
                                        <!-- Title / Close-->
                                        <div class="flex items-center justify-between ">
                                            <h5 class="mr-3 text-black max-w-none">NUEVO GARANTE </h5>

                                            <button type="button" class="z-50 cursor-pointer" @click="showModal = false">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                                </svg>
                                            </button>
                                        </div>

                                        <!-- content -->
                                        <form action="{{route('garante.store')}}" method="POST">
                                            @csrf
                                            {{-- <input type="hidden" name="" value="{{$curriculum->id_cv}}" > --}}
                                            <input type="hidden" name="origen" value="requerimiento" >
                                            <div class="-mx-3 md:flex mb-2">
                                                <div class="md:w-full px-3 mb-2 md:mb-0 ">
                                                    <label for="a_paterno" class="uppercase tracking-wide text-black text-xs font-bold mb-2">
                                                        Apellido paterno
                                                    </label>
                                                    <input type="text" required name="a_paterno" id="a_paterno" value="{{old('a_paterno')}}"
                                                    class="w-full bg-emerald-50 text-black border border-lime-900 rounded py-1 px-3 mb-1">
                                                    <x-input-error :messages="$errors->get('a_paterno')" />
                                                </div>
                                            </div>
                                            <div class="-mx-3 md:flex mb-2">    
                                                <div class="md:w-full px-3 mb-2 md:mb-0 ">
                                                    <label for="a_materno" class="uppercase tracking-wide text-black text-xs font-bold mb-2">
                                                        Apellido materno
                                                    </label>
                                                    <input type="text" required name="a_materno" id="a_materno" value="{{old('a_materno')}}"
                                                    class="w-full bg-emerald-50 text-black border border-lime-900 rounded py-1 px-3 mb-1">
                                                    <x-input-error :messages="$errors->get('a_materno')" />
                                                </div>
                                            </div>
                                            <div class="-mx-3 md:flex mb-2">    
                                                <div class="md:w-full px-3 mb-2 md:mb-0 ">
                                                    <label for="nombres" class="uppercase tracking-wide text-black text-xs font-bold mb-2">
                                                        Nombres
                                                    </label>
                                                    <input type="text" required name="nombres" id="nombres" value="{{old('nombres')}}"
                                                    class="w-full bg-emerald-50 text-black border border-lime-900 rounded py-1 px-3 mb-1">
                                                    <x-input-error :messages="$errors->get('nombres')" />
                                                </div>
                                            </div>
                                            <div class="-mx-3 md:flex mb-2">    
                                                <div class="md:w-full px-3 mb-2 md:mb-0 ">
                                                    <label for="ci" class="uppercase tracking-wide text-black text-xs font-bold mb-2">
                                                        CI
                                                    </label>
                                                    <input type="text" required name="ci" id="ci" value="{{old('ci')}}"
                                                    class="w-full bg-emerald-50 text-black border border-lime-900 rounded py-1 px-3 mb-1">
                                                    <x-input-error :messages="$errors->get('ci')" />
                                                </div>
                                            </div>
                                            <div class="-mx-3 md:flex mb-2">    
                                                <div class="md:w-full px-3 mb-2 md:mb-0 ">
                                                    <label for="id_dep" class="uppercase tracking-wide text-black text-xs font-bold mb-2">
                                                        Expedido en: 
                                                    </label>
                                                    <div>
                                                        <select name="id_dep" id="id_dep" 
                                                            class="w-full bg-emerald-50 border border-lime-900 text-black text-md py-2 px-4 pr-8 mb-2 rounded">
                                                            <OPTION selected disabled>Elija un departamento</OPTION>
                                                            @foreach ($departamentos as $departamento)
                                                                <OPTION value="{{$departamento->id_dep}}" {{old('id_dep')==$departamento->id_dep?'selected':''}} >{{$departamento->nombre}}</OPTION>
                                                            @endforeach
                                                            
                                                        </select>
                                                        <x-input-error :messages="$errors->get('id_dep')" />
                                                    </div>
                                                    
                                                </div>
                                            </div>
                                            <div class="-mx-3 md:flex mb-2">    
                                                <div class="md:w-full px-3 mb-2 md:mb-0 ">
                                                    <label for="observacion" class="uppercase tracking-wide text-black text-xs font-bold mb-2">
                                                        Otros datos de interes
                                                    </label>
                                                    <textarea type="text" required name="observacion" id="observacion" 
                                                    class= " w-full bg-emerald-50 text-black border border-lime-900 rounded py-1 px-3 mb-1">
                                                        {{old('observacion')}}
                                                    </textarea>
                                                    <x-input-error :messages="$errors->get('observacion')" />
                                                </div>
                                            </div>
                                            <button class="bg-blue-200 text-blue-900 px-3 py-1 rounded-full">Guardar</button>              
                                        </form>
                                    </div>
                                </div>
                            </div> 
                        </div>
                    </div>
                        {{-- <button>
                            Enviar
                        </button> --}}
                </div>
            </div>
        </div>   
    </div>                            
</x-app-layout>
<script>
    $(document).ready(function() {
        $('.sel').select2();
    });
    function habilitar() {
        
        const tic=document.querySelector("#id_tic");
        const resi = document.querySelector("#residencia");
        if(tic.value>=10){
            resi.className  = "visible"
        }else{
            resi.className  = "collapse"
        }
    }

    function buscagarByCI(a){
        // event.preventDefault();
        let cigar;
            if (a==1) {
                 cigar = document.querySelector('#cigari');
            }else{
                 cigar = document.querySelector('#cigarii');
            }
            strbus = cigar.value;
            const url ="{{route('garante.getbyci')}}?CI="+strbus;
            fetch(url,{
                method: 'GET',
                headers:{
                    "Content-Type": "application/json",
                    "X-Requested-With": "XMLHttpRequest"
                }
            }).then(response=>response.json())
            .then(function (data){
                    //console.log('data',  data );
                    if (data.length>0) {
                        
                        console.log('first', data[0].nombres)
                        if (a==1) {
                            document.querySelector('#nombregari').value=data[0].nombres+' '+data[0].a_paterno+' '+data[0].a_materno;
                            document.querySelector('#id_gari').value=data[0].id;
                        } else {
                            document.querySelector('#nombregarii').value=data[0].nombres+' '+data[0].a_paterno+' '+data[0].a_materno;
                            document.querySelector('#id_garii').value=data[0].id;
                        }
                       
                    } else {
                        alert("No se encontró el garante")
                        if (a==1) {
                            document.querySelector('#nombregari').value='';
                            document.querySelector('#id_gari').value='';
                        } else {
                            document.querySelector('#nombregarii').value='';
                            document.querySelector('#id_garii').value='';
                        }
                    }
                    //console.log('data.length', data.length)
            }).catch(function (error){
                console.log('error', error);  
            });
          
    }
</script>