<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Editar Centro de Trabajo
        </h2>
    </x-slot>

    <div class="py-3 px-0">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="px-0 py-4 text-gray-900 dark:text-gray-100">
                    {{-- @dump(old()) --}}
                    
                    <form action="{{route('centrodesalud.update',$centroDeSalud)}}" method="POST">
                        @csrf @method('PUT')
                        <input type="hidden" name="id_cs" id="id_cs" value="{{old('id_cs',$centroDeSalud->id_cs)}}" >
                        <div class="bg-emerald-100 shadow-md rounded px-8 pt-6 pb-8 mb-4 flex flex-col">
                            
                            <div class="-mx-3 md:flex mb-1">
                                <div class="md:w-1/3 px-3 mb-1 md:mb-0">

                                    <label class="uppercase tracking-wide text-black text-xs font-bold mb-2"
                                        for="codigo_cs">
                                        Codigo
                                    </label>
                                    <input type="text" name="codigo_cs" id="codigo_cs"  value="{{old('codigo_cs',$centroDeSalud->codigo_cs)}}"
                                        class=" w-full bg-emerald-50 text-black border border-lime-900 rounded py-1 px-3 mb-1">
                                    <x-input-error :messages="$errors->get('codigo_cs')" />
                                        

                                </div>
                                <div class="md:w-2/3 px-3">

                                    <label class="uppercase tracking-wide text-black text-xs font-bold mb-2"
                                        for="nombre_cs">
                                        Nombre del Centro de Trabajo
                                    </label>
                                    <input type="text" name="nombre_cs" id="nombre_cs"  value="{{old('nombre_cs',$centroDeSalud->nombre_cs)}}"
                                        class=" w-full bg-emerald-50 text-black border border-lime-900 rounded py-1 px-3 mb-1">
                                    <x-input-error :messages="$errors->get('nombre_cs')" />

                                </div>
                        
                            </div>
                            <div class="-mx-3 md:flex mb-1">
                               
                                <div class="md:w-1/3 px-3">
                                    <label class="uppercase tracking-wide text-black text-xs font-bold mb-2" for="idcargos_encs">
                                        Cargo del/la encargado/a
                                    </label>
                                    <div>
                                        <select name="idcargos_encs" id="idcargos_encs"
                                            class="w-full bg-emerald-50 border border-lime-900 text-black text-md py-2 px-4 pr-8 mb-2 rounded">
                                            <OPTION selected disabled>Elija un cargo</OPTION>
                                            @foreach ($cargos as $item)
                                                <OPTION value="{{$item->idcargos_encs}}" {{old('idcargos_encs',$centroDeSalud->idcargos_encs)==$item->idcargos_encs?'selected':''}} >{{$item->cargo}}</OPTION>
                                            @endforeach
                                            
                                        </select>
                                        <x-input-error :messages="$errors->get('idcargos_encs')" />
                                    </div>
                                </div>
                                <div class="md:w-2/3 px-3 mb-1 md:mb-0">
                                    <label class="uppercase tracking-wide text-black text-xs font-bold mb-2" for="nombre_enc">
                                        Nombre del encargado
                                    </label>
                                    <input type="text" name="nombre_enc" id="nombre_enc"  value="{{old('nombre_enc',$centroDeSalud->nombre_enc)}}"
                                        class="w-full bg-emerald-50 text-black border border-lime-900 rounded py-1 px-3 mb-1">
                                        <x-input-error :messages="$errors->get('nombre_enc')" />
                                </div>
                            </div>
                          
                            
                            <div class="-mx-3 md:flex mb-1">
                                <div class="md:w-1/3 px-3 mb-1 md:mb-0 ">
                                   
                                </div>
                                <div class="md:w-2/3 px-3 mb-1 md:mb-0 ">
                                    <label for="telefonos" class="uppercase tracking-wide text-black text-xs font-bold mb-2">
                                        {{__('Phone')}}s
                                    </label>
                                    <input type="text" name="telefonos" id="telefonos" value="{{old('telefonos',$centroDeSalud->telefonos)}}" class="w-full bg-emerald-50 text-black border border-lime-900 rounded py-1 px-3 mb-1">
                                    <x-input-error :messages="$errors->get('telefonos')" />
                                </div>
                                
                            </div>
                        </div>
                        
                        <x-primary-button>Guardar cambios</x-primary-button>
                        {{-- <button>
                            Enviar
                        </button> --}}
                    </form>
                    
                        
                    
</x-app-layout>
