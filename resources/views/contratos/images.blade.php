<x-app-layout>
    
    <x-slot name="header">
        <h2 class=" h-auto font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Imagenes del contrato: {{$contrato->noCon}}&nbsp;de fecha&nbsp;
            {{date_format (date_create($contrato->fechaIni),"d/m/Y").' al '.date_format (date_create($contrato->fechaFin),"d/m/Y")}}
            
        </h2>
    </x-slot>
        <!-- content -->
        <form action="{{route('imagencontrato.store')}}" method="POST" enctype="multipart/form-data">
            @csrf @method('POST')
            <input type="hidden" name="id_con" value="{{$contrato->id_con}}" >
            <div class="-mx-3 md:flex mb-6 mt-6">
            
                <div class="md:w-2/4 px-3">
                    <div class="flex flex-col flex-grow mb-3">
                        <div x-data="{ files: null }" id="FileUpload" class="block w-full py-2 px-3 relative bg-white appearance-none border-2 border-gray-300 border-solid rounded-md hover:shadow-outline-gray">
                            <input type="file" name="imagencontrato" accept="image/*"
                                class="absolute inset-0 z-50 m-0 p-0 w-full h-full outline-none opacity-0"
                                x-on:change="files = $event.target.files; console.log($event.target.files);"
                                x-on:dragover="$el.classList.add('active')" x-on:dragleave="$el.classList.remove('active')" x-on:drop="$el.classList.remove('active')"
                            >
                            <x-input-error :messages="$errors->get('imagen')" />
                            <template x-if="files !== null">
                                <div class="flex flex-col space-y-1">
                                    <template x-for="(_,index) in Array.from({ length: files.length })">
                                        <div class="flex flex-row items-center space-x-2">
                                            <template x-if="files[index].type.includes('audio/')"><i class="far fa-file-audio fa-fw"></i></template>
                                            <template x-if="files[index].type.includes('application/')"><i class="far fa-file-alt fa-fw"></i></template>
                                            <template x-if="files[index].type.includes('image/')"><i class="far fa-file-image fa-fw"></i></template>
                                            <template x-if="files[index].type.includes('video/')"><i class="far fa-file-video fa-fw"></i></template>
                                            <span class="font-medium text-gray-900" x-text="files[index].name">Uploading</span>
                                            <span class="text-xs self-end text-gray-500" x-text="filesize(files[index].size)">...</span>
                                        </div>
                                    </template>
                                </div>
                            </template>
                            <template x-if="files === null">
                                <div class="flex flex-col space-y-2 items-center justify-center">
                                    <i class="fas fa-cloud-upload-alt fa-3x text-currentColor"></i>
                                    <p class="text-gray-700">Arrastre sus archivos aquí o haga clic en esta área.</p>
                                    <a href="javascript:void(0)" class="flex items-center mx-auto py-2 px-4 text-white text-center font-medium border border-transparent rounded-md outline-none bg-red-700">Elija un Archivo</a>
                                </div>
                            </template>
                        </div>
                    </div>
                </div>
                <div class="md:w-1/4 px-3">
                    <label class="uppercase tracking-wide text-black text-xs font-bold mb-2"
                                        for="detalle">
                                        Detalle
                                    </label>
                    <textarea name="detalle" id="detalle" >

                    </textarea>
                    <x-input-error :messages="$errors->get('detalle')" />
                </div>
                <div class="md:w-1/4 px-3">
                    <button class="bg-blue-200 text-blue-900 px-3 py-1 rounded-full">Agregar Archivo</button>              
                </div>
            </div>
        </form>

<div class="-mx-3 md:flex mb-6 mt-6">
    @foreach($imagenes as $imagen)    
    <div class="md:w-1/3 px-3" >
        <p class="uppercase tracking-wide text-black text-xs font-bold mb-2" >
            {{$imagen->detalle}}
       </p> 
        <x-nav-link
        :href="'/storage/contratos/'.$imagen->imagen" target="_blank">
            <img src="{{'/storage/contratos/'.$imagen->imagen}}" id="img{{$imagen->id}}" width="200" height="200" >
        </x-nav-link>
    </div>    
    @endforeach
</div>
</x-app-layout>

