

        <!-- Mobile Menu Toggle -->
        <button @click="$store.sidebar.navOpen = !$store.sidebar.navOpen"
                class="sm:hidden absolute top-5 right-10 focus:outline-none">
            <!-- Menu Icons -->
            <svg xmlns="http://www.w3.org/2000/svg"
                 class="h-6 w-6"
                 x-bind:class="$store.sidebar.navOpen ? 'hidden':''"
                 fill="none"
                 viewBox="0 0 24 24"
                 stroke="currentColor">
                <path stroke-linecap="round"
                      stroke-linejoin="round"
                      stroke-width="2"
                      d="M4 6h16M4 12h16m-7 6h7" />
            </svg>
            
            <!-- Close Menu -->
            <svg x-cloak
                 xmlns="http://www.w3.org/2000/svg"
                 class="h-6 w-6"
                 x-bind:class="$store.sidebar.navOpen ? '':'hidden'"
                 fill="none"
                 viewBox="0 0 24 24"
                 stroke="currentColor">
                <path stroke-linecap="round"
                      stroke-linejoin="round"
                      stroke-width="2"
                      d="M6 18L18 6M6 6l12 12" />
            </svg>
        </button>

        <div class="h-screen bg-emerald-400 transition-all duration-300 space-y-2 fixed sm:relative"
             x-bind:class="{'w-72':$store.sidebar.full, 'w-72 sm:w-20':!$store.sidebar.full,'top-0 left-0':$store.sidebar.navOpen,'top-0 -left-72 sm:left-0':!$store.sidebar.navOpen}">

            <h1 class="text-white font-black py-4"
                x-bind:class="$store.sidebar.full ? 'text-2xl px-4' : 'text-xl px-4 xm:px-2'">CNS</h1>

            <div class="px-4 space-y-2">

                <!-- SideBar Toggle -->
                <button @click="$store.sidebar.full = !$store.sidebar.full"
                        class="hidden sm:block focus:outline-none absolute p-1 -right-3 top-10 bg-gray-900 rounded-full shadow-md">
                    <svg xmlns="http://www.w3.org/2000/svg"
                         class="h-4 w-4 transition-all duration-300 text-white transform"
                         x-bind:class="$store.sidebar.full ? 'rotate-90':'-rotate-90 '"
                         viewBox="0 0 20 20"
                         fill="currentColor">
                        <path fill-rule="evenodd"
                              d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                              clip-rule="evenodd" />
                    </svg>
                </button>
                <!-- Home -->
                <x-nav-link x-data="tooltip"
                     x-on:mouseover="show = true"
                     x-on:mouseleave="show = false"
                     @click="$store.sidebar.active = 'home' "
                     class=" relative flex items-center w-11/12 hover:text-gray-500 hover:bg-gray-300 space-x-2 rounded-md p-2 cursor-pointer"
                     x-bind:class="{'justify-start': $store.sidebar.full, 'sm:justify-center':!$store.sidebar.full,'text-gray-500 ':$store.sidebar.active == 'home','text-gray-10 ':$store.sidebar.active != 'home'}"
                     :href="route('dashboard')" :active="request()->routeIs('dashboard')">

                         <svg xmlns="http://www.w3.org/2000/svg"
                         class="h-6 w-6"
                         fill="none"
                         viewBox="0 0 24 24"
                         stroke="currentColor">
                         <path stroke-linecap="round"
                         stroke-linejoin="round"
                         stroke-width="2"
                         d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                        </svg>
                        <h1 x-cloak
                        x-bind:class="!$store.sidebar.full && show ? visibleClass :'' || !$store.sidebar.full && !show ? 'sm:hidden':''">
                        {{__('Dashboard')}}</h1>
                
                </x-nav-link>

               <!-- Staff -->
               <x-nav-link x-data="tooltip"
               x-on:mouseover="show = true"
               x-on:mouseleave="show = false"
               @click="$store.sidebar.active = 'personal' "
               class=" relative flex items-center w-11/12 hover:text-gray-500 hover:bg-gray-300 space-x-2 rounded-md p-1 cursor-pointer"
               x-bind:class="{'justify-start': $store.sidebar.full, 'sm:justify-center':!$store.sidebar.full,'text-gray-500 bg-gray-100':$store.sidebar.active == 'personal','text-gray-10 ':$store.sidebar.active != 'personal'}"
               :href="route('personal.index')" :active="request()->routeIs('personal.*')">

                   <svg xmlns="http://www.w3.org/2000/svg"
                   class="h-6 w-6"
                   fill="none"
                   viewBox="0 0 24 24"
                   stroke="currentColor">
                   <path stroke-linecap="round"
                   stroke-linejoin="round"
                   stroke-width="2"
                   d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                  </svg>
                  <h1 x-cloak
                  x-bind:class="!$store.sidebar.full && show ? visibleClass :'' || !$store.sidebar.full && !show ? 'sm:hidden':''">
                  {{__('Staff')}}</h1>
          
          </x-nav-link>
          <!-- requeriments -->
          <x-nav-link x-data="tooltip"
          x-on:mouseover="show = true"
          x-on:mouseleave="show = false"
          @click="$store.sidebar.active = 'requerimientos' "
          class=" relative flex items-center w-11/12 hover:text-gray-500 hover:bg-gray-300 space-x-2 rounded-md p-2 cursor-pointer"
          x-bind:class="{'justify-start': $store.sidebar.full, 'sm:justify-center':!$store.sidebar.full,'text-gray-500 bg-gray-100':$store.sidebar.active == 'requerimientos','text-gray-10 ':$store.sidebar.active != 'requerimientos'}"
          :href="route('requerimiento.index')" :active="request()->routeIs('requerimiento.*')">

              <svg xmlns="http://www.w3.org/2000/svg"
              class="h-6 w-6"
              fill="none"
              viewBox="0 0 24 24"
              stroke="currentColor">
              <path stroke-linecap="round"
              stroke-linejoin="round"
              stroke-width="2"
              d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
             </svg>
             <h1 x-cloak
             x-bind:class="!$store.sidebar.full && show ? visibleClass :'' || !$store.sidebar.full && !show ? 'sm:hidden':''">
             {{__('Requirements')}}</h1>
     
            </x-nav-link>
          <!-- requeriments -->
        <x-nav-link x-data="tooltip"
          x-on:mouseover="show = true"
          x-on:mouseleave="show = false"
          @click="$store.sidebar.active = 'contratos' "
          class=" relative flex items-center w-11/12 hover:text-gray-500 hover:bg-gray-300 space-x-2 rounded-md p-2 cursor-pointer"
          x-bind:class="{'justify-start': $store.sidebar.full, 'sm:justify-center':!$store.sidebar.full,'text-gray-500 bg-gray-100':$store.sidebar.active == 'contratos','text-gray-10 ':$store.sidebar.active != 'contratos'}"
          :href="route('contrato.index')" :active="request()->routeIs('contrato.*')">

              <svg xmlns="http://www.w3.org/2000/svg"
              class="h-6 w-6"
              fill="none"
              viewBox="0 0 24 24"
              stroke="currentColor">
              <path stroke-linecap="round"
              stroke-linejoin="round"
              stroke-width="2"
              d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
             </svg>
             <h1 x-cloak
             x-bind:class="!$store.sidebar.full && show ? visibleClass :'' || !$store.sidebar.full && !show ? 'sm:hidden':''">
             {{__('Contracts')}}</h1>
     
        </x-nav-link>
                <!-- Audience -->
                <div x-data="dropdown"
                     class="relative">
                    <!-- Dropdown head -->
                    <div @click="toggle('parametros')"
                         x-data="tooltip"
                         x-on:mouseover="show = true"
                         x-on:mouseleave="show = false"
                         class="flex justify-between text-gray-10 hover:text-gray-500 hover:bg-gray-300 items-center space-x-2 rounded-md p-2 cursor-pointer"
                         x-bind:class="{'justify-start': $store.sidebar.full, 'sm:justify-center':!$store.sidebar.full, 'text-gray-500 bg-gray-300':$store.sidebar.active == 'audience','text-gray-10 ':$store.sidebar.active != 'parametros'}">
                        <div class="relative flex space-x-2 items-center">
                            <svg xmlns="http://www.w3.org/2000/svg"
                                 class="h-6 w-6"
                                 fill="none"
                                 viewBox="0 0 24 24"
                                 stroke="currentColor">
                                <path stroke-linecap="round"
                                      stroke-linejoin="round"
                                      stroke-width="2"
                                      d="M10.5 6h9.75M10.5 6a1.5 1.5 0 1 1-3 0m3 0a1.5 1.5 0 1 0-3 0M3.75 6H7.5m3 12h9.75m-9.75 0a1.5 1.5 0 0 1-3 0m3 0a1.5 1.5 0 0 0-3 0m-3.75 0H7.5m9-6h3.75m-3.75 0a1.5 1.5 0 0 1-3 0m3 0a1.5 1.5 0 0 0-3 0m-9.75 0h9.75" />
                            </svg>
                            
                            <h1 x-cloak
                                x-bind:class="!$store.sidebar.full && show ? visibleClass :'' || !$store.sidebar.full && !show ? 'sm:hidden':''">
                                Parametros</h1>
                        </div>
                        <svg x-cloak x-bind:class="$store.sidebar.full ? '':'sm:hidden'"
                             xmlns="http://www.w3.org/2000/svg"
                             class="h-4 w-4"
                             viewBox="0 0 20 20"
                             fill="currentColor">
                            <path fill-rule="evenodd"
                                  d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                  clip-rule="evenodd" />
                        </svg>
                    </div>
                    <!-- Dropdown content -->
                    <div x-cloak x-show="open"
                         @click.outside="open =false"
                         x-bind:class="$store.sidebar.full ? expandedClass : shrinkedClass"
                         class="text-gray-10 space-y-3 ">
                        <x-nav-link :href="route('centrodesalud.index')"><h1 class="hover:text-gray-500 cursor-pointer">Centros de Trabajo</h1></x-nav-link> 
                        <x-nav-link :href="route('circularinstnal.index')"><h1 class="hover:text-gray-500 cursor-pointer">Circular Instructivo Nacional</h1></x-nav-link>
                        <x-nav-link :href="route('circularinstreg.index')"><h1 class="hover:text-gray-500 cursor-pointer">Circular Instructivo Regional</h1></x-nav-link>
                        <x-nav-link :href="route('cite.index')"><h1 class="hover:text-gray-500 cursor-pointer">Cite</h1></x-nav-link>
                        <x-nav-link :href="route('docadjunto.index')"><h1 class="hover:text-gray-500 cursor-pointer">Documentos Adjuntos</h1></x-nav-link>
                    </div>
                </div>

               <!-- Audience -->
               <div x-data="dropdown"
               class="relative">
              <!-- Dropdown head -->
              <div @click="toggle('autoridades')"
                   x-data="tooltip"
                   x-on:mouseover="show = true"
                   x-on:mouseleave="show = false"
                   class="flex justify-between text-gray-10 hover:text-gray-500 hover:bg-gray-300 items-center space-x-2 rounded-md p-2 cursor-pointer"
                   x-bind:class="{'justify-start': $store.sidebar.full, 'sm:justify-center':!$store.sidebar.full, 'text-gray-500 bg-gray-300':$store.sidebar.active == 'audience','text-gray-10 ':$store.sidebar.active != 'autoridades'}">
                  <div class="relative flex space-x-2 items-center">
                      <svg xmlns="http://www.w3.org/2000/svg"
                           class="h-6 w-6"
                           fill="none"
                           viewBox="0 0 24 24"
                           stroke="currentColor">
                          <path stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M18 18.72a9.094 9.094 0 0 0 3.741-.479 3 3 0 0 0-4.682-2.72m.94 3.198.001.031c0 .225-.012.447-.037.666A11.944 11.944 0 0 1 12 21c-2.17 0-4.207-.576-5.963-1.584A6.062 6.062 0 0 1 6 18.719m12 0a5.971 5.971 0 0 0-.941-3.197m0 0A5.995 5.995 0 0 0 12 12.75a5.995 5.995 0 0 0-5.058 2.772m0 0a3 3 0 0 0-4.681 2.72 8.986 8.986 0 0 0 3.74.477m.94-3.197a5.971 5.971 0 0 0-.94 3.197M15 6.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm6 3a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Zm-13.5 0a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Z" />
                      </svg>
                      
                      <h1 x-cloak
                          x-bind:class="!$store.sidebar.full && show ? visibleClass :'' || !$store.sidebar.full && !show ? 'sm:hidden':''">
                          Autoridades</h1>
                  </div>
                  <svg x-cloak x-bind:class="$store.sidebar.full ? '':'sm:hidden'"
                       xmlns="http://www.w3.org/2000/svg"
                       class="h-4 w-4"
                       viewBox="0 0 20 20"
                       fill="currentColor">
                      <path fill-rule="evenodd"
                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                            clip-rule="evenodd" />
                  </svg>
              </div>
              <!-- Dropdown content -->
              <div x-cloak x-show="open"
                   @click.outside="open =false"
                   x-bind:class="$store.sidebar.full ? expandedClass : shrinkedClass"
                   class="text-gray-10 space-y-3 ">
                  
                  <h1 class="hover:text-gray-500 cursor-pointer">Autoridades Ejecutivas</h1>
                  <h1 class="hover:text-gray-500 cursor-pointer">Autoridades Juridica</h1>
                  <h1 class="hover:text-gray-500 cursor-pointer">Autoridades Sumariante</h1>
              </div>
          </div>

          

                <!-- Income -->
                {{-- <div x-data="dropdown"
                     class="relative">
                    <!-- Dropdown head -->
                    <div @click="toggle('income')"
                         x-data="tooltip"
                         x-on:mouseover="show = true"
                         x-on:mouseleave="show = false"
                         class="flex justify-between text-gray-10 hover:text-gray-500 hover:bg-gray-300 items-center space-x-2 rounded-md p-2 cursor-pointer"
                         x-bind:class="{'justify-start': $store.sidebar.full, 'sm:justify-center':!$store.sidebar.full,'text-gray-500 bg-gray-300':$store.sidebar.active == 'income','text-gray-10 ':$store.sidebar.active != 'income'}">
                        <div class="relative flex space-x-2 items-center">
                            <svg xmlns="http://www.w3.org/2000/svg"
                                 class="h-6 w-6"
                                 fill="none"
                                 viewBox="0 0 24 24"
                                 stroke="currentColor">
                                <path stroke-linecap="round"
                                      stroke-linejoin="round"
                                      stroke-width="2"
                                      d="M11 3.055A9.001 9.001 0 1020.945 13H11V3.055z" />
                                <path stroke-linecap="round"
                                      stroke-linejoin="round"
                                      stroke-width="2"
                                      d="M20.488 9H15V3.512A9.025 9.025 0 0120.488 9z" />
                            </svg>
                            <h1 x-cloak
                                x-bind:class="!$store.sidebar.full && show ? visibleClass :'' || !$store.sidebar.full && !show ? 'sm:hidden':''">
                                Autoridades</h1>
                        </div>
                        <svg x-cloak x-bind:class="$store.sidebar.full ? '':'sm:hidden'"
                             xmlns="http://www.w3.org/2000/svg"
                             class="h-4 w-4"
                             viewBox="0 0 20 20"
                             fill="currentColor">
                            <path fill-rule="evenodd"
                                  d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                  clip-rule="evenodd" />
                        </svg>
                    </div>
                    <!-- Dropdown content -->
                    <div x-cloak x-show="open"
                         @click.outside="open=false"
                         x-bind:class="$store.sidebar.full ? expandedClass : shrinkedClass"
                         class="text-gray-10 space-y-3">
                        <h1 class="hover:text-gray-500 cursor-pointer">Item 1</h1>
                        <h1 class="hover:text-gray-500 cursor-pointer">Item 2</h1>
                        <!-- Sub Dropdown  -->
                        <div x-data="sub_dropdown"
                             class="relative w-full ">
                            <div @click="sub_toggle()"
                                 class="flex items-center justify-between cursor-pointer">
                                <h1 class="hover:text-gray-500 cursor-pointer">Item 3</h1>
                                <svg xmlns="http://www.w3.org/2000/svg"
                                     class="h-4 w-4"
                                     viewBox="0 0 20 20"
                                     fill="currentColor">
                                    <path fill-rule="evenodd"
                                          d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                          clip-rule="evenodd" />
                                </svg>
                            </div>
                            <div x-show="sub_open"
                                 @click.outside="sub_open = false"
                                 x-bind:class="$store.sidebar.full ? sub_expandedClass:sub_shrinkedClass">
                                <h1 class="hover:text-gray-500 cursor-pointer ">Sub Item 1</h1>
                                <h1 class="hover:text-gray-500 cursor-pointer ">Sub Item 2</h1>
                                <h1 class="hover:text-gray-500 cursor-pointer ">Sub Item 3</h1>
                            </div>
                        </div>
                        <h1 class="hover:text-gray-500 cursor-pointer">Item 4</h1>
                    </div>
                </div> --}}

                <!-- Promote -->
                {{-- <div x-data="dropdown"
                     class="relative">
                    <!-- Dropdown head -->
                    <div @click="toggle('promote')"
                         x-data="tooltip"
                         x-on:mouseover="show = true"
                         x-on:mouseleave="show = false"
                         class="flex justify-between text-gray-10 hover:text-gray-500 hover:bg-gray-300 items-center space-x-2 rounded-md p-2 cursor-pointer"
                         x-bind:class="{'justify-start': $store.sidebar.full, 'sm:justify-center':!$store.sidebar.full,'text-gray-500 bg-gray-300':$store.sidebar.active == 'promote','text-gray-10 ':$store.sidebar.active != 'promote'}">
                        <div class="relative flex space-x-2 items-center">
                            <svg xmlns="http://www.w3.org/2000/svg"
                                 class="h-6 w-6"
                                 fill="none"
                                 viewBox="0 0 24 24"
                                 stroke="currentColor">
                                <path stroke-linecap="round"
                                      stroke-linejoin="round"
                                      stroke-width="2"
                                      d="M8.684 13.342C8.886 12.938 9 12.482 9 12c0-.482-.114-.938-.316-1.342m0 2.684a3 3 0 110-2.684m0 2.684l6.632 3.316m-6.632-6l6.632-3.316m0 0a3 3 0 105.367-2.684 3 3 0 00-5.367 2.684zm0 9.316a3 3 0 105.368 2.684 3 3 0 00-5.368-2.684z" />
                            </svg>
                            <h1 x-cloak
                                x-bind:class="!$store.sidebar.full && show ? visibleClass :'' || !$store.sidebar.full && !show ? 'sm:hidden':''">
                                Promote</h1>
                        </div>
                        <svg x-cloak x-bind:class="$store.sidebar.full ? '':'sm:hidden'"
                             xmlns="http://www.w3.org/2000/svg"
                             class="h-4 w-4"
                             viewBox="0 0 20 20"
                             fill="currentColor">
                            <path fill-rule="evenodd"
                                  d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                  clip-rule="evenodd" />
                        </svg>
                    </div>
                    <!-- Dropdown content -->
                    <div x-cloak x-show="open"
                         @click.outside="open=false"
                         x-bind:class="$store.sidebar.full ? expandedClass : shrinkedClass"
                         class="text-gray-10 space-y-3">
                        <h1 class="hover:text-gray-500 cursor-pointer">Item 1</h1>
                        <h1 class="hover:text-gray-500 cursor-pointer">Item 2</h1>
                        <h1 class="hover:text-gray-500 cursor-pointer">Item 3</h1>
                        <h1 class="hover:text-gray-500 cursor-pointer">Item 4</h1>
                    </div>
                </div> --}}
            </div>
        </div>
<script>
      document.addEventListener('alpine:init', () => {
            // Stores variable globally 
            Alpine.store('sidebar', {
                full: false,
                active: 'home',
                navOpen: false
            });
            
            // Creating component Dropdown
            Alpine.data('dropdown', () => ({
                open: false,
                toggle(tab) {
                    this.open = !this.open;
                    Alpine.store('sidebar').active = tab;
                },
                activeClass: 'bg-gray-300 text-gray-700',
                expandedClass: 'border-l border-gray-400 ml-4 pl-4',
                shrinkedClass: 'sm:absolute top-0 left-20 sm:shadow-md sm:z-10 sm:bg-emerald-300 sm:rounded-md sm:p-4 border-l sm:border-none border-gray-400 ml-4 pl-4 sm:ml-0 w-28'
            }));
            // Creating component Sub Dropdown
            Alpine.data('sub_dropdown', () => ({
                sub_open: false,
                sub_toggle() {
                    this.sub_open = !this.sub_open;
                },
                sub_expandedClass: 'border-l border-gray-400 ml-4 pl-4',
                sub_shrinkedClass: 'sm:absolute top-0 left-28 sm:shadow-md sm:z-10 sm:bg-gray-900 sm:rounded-md sm:p-4 border-l sm:border-none border-gray-400 ml-4 pl-4 sm:ml-0 w-28'
            }));
            // Creating tooltip
            Alpine.data('tooltip', () => ({
                show: false,
                visibleClass:'block sm:absolute -top-7 sm:border border-gray-500 left-5 sm:text-sm sm:bg-emerald-300 sm:px-2 sm:py-1 sm:rounded-md'
            }))
            
        })
</script>
       

