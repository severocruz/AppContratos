<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Requirements') }}
        </h2>
    </x-slot>
    <div class="flex-col ">
        <x-nav-link
        :href="route('requerimiento.new')">
        {{__('New requeriment')}}
        </x-nav-link>
    </div>
   
    <div class="py-3 px-0">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 ">
            <div class="bg-emerald-100 dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="flex-row">
                        
                        {{-- @dump($requerimientoList) --}}
                         <div class="flex-col pt-3 border-t-2">
                            <form action="{{route('requerimiento.index')}}" method="GET" >
                               @csrf
                               Buscar: &nbsp; 
                                <input class="w-auto text-md py-1 px-2 pr-2 mb-2 rounded" type="text" value="{{$fecha1}}" name="fecha1" id="fecha1"/>
                                &nbsp;Centro de trabajo: &nbsp;   
                                <select name="fecha2" id="fecha2"
                                            class="w-auto text-md py-1 px-2 pr-2 mb-2 rounded"
                                            >
                                            <OPTION selected value="">Todos</OPTION>
                                            @foreach ($centrosDeSalud as $centro)
                                            <OPTION value="{{$centro->nombre_cs}}" {{$centro->nombre_cs==$fecha2? 'selected':''}} >{{$centro->nombre_cs}}</OPTION>
                                            @endforeach
                                            
                                </select>
                                <button class="bg-blue-200 text-blue-600 px-3 py-1 rounded-full">Buscar</button>
                            </form>
                        </div> 

                    </div> 
                </div>
            </div>
            {{-- start table --}}
            <section class="container px-0 mx-auto">
                <div class="flex flex-col">
                    <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                        <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
                            <div class="overflow-x-auto border border-gray-200 dark:border-gray-700 md:rounded-lg">
                                <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                                    <thead class="bg-gray-50 dark:bg-gray-800">
                                        <tr>
                                            <th scope="col" class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                                {{__('Requirement')}}
                                            </th>

                                            <th scope="col" class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                                {{__('Creation date')}}
                                            </th>
            
                                            {{-- <th scope="col" class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                                {{__('Count')}}
                                            </th> --}}
            
                                            <th scope="col" class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                                {{__('Status')}}
                                            </th>

                                            <th scope="col" class="relative py-3.5 px-4">
                                                <span class="sr-only">Actions</span>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody class="bg-white divide-y divide-gray-200 dark:divide-gray-700 dark:bg-gray-900">
                                    @foreach($requerimientoList->items() as $requerimiento)
                                        <tr>
                                            <td class="px-4 py-4 text-sm text-gray-500 dark:text-gray-300 whitespace-nowrap">
                                                <div class="flex items-center gap-x-2">
                                                    {{-- <img class="object-cover w-8 h-8 rounded-full" src="{{$person->foto?'storage/fotos/'.$person->foto:'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSApLJxJLPubp4KuCafWl1G85OVieXwcG-11Q&usqp=CAU'}}" alt=""> --}}
                                                    <div>
                                                        <h2 class="text-md-center font-bold  text-gray-800 dark:text-white ">
                                                             {{$requerimiento->cargo." - ".$requerimiento->tipo. " | "}}
                                                             {{isset($requerimiento->nombres)?$requerimiento->nombres:''}}
                                                             {{isset($requerimiento->a_paterno)?$requerimiento->a_paterno:''}}
                                                             {{isset($requerimiento->a_materno)?$requerimiento->a_materno:''}}
                                                        </h2>
                                                        <p class="text-xs font-semibold text-gray-600 dark:text-gray-400"> 
                                                            {{$requerimiento->nombre_cs}} | Telf. {{$requerimiento->telefonos}}
                                                            {{$requerimiento->nombre_enc}}
                                                        </p>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="px-4 py-4 text-sm text-gray-500 dark:text-gray-300 whitespace-nowrap">{{date_format (date_create($requerimiento->fechareq),"d/m/Y")}}</td>
                                            {{-- <td class="px-4 py-4 text-sm font-medium text-gray-700 whitespace-nowrap">
                                                <div class="inline-flex items-center px-3 py-1 rounded-full gap-x-2 {{$person->conteo<3?'text-emerald-500 bg-emerald-100/60':'text-red-500 bg-red-100/60'}} dark:bg-gray-800">
                                                   
                                                    <h2 class="text-sm font-normal">{{$person->conteo}}</h2>
                                                </div>
                                            </td> --}}
                                            <td class="px-4 py-4 text-sm font-medium text-gray-700 whitespace-nowrap">
                                                <div class="inline-flex items-center px-3 py-1 rounded-full gap-x-2 {{$requerimiento->id_esreq==1?'text-yellow-500 bg-yellow-100/60':($requerimiento->id_esreq==2?'text-orange-500 bg-orange-100/60':($requerimiento->id_esreq==4?'text-blue-500 bg-blue-100/60':'text-green-500 bg-green-100/60'))}} dark:bg-gray-800">
                                                     <h2 class="text-sm font-normal">{{$requerimiento->estadoRequerimiento->estado_req}}</h2>
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
                                                            <x-dropdown-link href="{{route('requerimiento.edit',$requerimiento)}}" class="items-center text-gray-400 transition-colors duration-200 dark:hover:text-indigo-500 dark:text-gray-300 hover:text-indigo-900 focus:outline-none">
                                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                                                    <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                                                                  </svg>
                                                                Editar
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
                                    @endforeach
                              
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            
                <div class="flex items-center justify-between mt-6">
                    @if ($requerimientoList->currentPage()>1)
                        <x-nav-link :href="$fecha1||$fecha2?'requerimientos?fecha1='.$fecha1.'&fecha2='.$fecha2.'&npage='.$requerimientoList->currentPage()-1:'requerimientos?npage='.$requerimientoList->currentPage()-1" class="flex items-center px-5 py-2 text-sm text-gray-700 capitalize transition-colors duration-200 bg-white border rounded-md gap-x-2 hover:bg-gray-100 dark:bg-gray-900 dark:text-gray-200 dark:border-gray-700 dark:hover:bg-gray-800">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 rtl:-scale-x-100">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 15.75L3 12m0 0l3.75-3.75M3 12h18" />
                            </svg>
                
                            <span>
                                Anterior
                            </span>
                        </x-nav-link>
                    @endif
                    <div class="items-center hidden md:flex gap-x-3">
                        
                        
                        @for($j = $requerimientoList->currentPage()-2;$j<=$requerimientoList->currentPage()+2;$j++)
                            @if ($j > 0 && $j<($requerimientoList->lastPage()-3))
                                <x-nav-link :href="$fecha1||$fecha2?'requerimientos?fecha1='.$fecha1.'&fecha2='.$fecha2.'&npage='.$j:'requerimientos?npage='.$j " 
                                :active="$requerimientoList->currentPage()==$j"
                                class="px-2 py-1 text-sm text-gray-500 rounded-md dark:hover:bg-gray-800 dark:text-gray-300 hover:bg-gray-100">
                                    {{$j}}
                                </x-nav-link>
                            @endif
                        @endfor
                            <a href="#" class="px-2 py-1 text-sm text-gray-500 rounded-md dark:hover:bg-gray-800 dark:text-gray-300 hover:bg-gray-100">...</a>
                        @for($i = $requerimientoList->lastPage()-3;$i<=$requerimientoList->lastPage();$i++)
                            @if ($i > 0)
                            <x-nav-link :href="$fecha1||$fecha2?'requerimientos?fecha1='.$fecha1.'&fecha2='.$fecha2.'&npage='.$i:'requerimientos?npage='.$i " 
                                :active="$requerimientoList->currentPage()==$i"
                                class="px-2 py-1 text-sm text-gray-500 rounded-md dark:hover:bg-gray-800 dark:text-gray-300 hover:bg-gray-100">
                                    {{$i}}
                                </x-nav-link>
                            @endif
                        @endfor
                    </div>
                    @if ($requerimientoList->lastPage()>$requerimientoList->currentPage())
                    
                        <x-nav-link :href="$fecha1||$fecha2?'requerimientos?fecha1='.$fecha1.'&fecha2='.$fecha2.'&npage='.$requerimientoList->currentPage()+1:'requerimientos?npage='.$requerimientoList->currentPage()+1" 
                            class="flex items-center px-5 py-2 text-sm text-gray-700 capitalize transition-colors duration-200 bg-white border rounded-md gap-x-2 hover:bg-gray-100 dark:bg-gray-900 dark:text-gray-200 dark:border-gray-700 dark:hover:bg-gray-800"
                            >
                            <span>
                                Siguiente
                            </span>
                            
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 rtl:-scale-x-100">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M17.25 8.25L21 12m0 0l-3.75 3.75M21 12H3" />
                            </svg>
                        </x-nav-link>
                    @endif
                </div>
            </section>
            {{-- finish table --}}
        </div>
    </div>
</x-app-layout>
