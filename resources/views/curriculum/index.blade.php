<x-secondary-layout>
    
    <div class="bg-gray-200 shadow-md rounded px-4 pt-2 pb-2 mb-0 w-screen">
        <div class="-mx-3 md:flex mb-1">
            <div class="md:w-1/3 px-3 mb-6 md:mb-0">
            </div>
            <div class="md:w-1/3 px-3 mb-6 md:mb-0">
                <h1 style="text-justify" ><strong> CURRICULUM VITAE </strong></h1>
            </div>
            <div class="md:w-1/3 px-3 mb-6 md:mb-0">
            </div>
        </div>
        <div class="-mx-3 md:flex mb-1">
            <div class="md:w-1/3 px-3 mb-6 md:mb-0">
                <h3><strong> Nombre:</strong> {{$personal->nombres}} {{$personal->a_paterno}} {{$personal->a_materno}}</h3>
            </div>
        </div>
        <div class="-mx-3 md:flex mb-1">
            <div class="md:w-1/3 px-3 mb-6 md:mb-0">
                <h3><strong> CI:</strong> {{$personal->CI}}</h3>
            </div>
        </div>        
    </div>

<div class="bg-gray-100 shadow-md rounded px-4 pt-2 pb-2 mb-0 mt-6 ms-10 w-11/12">
      <!-- Accordion Item 1 -->
    <div class="border-b border-slate-200">
        <button onclick="toggleAccordion(1)" class="w-full flex justify-between items-center py-5 px-6 text-slate-800 bg-emerald-200">
        <span>FORMACIÓN ACADÉMICA</span>
        <span id="icon-1" class="text-slate-800 transition-transform duration-300">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor" class="w-4 h-4">
            <path fill-rule="evenodd" d="M11.78 9.78a.75.75 0 0 1-1.06 0L8 7.06 5.28 9.78a.75.75 0 0 1-1.06-1.06l3.25-3.25a.75.75 0 0 1 1.06 0l3.25 3.25a.75.75 0 0 1 0 1.06Z" clip-rule="evenodd" />
            </svg>
        </span>
        </button>
        <div id="content-1" class="max-h-0 overflow-hidden transition-all duration-300 ease-in-out">
        <div class="pb-5 text-sm text-slate-500">
            
            
        <div x-data="{ 'showModal': false }"
            @keydown.escape="showModal = false"
            >
            <!-- Trigger for Modal -->

            <button class=" p-1 m-2 rounded bg-blue-600 text-blue-50 font-extrabold" type="button" @click="showModal = true">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 10.5v6m3-3H9m4.06-7.19-2.12-2.12a1.5 1.5 0 0 0-1.061-.44H4.5A2.25 2.25 0 0 0 2.25 6v12a2.25 2.25 0 0 0 2.25 2.25h15A2.25 2.25 0 0 0 21.75 18V9a2.25 2.25 0 0 0-2.25-2.25h-5.379a1.5 1.5 0 0 1-1.06-.44Z" />
                </svg>               
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
                        <h5 class="mr-3 text-black max-w-none">FORMACION ACADEMICA </h5>

                        <button type="button" class="z-50 cursor-pointer" @click="showModal = false">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>

                    <!-- content -->
                    <form action="{{route('detallecurriculum.store')}}" method="POST">
                        @csrf
                        <input type="hidden" name="id_cv" value="{{$curriculum->id_cv}}" >
                        <input type="hidden" name="id_catcv" value="1" >
                        <div class="-mx-3 md:flex mb-2">
                            <div class="md:w-full px-3 mb-2 md:mb-0 ">
                                <label for="dato1" class="uppercase tracking-wide text-black text-xs font-bold mb-2">
                                    Grado obtenido
                                </label>
                                <input type="text" required name="dato1" id="dato1" value="{{old('dato1')}}"
                                class="w-full bg-emerald-50 text-black border border-lime-900 rounded py-1 px-3 mb-1">
                                <x-input-error :messages="$errors->get('dato1')" />
                            </div>
                        </div>
                        <div class="-mx-3 md:flex mb-2">    
                            <div class="md:w-full px-3 mb-2 md:mb-0 ">
                                <label for="dato2" class="uppercase tracking-wide text-black text-xs font-bold mb-2">
                                    Especialidad
                                </label>
                                <input type="text" required name="dato2" id="dato2" value="{{old('dato2')}}"
                                class="w-full bg-emerald-50 text-black border border-lime-900 rounded py-1 px-3 mb-1">
                                <x-input-error :messages="$errors->get('dato2')" />
                            </div>
                        </div>
                        <div class="-mx-3 md:flex mb-2">    
                            <div class="md:w-full px-3 mb-2 md:mb-0 ">
                                <label for="dato3" class="uppercase tracking-wide text-black text-xs font-bold mb-2">
                                    Institución
                                </label>
                                <input type="text" required name="dato3" id="dato3" value="{{old('dato3')}}"
                                class="w-full bg-emerald-50 text-black border border-lime-900 rounded py-1 px-3 mb-1">
                                <x-input-error :messages="$errors->get('dato3')" />
                            </div>
                        </div>
                        <div class="-mx-3 md:flex mb-2">    
                            <div class="md:w-full px-3 mb-2 md:mb-0 ">
                                <label for="dato4" class="uppercase tracking-wide text-black text-xs font-bold mb-2">
                                    Documento Obtenido
                                </label>
                                <input type="text" required name="dato4" id="dato4" value="{{old('dato4')}}"
                                class="w-full bg-emerald-50 text-black border border-lime-900 rounded py-1 px-3 mb-1">
                                <x-input-error :messages="$errors->get('dato4')" />
                            </div>
                        </div>
                        <div class="-mx-3 md:flex mb-2">    
                            <div class="md:w-full px-3 mb-2 md:mb-0 ">
                                <label for="dato5" class="uppercase tracking-wide text-black text-xs font-bold mb-2">
                                    Nro. de Documento
                                </label>
                                <input type="text" required name="dato5" id="dato5" value="{{old('dato5')}}"
                                class="w-full bg-emerald-50 text-black border border-lime-900 rounded py-1 px-3 mb-1">
                                <x-input-error :messages="$errors->get('dato5')" />
                            </div>
                        </div>
                        <div class="-mx-3 md:flex mb-2">    
                            <div class="md:w-full px-3 mb-2 md:mb-0 ">
                                <label for="dato6" class="uppercase tracking-wide text-black text-xs font-bold mb-2">
                                    Fecha de Emision
                                </label>
                                <input type="date" required name="dato6" id="dato6" value="{{old('dato6')}}"
                                class="w-full bg-emerald-50 text-black border border-lime-900 rounded py-1 px-3 mb-1">
                                <x-input-error :messages="$errors->get('dato6')" />
                            </div>
                        </div>
                        <button class="bg-blue-200 text-blue-900 px-3 py-1 rounded-full">Guardar</button>              
                    </form>
                </div>
            </div>
        </div>  
        <div class="overflow-x-auto border border-gray-200 dark:border-gray-700 md:rounded-lg">
            <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                <thead class="bg-gray-50 dark:bg-gray-800">
                    <tr>
                        <th scope="col" class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">
                            Título - Institución
                        </th>

                        <th scope="col" class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">
                            Documento
                        </th>
                        <th scope="col" class="relative py-3.5 px-4">
                            <span class="sr-only">Actions</span>
                        </th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200 dark:divide-gray-700 dark:bg-gray-900">
                @foreach($detalle as $item)
                    @if($item->id_catcv =='1')
                        <tr>
                            <td class="px-4 py-1 text-sm text-gray-500 dark:text-gray-300 whitespace-nowrap">
                                <div class="flex items-center gap-x-2">
                                    <div>
                                        <h2 class="text-md-center font-bold  text-gray-800 dark:text-white "> {{$item->dato1}}</h2>
                                        <p class="text-xs font-semibold text-gray-600 dark:text-gray-400">Especialidad: {{$item->dato2}}</p>
                                        <p class="text-xs font-semibold text-gray-600 dark:text-gray-400">{{$item->dato3}}</p>
                                    </div>
                                </div>
                            </td>
                            
                            <td class="px-4 py-4 text-sm font-medium text-gray-700 whitespace-nowrap">
                                <div>
                                    <h2 class="text-md-center font-bold  text-gray-800 dark:text-white "> {{$item->dato4}}  </h2>
                                    <p class="text-xs font-semibold text-gray-600 dark:text-gray-400">Nro. {{$item->dato5}} - Fecha: {{date_format (date_create($item->dato6),'d/m/Y')}}  </p>
                                </div>
                            </td>
                            <td class="px-4 py-4 text-sm whitespace-nowrap">
                                <div class="flex items-center gap-x-6">
                                    <x-dropdown >
                                        <x-slot name="trigger">
                                            <button class="w-6 h-6" >
                                                <svg  data-slot="icon" fill="none" stroke-width="1.5" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.75a.75.75 0 1 1 0-1.5.75.75 0 0 1 0 1.5ZM12 12.75a.75.75 0 1 1 0-1.5.75.75 0 0 1 0 1.5ZM12 18.75a.75.75 0 1 1 0-1.5.75.75 0 0 1 0 1.5Z"></path>
                                                </svg>
                                                
                                            </button>
                                        </x-slot>   
                                        <x-slot name="content">
                                            {{-- {{route('personal.edit',$person)}} --}}
                                            <x-dropdown-link href="{{route('imagencurriculum.index',$item)}}" target="_blank" onClick="window.open(this.href, this.target, 'width=500,height=500'); return false;"
                                            class="items-center text-gray-400 transition-colors duration-200 dark:hover:text-indigo-500 dark:text-gray-300 hover:text-indigo-900 focus:outline-none">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                                                </svg>
                                                Ver Imagenes
                                            </x-dropdown-link>
                                            <x-dropdown-link href="#" class="items-center  text-red-400 transition-colors duration-200 hover:text-red-700 focus:outline-none">
                                                <svg width="30" height="30" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M9 3L3 9M3 3L9 9" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                                </svg>
                                                Eliminar
                                            </x-dropdown-link>
                                        </x-slot>
                                    </x-dropdown>
                                    

                                    
                                </div>
                            </td>
                        </tr>
                    @endif
                @endforeach
        
                </tbody>
            </table>
        </div>
        </div>
        </div>
    </div>
   
  <!-- Accordion Item 2 -->
  <div class="border-b border-slate-200">
    <button onclick="toggleAccordion(2)" class="w-full flex justify-between items-center py-5 px-6 text-slate-800 bg-emerald-200"" >
      <span>EXPERIENCIA LABORAL</span>
      <span id="icon-2" class="text-slate-800 transition-transform duration-300">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor" class="w-4 h-4">
          <path fill-rule="evenodd" d="M11.78 9.78a.75.75 0 0 1-1.06 0L8 7.06 5.28 9.78a.75.75 0 0 1-1.06-1.06l3.25-3.25a.75.75 0 0 1 1.06 0l3.25 3.25a.75.75 0 0 1 0 1.06Z" clip-rule="evenodd" />
        </svg>
      </span>
    </button>
    <div id="content-2" class="max-h-0 overflow-hidden transition-all duration-300 ease-in-out">
      <div class="pb-5 text-sm text-slate-500">

    <div x-data="{ 'showModal': false }"
        @keydown.escape="showModal = false"
        >
        <!-- Trigger for Modal -->

        <button class=" p-1 m-2 rounded bg-blue-600 text-blue-50 font-extrabold" type="button" @click="showModal = true">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 10.5v6m3-3H9m4.06-7.19-2.12-2.12a1.5 1.5 0 0 0-1.061-.44H4.5A2.25 2.25 0 0 0 2.25 6v12a2.25 2.25 0 0 0 2.25 2.25h15A2.25 2.25 0 0 0 21.75 18V9a2.25 2.25 0 0 0-2.25-2.25h-5.379a1.5 1.5 0 0 1-1.06-.44Z" />
              </svg>               
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
                    <h5 class="mr-3 text-black max-w-none">EXPERIENCIA LABORAL </h5>

                    <button type="button" class="z-50 cursor-pointer" @click="showModal = false">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>

                <!-- content -->
                <form action="{{route('detallecurriculum.store')}}" method="POST">
                    @csrf
                    <input type="hidden" name="id_cv" value="{{$curriculum->id_cv}}" >
                    <input type="hidden" name="id_catcv" value="2" >
                    <div class="-mx-3 md:flex mb-2">
                        <div class="md:w-full px-3 mb-2 md:mb-0 ">
                            <label for="dato1" class="uppercase tracking-wide text-black text-xs font-bold mb-2">
                                Cargo
                            </label>
                            <input type="text" required name="dato1" id="dato1" value="{{old('dato1')}}"
                             class="w-full bg-emerald-50 text-black border border-lime-900 rounded py-1 px-3 mb-1">
                            <x-input-error :messages="$errors->get('dato1')" />
                        </div>
                    </div>
                    <div class="-mx-3 md:flex mb-2">    
                        <div class="md:w-full px-3 mb-2 md:mb-0 ">
                            <label for="dato2" class="uppercase tracking-wide text-black text-xs font-bold mb-2">
                                Motivo de Retiro
                            </label>
                            <input type="text" required name="dato2" id="dato2" value="{{old('dato2')}}"
                             class="w-full bg-emerald-50 text-black border border-lime-900 rounded py-1 px-3 mb-1">
                            <x-input-error :messages="$errors->get('dato2')" />
                        </div>
                    </div>
                    <div class="-mx-3 md:flex mb-2">    
                        <div class="md:w-full px-3 mb-2 md:mb-0 ">
                            <label for="dato3" class="uppercase tracking-wide text-black text-xs font-bold mb-2">
                                Institución
                            </label>
                            <input type="text" required name="dato3" id="dato3" value="{{old('dato3')}}"
                             class="w-full bg-emerald-50 text-black border border-lime-900 rounded py-1 px-3 mb-1">
                            <x-input-error :messages="$errors->get('dato3')" />
                        </div>
                    </div>
                    <div class="-mx-3 md:flex mb-2">    
                        <div class="md:w-full px-3 mb-2 md:mb-0 ">
                            <label for="dato4" class="uppercase tracking-wide text-black text-xs font-bold mb-2">
                                Fecha de Inicio
                            </label>
                            <input type="date" required name="dato4" id="dato4" value="{{old('dato4')}}"
                             class="w-full bg-emerald-50 text-black border border-lime-900 rounded py-1 px-3 mb-1">
                            <x-input-error :messages="$errors->get('dato4')" />
                        </div>
                    </div>
                    <div class="-mx-3 md:flex mb-2">    
                        <div class="md:w-full px-3 mb-2 md:mb-0 ">
                            <label for="dato5" class="uppercase tracking-wide text-black text-xs font-bold mb-2">
                                Fecha de Finalización
                            </label>
                            <input type="date" required name="dato5" id="dato5" value="{{old('dato5')}}"
                             class="w-full bg-emerald-50 text-black border border-lime-900 rounded py-1 px-3 mb-1">
                            <x-input-error :messages="$errors->get('dato5')" />
                        </div>
                    </div>
                    <div class="-mx-3 md:flex mb-2">    
                        <div class="md:w-full px-3 mb-2 md:mb-0 ">
                            <label for="dato6" class="uppercase tracking-wide text-black text-xs font-bold mb-2">
                                Documento de Respaldo
                            </label>
                            <input type="text" required name="dato6" id="dato6" value="{{old('dato6')}}"
                             class="w-full bg-emerald-50 text-black border border-lime-900 rounded py-1 px-3 mb-1">
                            <x-input-error :messages="$errors->get('dato6')" />
                        </div>
                    </div>
                    <button class="bg-blue-200 text-blue-900 px-3 py-1 rounded-full">Guardar</button>              
                </form>
            </div>
        </div>
    </div> 
    <div class="overflow-x-auto border border-gray-200 dark:border-gray-700 md:rounded-lg">
        <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
            <thead class="bg-gray-50 dark:bg-gray-800">
                <tr>
                    <th scope="col" class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">
                        Cargo - Institución
                    </th>

                    <th scope="col" class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">
                        Documento
                    </th>
                    <th scope="col" class="relative py-3.5 px-4">
                        <span class="sr-only">Actions</span>
                    </th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200 dark:divide-gray-700 dark:bg-gray-900">
            @foreach($detalle as $item)
                @if($item->id_catcv =='2')
                    <tr>
                        <td class="px-4 py-4 text-sm text-gray-500 dark:text-gray-300 whitespace-nowrap">
                            <div class="flex items-center gap-x-2">
                                <div>
                                    <h2 class="text-md-center font-bold  text-gray-800 dark:text-white "> {{$item->dato1}} &nbsp;&nbsp;-&nbsp;&nbsp; {{$item->dato3}}</h2>
                                    <p class="text-xs font-semibold text-gray-600 dark:text-gray-400">Motivo de Retiro: {{$item->dato2}}</p>
                                </div>
                            </div>
                        </td>
                        
                        <td class="px-4 py-4 text-sm font-medium text-gray-700 whitespace-nowrap">
                            <div>
                                <h2 class="text-md-center font-bold  text-gray-800 dark:text-white "> {{$item->dato6}}  </h2>
                                <p class="text-xs font-semibold text-gray-600 dark:text-gray-400">Entre el {{date_format (date_create($item->dato4),"d/m/Y")}} 
                                Hasta el: {{date_format (date_create($item->dato5),"d/m/Y")}}  </p>
                            </div>
                        </td>
                        <td class="px-4 py-4 text-sm whitespace-nowrap">
                            <div class="flex items-center gap-x-6">
                                <x-dropdown>
                                    <x-slot name="trigger">
                                        <button class="w-6 h-6" >
                                            <svg  data-slot="icon" fill="none" stroke-width="1.5" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.75a.75.75 0 1 1 0-1.5.75.75 0 0 1 0 1.5ZM12 12.75a.75.75 0 1 1 0-1.5.75.75 0 0 1 0 1.5ZM12 18.75a.75.75 0 1 1 0-1.5.75.75 0 0 1 0 1.5Z"></path>
                                            </svg>
                                            
                                        </button>
                                    </x-slot>   
                                    <x-slot name="content">
                                        {{-- {{route('personal.edit',$person)}} --}}
                                        <x-dropdown-link href="{{route('imagencurriculum.index',$item)}}" target="_blank" onClick="window.open(this.href, this.target, 'width=500,height=500'); return false;"
                                         class="items-center text-gray-400 transition-colors duration-200 dark:hover:text-indigo-500 dark:text-gray-300 hover:text-indigo-900 focus:outline-none">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                                            </svg>
                                            Ver Imagenes
                                        </x-dropdown-link>
                                        <x-dropdown-link href="#" class="items-center  text-red-400 transition-colors duration-200 hover:text-red-700 focus:outline-none">
                                            <svg width="30" height="30" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M9 3L3 9M3 3L9 9" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                            </svg>
                                            Eliminar
                                        </x-dropdown-link>
                                    </x-slot>
                                </x-dropdown>
                                

                                
                            </div>
                        </td>
                    </tr>
                @endif
            @endforeach
      
            </tbody>
        </table>
    </div>
      </div>
    </div>
  </div>
   
  <!-- Accordion Item 3 -->
  <div class="border-b border-slate-200">
    <button onclick="toggleAccordion(3)" class="w-full flex justify-between items-center py-5 px-6 text-slate-800 bg-emerald-200"">
      <span>CURSOS Y SEMINARIOS</span>
      <span id="icon-3" class="text-slate-800 transition-transform duration-300">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor" class="w-4 h-4">
          <path fill-rule="evenodd" d="M11.78 9.78a.75.75 0 0 1-1.06 0L8 7.06 5.28 9.78a.75.75 0 0 1-1.06-1.06l3.25-3.25a.75.75 0 0 1 1.06 0l3.25 3.25a.75.75 0 0 1 0 1.06Z" clip-rule="evenodd" />
        </svg>
      </span>
    </button>
    <div id="content-3" class="max-h-0 overflow-hidden transition-all duration-300 ease-in-out">
      <div class="pb-5 text-sm text-slate-500">
    <div x-data="{ 'showModal': false }"
        @keydown.escape="showModal = false"
        >
        <!-- Trigger for Modal -->

        <button class=" p-1 m-2 rounded bg-blue-600 text-blue-50 font-extrabold" type="button" @click="showModal = true">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 10.5v6m3-3H9m4.06-7.19-2.12-2.12a1.5 1.5 0 0 0-1.061-.44H4.5A2.25 2.25 0 0 0 2.25 6v12a2.25 2.25 0 0 0 2.25 2.25h15A2.25 2.25 0 0 0 21.75 18V9a2.25 2.25 0 0 0-2.25-2.25h-5.379a1.5 1.5 0 0 1-1.06-.44Z" />
              </svg>               
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
                    <h5 class="mr-3 text-black max-w-none">CURSOS Y SEMINARIOS </h5>

                    <button type="button" class="z-50 cursor-pointer" @click="showModal = false">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>

                <!-- content -->
                <form action="{{route('detallecurriculum.store')}}" method="POST">
                    @csrf
                    <input type="hidden" name="id_cv" value="{{$curriculum->id_cv}}" >
                    <input type="hidden" name="id_catcv" value="3" >
                    <div class="-mx-3 md:flex mb-2">
                        <div class="md:w-full px-3 mb-2 md:mb-0 ">
                            <label for="dato1" class="uppercase tracking-wide text-black text-xs font-bold mb-2">
                                Nombre del Curso o Seminario
                            </label>
                            <input type="text" required name="dato1" id="dato1" value="{{old('dato1')}}"
                             class="w-full bg-emerald-50 text-black border border-lime-900 rounded py-1 px-3 mb-1">
                            <x-input-error :messages="$errors->get('dato1')" />
                        </div>
                    </div>
                    <div class="-mx-3 md:flex mb-2">    
                        <div class="md:w-full px-3 mb-2 md:mb-0 ">
                            <label for="dato2" class="uppercase tracking-wide text-black text-xs font-bold mb-2">
                                Duración en Horas
                            </label>
                            <input type="text" required name="dato2" id="dato2" value="{{old('dato2')}}"
                             class="w-full bg-emerald-50 text-black border border-lime-900 rounded py-1 px-3 mb-1">
                            <x-input-error :messages="$errors->get('dato2')" />
                        </div>
                    </div>
                    <div class="-mx-3 md:flex mb-2">    
                        <div class="md:w-full px-3 mb-2 md:mb-0 ">
                            <label for="dato3" class="uppercase tracking-wide text-black text-xs font-bold mb-2">
                                Institución
                            </label>
                            <input type="text" required name="dato3" id="dato3" value="{{old('dato3')}}"
                             class="w-full bg-emerald-50 text-black border border-lime-900 rounded py-1 px-3 mb-1">
                            <x-input-error :messages="$errors->get('dato3')" />
                        </div>
                    </div>
                    <div class="-mx-3 md:flex mb-2">    
                        <div class="md:w-full px-3 mb-2 md:mb-0 ">
                            <label for="dato4" class="uppercase tracking-wide text-black text-xs font-bold mb-2">
                                Gestión
                            </label>
                            <input type="text" required name="dato4" id="dato4" value="{{old('dato4')}}"
                             class="w-full bg-emerald-50 text-black border border-lime-900 rounded py-1 px-3 mb-1">
                            <x-input-error :messages="$errors->get('dato4')" />
                        </div>
                    </div>
                   
                    
                    <button class="bg-blue-200 text-blue-900 px-3 py-1 rounded-full">Guardar</button>              
                </form>
            </div>
        </div>
    </div> 
    <div class="overflow-x-auto border border-gray-200 dark:border-gray-700 md:rounded-lg">
        <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
            <thead class="bg-gray-50 dark:bg-gray-800">
                <tr>
                    <th scope="col" class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">
                        Curso - Institución
                    </th>

                    <th scope="col" class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">
                        Gestión
                    </th>
                    <th scope="col" class="relative py-3.5 px-4">
                        <span class="sr-only">Actions</span>
                    </th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200 dark:divide-gray-700 dark:bg-gray-900">
            @foreach($detalle as $item)
                @if($item->id_catcv =='3')
                    <tr>
                        <td class="px-4 py-4 text-sm text-gray-500 dark:text-gray-300 whitespace-nowrap">
                            <div class="flex items-center gap-x-2">
                                <div>
                                    <h2 class="text-md-center font-bold  text-gray-800 dark:text-white "> {{$item->dato1}} &nbsp;&nbsp; - &nbsp;&nbsp;  {{$item->dato3}}</h2>
                                    <p class="text-xs font-semibold text-gray-600 dark:text-gray-400">Duración en Horas: {{$item->dato2}}</p>
                                </div>
                            </div>
                        </td>
                        
                        <td class="px-4 py-4 text-sm font-medium text-gray-700 whitespace-nowrap">
                            <div>
                                <h2 class="text-md-center font-bold  text-gray-800 dark:text-white "> {{$item->dato4}}  </h2>
                               
                            </div>
                        </td>
                        <td class="px-4 py-4 text-sm whitespace-nowrap">
                            <div class="flex items-center gap-x-6">
                                <x-dropdown>
                                    <x-slot name="trigger">
                                        <button class="w-6 h-6" >
                                            <svg  data-slot="icon" fill="none" stroke-width="1.5" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.75a.75.75 0 1 1 0-1.5.75.75 0 0 1 0 1.5ZM12 12.75a.75.75 0 1 1 0-1.5.75.75 0 0 1 0 1.5ZM12 18.75a.75.75 0 1 1 0-1.5.75.75 0 0 1 0 1.5Z"></path>
                                            </svg>
                                            
                                        </button>
                                    </x-slot>   
                                    <x-slot name="content">
                                        {{-- {{route('personal.edit',$person)}} --}}
                                        <x-dropdown-link href="{{route('imagencurriculum.index',$item)}}" target="_blank" onClick="window.open(this.href, this.target, 'width=500,height=500'); return false;"
                                        class="items-center text-gray-400 transition-colors duration-200 dark:hover:text-indigo-500 dark:text-gray-300 hover:text-indigo-900 focus:outline-none">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                                            </svg>
                                            Ver
                                        </x-dropdown-link>
                                        <x-dropdown-link href="#" class="items-center  text-red-400 transition-colors duration-200 hover:text-red-700 focus:outline-none">
                                            <svg width="30" height="30" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M9 3L3 9M3 3L9 9" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                            </svg>
                                            Eliminar
                                        </x-dropdown-link>
                                    </x-slot>
                                </x-dropdown>
                                

                                
                            </div>
                        </td>
                    </tr>
                @endif
            @endforeach
      
            </tbody>
        </table>
    </div>
      </div>
    </div>
  </div>
   <!-- Accordion Item 4-->
  <div class="border-b border-slate-200">
    <button onclick="toggleAccordion(4)" class="w-full flex justify-between items-center py-5 px-6 text-slate-800 bg-emerald-200"">
      <span>TRABAJOS REALIZADOS</span>
      <span id="icon-4" class="text-slate-800 transition-transform duration-300">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor" class="w-4 h-4">
          <path fill-rule="evenodd" d="M11.78 9.78a.75.75 0 0 1-1.06 0L8 7.06 5.28 9.78a.75.75 0 0 1-1.06-1.06l3.25-3.25a.75.75 0 0 1 1.06 0l3.25 3.25a.75.75 0 0 1 0 1.06Z" clip-rule="evenodd" />
        </svg>
      </span>
    </button>
    <div id="content-4" class="max-h-0 overflow-hidden transition-all duration-300 ease-in-out">
      <div class="pb-5 text-sm text-slate-500">
    <div x-data="{ 'showModal': false }"
        @keydown.escape="showModal = false"
        >
        <!-- Trigger for Modal -->

        <button class=" p-1 m-2 rounded bg-blue-600 text-blue-50 font-extrabold" type="button" @click="showModal = true">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 10.5v6m3-3H9m4.06-7.19-2.12-2.12a1.5 1.5 0 0 0-1.061-.44H4.5A2.25 2.25 0 0 0 2.25 6v12a2.25 2.25 0 0 0 2.25 2.25h15A2.25 2.25 0 0 0 21.75 18V9a2.25 2.25 0 0 0-2.25-2.25h-5.379a1.5 1.5 0 0 1-1.06-.44Z" />
              </svg>               
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
                    <h5 class="mr-3 text-black max-w-none">TRABAJOS REALIZADOS </h5>

                    <button type="button" class="z-50 cursor-pointer" @click="showModal = false">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>

                <!-- content -->
                <form action="{{route('detallecurriculum.store')}}" method="POST">
                    @csrf
                    <input type="hidden" name="id_cv" value="{{$curriculum->id_cv}}" >
                    <input type="hidden" name="id_catcv" value="4" >
                    <div class="-mx-3 md:flex mb-2">
                        <div class="md:w-full px-3 mb-2 md:mb-0 ">
                            <label for="dato1" class="uppercase tracking-wide text-black text-xs font-bold mb-2">
                                Nombre del Trabajo
                            </label>
                            <input type="text" required name="dato1" id="dato1" value="{{old('dato1')}}"
                             class="w-full bg-emerald-50 text-black border border-lime-900 rounded py-1 px-3 mb-1">
                            <x-input-error :messages="$errors->get('dato1')" />
                        </div>
                    </div>
                    <div class="-mx-3 md:flex mb-2">    
                        <div class="md:w-full px-3 mb-2 md:mb-0 ">
                            <label for="dato2" class="uppercase tracking-wide text-black text-xs font-bold mb-2">
                                Institución
                            </label>
                            <input type="text" required name="dato2" id="dato2" value="{{old('dato2')}}"
                             class="w-full bg-emerald-50 text-black border border-lime-900 rounded py-1 px-3 mb-1">
                            <x-input-error :messages="$errors->get('dato2')" />
                        </div>
                    </div>
                    <div class="-mx-3 md:flex mb-2">    
                        <div class="md:w-full px-3 mb-2 md:mb-0 ">
                            <label for="dato3" class="uppercase tracking-wide text-black text-xs font-bold mb-2">
                                Teléfono
                            </label>
                            <input type="text" required name="dato3" id="dato3" value="{{old('dato3')}}"
                             class="w-full bg-emerald-50 text-black border border-lime-900 rounded py-1 px-3 mb-1">
                            <x-input-error :messages="$errors->get('dato3')" />
                        </div>
                    </div>
                    <div class="-mx-3 md:flex mb-2">    
                        <div class="md:w-full px-3 mb-2 md:mb-0 ">
                            <label for="dato4" class="uppercase tracking-wide text-black text-xs font-bold mb-2">
                                Fecha de Inicio
                            </label>
                            <input type="date" required name="dato4" id="dato4" value="{{old('dato4')}}"
                             class="w-full bg-emerald-50 text-black border border-lime-900 rounded py-1 px-3 mb-1">
                            <x-input-error :messages="$errors->get('dato4')" />
                        </div>
                    </div>
                    <div class="-mx-3 md:flex mb-2">    
                        <div class="md:w-full px-3 mb-2 md:mb-0 ">
                            <label for="dato5" class="uppercase tracking-wide text-black text-xs font-bold mb-2">
                                Fecha de Finalización
                            </label>
                            <input type="date" required name="dato5" id="dato5" value="{{old('dato5')}}"
                             class="w-full bg-emerald-50 text-black border border-lime-900 rounded py-1 px-3 mb-1">
                            <x-input-error :messages="$errors->get('dato5')" />
                        </div>
                    </div>
                    <div class="-mx-3 md:flex mb-2">    
                        <div class="md:w-full px-3 mb-2 md:mb-0 ">
                            <label for="dato6" class="uppercase tracking-wide text-black text-xs font-bold mb-2">
                                Documento de Respaldo
                            </label>
                            <input type="text" required name="dato6" id="dato6" value="{{old('dato6')}}"
                             class="w-full bg-emerald-50 text-black border border-lime-900 rounded py-1 px-3 mb-1">
                            <x-input-error :messages="$errors->get('dato6')" />
                        </div>
                    </div>
                    <button class="bg-blue-200 text-blue-900 px-3 py-1 rounded-full">Guardar</button>              
                </form>
            </div>
        </div>
    </div> 
        <div class="overflow-x-auto border border-gray-200 dark:border-gray-700 md:rounded-lg">
            <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                <thead class="bg-gray-50 dark:bg-gray-800">
                    <tr>
                        <th scope="col" class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">
                            Trabajo - Institución
                        </th>

                        <th scope="col" class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">
                            Documento
                        </th>
                        <th scope="col" class="relative py-3.5 px-4">
                            <span class="sr-only">Actions</span>
                        </th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200 dark:divide-gray-700 dark:bg-gray-900">
                @foreach($detalle as $item)
                    @if($item->id_catcv =='4')
                        <tr>
                            <td class="px-4 py-4 text-sm text-gray-500 dark:text-gray-300 whitespace-nowrap">
                                <div class="flex items-center gap-x-2">
                                    <div>
                                        <h2 class="text-md-center font-bold  text-gray-800 dark:text-white "> {{$item->dato1}} &nbsp;&nbsp;-&nbsp;&nbsp; {{$item->dato2}}</h2>
                                        <p class="text-xs font-semibold text-gray-600 dark:text-gray-400">Teléfono: {{$item->dato3}}</p>
                                    </div>
                                </div>
                            </td>
                            
                            <td class="px-4 py-4 text-sm font-medium text-gray-700 whitespace-nowrap">
                                <div>
                                    <h2 class="text-md-center font-bold  text-gray-800 dark:text-white "> {{$item->dato6}}  </h2>
                                    <p class="text-xs font-semibold text-gray-600 dark:text-gray-400">Entre el {{date_format (date_create($item->dato4),"d/m/Y")}} 
                                    Hasta el: {{date_format (date_create($item->dato5),"d/m/Y")}}  </p>
                                </div>
                            </td>
                            <td class="px-4 py-4 text-sm whitespace-nowrap">
                                <div class="flex items-center gap-x-6">
                                    <x-dropdown>
                                        <x-slot name="trigger">
                                            <button class="w-6 h-6" >
                                                <svg  data-slot="icon" fill="none" stroke-width="1.5" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.75a.75.75 0 1 1 0-1.5.75.75 0 0 1 0 1.5ZM12 12.75a.75.75 0 1 1 0-1.5.75.75 0 0 1 0 1.5ZM12 18.75a.75.75 0 1 1 0-1.5.75.75 0 0 1 0 1.5Z"></path>
                                                </svg>
                                                
                                            </button>
                                        </x-slot>   
                                        <x-slot name="content">
                                            {{-- {{route('personal.edit',$person)}} --}}
                                            <x-dropdown-link href="{{route('imagencurriculum.index',$item)}}" target="_blank" onClick="window.open(this.href, this.target, 'width=500,height=500'); return false;"
                                             class="items-center text-gray-400 transition-colors duration-200 dark:hover:text-indigo-500 dark:text-gray-300 hover:text-indigo-900 focus:outline-none">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                                                </svg>
                                                Ver
                                            </x-dropdown-link>
                                            <x-dropdown-link href="#" class="items-center  text-red-400 transition-colors duration-200 hover:text-red-700 focus:outline-none">
                                                <svg width="30" height="30" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M9 3L3 9M3 3L9 9" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                                </svg>
                                                Eliminar
                                            </x-dropdown-link>
                                        </x-slot>
                                    </x-dropdown>
                                    
                                </div>
                            </td>
                        </tr>
                    @endif
                @endforeach
        
                </tbody>
            </table>
        </div>    
    </div>
    </div>
  </div>
  <!-- Accordion Item 5 IDIOMAS -->
  <div class="border-b border-slate-200">
    <button onclick="toggleAccordion(5)" class="w-full flex justify-between items-center py-5 px-6 text-slate-800 bg-emerald-200"">
      <span>IDIOMAS</span>
      <span id="icon-5" class="text-slate-800 transition-transform duration-300">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor" class="w-4 h-4">
          <path fill-rule="evenodd" d="M11.78 9.78a.75.75 0 0 1-1.06 0L8 7.06 5.28 9.78a.75.75 0 0 1-1.06-1.06l3.25-3.25a.75.75 0 0 1 1.06 0l3.25 3.25a.75.75 0 0 1 0 1.06Z" clip-rule="evenodd" />
        </svg>
      </span>
    </button>
    <div id="content-5" class="max-h-0 overflow-hidden transition-all duration-300 ease-in-out">
      <div class="pb-5 text-sm text-slate-500">
      <div x-data="{ 'showModal': false }"
        @keydown.escape="showModal = false"
        >
        <!-- Trigger for Modal -->

        <button class=" p-1 m-2 rounded bg-blue-600 text-blue-50 font-extrabold" type="button" @click="showModal = true">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 10.5v6m3-3H9m4.06-7.19-2.12-2.12a1.5 1.5 0 0 0-1.061-.44H4.5A2.25 2.25 0 0 0 2.25 6v12a2.25 2.25 0 0 0 2.25 2.25h15A2.25 2.25 0 0 0 21.75 18V9a2.25 2.25 0 0 0-2.25-2.25h-5.379a1.5 1.5 0 0 1-1.06-.44Z" />
              </svg>               
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
                    <h5 class="mr-3 text-black max-w-none">IDIOMAS </h5>

                    <button type="button" class="z-50 cursor-pointer" @click="showModal = false">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>

                <!-- content -->
                <form action="{{route('detallecurriculum.store')}}" method="POST">
                    @csrf
                    <input type="hidden" name="id_cv" value="{{$curriculum->id_cv}}" >
                    <input type="hidden" name="id_catcv" value="5" >
                    <div class="-mx-3 md:flex mb-2">
                        <div class="md:w-full px-3 mb-2 md:mb-0 ">
                            <label for="dato1" class="uppercase tracking-wide text-black text-xs font-bold mb-2">
                                IDIOMA
                            </label>
                            <input type="text" required name="dato1" id="dato1" value="{{old('dato1')}}"
                             class="w-full bg-emerald-50 text-black border border-lime-900 rounded py-1 px-3 mb-1">
                            <x-input-error :messages="$errors->get('dato1')" />
                        </div>
                    </div>
                    <div class="-mx-3 md:flex mb-2">    
                        <div class="md:w-full px-3 mb-2 md:mb-0 ">
                            <label for="dato2" class="uppercase tracking-wide text-black text-xs font-bold mb-2">
                                Lectura
                            </label>
                            <select name="dato2" id="dato2" class="w-full bg-emerald-50 text-black border border-lime-900 rounded py-1 px-3 mb-1">
                                <option value="Alto">Alto</option>
                                <option value="Medio">Medio</option>
                                <option value="Bajo">Bajo</option>
                            </select>
                            <x-input-error :messages="$errors->get('dato2')" />
                        </div>
                    </div>
                    <div class="-mx-3 md:flex mb-2">    
                        <div class="md:w-full px-3 mb-2 md:mb-0 ">
                            <label for="dato3" class="uppercase tracking-wide text-black text-xs font-bold mb-2">
                                Escritura
                            </label>
                            <select name="dato3" id="dato3" class="w-full bg-emerald-50 text-black border border-lime-900 rounded py-1 px-3 mb-1">
                                <option value="Alto">Alto</option>
                                <option value="Medio">Medio</option>
                                <option value="Bajo">Bajo</option>
                            </select>
                            <x-input-error :messages="$errors->get('dato3')" />
                        </div>
                    </div>
                    <div class="-mx-3 md:flex mb-2">    
                        <div class="md:w-full px-3 mb-2 md:mb-0 ">
                            <label for="dato4" class="uppercase tracking-wide text-black text-xs font-bold mb-2">
                                Conversación
                            </label>
                            <select name="dato4" id="dato4" class="w-full bg-emerald-50 text-black border border-lime-900 rounded py-1 px-3 mb-1">
                                <option value="Alto">Alto</option>
                                <option value="Medio">Medio</option>
                                <option value="Bajo">Bajo</option>
                            </select>
                            <x-input-error :messages="$errors->get('dato4')" />
                        </div>
                    </div>
                    
                    
                    <button class="bg-blue-200 text-blue-900 px-3 py-1 rounded-full">Guardar</button>              
                </form>
            </div>
        </div>
    </div> 
        <div class="overflow-x-auto border border-gray-200 dark:border-gray-700 md:rounded-lg">
            <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                <thead class="bg-gray-50 dark:bg-gray-800">
                    <tr>
                        <th scope="col" class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">
                            Idioma
                        </th>

                        <th scope="col" class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">
                            Nivel
                        </th>
                        <th scope="col" class="relative py-3.5 px-4">
                            <span class="sr-only">Actions</span>
                        </th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200 dark:divide-gray-700 dark:bg-gray-900">
                @foreach($detalle as $item)
                    @if($item->id_catcv =='5')
                        <tr>
                            <td class="px-4 py-4 text-sm text-gray-500 dark:text-gray-300 whitespace-nowrap">
                                <div class="flex items-center gap-x-2">
                                    <div>
                                        <h2 class="text-md-center font-bold  text-gray-800 dark:text-white "> {{$item->dato1}} </h2>
                                        
                                    </div>
                                </div>
                            </td>
                            
                            <td class="px-4 py-4 text-sm font-medium text-gray-700 whitespace-nowrap">
                                <div>

                                    <p class="text-xs font-semibold text-gray-600 dark:text-gray-400">Lectura: {{$item->dato2}}</p>
                                    <p class="text-xs font-semibold text-gray-600 dark:text-gray-400">Escritura: {{$item->dato3}}</p>
                                    <p class="text-xs font-semibold text-gray-600 dark:text-gray-400">Conversación: {{$item->dato4}}</p>

                                    
                                </div>
                            </td>
                            <td class="px-4 py-4 text-sm whitespace-nowrap">
                                <div class="flex items-center gap-x-6">
                                    <x-dropdown>
                                        <x-slot name="trigger">
                                            <button class="w-6 h-6" >
                                                <svg  data-slot="icon" fill="none" stroke-width="1.5" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.75a.75.75 0 1 1 0-1.5.75.75 0 0 1 0 1.5ZM12 12.75a.75.75 0 1 1 0-1.5.75.75 0 0 1 0 1.5ZM12 18.75a.75.75 0 1 1 0-1.5.75.75 0 0 1 0 1.5Z"></path>
                                                </svg>
                                                
                                            </button>
                                        </x-slot>   
                                        <x-slot name="content">
                                            {{-- {{route('personal.edit',$person)}} --}}
                                            <x-dropdown-link href="{{route('imagencurriculum.index',$item)}}" target="_blank" onClick="window.open(this.href, this.target, 'width=500,height=500'); return false;"
                                             class="items-center text-gray-400 transition-colors duration-200 dark:hover:text-indigo-500 dark:text-gray-300 hover:text-indigo-900 focus:outline-none">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                                                </svg>
                                                Ver
                                            </x-dropdown-link>
                                            <x-dropdown-link href="#" class="items-center  text-red-400 transition-colors duration-200 hover:text-red-700 focus:outline-none">
                                                <svg width="30" height="30" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M9 3L3 9M3 3L9 9" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                                </svg>
                                                Eliminar
                                            </x-dropdown-link>
                                        </x-slot>
                                    </x-dropdown>
                                    
                                </div>
                            </td>
                        </tr>
                    @endif
                @endforeach
                </tbody>
            </table>
        </div>
      </div>
    </div>
  </div>
  <!-- Accordion Item 6 -->
  <div class="border-b border-slate-200">
    <button onclick="toggleAccordion(6)" class="w-full flex justify-between items-center py-5 px-6 text-slate-800 bg-emerald-200">
      <span>REFERENCIAS</span>
      <span id="icon-6" class="text-slate-800 transition-transform duration-300">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor" class="w-4 h-4">
          <path fill-rule="evenodd" d="M11.78 9.78a.75.75 0 0 1-1.06 0L8 7.06 5.28 9.78a.75.75 0 0 1-1.06-1.06l3.25-3.25a.75.75 0 0 1 1.06 0l3.25 3.25a.75.75 0 0 1 0 1.06Z" clip-rule="evenodd" />
        </svg>
      </span>
    </button>
    <div id="content-6" class="max-h-0 overflow-hidden transition-all duration-300 ease-in-out">
      <div class="pb-5 text-sm text-slate-500">
        <div x-data="{ 'showModal': false }"
        @keydown.escape="showModal = false"
        >
        <!-- Trigger for Modal -->

        <button class=" p-1 m-2 rounded bg-blue-600 text-blue-50 font-extrabold" type="button" @click="showModal = true">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 10.5v6m3-3H9m4.06-7.19-2.12-2.12a1.5 1.5 0 0 0-1.061-.44H4.5A2.25 2.25 0 0 0 2.25 6v12a2.25 2.25 0 0 0 2.25 2.25h15A2.25 2.25 0 0 0 21.75 18V9a2.25 2.25 0 0 0-2.25-2.25h-5.379a1.5 1.5 0 0 1-1.06-.44Z" />
              </svg>               
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
                    <h5 class="mr-3 text-black max-w-none">REFERENCIA </h5>

                    <button type="button" class="z-50 cursor-pointer" @click="showModal = false">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>

                <!-- content -->
                <form action="{{route('detallecurriculum.store')}}" method="POST">
                    @csrf
                    <input type="hidden" name="id_cv" value="{{$curriculum->id_cv}}" >
                    <input type="hidden" name="id_catcv" value="6" >
                    <div class="-mx-3 md:flex mb-2">
                        <div class="md:w-full px-3 mb-2 md:mb-0 ">
                            <label for="dato1" class="uppercase tracking-wide text-black text-xs font-bold mb-2">
                                Nombres
                            </label>
                            <input type="text" required name="dato1" id="dato1" value="{{old('dato1')}}"
                             class="w-full bg-emerald-50 text-black border border-lime-900 rounded py-1 px-3 mb-1">
                            <x-input-error :messages="$errors->get('dato1')" />
                        </div>
                    </div>
                    <div class="-mx-3 md:flex mb-2">    
                        <div class="md:w-full px-3 mb-2 md:mb-0 ">
                            <label for="dato2" class="uppercase tracking-wide text-black text-xs font-bold mb-2">
                                Relación y/o Parentesco
                            </label>
                            <input type="text" required name="dato2" id="dato2" value="{{old('dato2')}}"
                             class="w-full bg-emerald-50 text-black border border-lime-900 rounded py-1 px-3 mb-1">
                            <x-input-error :messages="$errors->get('dato2')" />
                        </div>
                    </div>
                    <div class="-mx-3 md:flex mb-2">    
                        <div class="md:w-full px-3 mb-2 md:mb-0 ">
                            <label for="dato3" class="uppercase tracking-wide text-black text-xs font-bold mb-2">
                                Teléfono
                            </label>
                            <input type="text" required name="dato3" id="dato3" value="{{old('dato3')}}"
                             class="w-full bg-emerald-50 text-black border border-lime-900 rounded py-1 px-3 mb-1">
                            <x-input-error :messages="$errors->get('dato3')" />
                        </div>
                    </div>
                    <div class="-mx-3 md:flex mb-2">    
                        <div class="md:w-full px-3 mb-2 md:mb-0 ">
                            <label for="dato4" class="uppercase tracking-wide text-black text-xs font-bold mb-2">
                                Domicilio
                            </label>
                            <input type="text" required name="dato4" id="dato4" value="{{old('dato4')}}"
                             class="w-full bg-emerald-50 text-black border border-lime-900 rounded py-1 px-3 mb-1">
                            <x-input-error :messages="$errors->get('dato4')" />
                        </div>
                    </div>
                    
                    
                    <button class="bg-blue-200 text-blue-900 px-3 py-1 rounded-full">Guardar</button>              
                </form>
            </div>
        </div>
    </div> 
        <div class="overflow-x-auto border border-gray-200 dark:border-gray-700 md:rounded-lg">
            <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                <thead class="bg-gray-50 dark:bg-gray-800">
                    <tr>
                        <th scope="col" class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">
                            Nombre
                        </th>

                        <th scope="col" class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">
                            Contacto
                        </th>
                        <th scope="col" class="relative py-3.5 px-4">
                            <span class="sr-only">Actions</span>
                        </th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200 dark:divide-gray-700 dark:bg-gray-900">
                @foreach($detalle as $item)
                    @if($item->id_catcv =='6')
                        <tr>
                            <td class="px-4 py-4 text-sm text-gray-500 dark:text-gray-300 whitespace-nowrap">
                                <div class="flex items-center gap-x-2">
                                    <div>
                                        <h2 class="text-md-center font-bold  text-gray-800 dark:text-white "> {{$item->dato1}} </h2>
                                        <p class="text-xs font-semibold text-gray-600 dark:text-gray-400">Relación: {{$item->dato2}}</p>
                                    </div>
                                </div>
                            </td>
                            
                            <td class="px-4 py-4 text-sm font-medium text-gray-700 whitespace-nowrap">
                                <div>

                                    <p class="text-xs font-semibold text-gray-600 dark:text-gray-400">Telf.: {{$item->dato3}}</p>
                                    <p class="text-xs font-semibold text-gray-600 dark:text-gray-400">Domicilio: {{$item->dato4}}</p>
                                    
                                </div>
                            </td>
                            <td class="px-4 py-4 text-sm whitespace-nowrap">
                                <div class="flex items-center gap-x-6">
                                    <x-dropdown>
                                        <x-slot name="trigger">
                                            <button class="w-6 h-6" >
                                                <svg  data-slot="icon" fill="none" stroke-width="1.5" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.75a.75.75 0 1 1 0-1.5.75.75 0 0 1 0 1.5ZM12 12.75a.75.75 0 1 1 0-1.5.75.75 0 0 1 0 1.5ZM12 18.75a.75.75 0 1 1 0-1.5.75.75 0 0 1 0 1.5Z"></path>
                                                </svg>
                                                
                                            </button>
                                        </x-slot>   
                                        <x-slot name="content">
                                            {{-- {{route('personal.edit',$person)}} --}}
                                            <x-dropdown-link href="{{route('imagencurriculum.index',$item)}}" target="_blank" onClick="window.open(this.href, this.target, 'width=500,height=500'); return false;"
                                             class="items-center text-gray-400 transition-colors duration-200 dark:hover:text-indigo-500 dark:text-gray-300 hover:text-indigo-900 focus:outline-none">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                                                </svg>
                                                Ver
                                            </x-dropdown-link>
                                            <x-dropdown-link href="#" class="items-center  text-red-400 transition-colors duration-200 hover:text-red-700 focus:outline-none">
                                                <svg width="30" height="30" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M9 3L3 9M3 3L9 9" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                                </svg>
                                                Eliminar
                                            </x-dropdown-link>
                                        </x-slot>
                                    </x-dropdown>
                                    
                                </div>
                            </td>
                        </tr>
                    @endif
                @endforeach
                </tbody>
            </table>
        </div>
      </div>
    </div>
  </div>
  <script>
    function toggleAccordion(index) {
      const content = document.getElementById(`content-${index}`);
      const icon = document.getElementById(`icon-${index}`);
   
      // SVG for Down icon
      const downSVG = `
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor" class="w-4 h-4">
          <path fill-rule="evenodd" d="M4.22 6.22a.75.75 0 0 1 1.06 0L8 8.94l2.72-2.72a.75.75 0 1 1 1.06 1.06l-3.25 3.25a.75.75 0 0 1-1.06 0L4.22 7.28a.75.75 0 0 1 0-1.06Z" clip-rule="evenodd" />
        </svg>
      `;
   
      // SVG for Up icon
      const upSVG = `
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor" class="w-4 h-4">
          <path fill-rule="evenodd" d="M11.78 9.78a.75.75 0 0 1-1.06 0L8 7.06 5.28 9.78a.75.75 0 0 1-1.06-1.06l3.25-3.25a.75.75 0 0 1 1.06 0l3.25 3.25a.75.75 0 0 1 0 1.06Z" clip-rule="evenodd" />
        </svg>
      `;
   
      // Toggle the content's max-height for smooth opening and closing
      if (content.style.maxHeight && content.style.maxHeight !== '0px') {
        content.style.maxHeight = '0';
        icon.innerHTML = upSVG;
      } else {
        content.style.maxHeight = content.scrollHeight + 'px';
        icon.innerHTML = downSVG;
      }
    }
  </script>
</div>
</x-secondary-layout>