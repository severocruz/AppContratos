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

                    <form action="" method="POST">

                        <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4 flex flex-col">
                            <div class="-mx-3 md:flex mb-6">
                                <div class="md:w-1/3 px-3 mb-6 md:mb-0">

                                    <label class="uppercase tracking-wide text-black text-xs font-bold mb-2"
                                        for="a_paterno">
                                        {{ __('Last name 1') }}
                                    </label>
                                    <input type="text" name="a_paterno" id="a_paterno" value=""
                                        class="w-full bg-gray-200 text-black border border-gray-200 rounded py-3 px-4 mb-3">

                                </div>
                                <div class="md:w-1/3 px-3">

                                    <label class="uppercase tracking-wide text-black text-xs font-bold mb-2"
                                        for="a_materno">
                                        {{ __('Last name 2') }}
                                    </label>
                                    <input type="text" name="a_materno" id="a_materno" value=""
                                        class="w-full bg-gray-200 text-black border border-gray-200 rounded py-3 px-4 mb-3">

                                </div>
                                <div class="md:w-1/3 px-3 mb-6 md:mb-0">

                                    <label
                                        class="uppercase tracking-wide text-black text-xs font-bold mb-2"for="nombres">
                                        {{ __('Names') }}
                                    </label>
                                    <input type="text" name="nombres" id="nombres" required value=""
                                        class="w-full bg-gray-200 text-black border border-gray-200 rounded py-3 px-4 mb-3">
                                </div>
                            </div>
                            <div class="-mx-3 md:flex mb-6">
                                <div class="md:w-1/3 px-3 mb-6 md:mb-0">
                                    <label class="uppercase tracking-wide text-black text-xs font-bold mb-2"for="CI">
                                        {{ __('CI') }}
                                    </label>
                                    <input type="text" name="CI" id="CI" required value=""
                                        class="w-full bg-gray-200 text-black border border-gray-200 rounded py-3 px-4 mb-3">
                                </div>
                                <div class="md:w-1/3 px-3">
                                    <label for="id_dep">
                                        {{ __('Issued in') }}
                                    </label>
                                    <div>
                                        <select name="id_dep" id="id_dep"
                                            class="w-full bg-gray-200 border border-gray-200 text-black text-xs py-3 px-4 pr-8 mb-3 rounded">
                                            <OPTION value="1">La Paz</OPTION>
                                        </select>
                                    </div>
                                </div>
                                <div class="md:w-1/3 px-3 mb-6 md:mb-0">
                                    <label class="uppercase tracking-wide text-black text-xs font-bold mb-2"for="fecha_nac">
                                        {{ __('Birthdate') }}
                                    </label>
                                    <input type="date" name="fecha_nac" id="fecha_nac" required value=""
                                        class="w-full bg-gray-200 text-black border border-gray-200 rounded py-3 px-4 mb-3">
                                </div>
                            </div>

                        </div>
                    </form>
                    {{-- <div class="cell">
                                    <div class="input-control text full-size" data-role="input">
                                        <label for="a_materno">Apellido Materno:</label>
                                        <input type="text" name="a_materno" id="a_materno" required="" value="">
                                    </div>
                                </div>
                            
                    </div>
                    <div class="row cells3">
                <div class="cell">
                   
                </div>
                <div class="cell">
                   
                </div>
                <div class="cell">
                    <div class="input-control text full-size" data-role="input">	
                        <label for="fecha_nac">Fecha de Nacimiento:</label>
                        <input type="date" name="fecha_nac" id="fecha_nac"  value="">
                    </div>
                </div>
                    </div><!--row-->
                    <div class="row cells12">
                        <div class="cell colspan1">
                        <label for="sexo" class="control label">Sexo:</label>
                        </div>
                        <div class="cell colspan3">
                        <label  class="input-control radio small-check">
                        <input type="radio" name="sexo" id="sexo1" value=">>
                        <span class="check"></span>
                        <span class="caption">Masculino</span>
                        </label>
                        <label  class="input-control radio small-check">
                        <input type="radio" name="sexo" id="sexo2" value=">>
                        <span class="check"></span>
                        <span class="caption">Femenino</span>
                        </label>
                        </div>
                        <div class="cell colspan4">
                           <div class="input-control select full-size">
                                <label for="id_afp">AFP aportes:</label>
                                 <select id="id_afp" name="id_afp">
                                     
                                 </select>
                           </div>
                        </div>
                    <div class="cell colspan4"> 
                        <div class="input-control text full-size">
                            <label for="matricula">Matricula</label>
                        <input type="text" name="matricula" id="matricula" value="">
                        </div>
                     
                    </div>
                    
                    </div>
                    <div class="row cells5">
                
                        <div class="cell">
                          <label for="est_civil" class="control label" >Estado civil:</label>
                        </div>
                        <div class="cell">
                        <label  class="input-control radio small-check">
                        <input type="radio" name="est_civil" id="est_civil1" value=">>
                        <span class="check"></span>
                        <span class="caption">Casado/a</span>
                        </label>
                        </div>
                        <div class="cell">
                        <label  class="input-control radio small-check">
                        <input type="radio" name="est_civil" id="est_civil2" value=">>
                        <span class="check"></span>
                        <span class="caption">Soltero/a</span>
                        </label>
                        </div>
                        <div class="cell">
                        <label  class="input-control radio small-check">
                        <input type="radio" name="est_civil" id="est_civil3" value=">>
                        <span class="check"></span>
                        <span class="caption"><small>Divorciado/a</small></span>
                        </label>
                        </div>	
                
                        <div class="cell">
                        <label  class="input-control radio small-check">
                        <input type="radio" name="est_civil" id="est_civil" value=">>
                        <span class="check"></span>
                        <span class="caption">Viudo/a</span>
                        </label>
                    </div>
                </div>
                <div class="row">
                <div class="cell">
                <div class="window">
                    <div class="window-caption">
                    Domicilio:	
                    </div>
                    <div class="window-content">
                    <div class="row"> <div class="cell"></div></div>
                    <div class="row cells12">
                     <div class="cell colspan4">
                        <div class="input-control text full-size">
                            <label for="localidad">Localidad:</label>
                            <input type="text" name="localidad" id="localidad" value="">
                        </div>
                      </div>
                      <div class="cell colspan8">
                        <div class="input-control text full-size">
                            <label for="direccion">Zona/Barrio:</label>
                            <input type="text" name="direccion" id="direccion" value="">
                        </div>
                       </div>
                
                    </div>
                    <div class="row cells12">
                     
                     <div class="cell colspan8">
                        <div class="input-control text full-size">
                            <label for="calle">Calle:</label>
                            <input type="text" name="calle" id="calle" value="">
                        </div>
                      </div>
                      <div class="cell colspan4">
                        <div class="input-control text full-size">
                            <label for="No">Número de Puerta:</label>
                            <input type="text" name="No" id="No" value="">
                        </div>
                       </div>
                     </div>
                     </div>
                    </div>
                    </div>
                    </div>
                    <div class="row cells2">
                     <div class="cell">
                        <div class="input-control text full-size">
                            <label for="telefono">Telefonos:</label>
                            <input type="text" name="telefono" id="telefono" value="">
                        </div>
                    </div>
                    <div class="cell">
                    <div class="input-control text full-size">
                        <label for="email">Email:</label>
                        <input type="email" name="email" id="email" value="">
                    </div>
                    </div>
                   </div>
                   
                        <label for="id_esper"></label>
                        <input type="hidden" name="id_esper" id="id_esper" value="">
                        <input type="hidden" name="foto" id="foto" value="">
                        <div class="row cells3">
                          <div class="cell">
                          </div>
                          <div class="cell">
                
                          <input type="submit" onclick="metroDialog.toggle('#cargando');" name="Guardar Datos" value="">
                          </div>
                          <div class="cell">
                          </div>
                        </div>
                    </div><!--grid-->
                    </form> 
                </div>
            </div>
        </div>
    </div> --}}
</x-app-layout>
