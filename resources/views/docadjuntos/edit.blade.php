<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Editar Documento Adjunto
        </h2>
    </x-slot>

    <div class="py-3 px-0">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="px-0 py-4 text-gray-900 dark:text-gray-100">
                    {{-- @dump(old()) --}}
                    
                    <form action="{{route('docadjunto.update',$adjunto)}}" method="POST">
                        @csrf @method('PUT')
                        <input type="hidden" name="id_adj" id="id_adj" value="{{old('id',$adjunto->id_adj)}}" >
                        <div class="bg-emerald-100 shadow-md rounded px-8 pt-6 pb-8 mb-4 flex flex-col">
                            
                            <div class="-mx-3 md:flex mb-1">
                                <div class="md:w-11/12 px-3 mb-1 md:mb-0">

                                    <label class="uppercase tracking-wide text-black text-xs font-bold mb-2"
                                        for="documento">
                                        Documento
                                    </label>
                                    <input type="text" name="documento" id="documento"  value="{{old('documento',$adjunto->documento)}}"
                                        class="w-full bg-emerald-50 text-black border border-lime-900 rounded py-1 px-3 mb-1">
                                    <x-input-error :messages="$errors->get('documento')" />
                                        
                                </div>
                            </div>
                            <div class="-mx-3 md:flex mb-1">
                                <div class="md:w-11/12 px-3">

                                    <label class="uppercase tracking-wide text-black text-xs font-bold mb-2"
                                        for="descripcion">
                                        Descripción
                                    </label>
                                    <textarea  name="descripcion" id="descripcion"  
                                        class=" w-full bg-emerald-50 text-black border border-lime-900 rounded py-1 px-3 mb-1">
                                        {{old('descripcion',$adjunto->descripcion)}}
                                    </textarea>
                                    <x-input-error :messages="$errors->get('descripcion')" />

                                </div>
                        
                            </div>
                        </div>
                        
                        <x-primary-button>Guardar cambios</x-primary-button>
                        {{-- <button>
                            Enviar
                        </button> --}}
                    </form>
                    
                        
                    
</x-app-layout>
