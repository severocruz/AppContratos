<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
             Contrato {{$contrato->noCon}} 
        </h2>
    </x-slot>
    @switch($contrato->id_tic)
        @case(9)
        <div class="flex-col">
            <x-nav-link
            :href="route('contrato.showalladenda',$contrato)" target="_blank">
            Todas
            </x-nav-link> |
            <x-nav-link
            :href="route('contrato.showadenda',$contrato).'?cop=1'" target="_blank">
            Original
            </x-nav-link> |
            <x-nav-link
            :href="route('contrato.showadenda',$contrato).'?cop=2'" target="_blank">
            Copia Kardex
            </x-nav-link>|
            <x-nav-link
            :href="route('contrato.showadenda',$contrato).'?cop=3'" target="_blank">
            Copia Interesado
            </x-nav-link>|
            <x-nav-link
            :href="route('contrato.showadenda',$contrato).'?cop=4'" target="_blank">
            Copia RRHH
            </x-nav-link>|
            <x-nav-link
            :href="route('imagencontrato.index',$contrato)">
            Imagenes
            </x-nav-link>|
        </div>
            @break
        @case(10)
        <div class="flex-col">
            {{-- <x-nav-link
            :href="route('contrato.showall',$contrato)" target="_blank">
            Todas
            </x-nav-link> | --}}
            <x-nav-link
            :href="route('contrato.showresidente',$contrato).'?cop=1'" target="_blank">
            Original
            </x-nav-link> |
            <x-nav-link
            :href="route('contrato.showresidente',$contrato).'?cop=2'" target="_blank">
            Copia Kardex
            </x-nav-link>|
            <x-nav-link
            :href="route('contrato.showresidente',$contrato).'?cop=3'" target="_blank">
            Copia Interesado
            </x-nav-link>|
            <x-nav-link
            :href="route('contrato.showresidente',$contrato).'?cop=4'" target="_blank">
            Copia RRHH
            </x-nav-link>|
            <x-nav-link
            :href="route('impresion.avc',$contrato).'?cop=2'" target="_blank">
            AVC
            </x-nav-link>|
            <x-nav-link
            :href="route('impresion.avc',$contrato).'?cop=1'" target="_blank">
            AVC *
            </x-nav-link>|
            <x-nav-link
            :href="route('impresion.avisobaja',$contrato).'?cop=2'" target="_blank">
            Aviso de Baja
            </x-nav-link>|
            <x-nav-link
            :href="route('impresion.avisobaja',$contrato).'?cop=1'" target="_blank">
            Aviso de Baja *
            </x-nav-link>|
            <x-nav-link
            :href="route('impresion.credencial',$contrato).'?cop=1'" target="_blank">
            Credencial*
            </x-nav-link>|
            <x-nav-link
            :href="route('imagencontrato.index',$contrato)">
            Imagenes
            </x-nav-link>|
        </div> 
            @break
        @default
        <div class="flex-col">
            <x-nav-link
            :href="route('contrato.showall',$contrato)" target="_blank">
            Todas
            </x-nav-link> |
            <x-nav-link
            :href="route('contrato.show',$contrato).'?cop=1'" target="_blank">
            Original
            </x-nav-link> |
            <x-nav-link
            :href="route('contrato.show',$contrato).'?cop=2'" target="_blank">
            Copia Kardex
            </x-nav-link>|
            <x-nav-link
            :href="route('contrato.show',$contrato).'?cop=3'" target="_blank">
            Copia Interesado
            </x-nav-link>|
            <x-nav-link
            :href="route('contrato.show',$contrato).'?cop=4'" target="_blank">
            Copia RRHH
            </x-nav-link>|
            <x-nav-link
            :href="route('impresion.avc',$contrato).'?cop=2'" target="_blank">
            AVC
            </x-nav-link>|
            <x-nav-link
            :href="route('impresion.avc',$contrato).'?cop=1'" target="_blank">
            AVC *
            </x-nav-link>|
            <x-nav-link
            :href="route('impresion.avisobaja',$contrato).'?cop=2'" target="_blank">
            Aviso de Baja
            </x-nav-link>|
            <x-nav-link
            :href="route('impresion.avisobaja',$contrato).'?cop=1'" target="_blank">
            Aviso de Baja *
            </x-nav-link>|
            <x-nav-link
            :href="route('impresion.credencial',$contrato).'?cop=1'" target="_blank">
            Credencial*
            </x-nav-link>|
            <x-nav-link
            :href="route('imagencontrato.index',$contrato)">
            Imagenes
            </x-nav-link>|
        </div>  
    @endswitch
    
    
    <div class="py-3 px-0">
        <div class="max-w-7xl mx-auto sm:px-2 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                
                    <div class="p-0 text-gray-900 dark:text-gray-100" >
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
                                    <input type="text" name="CI" id="CI" readonly value="{{$personal?$personal->CI.'  '.$personal->departamento->sigla:'' }}"
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
                            <div class="-mx-3 md:flex mb-1">
                                <div class="md:w-2/4 px-3">
                                    <label class="uppercase tracking-wide text-black text-xs font-bold mb-2"
                                        for="domicilio">
                                        Domicilio
                                    </label>
                                    <input type="text" name="domicilio" id="domicilio" readonly value="{{$personal?$personal->localidad.' '.$personal->direccion.' '.$personal->calle.' '.$personal->No:''}}"
                                        class="w-full bg-emerald-50 text-black border border-lime-900 rounded py-1 px-3 mb-1">
                                </div>
                                <div class="md:w-1/4 px-3">
                                    <label class="uppercase tracking-wide text-black text-xs font-bold mb-2"
                                        for="telefono">
                                        Telf/cel
                                    </label>
                                    <input type="text" name="telefono" id="telefono" readonly value="{{$personal?$personal->telefono:'' }}"
                                        class="uppercase w-full bg-emerald-50 text-black border border-lime-900 rounded py-1 px-3 mb-1">
                                </div>
                                <div class="md:w-1/4 px-3">
                                    <label class="uppercase tracking-wide text-black text-xs font-bold mb-2"
                                        for="email">
                                        Correo electrónico
                                    </label>
                                    <input type="text" name="email" id="email" readonly value="{{$personal?$personal['email']:''}}"
                                        class="w-full bg-emerald-50 text-black border border-lime-900 rounded py-1 px-3 mb-1">
                                </div>
                            </div>
                        </div>
                    </div>
                
                <div class="p-0 text-gray-900 dark:text-gray-100">
                    {{-- @dump(old()) --}}
                    <h1 class="text-2xl font-bold text-center mt-4">Datos del Contrato</h1>
                    
                    <form  method="POST" action="{{route('contrato.update',$contrato)}}">
                        @csrf @method('PUT')
                        <input type="hidden" name="id_per" id="id_per" value="{{$personal?$personal->id_per:''}}">
                        <input type="hidden" name="id_req" id="id_req" value="{{$contrato->id_req}}">
                        <div class="bg-emerald-100 shadow-md rounded px-4 pt-2 pb-1 mb-4 flex flex-col">
                            <div class="-mx-3 md:flex mb-1">
                                <div class="md:w-1/4 px-3">
                                    <label class="uppercase tracking-wide text-black text-xs font-bold mb-2" for="partPres">
                                        Partida presupuestaria
                                    </label>
                                    <input type="text" name="partPres" id="partPres"  value="{{$contrato->partPres}}"
                                        class="w-full bg-emerald-50 text-black border border-lime-900 rounded py-1 px-3 mb-1">
                                        <x-input-error :messages="$errors->get('partPres')" />
                                </div>
                                <div class="md:w-1/4 px-3">
                                    <label for="id_cinal" class="uppercase tracking-wide text-black text-xs font-bold mb-2">Circular Inst. Nal.</label>
                                    <div>        
                                        <select id="id_cinal" name="id_cinal" class="w-full bg-emerald-50 border border-lime-900 text-black text-md py-2 px-4 pr-8 mb-2 rounded">
                                                <OPTION selected disabled>Elija un circular</OPTION>
                                                    @foreach ($cirinstnal as $cinal)
                                                        <OPTION value="{{$cinal->id}}" {{old('id_cinal',$contrato->id_cinal)==$cinal->id?'selected':''}}>{{$cinal->no}}</OPTION>
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
                                                        <OPTION value="{{$cireg->id}}" {{old('id_cireg',$contrato->id_cireg)==$cireg->id?'selected':''}}>{{$cireg->no}}</OPTION>
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
                                                        <OPTION value="{{$cit->id}}" {{old('id_cite',$contrato->id_cite)==$cit->id?'selected':''}}>{{$cit->no}}</OPTION>
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
                                                <OPTION value="{{$centro->id_cs}}" {{old('id_cs',$contrato->id_cs)==$centro->id_cs?'selected':''}} >{{$centro->nombre_cs}}</OPTION>
                                            @endforeach
                                            
                                        </select>
                                        <x-input-error :messages="$errors->get('id_cs')" />
                                    </div>
                                </div>
                                <div class="md:w-1/3 px-3 mb-6 md:mb-0">
                                    <label for="id_tic" class="uppercase tracking-wide text-black text-xs font-bold mb-2">{{__('Type of contract')}}</label>
                                    <div>        
                                        <select style="{{$contrato->id_tic =='9' || $contrato->id_tic =='10' ?'pointer-events: none;background-color: lightblue;':''}} "  id="id_tic" name="id_tic" class="w-full bg-emerald-50 border border-lime-900 text-black text-md py-2 px-4 pr-8 mb-2 rounded">
                                                <OPTION selected disabled>{{__('Choose a Type of contract')}}</OPTION>
                                                    @foreach ($tiposContrato as $tipo)
                                                        <OPTION  value="{{$tipo->id_tic}}"  {{old('id_tic',$contrato->id_tic)==$tipo->id_tic?'selected':''}}>{{$tipo->tipo}}</OPTION>
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
                                        <select id="id_niv" name="id_niv" class="w-full bg-emerald-50 border border-lime-900 text-black text-md py-2 px-4 pr-8 mb-2 rounded">
                                                <OPTION selected disabled>{{__('Choose a Level')}}</OPTION>
                                                    @foreach ($niveles as $nivel)
                                                        <OPTION value="{{$nivel->id_niv}}" {{old('id_niv',$contrato->id_niv)==$nivel->id_niv?'selected':''}}>{{$nivel->nivel}}|{{$nivel->horas_trab}} &nbsp;**{{$nivel->descripcion}}</OPTION>
                                                    @endforeach
                                        </select>
                                         <x-input-error :messages="$errors->get('id_niv')"/>
                                    </div>
                                </div>
                                <div class="md:w-2/4 px-3">

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
                                    <input type="date" name="fechaIni" id="fechaIni"  value="{{old('fechaIni',$contrato->fechaIni)}}"
                                        class="w-full bg-emerald-50 text-black border border-lime-900 rounded py-1 px-3 mb-1">
                                        <x-input-error :messages="$errors->get('fechaIni')" />
                                </div>

                                <div class="md:w-1/4 px-3 mb-6 md:mb-0">
                                    <label class="uppercase tracking-wide text-black text-xs font-bold mb-2" for="fechaFin">
                                        {{ __('Finish date') }}
                                    </label>
                                    <input type="date" name="fechaFin" id="fechaFin"  value="{{old('fechaFin',$contrato->fechaFin)}}"
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
                                        {{old('id_tic',$contrato->observaciones)}}
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
                                        {{old('id_tic',$contrato->observaciones2)}}
                                    </textarea>
                                    <x-input-error :messages="$errors->get('observaciones2')" />                              
                                </div>
                                
                            </div>
                            <div class="-mx-3 md:flex mb-1">
                                <div class="md:w-2/3 px-3 mb-6 md:mb-0 ">
                        
                                            <label class="uppercase tracking-wide text-black text-xs font-bold mb-2"
                                            >
                                            firmado por:
                                            </label>
                                            <table class="w-full text-left text-sm text-slate-700 dark:text-slate-300" >
                                                
                                                <tbody class="divide-y divide-slate-300 dark:divide-slate-700">
                                                     @foreach($firmas as $firma)
                                                    <tr class="bg-green-300">
                                                        <td class="p-1">
                                                            {{$firma->autoridadesVb->nombre.' ' }}
                                                            {{$firma->autoridadesVb->user->nombres .' ' }}
                                                            {{$firma->autoridadesVb->user->a_paterno .' ' }}
                                                            {{$firma->autoridadesVb->user->a_materno .' ' }}
                                                            {{$firma->autoridadesVb->cargo }}
                                                        </td>         
                                                    </tr>
                                                    @endforeach 
                                                </tbody>
                                            </table>
                                       
                                </div>
                                <div class="md:w-2/3 px-3 mb-6 md:mb-0 ">
                                    <label class="uppercase tracking-wide text-black text-xs font-bold mb-2"
                                    for="firmado">
                                    firmado por el interesado:
                                    </label>
                                    <input class="" type="checkbox" name="firmado" id="firmado" {{$contrato->firmado=='si'? 'checked disabled':''}} value="si">
                                </div>
                            </div>
                            
                        </div>
                    @if(old('id_tic',$contrato->id_tic)=='10'||old('id_tic',$contrato->id_tic)=='11')    
                        <div id="residencia" class="{{(old('id_tic',$contrato->id_tic)=='10'||old('id_tic',$contrato->id_tic)=='11')?'visible':'collapse'}}">
                            <h1 class="font-bold mx-5"> Datos de Residencia Médica o ASSO</h1>
                            <div class="bg-emerald-100 shadow-md rounded px-6 pt-2 pb-2 mb-4 flex flex-col">
                                <input type="hidden" name="id_complemento" id="id_complemento" value="{{old('id_complemento',$complemento->id)}}">
                                <div class="-mx-3 md:flex mb-1">
                                    <div class="md:w-1/6 px-3">
                                        <label for="id_residente" class="uppercase tracking-wide text-black text-xs font-bold mb-2" >
                                            Id de Residente
                                        </label>
                                        <input disabled type="text" name="id_residente" id="id_residente" value="{{old('id_residente',$complemento->id_residente)}}" class="w-full bg-emerald-50 text-black border border-lime-900 rounded py-1 px-3 mb-1 ">
                                    </div>
                                    <div class="md:w-2/6 px-3">
                                        <label class="uppercase tracking-wide text-black text-xs font-bold mb-2" for="id_esp">
                                            Especialidad
                                        </label>
                                        <div>
                                            <select disabled name="id_esp" id="id_esp" 
                                                class="sel w-full bg-emerald-50 border border-lime-900 text-black text-md py-2 px-4 pr-8 mb-2 rounded">
                                                <OPTION selected disabled>Elija una especialidad</OPTION>
                                                @foreach ($especialidades as $especialidad)
                                                    <OPTION value="{{$especialidad->id}}" {{old('id_esp',$complemento->id_esp)==$especialidad->id?'selected':''}} >{{$especialidad->nombre}}</OPTION>
                                                @endforeach
                                                
                                            </select>
                                            <x-input-error :messages="$errors->get('id_esp')" />
                                        </div>
                                    </div>
                                    <div class="md:w-1/6 px-3">
                                        <label class="uppercase tracking-wide text-black text-xs font-bold mb-2" for="anio_formacion">
                                            # Año
                                        </label>
                                            <input disabled type="text" name="anio_formacion" id="anio_formacion" value="{{old('anio_formacion',$complemento->anio_formacion)}}" 
                                            class="w-full bg-emerald-50 text-black border border-lime-900 rounded py-1 px-3 mb-1 ">
                                            <x-input-error :messages="$errors->get('anio_formacion')" />
                                    </div>
                                    <div class="md:w-1/6 px-3">
                                        <label class="uppercase tracking-wide text-black text-xs font-bold mb-2" for="duracion">
                                            Duración
                                        </label>
                                        <div>
                                            <select disabled name="duracion" id="duracion"
                                                class="w-full bg-emerald-50 border border-lime-900 text-black text-md py-2 px-4 pr-8 mb-2 rounded">
                                                <OPTION selected disabled>Elija una Duración</OPTION>
                                                <OPTION  value="1" {{$complemento->duracion=='1'?'selected':''}}>1 año</OPTION>
                                                <OPTION  value="2" {{$complemento->duracion=='2'?'selected':''}}>2 años</OPTION>
                                                <OPTION  value="3" {{$complemento->duracion=='3'?'selected':''}}>3 años</OPTION>
                                                <OPTION  value="4" {{$complemento->duracion=='4'?'selected':''}}>4 años</OPTION>
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
                                        <input disabled type="number" name="gestion" id="gestion"  value="{{old('gestion',$complemento->gestion)}}" class="w-full bg-emerald-50 text-black border border-lime-900 rounded py-1 px-3 mb-1 ">
                                    </div>
                                </div>
                            {{-- </div>
                            <div class="bg-emerald-100 shadow-md rounded px-6 pt-2 pb-2 mb-4 flex flex-col"> --}}
                                <div class="-mx-3 md:flex mb-1">
                                    
                                    
                                    <div class="md:w-1/6 px-3">
                                        <label class="uppercase tracking-wide text-black text-xs font-bold mb-2" for="cigari">
                                            CI Garante 1
                                        </label>
                                        <input type="hidden" name="id_gari" id="id_gari" value="{{old('id_gari',$complemento->id_gari)}}" >
                                        <input disabled type="text" name="cigari" id="cigari"  value="{{old('cigari',$garante1->ci)}}" onchange="buscagarByCI(1)" class="w-full bg-emerald-50 text-black border border-lime-900 rounded py-1 px-3 mb-1 ">
                                    </div>
                                    <div class="md:w-2/6 px-3">
                                        <label class="uppercase tracking-wide text-black text-xs font-bold mb-2" for="nombregari">
                                            Nombre Garante 1
                                        </label>
                                        <input type="text" readonly name="nombregari" id="nombregari" value="{{old('nombregari',$garante1->nombres.' '.$garante1->a_paterno.' '.$garante1->a_materno)}}" class="w-full bg-emerald-50 text-black border border-lime-900 rounded py-1 px-3 mb-1 ">
                                    </div>
                                    <div class="md:w-1/6 px-3">
                                        <label class="uppercase tracking-wide text-black text-xs font-bold mb-2" for="cigarii">
                                            CI Garante 2
                                        </label>
                                        <input type="hidden"  name="id_garii" id="id_garii" value="{{old('id_garii',$complemento->id_garii)}}" >
                                        <input readonly type="text" name="cigarii" id="cigarii" onchange="buscagarByCI(2)" value="{{old('cigarii',$garante2->ci)}}" class="w-full bg-emerald-50 text-black border border-lime-900 rounded py-1 px-3 mb-1 ">
                                    </div>
                                    <div class="md:w-2/6 px-3">
                                        <label class="uppercase tracking-wide text-black text-xs font-bold mb-2" for="nombregarii">
                                            Nombre Garante 2
                                        </label>
                                        <input disabled type="text" name="nombregarii" id="nombregarii" value="{{old('nombregarii',$garante2->nombres.' '.$garante2->a_paterno.' '.$garante2->a_materno)}}" class="w-full bg-emerald-50 text-black border border-lime-900 rounded py-1 px-3 mb-1 ">
                                    </div>
                                    
                                </div>
                                
                            </div>
                            
                        </div>
                    @endif    
                        <div class=" w-full text-right justify-items-end">
                            <x-primary-button class="justify-center w-1/4 bg-blue-800 text-white">Guardar Cambios </x-primary-button>
                        </div>
                        {{-- <button>
                            Enviar
                        </button> --}}
                    </form>
                
                </div>
                <div class=" flex mb-4">
                    <div class="md:w-1/4 px-2" >
                        @if($contrato->id_esco == '1' && $contrato->id_tic!=9)
                            <x-nav-link :href="route('requerimiento.newadenda',$contrato)" class="bg-blue-700 text-white px-3 py-1 rounded-full">
                                Adenda
                            </x-nav-link>
                        @endif
                    </div>
                    <div class="md:w-1/4 px-2" >
                       
                    </div>
                    <div class="md:w-1/4 px-2" >
                    </div>

                </div>   
            </div>
        </div>
    </div>
    @if (isset($yoAutoridad) && $nofirme)       
        <div x-data="{ 'showModal': false }"
            @keydown.escape="showModal = false"
            >
            <!-- Trigger for Modal -->

            <button class=" p-1 rounded bg-blue-600 text-blue-50 font-extrabold" type="button" @click="showModal = true">
                Registrar Firma
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
                        <h5 class="mr-3 text-black max-w-none">Registrar firma</h5>

                        <button type="button" class="z-50 cursor-pointer" @click="showModal = false">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>

                    <!-- content -->
                    <form action="{{route('vobofirma.store')}}" method="POST">
                        @csrf
                        <input type="hidden" name="id_con" value="{{$contrato->id_con}}" >
                        <input type="hidden" name="id_au" value="{{$yoAutoridad->id}}" >
                        <div class="-mx-3 md:flex mb-6">
                            
                            <div class="md:w-11/12 px-3">
                                <label class="tracking-wide text-black text-xs font-bold mb-2"
                                                    for="observaciones">
                                                    Observaciones
                                                </label>
                                                <textarea type="text" name="observaciones" id="observaciones"  
                                                    class="w-full bg-emerald-50 text-black border border-lime-900 rounded py-1 px-3 mb-1">    
                                                </textarea>
                            </div>  
                        </div>
                        <button class="bg-blue-200 text-blue-900 px-3 py-1 rounded-full">Firmar</button>              
                    </form>
                </div>
            </div>
        </div>      
    @endif     
         
</x-app-layout>

