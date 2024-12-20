{{-- hola edit
@dump($personal) --}}

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit personnel') }}
        </h2>
    </x-slot>
    <div class="flex-col ">
        <x-nav-link
        :href="route('curriculum.index',$personal)" target="_blank">
        Curriculum Vitae
        </x-nav-link>
        .::.
        
    </div>
    <div class="py-3 px-0">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="py-6 px-0 text-gray-900 dark:text-gray-100">
                    {{-- @dump($errors->get('a_paterno')) --}}
                    
                    <form action="{{route('personal.update',$personal)}}" method="POST" enctype="multipart/form-data" >
                        @csrf @method('PUT')
                        <div class="bg-emerald-100 shadow-md rounded px-4 pt-2 pb-2 mb-0 flex flex-col">
                            <div class="-mx-3 md:flex mb-1">
                                <div class="md:w-1/5 px-3 mb-6 md:mb-0">
                                </div>
                                <div class="md:w-2/4 px-3 mb-6 md:mb-0">
                                    <label class="uppercase block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="file_input"> 
                                        {{ __('Photo') }}
                                    </label>
                                    <input name="avatar" accept="image/*" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" aria-describedby="file_input_help" id="file_input" type="file">
                                    <p class="mt-1 text-sm text-gray-500 dark:text-gray-300" id="file_input_help">PNG, JPG {{__('or')}} GIF (MAX. 400x400px).</p>
                                </div>
                                <div class="md:w-1/4 px-3 mb-6 md:mb-0">
                                    <img class="object-cover w-32 h-32 rounded-full" src="{{old('foto',$personal->foto)?'/storage/fotos/'.old('foto',$personal->foto):'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSApLJxJLPubp4KuCafWl1G85OVieXwcG-11Q&usqp=CAU'}}" alt="">
                                </div>
                            </div>
                            <div class="-mx-3 md:flex mb-1">
                                <div class="md:w-1/3 px-3  md:mb-0">
                                    <label class="uppercase tracking-wide text-black text-xs font-bold mb-2"
                                        for="a_paterno">
                                        {{ __('Last name 1') }}
                                    </label>
                                    <input type="text" name="a_paterno" id="a_paterno"  value="{{old('a_paterno',$personal->a_paterno)}}"
                                        class="uppercase w-full bg-emerald-50 text-black border border-lime-900 rounded py-1 px-3 mb-1">
                                    <x-input-error :messages="$errors->get('a_paterno')" />
                                        

                                </div>
                                <div class="md:w-1/3 px-3">

                                    <label class="uppercase tracking-wide text-black text-xs font-bold mb-2"
                                        for="a_materno">
                                        {{ __('Last name 2') }}
                                    </label>
                                    <input type="text" name="a_materno" id="a_materno"  value="{{old('a_materno',$personal->a_materno)}}"
                                        class="uppercase w-full bg-emerald-50 text-black border border-lime-900 rounded py-1 px-3 mb-1">
                                    <x-input-error :messages="$errors->get('a_materno')" />

                                </div>
                                <div class="md:w-1/3 px-3 mb-6 md:mb-0">

                                    <label
                                        class="uppercase tracking-wide text-black text-xs font-bold mb-2"for="nombres">
                                        {{ __('Names') }}
                                    </label>
                                    <input type="text" name="nombres" id="nombres"  value="{{old('nombres',$personal->nombres)}}"
                                        class="uppercase w-full bg-emerald-50 text-black border border-lime-900 rounded py-1 px-3 mb-1">
                                    <x-input-error :messages="$errors->get('nombres')" />
                                </div>
                            </div>
                            <div class="-mx-3 md:flex mb-1">
                                <div class="md:w-1/3 px-3 mb-6 md:mb-0">
                                    <label class="uppercase tracking-wide text-black text-xs font-bold mb-2"for="CI">
                                        {{ __('CI') }}
                                    </label>
                                    <input type="text" name="CI" id="CI"  value="{{old('CI',$personal->CI)}}"
                                        class="w-full bg-emerald-50 text-black border border-lime-900 rounded py-1 px-3 mb-1">
                                    <x-input-error :messages="$errors->get('CI')" />
                                </div>
                                <div class="md:w-1/3 px-3">
                                    <label class="uppercase tracking-wide text-black text-xs font-bold mb-2" for="id_dep">
                                        {{ __('Issued in') }}
                                    </label>
                                    <div>
                                        <select name="id_dep" id="id_dep"
                                            class="w-full bg-emerald-50 border border-lime-900 text-black text-md py-2 px-4 pr-8 mb-2 rounded">
                                            
                                            @foreach ($departamentos as $item)
                                                <OPTION value="{{$item->id_dep}}" {{old('id_dep',$item->id_dep)==$personal->id_dep?'selected':''}} >{{$item->nombre}}</OPTION>
                                            @endforeach
                                            
                                        </select>
                                        <x-input-error :messages="$errors->get('id_dep')" />
                                    </div>
                                </div>
                                <div class="md:w-1/3 px-3 mb-6 md:mb-0">
                                    <label class="uppercase tracking-wide text-black text-xs font-bold mb-2" for="fecha_nac">
                                        {{ __('Birthdate') }}
                                    </label>
                                    <input type="date" name="fecha_nac" id="fecha_nac"  value="{{old('fecha_nac',$personal->fecha_nac)}}"
                                        class="w-full bg-emerald-50 text-black border border-lime-900 rounded py-1 px-3 mb-1">
                                        <x-input-error :messages="$errors->get('fecha_nac')" />
                                </div>
                            </div>
                            <div class="-mx-3 md:flex mb-1">
                                <div class="md:w-1/3 px-3 mb-6 md:mb-0">
                                    
                                        
                                        <label for="sexo" class="uppercase tracking-wide text-black text-xs font-bold mb-2">
                                            {{__('Gender')}}
                                        </label>
                                        
                                        <br>
                                        <label  class="tracking-wide text-black text-xs font-bold mb-2">
                                        <input type="radio" name="sexo" id="sexo1" value="M" {{$personal->sexo=='M'?'checked':''}} >
                                        {{-- <span class="check"></span> --}}
                                        <span class="caption">{{__('Male')}} </span>
                                        </label>
                                        <label  class="tracking-wide text-black text-xs font-bold mb-2">
                                        <input type="radio" name="sexo" id="sexo2" value="F" {{$personal->sexo=='F'?'checked':''}}>
                                        {{-- <span class="check"></span> --}}
                                        <span class="caption">{{__('Female')}}</span>
                                        </label>
                                        <x-input-error :messages="$errors->get('sexo')" />
                                </div>
                                <div class="md:w-1/3 px-3 mb-6 md:mb-0">
                                                                        
                                            <label for="id_afp" class="uppercase tracking-wide text-black text-xs font-bold mb-2">{{__('AFP Contributions')}}</label>
                                            <select id="id_afp" name="id_afp" class="w-full bg-emerald-50 border border-lime-900 text-black text-md py-2 px-4 pr-8 mb-2 rounded">
                                                    @foreach ($afps as $afp)
                                                        <OPTION value="{{$afp->id}}" {{old('id_afp',$afp->id)==$personal->id_afp?'selected':''}}>{{$afp->nombre}}</OPTION>
                                                    @endforeach
                                            </select>
                                            <x-input-error :messages="$errors->get('id_afp')"/>
                                </div>
                               
                            </div>
                            <div class="-mx-3 md:flex mb-4">
                                <div class="md:w-full px-3 mb-6 md:mb-0 ">
                                        
                                        <label for="est_civil" class="uppercase tracking-wide text-black text-xs font-bold mb-2" >
                                            {{__('Marital status')}} 
                                        </label>
                                        <br>
                                        <label  class="tracking-wide text-black text-xs font-bold mb-2">
                                        <input type="radio" name="est_civil" id="est_civil1" value="casado/a" {{$personal->est_civil=='casado/a'?'checked':''}}>
                                        <span class="caption">{{__('Married')}}</span>
                                        </label>
                                       
                                        <label  class="tracking-wide text-black text-xs font-bold mb-2">
                                        <input type="radio" name="est_civil" id="est_civil2" value="soltero/a" {{$personal->est_civil=='soltero/a'?'checked':''}}>
                                        <span class="caption">{{__('Single')}}</span>
                                        </label>
                                        
                                        <label  class="tracking-wide text-black text-xs font-bold mb-2">
                                        <input type="radio" name="est_civil" id="est_civil3" value="divorciado/a" {{$personal->est_civil=='divorciado/a'?'checked':''}}>
                                        <span class="caption">{{__('Divorced')}}</span>
                                        </label>                              
                                        
                                        <label  class="tracking-wide text-black text-xs font-bold mb-2">
                                        <input type="radio" name="est_civil" id="est_civil4" value="viudo/a" {{$personal->est_civil=='viudo/a'?'checked':''}}>
                                        <span class="caption">{{__('Widowed')}}</span>
                                        </label>

                                        <label  class="tracking-wide text-black text-xs font-bold mb-2">
                                        <input type="radio" name="est_civil" id="est_civil5" value="union-libre" {{$personal->est_civil=='union-libre'?'checked':''}}>
                                        <span class="caption">{{__('Union Free')}}</span>
                                        </label>
                                        <x-input-error :messages="$errors->get('est_civil')" />
                                </div>
                            </div>
                            <div class="-mx-3 md:flex mb-1">
                                <div class="md:w-full px-3 mb-6 md:mb-0 ">
                                <h1 class="uppercase tracking-wide text-black text-xs font-bold mb-2">{{__('Address')}}</h1>
                                </div>
                            </div>
                            <div class="-mx-3 md:flex mb-1">
                                <div class="md:w-1/3 px-3 mb-6 md:mb-0 ">
                                    <label for="localidad" class="uppercase tracking-wide text-black text-xs font-bold mb-2" >
                                        Localidad:
                                    </label>
                                    <input type="text" name="localidad" id="localidad" value="{{old('localidad',$personal->localidad)}}" class="w-full bg-emerald-50 text-black border border-lime-900 rounded py-1 px-3 mb-1">
                                    <x-input-error :messages="$errors->get('localidad')" />                                    
                                </div>
                                <div class="md:w-2/3 px-3 mb-6 md:mb-0 ">
                                    <label for="direccion" class="uppercase tracking-wide text-black text-xs font-bold mb-2" >
                                        Zona/Barrio:
                                    </label>
                                    <input type="text" name="direccion" id="direccion" value="{{old('direccion',$personal->direccion)}}" class="w-full bg-emerald-50 text-black border border-lime-900 rounded py-1 px-3 mb-1">
                                    <x-input-error :messages="$errors->get('direccion')" />                                    
                                </div>
                            </div>
                            <div class="-mx-3 md:flex mb-1">
                                <div class="md:w-2/3 px-3 mb-6 md:mb-0 ">
                                    <label for="calle" class="uppercase tracking-wide text-black text-xs font-bold mb-2" >
                                        Calle:
                                    </label>
                                    <input type="text" name="calle" id="calle" value="{{old('calle',$personal->calle)}}" class="w-full bg-emerald-50 text-black border border-lime-900 rounded py-1 px-3 mb-1">
                                    <x-input-error :messages="$errors->get('calle')" />
                                </div>
                                <div class="md:w-1/3 px-3 mb-6 md:mb-0 ">
                                    <label for="No" class="uppercase tracking-wide text-black text-xs font-bold mb-2" >
                                        Número de Puerta:
                                    </label>
                                     <input type="text" name="No" id="No" value="{{old('No',$personal->No)}}" class="w-full bg-emerald-50 text-black border border-lime-900 rounded py-1 px-3 mb-1">
                                    <x-input-error :messages="$errors->get('No')" />
                                </div>
                            </div>
                            <div class="-mx-3 md:flex mb-1">
                                <div class="md:w-1/3 px-3 mb-6 md:mb-0 ">
                                    <label for="telefono" class="uppercase tracking-wide text-black text-xs font-bold mb-2">
                                        {{__('Phone')}}s
                                    </label>
                                    <input type="text" name="telefono" id="telefono" value="{{old('telefono',$personal->telefono)}}" class="w-full bg-emerald-50 text-black border border-lime-900 rounded py-1 px-3 mb-1">
                                    <x-input-error :messages="$errors->get('telefono')" />
                                </div>
                                <div class="md:w-1/3 px-3 mb-6 md:mb-0 ">
                                    <label for="email" class="uppercase tracking-wide text-black text-xs font-bold mb-2">
                                        {{__('Email')}}
                                    </label>
                                    <input type="email" name="email" id="email" value="{{old('email',$personal->email)}}" class="w-full bg-emerald-50 text-black border border-lime-900 rounded py-1 px-3 mb-1">
                                    <x-input-error :messages="$errors->get('email')" />
                                </div>
                            </div>
                        </div>
                        <div class=" w-full text-right justify-items-end">
                            <x-primary-button>Guardar Cambios</x-primary-button>
                        </div>
                        {{-- <button>
                            Enviar
                        </button> --}}
                    </form>
                </div>    
            </div>  
        </div>        
    </div>   
    
    {{-- @if (isset($yoAutoridad) && $nofirme)        --}}
    <div x-data="{ 'showModal': false }"
        @keydown.escape="showModal = false"
        >
        <!-- Trigger for Modal -->

        <button class=" p-1 rounded bg-blue-600 text-blue-50 font-extrabold" type="button" @click="showModal = true">
             File Personal
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
                    <h5 class="mr-3 text-black max-w-none">File Personal</h5>

                    <button type="button" class="z-50 cursor-pointer" @click="showModal = false">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>

                <!-- content -->
                <form action="{{route('fileper.store')}}" method="POST">
                    @csrf
                    <input type="hidden" name="id_per" value="{{$personal->id_per}}" >
                    
                    <div class="-mx-3 md:flex mb-6">
                        <div class="md:w-1/3 px-3 mb-6 md:mb-0 ">
                            <label for="email" class="uppercase tracking-wide text-black text-xs font-bold mb-2">
                                Número
                            </label>
                            <input type="nombre" required name="nombre" id="nombre" value="{{isset($filePer)?$filePer->nombre:''}}"
                             class="w-full bg-emerald-50 text-black border border-lime-900 rounded py-1 px-3 mb-1">
                            <x-input-error :messages="$errors->get('nombre')" />
                        </div>
                        <div class="md:w-11/12 px-3">
                            <label class="tracking-wide text-black text-xs font-bold mb-2"
                                                for="ubicacion_fisica">
                                                Ubicacion Física
                                            </label>
                                            <textarea type="text" name="ubicacion_fisica" id="ubicacion_fisica"  required
                                                class="w-full bg-emerald-50 text-black border border-lime-900 rounded py-1 px-3 mb-1">    
                                                {{isset($filePer)?$filePer->ubicacion_fisica:''}}
                                            </textarea>
                        </div>  
                    </div>
                    <button class="bg-blue-200 text-blue-900 px-3 py-1 rounded-full">Guardar</button>              
                </form>
            </div>
        </div>
    </div>      
{{-- @endif  --}}
</x-app-layout>
