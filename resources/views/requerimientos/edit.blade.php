<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit Requeriment') }}
        </h2>
    </x-slot>
    <div class="flex-col ">
        <x-nav-link
        :href="route('requerimiento.show',$requerimiento)">
        {{-- {{__('New requeriment')}} --}}
        Hoja de requerimiento
        </x-nav-link>
    </div>
    {{-- @dump($docAdjuntos) --}}
    <div class="py-3 px-0">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                
                {{-- @if($personal) --}}
                    <div class="p-6 text-gray-900 dark:text-gray-100" >
                        <h1 class="text-2xl font-bold text-center mt-4">Datos del Personal</h1>
                        @if ($personal)
                         <div></div>    
                        @else
                            <form id="formBusqueda">
                                @csrf 
                                <input type="text" name="cibus" id="cibus" placeholder="Carnet...."> 
                                <button class="bg-blue-200 text-blue-600 px-3 py-1 rounded-full" name="obtener" id="obtener" >Buscar</button>    
                            </form>
                        @endif
                        <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4 flex flex-col">
                            <div class="-mx-3 md:flex mb-6">
                                <div class="md:w-2/4 px-3">
                                    <label class="uppercase tracking-wide text-black text-xs font-bold mb-2"
                                        for="nombre">
                                        {{__('Names')}}
                                    </label>
                                    <input type="text" name="nombre" id="nombre" readonly value="{{$personal?$personal->nombres.' '.$personal->a_paterno.' '.$personal->a_materno:''}}"
                                        class="uppercase w-full bg-gray-200 text-black border border-gray-200 rounded py-3 px-4 mb-3">
                                </div>
                                <div class="md:w-1/4 px-3">
                                    <label class="uppercase tracking-wide text-black text-xs font-bold mb-2"
                                        for="CI">
                                        {{__('CI')}}
                                    </label>
                                    <input type="text" name="CI" id="CI" readonly value="{{$personal?$personal->CI:''}}"
                                        class="uppercase w-full bg-gray-200 text-black border border-gray-200 rounded py-3 px-4 mb-3">
                                </div>
                                <div class="md:w-1/4 px-3">
                                    <label class="uppercase tracking-wide text-black text-xs font-bold mb-2"
                                        for="matricula">
                                        {{__('matricula')}}
                                    </label>
                                    <input type="text" name="matricula" id="matricula" readonly value="{{$personal?$personal['matricula']:''}}"
                                        class="uppercase w-full bg-gray-200 text-black border border-gray-200 rounded py-3 px-4 mb-3">
                                </div>
                            </div>
                        </div>
                    </div>
                {{-- @else --}}
                
                {{-- @endif --}}
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{-- @dump(old()) --}}
                    <h1 class="text-2xl font-bold text-center mt-4">Datos del Requerimiento</h1>
                    <form action="{{route('requerimiento.update',$requerimiento)}}" method="POST">
                        @csrf @method('PUT')
                        <input type="hidden" name="id_per" id="id_per" value="{{$personal?$personal->id_per:''}}">
                        <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4 flex flex-col">
                            <div class="-mx-3 md:flex mb-6">
                                
                                <div class="md:w-1/3 px-3">
                                    <label class="uppercase tracking-wide text-black text-xs font-bold mb-2" for="id_cs">
                                        {{ __('Workplace') }}
                                    </label>
                                    <div>
                                        <select name="id_cs" id="id_cs"
                                            class="w-full bg-gray-200 border border-gray-200 text-black text-xs py-3 px-4 pr-8 mb-3 rounded">
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
                                        <select id="id_tic" name="id_tic" class="w-full bg-gray-200 border border-gray-200 text-black text-xs py-3 px-4 pr-8 mb-3 rounded">
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
                                        <select id="id_car" name="id_car" class="w-full bg-gray-200 border border-gray-200 text-black text-xs py-3 px-4 pr-8 mb-3 rounded">
                                                <OPTION selected disabled>{{__('Choose a Position')}}</OPTION>
                                                    @foreach ($cargos as $cargo)
                                                        <OPTION value="{{$cargo->id_car}}" {{old('id_car',$requerimiento->id_car)==$cargo->id_car?'selected':''}}>{{$cargo->cargo}}</OPTION>
                                                    @endforeach
                                        </select>
                                         <x-input-error :messages="$errors->get('id_car')"/>
                                    </div>
                                </div>
                            </div>
                            <div class="-mx-3 md:flex mb-6">
                                <div class="md:w-1/3 px-3 mb-6 md:mb-0">
                                    <label for="id_niv" class="uppercase tracking-wide text-black text-xs font-bold mb-2">{{__('Level')}}</label>
                                    <div>        
                                        <select id="id_niv" name="id_niv" class="w-full bg-gray-200 border border-gray-200 text-black text-xs py-3 px-4 pr-8 mb-3 rounded">
                                                <OPTION selected disabled>{{__('Choose a Level')}}</OPTION>
                                                    @foreach ($niveles as $nivel)
                                                        <OPTION value="{{$nivel->id_niv}}" {{old('id_niv',$requerimiento->id_niv)==$nivel->id_niv?'selected':''}}>{{$nivel->nivel}}|{{$nivel->horas_trab}}|{{$nivel->descripcion}}</OPTION>
                                                    @endforeach
                                        </select>
                                         <x-input-error :messages="$errors->get('id_niv')"/>
                                    </div>
                                </div>
                                <div class="md:w-2/3 px-3">

                                    <label class="tracking-wide text-black text-xs font-bold mb-2"
                                        for="motivo">
                                        {{ __('Reason for contract') }}
                                    </label>
                                    <textarea type="text" name="motivo" id="motivo"  
                                        class="w-full bg-gray-200 text-black border border-gray-200 rounded py-3 px-4 mb-3">
                                        {{old('motivo',$requerimiento->motivo)}}
                                    </textarea>
                                        <x-input-error :messages="$errors->get('motivo')" />

                                </div>
                                
                            </div>
                            <div class="-mx-3 md:flex mb-6">
                                <div class="md:w-1/4 px-3 mb-6 md:mb-0">
                                    <label class="uppercase tracking-wide text-black text-xs font-bold mb-2" for="fechaIni">
                                        {{ __('Start date') }}
                                    </label>
                                    <input type="date" name="fechaIni" id="fechaIni"  value="{{old('fechaIni',$requerimiento->fechaIni)}}"
                                        class="w-full bg-gray-200 text-black border border-gray-200 rounded py-3 px-4 mb-3">
                                        <x-input-error :messages="$errors->get('fechaIni')" />
                                </div>

                                <div class="md:w-1/4 px-3 mb-6 md:mb-0">
                                    <label class="uppercase tracking-wide text-black text-xs font-bold mb-2" for="fechaFin">
                                        {{ __('Finish date') }}
                                    </label>
                                    <input type="date" name="fechaFin" id="fechaFin"  value="{{old('fechaFin',$requerimiento->fechaFin)}}"
                                        class="w-full bg-gray-200 text-black border border-gray-200 rounded py-3 px-4 mb-3">
                                        <x-input-error :messages="$errors->get('fechaFin')" />
                                </div>
                                <div class="md:w-1/4 px-3 mb-6 md:mb-0">
                                    <label for="nota" class="uppercase tracking-wide text-black text-xs font-bold mb-2" >
                                        {{__('Note')}}
                                    </label>
                                    <input type="text" name="nota" id="nota" value="{{old('nota',$requerimiento->nota)}}" class="w-full bg-gray-200 text-black border border-gray-200 rounded py-3 px-4 mb-3">
                                    <x-input-error :messages="$errors->get('nota')" />  
                                </div>
                                <div class="md:w-1/4 px-3 mb-6 md:mb-0">
                                    <label class="uppercase tracking-wide text-black text-xs font-bold mb-2" for="fecha_nota">
                                        {{ __('Note Date') }}
                                    </label>
                                    <input type="date" name="fecha_nota" id="fecha_nota"  value="{{old('fecha_nota',$requerimiento->fecha_nota)}}"
                                        class="w-full bg-gray-200 text-black border border-gray-200 rounded py-3 px-4 mb-3">
                                        <x-input-error :messages="$errors->get('fecha_nota')" />
                                </div>
                            </div>
                            
                            
                            
                            <div class="-mx-3 md:flex mb-6">
                                <div class="md:w-1/3 px-3 mb-6 md:mb-0 ">
                                    @foreach($docAdjuntos as $doc )
                                    <label for="{{'adj'.$doc->id_adj}}" class="uppercase tracking-wide text-black text-xs font-bold mb-2" >
                                        -{{$doc->documento}}
                                    </label>
                                    <input type="checkbox" name="docadj[{{$doc->id_adj}}]" id="{{'adj'.$doc->id_adj}}" value="{{$doc->id_adj}}" {{$doc->checked?'checked disabled':''}} ></br>
                                    @endforeach
                                </div>
                                <div class="md:w-2/3 px-3 mb-6 md:mb-0 ">
                                    <label class="uppercase tracking-wide text-black text-xs font-bold mb-2"
                                    for="observaciones">
                                    {{ __('Observations') }}
                                    </label>
                                    <textarea type="text" name="observaciones" id="observaciones"  
                                    class="uppercase w-full bg-gray-200 text-black border border-gray-200 rounded py-3 px-4 mb-3">
                                    {{old('observaciones',$requerimiento->observaciones)}}
                                    </textarea>
                                    <x-input-error :messages="$errors->get('observaciones')" />                              
                                </div>
                                
                            </div>
                            
                            
                        </div>
                        
                        <x-primary-button>Enviar</x-primary-button>
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
        //cibus,obtenr
        //alert(strbus);
    if (document.querySelector('#id_per').value==="") {
        
        const bobt = document.querySelector('#obtener');
        bobt.addEventListener('click',function (event) {
            event.preventDefault();
            const cibus = document.querySelector('#cibus');
            strbus = cibus.value;
            const url ="{{route('personal.getbyci')}}?CI="+strbus;
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
                        document.querySelector('#nombre').value=data[0].nombres+' '+data[0].a_paterno+' '+data[0].a_materno;
                        document.querySelector('#CI').value=data[0].CI;
                        document.querySelector('#matricula').value=data[0].matricula;
                        document.querySelector('#id_per').value=data[0].id_per;
                    } else {
                        alert("No se encontró el personal")
                    }
                    //console.log('data.length', data.length)
            }).catch(function (error){
                console.log('error', error);  
            });
          
        });
    }
    </script>