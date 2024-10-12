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
                        <div id="residencia" class="collapse">
                            <h1 class="font-bold mx-5"> Datos de Residencia Médica o ASSO</h1>
                            <div class="bg-emerald-100 shadow-md rounded px-6 pt-2 pb-2 mb-4 flex flex-col">
                                <div class="-mx-3 md:flex mb-1">
                                    <div class="md:w-1/4 px-3">
                                        <label for="id_residente" class="uppercase tracking-wide text-black text-sm font-bold mb-2" >
                                            Id de Residente
                                        </label>
                                        <input type="text" name="id_residente" id="id_residente" value="{{old('id_residente')}}" class="w-full bg-emerald-50 text-black border border-lime-900 rounded py-1 px-3 mb-1 ">
                                    </div>
                                    <div class="md:w-2/4 px-3">
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
                                    <div class="md:w-1/4 px-3">
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
                                    <div class="md:w-1/4 px-3">
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
                                </div>
                            {{-- </div>
                            <div class="bg-emerald-100 shadow-md rounded px-6 pt-2 pb-2 mb-4 flex flex-col"> --}}
                                <div class="-mx-3 md:flex mb-1">
                                    <div class="md:w-1/5 px-3">
                                        <label for="gestion" class="uppercase tracking-wide text-black text-sm font-bold mb-2" >
                                            Gestión
                                        </label>
                                        <input type="number" name="gestion" id="gestion" min="{{date('Y')}}" value="{{old('gestion',date('Y'))}}" class="w-full bg-emerald-50 text-black border border-lime-900 rounded py-1 px-3 mb-1 ">
                                    </div>
                                    <div class="md:w-2/5 px-3">
                                        <label class="uppercase tracking-wide text-black text-xs font-bold mb-2" for="gari">
                                            Garante 1
                                        </label>
                                        <div>
                                            <select name="gari" id="gari"
                                                class="w-full bg-emerald-50 border border-lime-900 text-black text-md py-2 px-4 pr-8 mb-2 rounded">
                                                <OPTION selected disabled>Elija un garante</OPTION>
                                                {{-- @foreach ($centrosSalud as $centro)
                                                    <OPTION value="{{$centro->id_cs}}" {{old('id_cs')==$centro->id_cs?'selected':''}} >{{$centro->nombre_cs}}</OPTION>
                                                @endforeach --}}
                                                
                                            </select>
                                            <x-input-error :messages="$errors->get('id_esp')" />
                                        </div>
                                    </div>
                                    <div class="md:w-2/5 px-3">
                                        <label class="uppercase tracking-wide text-black text-xs font-bold mb-2" for="garii">
                                            Garante 2
                                        </label>
                                        <div>
                                            <select name="garii" id="garii"
                                                class="w-full bg-emerald-50 border border-lime-900 text-black text-md py-2 px-4 pr-8 mb-2 rounded">
                                                <OPTION selected disabled>Elija un garante</OPTION>
                                                {{-- @foreach ($centrosSalud as $centro)
                                                    <OPTION value="{{$centro->id_cs}}" {{old('id_cs')==$centro->id_cs?'selected':''}} >{{$centro->nombre_cs}}</OPTION>
                                                @endforeach --}}
                                                
                                            </select>
                                            <x-input-error :messages="$errors->get('id_esp')" />
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                        <x-primary-button>Guardar Requerimiento</x-primary-button>
                        {{-- <button>
                            Enviar
                        </button> --}}
                    </form>
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
</script>