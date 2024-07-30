<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Nuevo Requerimiento para Adenda de contrato número {{$contrato->noCon}}
        </h2>
    </x-slot>
    {{-- <div class="flex-col ">
        <x-nav-link
        :href="route('requerimiento.show',$requerimiento)" target="_blank">
        
        Hoja de requerimiento
        </x-nav-link>
        .::.
        <x-nav-link
        :href="route('requerimiento.show',$requerimiento)" target="_blank">
        
        Hoja de requerimiento
        </x-nav-link>
    </div> --}}
    {{-- @dump($docAdjuntos) --}}
    <div class="py-3 px-0">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                
                {{-- @if($personal) --}}
                    <div class="p-2 text-gray-900 dark:text-gray-100" >
                        <h1 class="text-2xl font-bold text-center mt-2">Datos del Personal</h1>
                      
                        <div class="bg-emerald-100 shadow-md rounded px-4 pt-2 pb-2 mb-0 flex flex-col">
                            <div class="-mx-3 md:flex mb-1">
                                <div class="md:w-2/4 px-3">
                                    <label class="uppercase tracking-wide text-black text-xs font-bold mb-2"
                                        for="nombre">
                                        {{__('Names')}}
                                    </label>
                                    <input type="text" name="nombre" id="nombre" readonly value="{{$personal?$personal->nombres.' '.$personal->a_paterno.' '.$personal->a_materno:''}}"
                                        class="uppercase w-full bg-emerald-50 text-black border border-lime-900 rounded py-1 px-3 mb-1">
                                </div>
                                <div class="md:w-1/4 px-3">
                                    <label class="uppercase tracking-wide text-black text-xs font-bold mb-2"
                                        for="CI">
                                        {{__('CI')}}
                                    </label>
                                    <input type="text" name="CI" id="CI" readonly value="{{$personal?$personal->CI:''}}"
                                        class="uppercase w-full bg-emerald-50 text-black border border-lime-900 rounded py-1 px-3 mb-1">
                                </div>
                                <div class="md:w-1/4 px-3">
                                    <label class="uppercase tracking-wide text-black text-xs font-bold mb-2"
                                        for="matricula">
                                        {{__('matricula')}}
                                    </label>
                                    <input type="text" name="matricula" id="matricula" readonly value="{{$personal?$personal->matricula:''}}"
                                        class="uppercase w-full bg-emerald-50 text-black border border-lime-900 rounded py-1 px-3 mb-1">
                                </div>
                            </div>
                        </div>
                    </div>
                
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{-- @dump(old()) --}}
                    <h1 class="text-2xl font-bold text-center mt-1">Datos del Requerimiento</h1>
                    <form action="{{route('requerimiento.store')}}" method="POST">
                        @csrf
                        <input type="hidden" name="id_per" id="id_per" value="{{$personal?$personal->id_per:''}}">
                        <input type="hidden" name="id_cono" id="id_cono" value="{{$contrato?$contrato->id_con:''}}">
                        <input type="hidden" name="fechaIni" id="fechaIni" value="{{$contrato?$contrato->fechaIni:''}}">
                        <input type="hidden" name="id_tic" id="id_tic" value="9">
                        
                        <div class="bg-emerald-100 shadow-md rounded px-2 pt-2 pb-2 mb-2 flex flex-col">
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
                                                <OPTION value="{{$centro->id_cs}}" {{old('id_cs',$contrato->id_cs)==$centro->id_cs?'selected':''}} >{{$centro->nombre_cs}}</OPTION>
                                            @endforeach
                                        </select>
                                        <x-input-error :messages="$errors->get('id_cs')" />
                                    </div>
                                </div>
                                {{-- <div class="md:w-1/3 px-3 mb-6 md:mb-0">
                                    <label for="id_tic" class="uppercase tracking-wide text-black text-xs font-bold mb-2">{{__('Type of contract')}}</label>
                                    <div>        
                                        <select id="id_tic" name="id_tic" class="w-full bg-emerald-50 border border-lime-900 text-black text-md py-2 px-4 pr-8 mb-2 rounded">
                                                <OPTION selected disabled>{{__('Choose a Type of contract')}}</OPTION>
                                                    @foreach ($tiposContrato as $tipo)
                                                        <OPTION value="{{$tipo->id_tic}}" {{old('id_tic',$requerimiento->id_tic)==$tipo->id_tic?'selected':''}}>{{$tipo->tipo}}</OPTION>
                                                    @endforeach
                                        </select>
                                         <x-input-error :messages="$errors->get('id_tic')"/>
                                    </div>
                                </div> --}}
                                <div class="md:w-1/3 px-3 mb-6 md:mb-0">
                                    <label for="id_car" class="uppercase tracking-wide text-black text-xs font-bold mb-2">{{__('Position')}}</label>
                                    <div>        
                                        <select id="id_car" name="id_car" style="pointer-events: none;"
                                        class="w-full bg-emerald-50 border border-lime-900 text-black text-md py-2 px-4 pr-8 mb-2 rounded">
                                                <OPTION selected disabled>{{__('Choose a Position')}}</OPTION>
                                                    @foreach ($cargos as $cargo)
                                                        <OPTION value="{{$cargo->id_car}}" {{old('id_car',$contrato->id_car)==$cargo->id_car?'selected':''}}>{{$cargo->cargo}}</OPTION>
                                                    @endforeach
                                        </select>
                                         <x-input-error :messages="$errors->get('id_car')"/>
                                    </div>
                                </div>
                            </div>
                            <div class="-mx-3 md:flex mb-1">
                                <div class="md:w-2/4 px-3 mb-6 md:mb-0">
                                    <label for="id_niv" class="uppercase tracking-wide text-black text-xs font-bold mb-2">{{__('Level')}}</label>
                                    <div>        
                                        <select id="id_niv" name="id_niv" 
                                        class="w-full bg-emerald-50 border border-lime-900 text-black text-md py-2 px-4 pr-8 mb-2 rounded">
                                                <OPTION selected disabled>{{__('Choose a Level')}}</OPTION>
                                                    @foreach ($niveles as $nivel)
                                                        <OPTION value="{{$nivel->id_niv}}" {{old('id_niv',$contrato->id_niv)==$nivel->id_niv?'selected':''}}>{{$nivel->nivel}}|{{$nivel->horas_trab}}|{{$nivel->descripcion}}</OPTION>
                                                    @endforeach
                                        </select>
                                         <x-input-error :messages="$errors->get('id_niv')"/>
                                    </div>
                                </div>
                                <div class="md:w-2/4 px-3">

                                    <label class=" uppercase tracking-wide text-black text-xs font-bold mb-2"
                                        for="motivo">
                                        Informe Técnico
                                    </label>
                                    <textarea type="text" name="motivo" id="motivo"  
                                        class="w-full bg-emerald-50 text-black border border-lime-900 rounded py-1 px-3 mb-1">
                                        {{old('motivo')}}
                                    </textarea>
                                        <x-input-error :messages="$errors->get('motivo')" />

                                </div>
                                
                            </div>
                            <div class="-mx-3 md:flex mb-1">
                                {{-- <div class="md:w-1/4 px-3 mb-6 md:mb-0">
                                    <label class="uppercase tracking-wide text-black text-xs font-bold mb-2" for="fechaIni">
                                        {{ __('Start date') }}
                                    </label>
                                    <input type="date" name="fechaIni" id="fechaIni"  value="{{old('fechaIni',$contrato->fechaIni)}}"
                                        class="w-full bg-emerald-50 text-black border border-lime-900 rounded py-1 px-3 mb-1">
                                        <x-input-error :messages="$errors->get('fechaIni')" />
                                </div> --}}

                                <div class="md:w-1/3 px-3 mb-6 md:mb-0">
                                    <label class="uppercase tracking-wide text-black text-xs font-bold mb-2" for="fechaFin">
                                        {{ __('Finish date') }}
                                    </label>
                                    <input type="date" name="fechaFin" id="fechaFin"  value="{{old('fechaFin')}}"
                                        class="w-full bg-emerald-50 text-black border border-lime-900 rounded py-1 px-3 mb-1">
                                        <x-input-error :messages="$errors->get('fechaFin')" />
                                </div>
                                <div class="md:w-1/3 px-3 mb-6 md:mb-0">
                                    <label for="nota" class="uppercase tracking-wide text-black text-xs font-bold mb-2" >
                                        {{__('Note')}}
                                    </label>
                                    <input type="text" name="nota" id="nota" value="{{old('nota',$requerimiento->nota)}}" class="w-full bg-emerald-50 text-black border border-lime-900 rounded py-1 px-3 mb-1">
                                    <x-input-error :messages="$errors->get('nota')" />  
                                </div>
                                <div class="md:w-1/3 px-3 mb-6 md:mb-0">
                                    <label class="uppercase tracking-wide text-black text-xs font-bold mb-2" for="fecha_nota">
                                        {{ __('Note Date') }}
                                    </label>
                                    <input type="date" name="fecha_nota" id="fecha_nota"  value="{{old('fecha_nota',$requerimiento->fecha_nota)}}"
                                        class="w-full bg-emerald-50 text-black border border-lime-900 rounded py-1 px-3 mb-1">
                                        <x-input-error :messages="$errors->get('fecha_nota')" />
                                </div>
                            </div>
                            
                        </div>
                        <div class=" w-full text-right justify-items-end">
                        <x-primary-button>Guardar requerimiento</x-primary-button>
                        </div>
                        {{-- <button>
                            Enviar
                        </button> --}}
                    </form>
                
                </div>
                <div class=" flex mb-4">
                @if($requerimiento->id_esreq == '1' && count($revisionesReq)>1)
                    <div class="md:w-1/4 px-2" >
                        <form action="{{route('requerimiento.updateStatus',$requerimiento)}}" method="POST">
                           @csrf @method('PUT')
                            <input type="hidden" name="id_esreq" value="5">
                            <input type="hidden" name="id_req" value="{{$requerimiento->id_req}}">
                            <button class="bg-green-200 text-green-600 px-3 py-1 rounded-full">Habilitar</button>
                        </form> 
                        
                    </div>
                    <div class="md:w-1/4 px-2">                        
                        <form action="{{route('requerimiento.updateStatus',$requerimiento)}}" method="POST">
                            @csrf @method('PUT')
                            <input type="hidden" name="id_esreq" value="2">
                            <input type="hidden" name="id_req" value="{{$requerimiento->id_req}}">
                            <button class="bg-red-200 text-red-600 px-3 py-1 rounded-full">Rechazar</button>
                        </form>
                    </div>
                    
                    @endif
                    @if ($requerimiento->id_esreq=='5')
                    <div class="md:w-1/4 px-2">
                        <x-nav-link :href="route('contrato.new',$requerimiento)" class="bg-green-200 text-green-600 px-3 py-1 rounded-full">Crear Contrato</x-nav-link>                                            
                    </div>
                    @endif
                </div>    
            </div>
        </div>
    </div>
                 
</x-app-layout>

    