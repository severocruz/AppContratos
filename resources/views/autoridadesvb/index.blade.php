<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Autoridades Ejecutivas
        </h2>
    </x-slot>
    {{-- @dump($personalList->all()[5]->estadoPersonal->esper) --}}
    
    <div class="py-3 px-0">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-emerald-100 dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-3 text-gray-900 dark:text-gray-100">
                    <div class="flex-row">
                        <div class="flex-col ">
                            {{-- <x-nav-link
                            :href="route('docadjunto.new')"
                            >
                            Nuevo Documento Adjunto
                            </x-nav-link> --}}
                        </div>
                        
                        
                    </div>
                </div>
            </div>
           
            {{-- start table --}}
            <section class="container px-0 mx-auto">
                <div class="flex flex-col">
                    <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                        <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
                            {{-- <form action="{{route('centrodesalud.update',$autoridades)}}" method="POST"> --}}
                            <form action="{{route('autoridadvb.store')}}" method="POST">
                                @csrf 
                                <input type="hidden" id="gestion_au" name="gestion_au" value="{{$autoridades->first()->gestion_au}}">
                                
                                @foreach($autoridades as $autoridad)
                                <input type="hidden" name="orden{{$autoridad->orden}}" value="{{$autoridad->orden}}">
                                <input type="hidden" name="img_firma{{$autoridad->orden}}" value="{{$autoridad->img_firma}}">
                                    <div class="bg-emerald-100 shadow-md rounded px-2 pt-1 pb-2 mb-2 flex flex-col">
                                        
                                        <div class="-mx-3 md:flex mb-1">
                                            <div class="md:w-2/5 px-3 mb-1 md:mb-0">
        
                                                <input onchange="habilitar()" required type="text" name="cargo{{$autoridad->orden}}" id="cargo{{$autoridad->orden}}"  value="{{$autoridad->cargo}}"
                                                      class=" text-sm w-full bg-emerald-50 text-black border border-lime-900 rounded py-1 px-3 mb-1">
                                                      <x-input-error :messages="$errors->get('cargo'.$autoridad->orden)" />
                                            </div>
                                            <div class="md:w-1/5 px-3">
        
                                                <input onchange="habilitar()" required  type="text" name="nombre{{$autoridad->orden}}" id="nombre{{$autoridad->orden}}"  
                                                value="{{$autoridad->nombre}}"  class=" w-full bg-emerald-50 text-black border border-lime-900 rounded py-1 px-3 mb-1">
                                                <x-input-error :messages="$errors->get('nombre'.$autoridad->orden)" />
                                            </div>   
                                            
                                                    <select onchange="habilitar()" required id="id_us{{$autoridad->orden}}" name="id_us{{$autoridad->orden}}" class="sel bg-emerald-50 border border-lime-900 text-black text-md py-2 px-4 pr-8 mb-2 rounded">
                                                            
                                                                @foreach ($users as $us)
                                                                    <OPTION value="{{$us->id}}" {{$us->id==$autoridad->id_us?'selected':''}}>{{$us->nombres.' '.$us->a_paterno.' '.$us->a_materno}}</OPTION>
                                                                @endforeach
                                                    </select>

                                                     <x-input-error :messages="$errors->get('id_us'.$autoridad->orden)"/>
                                            <div class="md:w-1/5 px-3">
                                                    <img src="{{'/storage/firmas/'.$autoridad->img_firma}}" width="100" height="50">
                                                    
                                            </div>
                                            <div class="md:w-1/5 px-3">
                                                <x-nav-link :href="route('autoridadvb.edit',$autoridad)">
                                                    Cambiar<br>firma
                                                </x-nav-link>
                                            </div>
                                        </div>
                                    
                                    </div>

                                   
                                @endforeach
                               
                                <x-primary-button disabled=true id="btnGuardar">Guardar cambios</x-primary-button>
                                {{-- <button>
                                    Enviar
                                </button> --}}
                            </form>
                        </div>
                    </div>
                </div>
            </section>
            {{-- finish table --}}

        </div>
    </div>
</x-app-layout>
<script>
    $(document).ready(function() {
        $('.sel').select2();
    });
    function habilitar() {
        
        var boton = document.getElementById('btnGuardar');
        boton.disabled=false;
        
    }
</script>


