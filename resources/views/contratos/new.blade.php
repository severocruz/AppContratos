<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Nuevo Contrato
        </h2>
    </x-slot>
    <div class="flex-col">
        .::.
    </div>
    {{-- @dump($docAdjuntos) --}}
    <div class="py-3 px-0">
        <div class="max-w-7xl mx-auto sm:px-2 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                
                    <div class="px-0 text-gray-900 dark:text-gray-100" >
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
                                    <input type="text" name="matricula" id="matricula" readonly value="{{$personal?$personal['matricula']:''}}"
                                        class="uppercase w-full bg-emerald-50 text-black border border-lime-900 rounded py-1 px-3 mb-1">
                                </div>
                            </div>
                        </div>
                    </div>
                
                <div class="p-0 text-gray-900 dark:text-gray-100">
                    {{-- @dump(old()) --}}
                    <h1 class="text-2xl font-bold text-center mt-4">Datos del Contrato</h1>
                    
                    <form  method="POST" action="{{route('contrato.store')}}">
                        @csrf 
                        <input type="hidden" name="id_per" id="id_per" value="{{$personal?$personal->id_per:''}}">
                        <input type="hidden" name="id_req" id="id_req" value="{{$requerimiento?$requerimiento->id_req:''}}">
                        <div class="bg-emerald-100 shadow-md rounded px-4 pt-2 pb-1 mb-4 flex flex-col">
                            <div class="-mx-3 md:flex mb-1">
                                <div class="md:w-1/4 px-3">
                                    <label class="uppercase tracking-wide text-black text-xs font-bold mb-2" for="partPres">
                                        Partida presupuestaria
                                    </label>
                                    <input type="text" name="partPres" id="partPres"  value="12100"
                                        class="w-full bg-emerald-50 text-black border border-lime-900 rounded py-1 px-3 mb-1">
                                        <x-input-error :messages="$errors->get('partPres')" />
                                </div>
                                <div class="md:w-1/4 px-3">
                                    <label for="id_cinal" class="uppercase tracking-wide text-black text-xs font-bold mb-2">Circular Inst. Nal.</label>
                                    <div>        
                                        <select id="id_cinal" name="id_cinal" class="w-full bg-emerald-50 border border-lime-900 text-black text-md py-2 px-4 pr-8 mb-2 rounded">
                                                <OPTION selected disabled>Elija un circular</OPTION>
                                                    @foreach ($cirinstnal as $cinal)
                                                        <OPTION value="{{$cinal->id}}" {{old('id_cinal')==$cinal->id?'selected':''}}>{{$cinal->no}}</OPTION>
                                                    @endforeach
                                        </select>
                                         <x-input-error :messages="$errors->get('id_cinal')"/>
                                    </div>
                                </div>
                                <div class="md:w-1/4 px-3">
                                    <label for="id_cireg" class="uppercase tracking-wide text-black text-xs font-bold mb-2">Circular Inst. Reg.</label>
                                    <div>        
                                        <select id="id_cireg" name="id_cireg" class="w-full bg-emerald-50 border border-lime-900 text-black text-md py-2 px-4 pr-8 mb-2 rounded">
                                                <OPTION selected disabled>Elija un circular</OPTION>
                                                    @foreach ($cirinstreg as $cireg)
                                                        <OPTION value="{{$cireg->id}}" {{old('id_cireg')==$cireg->id?'selected':''}}>{{$cireg->no}}</OPTION>
                                                    @endforeach
                                        </select>
                                         <x-input-error :messages="$errors->get('id_cireg')"/>
                                    </div>
                                </div>
                                <div class="md:w-1/4 px-3">
                                    <label for="id_cite" class="uppercase tracking-wide text-black text-xs font-bold mb-2">Cite</label>
                                    <div>        
                                        <select id="id_cite" name="id_cite" class="w-full bg-emerald-50 border border-lime-900 text-black text-md py-2 px-4 pr-8 mb-2 rounded">
                                                <OPTION selected disabled>Elija un cite</OPTION>
                                                    @foreach ($cite as $cit)
                                                        <OPTION value="{{$cit->id}}" {{old('id_cite')==$cit->id?'selected':''}}>{{$cit->no}}</OPTION>
                                                    @endforeach
                                        </select>
                                         <x-input-error :messages="$errors->get('id_cite')"/>
                                    </div>
                                </div>
                            </div>
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
                                                <OPTION value="{{$centro->id_cs}}" {{old('id_cs',$requerimiento->id_cs)==$centro->id_cs?'selected':''}} >{{$centro->nombre_cs}}</OPTION>
                                            @endforeach
                                            
                                        </select>
                                        <x-input-error :messages="$errors->get('id_cs')" />
                                    </div>
                                </div>
                                <div class="md:w-1/3 px-3 mb-6 md:mb-0">
                                    <label for="id_tic" class="uppercase tracking-wide text-black text-xs font-bold mb-2">{{__('Type of contract')}}</label>
                                    <div>        
                                        <select readonly id="id_tic" name="id_tic" class="w-full bg-emerald-50 border border-lime-900 text-black text-md py-2 px-4 pr-8 mb-2 rounded">
                                                <OPTION selected disabled>{{__('Choose a Type of contract')}}</OPTION>
                                                    @foreach ($tiposContrato as $tipo)
                                                           
                                                        <OPTION value="{{$tipo->id_tic}}" {{old('id_tic',$requerimiento->id_tic)==$tipo->id_tic?'selected':''}}>{{$tipo->tipo}}</OPTION>
                                                        
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
                                                        <OPTION value="{{$cargo->id_car}}" {{old('id_car',$requerimiento->id_car)==$cargo->id_car?'selected':''}}>{{$cargo->cargo}}</OPTION>
                                                    @endforeach
                                        </select>
                                         <x-input-error :messages="$errors->get('id_car')"/>
                                    </div>
                                </div>
                            </div>
                            <div class="-mx-3 md:flex mb-1">
                                <div class="md:w-1/3 px-3 mb-6 md:mb-0">
                                    <label for="id_niv" class="uppercase tracking-wide text-black text-xs font-bold mb-2">{{__('Level')}}</label>
                                    <div>        
                                        <select id="id_niv" name="id_niv" class="w-full bg-emerald-50 border border-lime-900 text-black text-md py-2 px-4 pr-8 mb-2 rounded">
                                                <OPTION selected disabled>{{__('Choose a Level')}}</OPTION>
                                                    @foreach ($niveles as $nivel)
                                                        <OPTION value="{{$nivel->id_niv}}" {{old('id_niv',$requerimiento->id_niv)==$nivel->id_niv?'selected':''}}>{{$nivel->nivel}}|{{$nivel->horas_trab}}|{{$nivel->descripcion}}</OPTION>
                                                    @endforeach
                                        </select>
                                         <x-input-error :messages="$errors->get('id_niv')"/>
                                    </div>
                                </div>
                                <div class="md:w-2/3 px-3">

                                    <label class=" uppercase tracking-wide text-black text-xs font-bold mb-2"
                                        for="motivo">
                                        {{ __('Reason for contract') }}
                                    </label>
                                    <textarea type="text" name="motivo" id="motivo"  readonly
                                        class="w-full bg-emerald-50 text-black border border-lime-900 rounded py-1 px-3 mb-1">
                                        {{old('motivo',$requerimiento->motivo)}}
                                    </textarea>
                                        <x-input-error :messages="$errors->get('motivo')" />

                                </div>
                                
                            </div>
                            <div class="-mx-3 md:flex mb-1">
                                <div class="md:w-1/4 px-3 mb-6 md:mb-0">
                                    <label class="uppercase tracking-wide text-black text-xs font-bold mb-2" for="fechaIni">
                                        {{ __('Start date') }}
                                    </label>
                                    <input type="date" name="fechaIni" id="fechaIni"  value="{{old('fechaIni',$requerimiento->fechaIni)}}"
                                        class="w-full bg-emerald-50 text-black border border-lime-900 rounded py-1 px-3 mb-1">
                                        <x-input-error :messages="$errors->get('fechaIni')" />
                                </div>

                                <div class="md:w-1/4 px-3 mb-6 md:mb-0">
                                    <label class="uppercase tracking-wide text-black text-xs font-bold mb-2" for="fechaFin">
                                        {{ __('Finish date') }}
                                    </label>
                                    <input type="date" name="fechaFin" id="fechaFin"  value="{{old('fechaFin',$requerimiento->fechaFin)}}"
                                        class="w-full bg-emerald-50 text-black border border-lime-900 rounded py-1 px-3 mb-1">
                                        <x-input-error :messages="$errors->get('fechaFin')" />
                                </div>
                                <div class="md:w-1/4 px-3 mb-6 md:mb-0">
                                    <label for="nota" class="uppercase tracking-wide text-black text-xs font-bold mb-2" >
                                        {{__('Note')}} de Req.
                                    </label>
                                    <input type="text" name="nota" id="nota" value="{{old('nota',$requerimiento->nota)}}" class="w-full bg-emerald-50 text-black border border-lime-900 rounded py-1 px-3 mb-1" readonly>
                                    <x-input-error :messages="$errors->get('nota')" />  
                                </div>
                                <div class="md:w-1/4 px-3 mb-6 md:mb-0">
                                    <label class="uppercase tracking-wide text-black text-xs font-bold mb-2" for="fecha_nota">
                                        {{ __('Note Date') }} de Req.
                                    </label>
                                    <input type="date" name="fecha_nota" id="fecha_nota"  value="{{old('fecha_nota',$requerimiento->fecha_nota)}}"
                                        class="w-full bg-emerald-50 text-black border border-lime-900 rounded py-1 px-3 mb-1" readonly>
                                        <x-input-error :messages="$errors->get('fecha_nota')" />
                                </div>
                            </div>
                            
                            <div class="-mx-3 md:flex mb-1">
                                
                                <div class="md:w-1/2 px-3 mb-6 md:mb-0 ">
                                    <label class="uppercase tracking-wide text-black text-xs font-bold mb-2"
                                    for="observaciones">
                                    Parentesco Familiar
                                    </label>
                                    <textarea type="text" name="observaciones" id="observaciones"  
                                    class="uppercase w-full bg-emerald-50 text-black border border-lime-900 rounded py-1 px-3 mb-1">
                                    </textarea>
                                    <x-input-error :messages="$errors->get('observaciones')" />                              
                                </div>
                                <div class="md:w-1/2 px-3 mb-6 md:mb-0 ">
                                    <label class="uppercase tracking-wide text-black text-xs font-bold mb-2"
                                    for="observaciones2">
                                    Observaciones del contrato
                                    </label>
                                    <textarea type="text" name="observaciones2" id="observaciones2"  
                                    class="uppercase w-full bg-emerald-50 text-black border border-lime-900 rounded py-1 px-3 mb-1">
                                    </textarea>
                                    <x-input-error :messages="$errors->get('observaciones2')" />                              
                                </div>
                                
                            </div>
                            
                        </div>
                        <div class=" w-full text-right justify-items-end">
                            <x-primary-button class="justify-center w-1/4 bg-blue-800 text-white">Guardar </x-primary-button>
                        </div>
                        {{-- <button>
                            Enviar
                        </button> --}}
                    </form>
                
                </div>
                    
            </div>
        </div>
    </div>
       
<div x-data="{ 'showModal': false }"
    @keydown.escape="showModal = false"
    >
    <!-- Trigger for Modal -->

    <button class=" bg-slate-600 text-blue-900 font-extrabold" type="button" @click="showModal = true">
        Open Modal
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
                <h5 class="mr-3 text-black max-w-none">Agregar Revision de Requerimiento</h5>

                <button type="button" class="z-50 cursor-pointer" @click="showModal = false">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>

            <!-- content -->
            <form action="{{route('revisionesreq.store')}}" method="POST">
                @csrf
                <input type="hidden" name="id_req" value="{{$requerimiento->id_req}}" >
                
                <div class="-mx-3 md:flex mb-6">
                    <div class="md:w-1/2 px-3">
                        <label for="positivo" class="uppercase tracking-wide text-black text-xs font-bold mb-2">
                            Dictamen
                        </label>
                        <br>
                        <label  class="tracking-wide text-black text-xs font-bold mb-2">
                        <input type="radio" name="dictamen" required id="positivo" value="positivo">
                        <span class="caption">Positivo </span>
                        </label>
                        <label  class="tracking-wide text-black text-xs font-bold mb-2">
                            <input type="radio" name="dictamen" required id="negativo" value="negativo">
                            <span class="caption">Negativo</span>
                        </label>
                    </div>
                    <div class="md:w-1/2 px-3">
                        <label class="tracking-wide text-black text-xs font-bold mb-2"
                                            for="observaciones">
                                            Observaciones
                                        </label>
                                        <textarea type="text" name="observaciones" id="observaciones"  
                                            class="w-full bg-emerald-50 text-black border border-lime-900 rounded py-1 px-3 mb-1">    
                                        </textarea>
                    </div>  
                </div>
                <button class="bg-blue-200 text-blue-900 px-3 py-1 rounded-full">Guardar</button>              
            </form>
        </div>
    </div>
</div>      
              
</x-app-layout>

