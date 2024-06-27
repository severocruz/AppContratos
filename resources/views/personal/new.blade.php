<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('New personnel') }}
        </h2>
    </x-slot>

    <div class="py-3 px-0">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{-- @dump(old()) --}}
                    
                    <form action="{{route('personal.store')}}" method="POST" enctype="multipart/form-data" >
                        @csrf
                        <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4 flex flex-col">
                            <div class="-mx-3 md:flex mb-6">
                                <div class="md:w-1/4 px-3 mb-6 md:mb-0">
                                </div>
                                <div class="md:w-2/4 px-3 mb-6 md:mb-0">
                                    <label class="uppercase block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="file_input"> 
                                        {{ __('Photo') }}
                                    </label>
                                    <input name="avatar" accept="image/*" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" aria-describedby="file_input_help" id="file_input" type="file">
                                    <p class="mt-1 text-sm text-gray-500 dark:text-gray-300" id="file_input_help">PNG, JPG {{__('or')}} GIF (MAX. 400x400px).</p>
                                </div>
                            </div>
                            <div class="-mx-3 md:flex mb-6">
                                <div class="md:w-1/3 px-3 mb-6 md:mb-0">

                                    <label class="uppercase tracking-wide text-black text-xs font-bold mb-2"
                                        for="a_paterno">
                                        {{ __('Last name 1') }}
                                    </label>
                                    <input type="text" name="a_paterno" id="a_paterno"  value="{{old('a_paterno')}}"
                                        class="uppercase w-full bg-gray-200 text-black border border-gray-200 rounded py-3 px-4 mb-3">
                                    <x-input-error :messages="$errors->get('a_paterno')" />
                                        

                                </div>
                                <div class="md:w-1/3 px-3">

                                    <label class="uppercase tracking-wide text-black text-xs font-bold mb-2"
                                        for="a_materno">
                                        {{ __('Last name 2') }}
                                    </label>
                                    <input type="text" name="a_materno" id="a_materno"  value="{{old('a_materno')}}"
                                        class="uppercase w-full bg-gray-200 text-black border border-gray-200 rounded py-3 px-4 mb-3">
                                    <x-input-error :messages="$errors->get('a_materno')" />

                                </div>
                                <div class="md:w-1/3 px-3 mb-6 md:mb-0">

                                    <label
                                        class="uppercase tracking-wide text-black text-xs font-bold mb-2"for="nombres">
                                        {{ __('Names') }}
                                    </label>
                                    <input type="text" name="nombres" id="nombres"  value="{{old('nombres')}}"
                                        class="uppercase w-full bg-gray-200 text-black border border-gray-200 rounded py-3 px-4 mb-3">
                                    <x-input-error :messages="$errors->get('nombres')" />
                                </div>
                            </div>
                            <div class="-mx-3 md:flex mb-6">
                                <div class="md:w-1/3 px-3 mb-6 md:mb-0">
                                    <label class="uppercase tracking-wide text-black text-xs font-bold mb-2"for="CI">
                                        {{ __('CI') }}
                                    </label>
                                    <input type="text" name="CI" id="CI"  value="{{old('CI')}}"
                                        class="w-full bg-gray-200 text-black border border-gray-200 rounded py-3 px-4 mb-3">
                                    <x-input-error :messages="$errors->get('CI')" />
                                </div>
                                <div class="md:w-1/3 px-3">
                                    <label class="uppercase tracking-wide text-black text-xs font-bold mb-2" for="id_dep">
                                        {{ __('Issued in') }}
                                    </label>
                                    <div>
                                        <select name="id_dep" id="id_dep"
                                            class="w-full bg-gray-200 border border-gray-200 text-black text-xs py-3 px-4 pr-8 mb-3 rounded">
                                            <OPTION selected disabled>{{__('Choose a department')}}</OPTION>
                                            @foreach ($departamentos as $item)
                                                <OPTION value="{{$item->id_dep}}" {{old('id_dep')==$item->id_dep?'selected':''}} >{{$item->nombre}}</OPTION>
                                            @endforeach
                                            
                                        </select>
                                        <x-input-error :messages="$errors->get('id_dep')" />
                                    </div>
                                </div>
                                <div class="md:w-1/3 px-3 mb-6 md:mb-0">
                                    <label class="uppercase tracking-wide text-black text-xs font-bold mb-2" for="fecha_nac">
                                        {{ __('Birthdate') }}
                                    </label>
                                    <input type="date" name="fecha_nac" id="fecha_nac"  value="{{old('fecha_nac')}}"
                                        class="w-full bg-gray-200 text-black border border-gray-200 rounded py-3 px-4 mb-3">
                                        <x-input-error :messages="$errors->get('fecha_nac')" />
                                </div>
                            </div>
                            <div class="-mx-3 md:flex mb-6">
                                <div class="md:w-1/3 px-3 mb-6 md:mb-0">
                                    
                                        
                                        <label for="sexo" class="uppercase tracking-wide text-black text-xs font-bold mb-2">
                                            {{__('Gender')}}
                                        </label>
                                        
                                        <br>
                                        <label  class="tracking-wide text-black text-xs font-bold mb-2">
                                        <input type="radio" name="sexo" id="sexo1" value="M" {{old('sexo')=='M'?'checked':''}}>
                                        {{-- <span class="check"></span> --}}
                                        <span class="caption">{{__('Male')}} </span>
                                        </label>
                                        <label  class="tracking-wide text-black text-xs font-bold mb-2">
                                        <input type="radio" name="sexo" id="sexo2" value="F" {{old('sexo')=='F'?'checked':''}}>
                                        {{-- <span class="check"></span> --}}
                                        <span class="caption">{{__('Female')}}</span>
                                        </label>
                                        <x-input-error :messages="$errors->get('sexo')" />
                                </div>
                                <div class="md:w-1/3 px-3 mb-6 md:mb-0">
                                                                        
                                            <label for="id_afp" class="uppercase tracking-wide text-black text-xs font-bold mb-2">{{__('AFP Contributions')}}</label>
                                            <select id="id_afp" name="id_afp" class="w-full bg-gray-200 border border-gray-200 text-black text-xs py-3 px-4 pr-8 mb-3 rounded">
                                                <OPTION selected disabled>{{__('Choose a Afp')}}</OPTION>
                                                    @foreach ($afps as $afp)
                                                        <OPTION value="{{$afp->id}}" {{old('id_afp')==$afp->id?'selected':''}}>{{$afp->nombre}}</OPTION>
                                                    @endforeach
                                            </select>
                                            <x-input-error :messages="$errors->get('id_afp')"/>
                                </div>
                                {{-- <div class="md:w-1/3 px-3 mb-6 md:mb-0">
                                    
                                    <label class="uppercase tracking-wide text-black text-xs font-bold mb-2" for="matricula">
                                        {{__('Tuition')}}
                                    </label>
                                    <input type="text" name="matricula" id="matricula" value="{{old('matricula')}}" class="w-full bg-gray-200 text-black border border-gray-200 rounded py-3 px-4 mb-3" >
                                    
                                </div> --}}
                            </div>
                            <div class="-mx-3 md:flex mb-6">
                                <div class="md:w-full px-3 mb-6 md:mb-0 ">
                                        
                                        <label for="est_civil" class="uppercase tracking-wide text-black text-xs font-bold mb-2" >
                                            {{__('Marital status')}} 
                                        </label>
                                        <br>
                                        <label  class="tracking-wide text-black text-xs font-bold mb-2">
                                        <input type="radio" name="est_civil" id="est_civil1" value="casado/a" {{old('est_civil')=='casado/a'?'checked':''}}>
                                        <span class="caption">{{__('Married')}}</span>
                                        </label>
                                       
                                        <label  class="tracking-wide text-black text-xs font-bold mb-2">
                                        <input type="radio" name="est_civil" id="est_civil2" value="soltero/a" {{old('est_civil')=='soltero/a'?'checked':''}}>
                                        <span class="caption">{{__('Single')}}</span>
                                        </label>
                                        
                                        <label  class="tracking-wide text-black text-xs font-bold mb-2">
                                        <input type="radio" name="est_civil" id="est_civil3" value="divorciado/a" {{old('est_civil')=='divorciado/a'?'checked':''}}>
                                        <span class="caption">{{__('Divorced')}}</span>
                                        </label>                              
                                        
                                        <label  class="tracking-wide text-black text-xs font-bold mb-2">
                                        <input type="radio" name="est_civil" id="est_civil4" value="viudo/a" {{old('est_civil')=='viudo/a'?'checked':''}}>
                                        <span class="caption">{{__('Widowed')}}</span>
                                        </label>

                                        <label  class="tracking-wide text-black text-xs font-bold mb-2">
                                        <input type="radio" name="est_civil" id="est_civil5" value="union-libre" {{old('union-libre')=='casado/a'?'checked':''}}>
                                        <span class="caption">{{__('Union Free')}}</span>
                                        </label>
                                        <x-input-error :messages="$errors->get('est_civil')" />
                                </div>
                            </div>
                            <div class="-mx-3 md:flex mb-6">
                                <div class="md:w-full px-3 mb-6 md:mb-0 ">
                                <h1 class="uppercase tracking-wide text-black text-xs font-bold mb-2">{{__('Address')}}</h1>
                                </div>
                            </div>
                            <div class="-mx-3 md:flex mb-6">
                                <div class="md:w-1/3 px-3 mb-6 md:mb-0 ">
                                    <label for="localidad" class="uppercase tracking-wide text-black text-xs font-bold mb-2" >
                                        Localidad:
                                    </label>
                                    <input type="text" name="localidad" id="localidad" value="{{old('localidad')}}" class="w-full bg-gray-200 text-black border border-gray-200 rounded py-3 px-4 mb-3">
                                    <x-input-error :messages="$errors->get('localidad')" />                                    
                                </div>
                                <div class="md:w-2/3 px-3 mb-6 md:mb-0 ">
                                    <label for="direccion" class="uppercase tracking-wide text-black text-xs font-bold mb-2" >
                                        Zona/Barrio:
                                    </label>
                                    <input type="text" name="direccion" id="direccion" value="{{old('direccion')}}" class="w-full bg-gray-200 text-black border border-gray-200 rounded py-3 px-4 mb-3">
                                    <x-input-error :messages="$errors->get('direccion')" />                                    
                                </div>
                            </div>
                            <div class="-mx-3 md:flex mb-6">
                                <div class="md:w-2/3 px-3 mb-6 md:mb-0 ">
                                    <label for="calle" class="uppercase tracking-wide text-black text-xs font-bold mb-2" >
                                        Calle:
                                    </label>
                                    <input type="text" name="calle" id="calle" value="{{old('calle')}}" class="w-full bg-gray-200 text-black border border-gray-200 rounded py-3 px-4 mb-3">
                                    <x-input-error :messages="$errors->get('calle')" />
                                </div>
                                <div class="md:w-1/3 px-3 mb-6 md:mb-0 ">
                                    <label for="No" class="uppercase tracking-wide text-black text-xs font-bold mb-2" >
                                        Número de Puerta:
                                    </label>
                                     <input type="text" name="No" id="No" value="{{old('No')}}" class="w-full bg-gray-200 text-black border border-gray-200 rounded py-3 px-4 mb-3">
                                    <x-input-error :messages="$errors->get('No')" />
                                </div>
                            </div>
                            <div class="-mx-3 md:flex mb-6">
                                <div class="md:w-1/3 px-3 mb-6 md:mb-0 ">
                                    <label for="telefono" class="uppercase tracking-wide text-black text-xs font-bold mb-2">
                                        {{__('Phone')}}s
                                    </label>
                                    <input type="text" name="telefono" id="telefono" value="{{old('telefono')}}" class="w-full bg-gray-200 text-black border border-gray-200 rounded py-3 px-4 mb-3">
                                    <x-input-error :messages="$errors->get('telefono')" />
                                </div>
                                <div class="md:w-1/3 px-3 mb-6 md:mb-0 ">
                                    <label for="email" class="uppercase tracking-wide text-black text-xs font-bold mb-2">
                                        {{__('Email')}}
                                    </label>
                                    <input type="email" name="email" id="email" value="{{old('email')}}" class="w-full bg-gray-200 text-black border border-gray-200 rounded py-3 px-4 mb-3">
                                    <x-input-error :messages="$errors->get('email')" />
                                </div>
                            </div>
                        </div>
                        
                        <x-primary-button>Enviar</x-primary-button>
                        {{-- <button>
                            Enviar
                        </button> --}}
                    </form>
                    
                        
                    
</x-app-layout>
