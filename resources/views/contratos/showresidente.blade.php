 
  {{-- {{isset($personal->filePer)?$personal->filePer->nombre:'No tiene File'}} --}}
  <!DOCTYPE html>
  <html lang="es">
  <head>
      <title>Contrato residente imprimible</title>
      <meta charset="utf-8">
      <link rel="stylesheet" type="text/css" href="{{asset('css/estilo2.css')}}">
  </head>
  <body>
   <a href="#" onclick="window.close()"  id="listarcon">Volver</a>
  <a href="#" onclick="imprimirCon()" id="imprimirc">imprimir</a>
   <div>
    <div id="carta">  
  			
    {{-- <img src="'./codqr/temp/'.$this->data['contrato']['imagen']" class="qr" > --}}
    @if(isset($contrato->hash1) && $contrato->hash1)
        <div class="qr">
            {!! QrCode::size(135)->generate($contrato->hash1) !!}
        </div>
    @endif
  </div> 
  <div id="contrato1">
          {{-- <img src="./imagenes/logocnsrlp.png" class="logo" > --}}
          <img src="{{ asset('images/logocolorcns.jpg') }}" alt="" class="logo">
       <div style="width: 100%"> 
          <div class="titulo">CAJA NACIONAL DE SALUD</div>
          <div class="subtitulo">REGIONAL LA PAZ </div>
          <hr class="linea">
          <div class="subtis"><small>Edificio central Administración Regional La Paz</small><br></div>
          <div class="subtis"><small>Calle Bueno N° 240 esquina Av. Camacho</small><br></div>
          <div class="subtis"><small>Central Telefónica (591-2) 2901901</small><br></div>
          <div class="subtitulo2"><b>CONTRATO DE BECA PARA FORMACIÓN POST- GRADUAL BAJO EL SISTEMA DE RESIDENCIA
             MÉDICA EN LA ESPECIALIDAD O SUBESPECIALIDAD DE {{$complemento->especialidad->nombre}}</b></div>
          <div class="subtitulo2"><b>( PARA MÉDICOS BECARIOS)</b></div>
      </div>
  <p id="cod"><b>Contrato Becario Médico Residente N°:{{$ut->rellenaceros($contrato->noCon)}}</b></p>
  
  <p id="mat"><b>MAT-{{$personal->matricula}}</b></p>	                          
  
  <p class="parrafo">
  Conste por el presente<b> Contrato de Beca para la Formación Post - Gradual en la especialidad de {{$complemento->especialidad->nombre}}</b> bajo el 
    Sistema de Residencia Médica, suscrito por una parte 
    por el {{$admair->nombre.' '.$admair->user->nombres.' '.$admair->user->a_paterno.' '.$admair->user->a_materno}}
     CI: {{$admair->user->ci}} {{$admair->user->departamento->sigla}} <b>{{$admair->cargo}} REGIONAL LA PAZ</b> 
     y el {{$jefeaim->nombre.' '.$jefeaim->user->nombres.' '.$jefeaim->user->a_paterno.' '.$jefeaim->user->a_materno }} 
     CI: {{$jefeaim->user->ci}} {{$jefeaim->user->departamento->sigla}} <b>{{$jefeaim->cargo}}</b> que para efectos del presente contrato en adelante se denominarán <b>LA CAJA</b> y por otra parte el (la) 
     Dr. (a) {{$personal->nombres." ".$personal->a_paterno." ".$personal->a_materno}} <b>Médico Residente</b>, que en adelante se denominará <b>EL BECARIO,</b> sujetándose al tenor de las 
     siguientes Cláusulas:
  </p>
    <p class="parrafo"> <b>PRIMERA: ANTECEDENTES. -</b><br> 
    En atención a la renovación del Convenio firmado entre el Ministerio de Salud y Deportes con la Universidad Boliviana 
    y el fortalecimiento del Comité Nacional de Integración Docente Asistencial Investigación e Interacción Comunitaria 
    (CNIDAIIC), el Sistema Nacional de Residencia Médica en cumplimiento a la función de brindar servicios más eficientes y 
    de alta calidad a través de la formación de Recursos Humanos cuyo perfil responda a las necesidades del país, ha
      reconocido a la Caja Nacional de Salud como una Entidad que cuenta con establecimientos acreditados como Centros de 
      Formación de la Residencia Médica, en mérito a que esta Institución se constituye en el principal Ente Gestor, que 
      cuenta con profesionales de reconocido nivel profesional, infraestructura adecuada y tecnología de punta. 
    </p>

    <p class="parrafo">
        El Comité Nacional de Integración Docente Asistencial Investigación e Interacción Comunitaria (CNIDAIIC) 
        a través del Comité Regional Docente Asistencial Investigación e Interacción Comunitaria (CRIDAIIC) La Paz,
         en cumplimiento al Reglamento del Sistema Nacional de Residencia Médica y en el marco jurídico establecido 
         en el último Congreso de Integración Docente Asistencial e Investigación, llevado a cabo en la ciudad de 
         Sucre, Chuquisaca, en la primera quincena de septiembre del 2013, ha procedido a la Admisión de postulantes
          al Sistema de Residencia Médica de acuerdo a las normas y reglamentos del Postgrado con la finalidad de 
          formar médicos especialistas y Subespecialistas en concordancia con las políticas de formación y capacitación 
          de Recursos Humanos para la prosecución de Programas y Actividades de Salud, aceptando la incorporación de
           Profesionales Médicos para su formación a través de la Caja Nacional de Salud, Entidad que mediante su 
           Dirección de Servicios de Salud brindará la enseñanza Post-Gradual en el marco de los Planes de Estudio 
           aprobados por el CNIDAIIC, los programas propios de cada especialidad desarrollando potencialidades 
           cognoscitivas, psicomotrices y afectivas de los Médicos Residentes, debiendo al término de cada gestión 
           académica de su formación ser evaluados en las aptitudes y actitudes adquiridas y recibir la certificación
           que corresponda.
    </p>
    <p class="parrafo"><b>SEGUNDA: OBJETIVO.-</b><br>
        En el entendido de que la Residencia Médica es un sistema de formación post-gradual técnica, científica,
        de aprendizaje en el trabajo y de servicio, dirigida a médicos bajo el régimen de <b> Dedicación Exclusiva,</b>
        el presente Contrato tiene por objeto el establecer las obligaciones y derechos que genera la Formación 
        Post-Gradual, tanto para Médico Residente en su calidad de <b>EL BECARIO</b>, como para <b>LA CAJA</b> en su calidad 
        de Co-Responsable de la implementación del Curso de Enseñanza Teórico  - Práctico a ser desarrollado 
        a través de la Dirección de Servicios de Salud, la Comisión Regional de Post Grado, supervisión de enseñanza 
        Regional La Paz y los Comités Docentes Asistenciales Intra hospitalarios</p>
        <p class="parrafo">
            La Formación Post-Gradual comprenderá:
            <ol type="a" class="parrafo">
                <li>	Instrucción en la Especialidad o Subespecialidad respectiva.</li>
                <li>	Adiestramiento clínico asistencial.</li>
                <li>	Instrucción clínica complementaria.</li>
                <li>	La instrucción se sujetará a los programas particulares de cada Especialidad o Subespecialidad.</li>
                <li>	Las actividades académicas y asistenciales serán desarrolladas a DEDICACIÓN EXCLUSIVA.</li>

            </ol>
        </p>
  <p class="parrafo"><b>TERCERA: DISPOSICIONES LEGALES. - </b> <br>
    El presente Contrato por su naturaleza, excluye toda relación laboral y de dependencia entre<b> EL BECARIO y LA CAJA,</b>
    por tanto,<b> no se encuentra sujeto a la Ley General del Trabajo</b>, su Decreto Reglamentario y otras disposiciones 
    conexas, en tal sentido no se reconocerán beneficios ni cargas sociales de ninguna clase. Sin embargo, al estar la Institución bajo el
  </p>
   
    <br><small>{{$iniciales.'/'.$usuario->name}}<br>
    c.c. Arch. 
    @switch($copia)
    @case('1') ORIGINAL @break
    @case('2') COPIA KARDEX @break
    @case('3') COPIA INTERESADO @break
    @case('4') COPIA RRHH      @break
    @default NO VALIDO
    @endswitch<br>
    
    File Personal No:&nbsp; {{isset($personal->filePer)? $personal->filePer->nombre:'Sin asignar'}}</small>
    <hr>
    <i>{{$contrato->fechaCon}}</i>&nbsp;&nbsp;
            <i>{{$contrato->hash1."  ".$usuario->name}}</i>
    
    <div class="saltopagina"></div> 
    <p class="parrafo">
          ámbito de aplicación de los Sistemas de administración y Control de los 
        Recursos del Estado y a la Ley Nº 1178 de 23/07/1990 (Ley SAFCO) de Administración y Control Gubernamental, 
        el presente Contrato se encuentra sujeto al Art. 5 de dicha normativa y en todo lo correspondiente a la 
        Responsabilidad por la Función Pública de demás normas análogas.
      </p> 
      <p class="parrafo">
        <b>LA CAJA</b>, atendiendo a los principios fundamentales de la Seguridad Social y a que la Formación Post - Gradual 
        es un sistema de aprendizaje en el trabajo y de servicio, otorgará el Seguro de Salud Familiar a 
        favor del <b>BECARIO</b> a cuyo efecto se realizará un descuento del 2% mensual, teniendo este último la obligación 
        de cumplir con el respectivo trámite de Afiliación para recibir la atención médica que dispensa la C.N.S. 
        en la brevedad posible. 
      </p>
    
  <P class="parrafo"><b>CUARTA: DE LA ASIGNACIÓN DEL ESTIPENDIO. -</b><br>
    Los residentes que hubieren cumplido con los requisitos de admisión, gozarán del beneficio de la Beca de Formación 
    Post - Gradual de Especialidad otorgada por LA CAJA bajo la modalidad de BECARIO, recibiendo un Estipendio Mensual 
    de<b> Bs. {{str_replace(".",",",strval($nivel->salario/2)) }} (CUATRO MIL CIENTO OCHENTA Y UN 50/100 BOLIVIANOS),</b> equivalente al 50% del Salario Básico de un 
    Médico de Planta de tiempo completo Nivel 9A, monto que será reajustado de acuerdo al incremento salarial dispuesto 
    por el Supremo Gobierno.
    </P>
    <p class="parrafo">
        Con respecto a aquellos Médicos Residentes que hubieran cumplido los requisitos de admisión para su formación
        Post-Gradual en Subespecialidad, otorgada por <b> LA CAJA</b> bajo modalidad de <b>BECARIO</b>, en observación al Reglamento
        General del Sistema Nacional de la Residencia Médica (Ed. 2017, Pg. 90), Capítulo I: Disposiciones Generales, 
        Artículo 33: De la formación para la subespecialidad, inciso d: “Se convocará con estipendio cuyo monto podrá 
        ser equivalente a la escala salarial para médico (a) a tiempo completo vigente”: recibirán un Estipendio Mensual
        equivalente al Salario Básico de un Médico de Planta de tiempo completo 
        Nivel 9A de <b>Bs. {{strval($nivel->salario)}} ({{$nivel->literal}} 00/100 BOLIVIANOS),</b> 
        monto que será reajustado de acuerdo al incremento salarial dispuesto por el Supremo Gobierno.

    </p>
    <p class="parrafo">De igual manera, <b> EL BECARIO</b>, recibirá una bonificación de fin de año equivalente a un mes de estipendio 
        de Beca pagadera hasta el 20 de diciembre de cada Gestión, el cual no será sujeto a descuento alguno, 
        en caso de determinaciones por el Ministerio de Economía y Finanzas Publicas se otorgarán las siguientes 
        Bonificaciones, según lo establecido por ley.</p>

  <p class="parrafo"><b>QUINTA: PLAZO. -</b><br> 
    La Beca para la Formación Post - Gradual otorgada por <b>LA CAJA</b> en la especialidad o subespecialidad de {{$complemento->especialidad->nombre}}, 
    tiene una duración de <b>{{$complemento->duracion}}</b> años y en cumplimiento a la Norma Boliviana de IDAIIC (versión 2017) inciso c) 
    del Artículo 15 del capítulo II del Reglamento General del Sistema Nacional de Residencia Médica, 
    el beneficiado con la Beca deberá firmar Contratos de Residencia Médica anuales con la Institución formadora. 
    En este sentido, el presente Contrato tendrá vigencia, computable a partir del <b>{{$ut->cambiaformatofecha($contrato->fechaIni)}}</b> 
    hasta el <b>{{$ut->cambiaformatofecha($contrato->fechaFin)}}</b>. 
    correspondiente al <b>@switch($complemento->anio_formacion)
        @case(1)
            {{'PRIMER'}}
            @break
        @case(2)
            {{'SEGUNDO'}}
            @break
        @case(3)
            {{'TERCERO'}}
            @break
        
        @default
        {{'CUARTO'}}    
    @endswitch AÑO DE FORMACIÓN,</b> debiendo ser renovado en mismo en la siguiente la Gestión 
    y previa aprobación académica de <b> EL BECARIO</b>.  
    </p>

 
  <p class="parrafo"><b>SEXTA: DE LAS OBLIGACIONES DEL BECARIO.- </b><br> 
    Bajo el Sistema de Residencia Médica, EL BECARIO tendrá las siguientes obligaciones:</p>
    <p class="parrafo">
        <ol type="a" class="parrafo">
	        <li>Cumplir con las exigencias de la Formación Post Gradual a DEDICACIÓN EXCLUSIVA.</li>
	        <li>Conocer y cumplir los principios de ética y deontología profesional.</li>
	        <li>Conocer y cumplir las normas de régimen disciplinario y Reglamentación del Hospital sede de sus actividades; así como la Norma Boliviana del Sistema de Residencia Médica y Normativa Interna de la Caja Nacional de Salud.</li>
	        <li>Realizar labor asistencial a tiempo de recibir enseñanza.</li>
	        <li>Presentar y defender un trabajo científico escrito, cada fin de gestión académica y un trabajo final para la obtención del título de especialidad.</li>
	        <li>EL BECARIO se obliga a cumplir tareas típicas establecidas por la OPS/OMS.</li>
	        <li>Atender a los pacientes de especialidad cuando así lo solicite el Docente Responsable o Instructor.</li>
	        <li>Proponer las indicaciones del tratamiento y de internación al Docente Responsable o Instructor, según normas de la Unidad.</li>
	        <li>Realizar procedimientos relativos a la especialidad, según normas establecidas y siempre bajo tuición de su docente instructor.</li>
	        <li>Realizar visitas constantes y periódicas a los pacientes internados y asignados, tomando datos sobre su evolución y comunicar a su docente instructor.</li>
	        <li>Proponer al Docente Responsable o Instructor conductas a seguir en relación al paciente, la transferencia y el alta del mismo.</li>
	        <li>Analizar las Historias Clínicas preparadas por Médicos Internos y Médicos Residentes de menor grado, agregando por escrito su impresión sobre el diagnóstico.</li>
	        <li>Informar al Docente Responsable o Instructor sobre los pacientes en observación, con tratamiento especial o situación grave.</li>
	        <li>Participar en las reuniones clínicas, anatomoclínicas, anatomopatológicas y administrativas cuando sea requerido o según rol establecido. </li>
            <li>Alcanzar un promedió mínimo 70 puntos para la aprobación de la Gestión Académica.</li>
	        <li>Tener un comportamiento acorde con las Normas del Trato Social y cultural.</li>
        </ol>
            <br><small>{{$iniciales.'/'.$usuario->name}}<br>
                c.c. Arch. 
                @switch($copia)
                @case('1') ORIGINAL @break
                @case('2') COPIA KARDEX @break
                @case('3') COPIA INTERESADO @break
                @case('4') COPIA RRHH      @break
                @default NO VALIDO
                @endswitch<br>
                
                File Personal No:&nbsp; {{isset($personal->filePer)? $personal->filePer->nombre:'Sin asignar'}}</small>
                <hr>
                <i>{{$contrato->fechaCon}}</i>&nbsp;&nbsp;
                        <i>{{$contrato->hash1."  ".$usuario->name}}</i>
            <div class="saltopagina"></div>
        <ol type="a" class="parrafo" start="17">
            
	        <li>Todo Médico Residente está obligado a prestar servicios de salud a la conclusión de su formación en calidad de contratado a requerimiento institucional.</li>

        </ol>
    </p>
    
        
        
  <p class="parrafo"><b>SÉPTIMA:   DE LAS PROHIBICIONES DEL BECARIO. -</b><br>
    El Médico Residente de la Caja Nacional de Salud en su calidad de BECARIO, está en la obligación 
    de conocer las siguientes prohibiciones:
    </p>
    <p class="parrafo">
        <ol type="1" class="parrafo">
            <li>Incorporarse a organismos sindicales de la profesión.</li>
            <li>Participar en huelgas, paros y otros actos contrarios a la disciplina o al Reglamento de la Residencia Médica o el Centro de Formación donde presta servicios.</li>
            <li>Hacer abandono de sus funciones o del establecimiento donde se desarrolla su formación post gradual.</li>
            <li>Realizar cualquier tratamiento, consulta, estudios complementarios de gabinete o intervención quirúrgica sin la autorización, asesoramiento y supervisión del Docente Responsable o Instructor.</li>
            <li>Tener un comportamiento reñido con la moral y las buenas costumbres.</li>
            <li>Ingresar en controversias, discusiones o riñas con sus compañeros, superiores jerárquicos, personal administrativo o de enfermería, pacientes o familiares de los pacientes.</li>
            <li>Presentarse o desempeñar funciones bajo efectos de bebidas alcohólicas y/o de estupefacientes, ni consumirlas en dependencias de cualquier Centro Hospitalario dependiente de la CNS-La Paz, 
                en caso de sospecha, el Jefe de Enseñanza del centro hospitalario solicitará a personal de laboratorio se le realice al BECARIO exámenes de Alcoholemia y/o de Estupefacientes en sangre y/u orina 
                (rastreo de compuestos o metabolitos de: alcohol, cannabinoides, opiáceos, benzodiacepinas y Benzoilecgonina-2) aplicando la norma CRIDAIIC (Ed. 2017, Pg. 111) Reglamento General del Sistema Nacional 
                de Residencia Médica: Capítulo III Reglamento de Funcionamiento de la Residencia Médica, Artículo12, inciso d), según los resultados.</li>
            <li>Prestar servicios profesionales en otras instituciones o realizar práctica privada simultánea con su adiestramiento.</li>
            <li>Causar daños materiales intencionales en los equipos, materiales, ambientes o servicios del Centro Hospitalario sede de su formación.</li>
            <li>Recibir retribuciones económicas o dádivas de los pacientes, familiares de estos o terceras personas en general.</li>
            <li>Suministrar información del estado de un paciente a la prensa u otras personas, determinándose esta actitud como infidencia si no tuvo supervisión o aquiescencia de su docente instructor.</li>

        </ol>
    </p>
<p class="parrafo"><b>OCTAVA:   DE LOS DERECHOS DEL BECARIO. -</b><br>
    EL BECARIO, al haber sido beneficiario con la Beca de Formación Post – Gradual, tiene los siguientes derechos:
</p>
<p class="parrafo">
    <ol class="parrafo">
        <li>Lograr conocimientos, habilidades y destrezas específicas en una determinada especialidad o subespecialidad.</li>
        <li>Tener un trato respetable, digno y cordial de parte del plantel de médicos formadores, médicos residentes de nivel superior, personal administrativo, personal de enfermería, personal manual, pacientes y familiares de éste.</li>
        <li>A la aplicación del Régimen Disciplinario en sujeción a lo dispuesto por el Reglamento del Sistema Nacional de Residencia Médica.</li>
        <li>Desarrollar sus actividades académicas a dedicación exclusiva.</li>
        <li>A realizar sus actividades académicas bajo asesoramiento, supervisión y evaluación del Docente Responsable o Instructor.</li>
        <li>Gozar de un descanso pedagógico de 21 días calendario (de lunes a domingo), a partir del primer semestre del segundo año de residencia (una vez por año) y según programación previamente establecida. (Reglamento general del Sistema Nacional de la Residencia Médica (Ed. 2017, Pg. 109), Capítulo III: Reglamento de Funcionamiento de la Residencia Médica, Artículo10, inciso e).</li>
        <li>Gozar de descanso en su día de posturno, con salida desde horas 15:00 (de lunes a viernes) a partir de su segundo año de formación y en todos sus años de subespecialidad. Siempre y cuando haya cumplido con todo su trabajo a la jornada correspondiente y tenga la quiescencia de su docente responsable.</li>
        <li>Tener permisos por eventualidades con causas justificadas, enfermedad o baja médica que no supere los tres meses en su sumatoria total, si este tiempo es superado, debe aplicarse el Reglamento del Sistema Nacional de Residencia Médica.</li>
        <li>A acceder a niveles superiores dentro de la Residencia Médica, previo cumplimiento de los requisitos exigidos.</li>
        <li>Ser respetados sus horarios y Rol de Guardias Médicas, excepto en casos de emergencia institucional o desastre nacional.</li>
        <li>Realizar eventuales reclamos de acuerdo a procedimiento establecido en el Reglamento del Sistema Nacional de Residencia Médica.</li>
        <li>Obtener el título de la Especialidad o Subespecialidad, previo cumplimiento de los requisitos exigidos por LA CAJA y el Sistema Nacional de Residencia Médica.</li>
    </ol>
</p>
<p class="parrafo"><b>NOVENA: DE LAS OBLIGACIONES DE LA CAJA. -</b><br>
    <b>LA CAJA</b> en su calidad de Co-Responsable de la implementación académica Teórico - Práctico, se obliga a cumplir con lo siguiente:
</p>
<p class="parrafo">
    <ol type="a" class="parrafo">
        <li>Someter al BECARIO a un periodo de prueba de 90 días, para su evaluación moral, intelectual y psíquica, en coordinación con el reglamento de CRIDAIIC.</li>
        <li>Atención alimentaría, consistente en desayuno, almuerzo, servicio de té, cena y colación nocturna (los dos últimos solamente el día de turno), de acuerdo a la calidad y disponibilidad de alimentos de la Institución.</li>
        <li>Proporcionar ropa de trabajo, consistente en un mandil, un pijama, sujeto a posibilidades Institucionales.</li>
    </ol>
    <small>{{$iniciales.'/'.$usuario->name}}<br>
        c.c. Arch. 
        @switch($copia)
        @case('1') ORIGINAL @break
        @case('2') COPIA KARDEX @break
        @case('3') COPIA INTERESADO @break
        @case('4') COPIA RRHH      @break
        @default NO VALIDO
        @endswitch<br>
        
        File Personal No:&nbsp; {{isset($personal->filePer)? $personal->filePer->nombre:'Sin asignar'}}</small>
        <hr>
        <i>{{$contrato->fechaCon}}</i>&nbsp;&nbsp;
                <i>{{$contrato->hash1."  ".$usuario->name}}</i>
    <div class="saltopagina"></div>
    <ol type="a" class="parrafo" start="4">
        
        <li>Proporcionar las condiciones mínimas de bioseguridad para el desempeño de sus funciones.</li>
        <li>Reconocer el pago de los Estipendios. </li>
        <li>Impartir la enseñanza en coordinación con los organismos superiores llamados para el efecto.</li>
        <li>Finalizar la formación en la especialidad o Subespecialidad otorgando un Certificado de Aprobación y el Certificado de la Especialidad o Certificado de la Subespecialidad, previo informe del Supervisor Regional de Enseñanza e Investigación.</li>
        <li>Reconocer el descanso pedagógico anual de 21 días calendario (de lunes a domingo), a partir del segundo año de la Residencia, según programación concertada.</li>
        <li>En observación al Reglamento General del Sistema Nacional de la Residencia Médica (Ed. 2017, Pg. 111), Capítulo III: Reglamento de Funcionamiento de la Residencia Médica
            , Artículo13: “Los médicos residentes se encuentran en etapa de formación postgradual, consecuentemente sus acciones están bajo la supervisión y vigilancia de los médicos especialistas o subespecialistas de la planta docente asistencial.”: 
            Los Becarios no deben ser utilizados para remplazar trabajo de los médicos de planta.</li>
    </ol>
</p>
<p class="parrafo"><b>DECIMA: DE LAS CAUSAS DE RESCISIÓN. -</b><br>
    Siendo la Rescisión una forma de invalidar un contrato por lesión o estado de peligro, proporcionando la alternativa de restablecer el equilibrio de las prestaciones y mantener el contrato o conformarse con la invalidez, 
    se establecen las siguientes causas de rescisión:
</p>
<p class="parrafo">
    <ol class="parrafo">
        <li>Informe negativo del Periodo de Prueba, emitido por el Docente Responsable de la Especialidad, Jefe del Departamento de Enseñanza e Investigación del Hospital y Comité Docente Asistencial Hospitalario, elevando esta comunicación al CRIDAIIC.</li>
        <li>Si en el transcurso de la Beca se presentaran anomalías y/o impedimentos por parte del BECARIO.</li>
        <li>Incapacidad física o psíquica del Becario, determinada por el Comité Docente Asistencial de su centro formador.</li>
        <li>Infidencia comprobada.</li>

    </ol>
</p>
<p class="parrafo"><b>DECIMA PRIMERA: DE LAS CAUSAS DE RESOLUCIÓN. -</b><br>
    En el entendido de que la resolución de un contrato es la forma de invalidar un contrato por causas 
    sobrevinientes debido al incumplimiento culpable de una de las partes, se establecen las siguientes 
    causas de resolución:
</p>
<p class="parrafo">
    <ol class="parrafo">
        <li>Por incumplimiento de una o varias de las cláusulas establecidas en el presente contrato o según La Norma Boliviana IDAIIC.</li>
        <li>Incumplimiento al Reglamento Sistema Nacional de la Residencia Médica y/o normativa interna del Centro Hospitalario sede de la Formación Post - Gradual.</li>
        <li>Realizar tratamientos o intervenciones quirúrgicas o de gabinete sin autorización y/o tuición del Docente Responsable o Instructor, debiéndose producir inmediatamente la suspensión del 
        <b>BECARIO</b>, suspensión que durará hasta la emisión de la sanción correspondiente emitida por el Comité Docente Asistencial del Centro Formador, sin perjuicio de las responsabilidades penal y civil que pudo emerger de tal accionar.</li>
        <li>No obtener la puntuación mínima de aprobación en la Gestión Académica.</li>
    </ol>

</p>
<p class="parrafo"><b>DECIMA SEGUNDA:   CLÁUSULA PENAL. -  </b><br>
    En caso de Rescisión o Resolución del presente Contrato de Beca para la Formación Post - Gradual en la especialidad 
    o subespecialidad del {{$complemento->especialidad->nombre}}, por causas imputables al <b>BECARIO,</b> 
    éste se obliga a pagar con mantenimiento de valor o interés, el total del costo de la Beca de Formación 
    Post-Gradual del que fue beneficiado.
</p>
<p class="parrafo">
    En caso de incumplimiento a la señalada obligación, <b>LA CAJA</b> deberá girar la respectiva Nota de 
    Cargo en contra del (de) (la) Dr. (a) {{$personal->nombres." ".$personal->a_paterno ." ".$personal->a_materno}} y sus garantes, para la recuperación de los montos 
    erogados por la Caja Nacional de Salud en la formación del mencionado profesional médico, por la Vía 
    Coactiva Social o la que eligiere, salvando casos fortuitos y excepcionales como accidentes de extrema 
    gravedad o muerte del <b>BECARIO</b>.
</p>

<p class="parrafo"><b>DECIMA TERCERA:   DE LA OBLIGACIÓN DE LA CONTRAPRESTACIÓN. -</b><br>
        Siendo que LA CAJA invirtió recursos económicos (Institucionales), humanos, técnicos y asistenciales en 
        la formación del (de) (la) Dr. (a) {{$personal->nombres." ".$personal->a_paterno ." ".$personal->a_materno}}. Sus Garantes: 
        1er Garante {{$garante1->nombres." ".$garante1->a_paterno ." ".$garante1->a_materno}}.2do Garante {{$garante2->nombres." ".$garante2->a_paterno ." ".$garante2->a_materno}}. 
        Estarán en la obligación de contra prestar a la Institución formadora ofreciendo servicios 
        bajo la modalidad de Contrato Temporal en la especialidad o subespecialidad en que se formó
         y a requerimiento institucional por el lapso que la C.N.S. requiera hasta un tope máximo equivalente 
         al tiempo de su formación.
    </p>
<p class="parrafo"><b>DECIMA CUARTA:   DISPOSICONES FINALES. -</b><br>
    En caso de presentarse las causales de rescisión o resolución del presente Contrato de Beca para la Formación 
    Post - Gradual del <b>BECARIO</b>: Dr. (a) {{$personal->nombres." ".$personal->a_paterno ." ".$personal->a_materno}} 
    en la especialidad o subespecialidad de {{$complemento->especialidad->nombre}}, debe informarse 
    a Supervisión Regional de Enseñanza, para que el Departamento de Asesoría Legal y Contabilidad inicien los 
    trámites correspondientes para resarcimiento Civil, sin perjuicio de las responsabilidades Administrativas o
     Penales que pudieren emerger, dejando de esta manera sin efecto la Beca de Formación Post - Gradual. 
</p><p class="parrafo">
    Por otra parte, se deja plenamente establecido que <b>LA CAJA</b> no tiene la obligación de contratar o designar 
    al <b>BECARIO</b> al término de su formación, salvo en caso de requerimiento institucional y en sujeción a la 
    Cláusula Décima Tercera del presente Contrato.
    
</p>
<small>{{$iniciales.'/'.$usuario->name}}<br>
    c.c. Arch. 
    @switch($copia)
    @case('1') ORIGINAL @break
    @case('2') COPIA KARDEX @break
    @case('3') COPIA INTERESADO @break
    @case('4') COPIA RRHH      @break
    @default NO VALIDO
    @endswitch<br>
    
    File Personal No:&nbsp; {{isset($personal->filePer)? $personal->filePer->nombre:'Sin asignar'}}</small>
    <hr>
    <i>{{$contrato->fechaCon}}</i>&nbsp;&nbsp;
            <i>{{$contrato->hash1."  ".$usuario->name}}</i>
<div class="saltopagina"></div>
<p class="parrafo"><b>DECIMA QUINTA:   GARANTÍAS REALES Y PERSONALES. -</b><br>
    A los efectos del cumplimiento de todas y cada una de las Cláusulas estipuladas en el presente Contrato, 
    EL BECARIO garantiza su fiel cumplimiento con todos sus bienes habidos y por haber, hasta el monto total 
    del costo de la Beca y presenta como garantes solidarios e indivisibles a los Señores: 
    {{$garante1->nombres." ".$garante1->a_paterno ." ".$garante1->a_materno}} y {{$garante2->nombres." ".$garante2->a_paterno ." ".$garante2->a_materno}} quienes, 
    en caso de incumplimiento de parte del<b> BECARIO,</b> 
    asumen solidaria y mancomunadamente las obligaciones de restitución por daños y perjuicios causados 
    a la Caja Nacional de Salud dentro del proceso de formación post gradual del (de) (la) Dr. (a) {{$personal->nombres." ".$personal->a_paterno ." ".$personal->a_materno}}. 
</p>
<p class="parrafo"><b>DECIMA SEXTA: DE LA CONFORMIDAD. -</b><br>
    Nosotros, {{$admair->nombre.' '.$admair->user->nombres.' '.$admair->user->a_paterno.' '.$admair->user->a_materno}} 
    <b>{{$admair->cargo}} REGIONAL LA PAZ</b> y el 
    {{$jefeaim->nombre.' '.$jefeaim->user->nombres.' '.$jefeaim->user->a_paterno.' '.$jefeaim->user->a_materno }}
    <b>{{$jefeaim->cargo}}</b> por una parte y el 
    (la) Dr. (a) <b>{{$personal->nombres." ".$personal->a_paterno ." ".$personal->a_materno}}</b>, por otra, damos nuestra plena conformidad con todas y cada una de las cláusulas 
    y en constancia firmamos el presente documento en señal de nuestra conformidad.
</p>
<p>La Paz, {{substr(explode("-",$contrato->fechaCon)[2],0,2) }} de {{$ut->mesliteral(explode("-",$contrato->fechaCon)[1])}} del {{explode("-",$contrato->fechaCon)[0] }}</p>
  </div>
  
  <div id="contrato2">
  <div class="parrafo">

   @if ($copia!='1') 
  <table  class= "firmas" >
    <tr><td>&nbsp;</td><td>&nbsp;</td></tr>
    <tr><td>&nbsp;</td><td>&nbsp;</td></tr>
    <tr><td>&nbsp;</td><td>&nbsp;</td></tr>
    <tr><td>&nbsp;</td><td>&nbsp;</td></tr>
  <tr><td>&nbsp;</td><td>&nbsp;</td></tr>
  
    <tr><td colspan="2">Dr. (a) {{$personal->a_paterno}}&nbsp;{{$personal->a_materno}}&nbsp;{{$personal->nombres}}<br>
                        BECARIO (A)<br>
                        C.I. Nº {{$personal->CI}}-{{$personal->departamento->sigla}}
        </td>
    </tr>
      <tr><td>&nbsp;</td><td>&nbsp;</td></tr>
      <tr><td>&nbsp;</td><td></td></tr>
  
      <tr><td>&nbsp;</td><td>&nbsp;</td></tr>
      <tr><td>&nbsp;</td><td>&nbsp;</td></tr>
      <tr><td>&nbsp;</td><td>&nbsp;</td></tr>
      <tr><td>Sr(a). {{$garante1->a_paterno}}&nbsp;{{$garante1->a_materno}}&nbsp;{{$garante1->nombres}}</td>
          <td>Sr(a). {{$garante2->nombres.' '.$garante2->a_paterno.' '.$garante2->a_materno}}</td>
      </tr> 
      <tr><td>CI: {{$garante1->ci}} {{$garante1->departamento->sigla}}<br>GARANTE 1 </td>
          <td>CI: {{$garante2->ci}} {{$garante2->departamento->sigla}}<br>GARANTE 2 </td>
      </tr>
      
      <tr><td>&nbsp;</td><td>&nbsp;</td></tr>
      <tr><td>@if ($cargo->tipo=='medico')
          <img src="{{'/storage/firmas/'.$jefeaim->img_firma}}" width="100" height="50">
          @else
          <img src="{{'/storage/firmas/'.$jefeaiadm->img_firma}}" width="100" height="50">
          @endif	
  
          </td><td><img src="{{'/storage/firmas/'.$admair->img_firma}}" width="100" height="50"></td></tr>
          
      <tr><td>@if ($cargo->tipo=='medico') 
           {{$jefeaim->nombre.' '.$jefeaim->user->nombres.' '.$jefeaim->user->a_paterno.' '.$jefeaim->user->a_materno }}
          @else
          {{$jefeaiadm->nombre.' '.$jefeaiadm->user->nombres.' '.$jefeaiadm->user->a_paterno.' '.$jefeaiadm->user->a_materno }} 
          @endif
          </td><td>{{$admair->nombre.' '.$admair->user->nombres.' '.$admair->user->a_paterno.' '.$admair->user->a_materno}}</td></tr>
      <tr><td>@if ($cargo->tipo=='medico') 
           {{$jefeaim->cargo}}	
          @else $jefeaiadm->cargo @endif</td><td>{{$admair->cargo}}</td></tr>
  </table><br>
  @else
  <table  class= "firmas" >
        <tr><td>&nbsp;</td><td>&nbsp;</td></tr>
        <tr><td>&nbsp;</td><td>&nbsp;</td></tr>
        <tr><td>&nbsp;</td><td>&nbsp;</td></tr>
        <tr><td>&nbsp;</td><td>&nbsp;</td></tr>
      <tr><td>&nbsp;</td><td>&nbsp;</td></tr>
      
        <tr><td colspan="2">Dr. (a) {{$personal->a_paterno}}&nbsp;{{$personal->a_materno}}&nbsp;{{$personal->nombres}}<br>
                            BECARIO (A)<br>
                            C.I. Nº {{$personal->CI}}-{{$personal->departamento->sigla}}
            </td>
        </tr>
      
      <tr><td>&nbsp;</td><td>&nbsp;</td></tr>
      <tr><td>&nbsp;</td><td>&nbsp;</td></tr>
      <tr><td>&nbsp;</td><td>&nbsp;</td></tr>
      <tr><td>Sr(a). {{$garante1->a_paterno}}&nbsp;{{$garante1->a_materno}}&nbsp;{{$garante1->nombres}}</td>
          <td>Sr(a). {{$garante2->nombres.' '.$garante2->a_paterno.' '.$garante2->a_materno}}</td>
      </tr> 
      <tr><td>CI: {{$garante1->ci}} {{$garante1->departamento->sigla}}<br>GARANTE 1 </td>
          <td>CI: {{$garante2->ci}} {{$garante2->departamento->sigla}}<br>GARANTE 2 </td>
      </tr>
      
      <tr><td>&nbsp;</td><td>&nbsp;</td></tr>
      <tr><td>&nbsp;</td><td>&nbsp;</td></tr>
      <tr><td>&nbsp;</td><td>&nbsp;</td></tr>
      <tr><td>&nbsp;</td><td>&nbsp;</td></tr>	
      <tr><td>@if ($cargo->tipo=='medico') 
          {{$jefeaim->nombre.' '.$jefeaim->user->nombres.' '.$jefeaim->user->a_paterno.' '.$jefeaim->user->a_materno}}	
          @else
          {{$jefeaiadm->nombre.' '.$jefeaiadm->user->nombres.' '.$jefeaiadm->user->a_paterno.' '.$jefeaiadm->user->a_materno}}	
          @endif</td>
          <td>
              {{$admair->nombre.' '.$admair->user->nombres.' '.$admair->user->a_paterno.' '.$admair->user->a_materno}}	
          </td></tr>
      <tr><td>
          @if ($cargo->tipo=='medico') 
              {{$jefeaim->cargo}}	
          @else {{$jefeaiadm->cargo}}
          @endif</td><td>{{$admair->cargo}}</td></tr>
  </table><br>
  
  @endif
   
  <small>cc. RRHH Retribución / Depto. Nal. Sistemas/ File Personal<br>
  {{$iniciales.'/'.$usuario->name}} 
  @switch($copia)
  @case('1') ORIGINAL @break
  @case('2') COPIA KARDEX @break
  @case('3') COPIA INTERESADO @break
  @case('4') COPIA RRHH      @break
  @default NO VALIDO
  @endswitch<br>
  File Personal No:&nbsp;@if (isset($personal->fileper)) 
      {{$personal->filePer->nombre}}
  @else  'Sin asignar' @endif</small>
  </div>
  <hr>
  <i>{{$contrato->fechaCon." ".$contrato->horaCon}}</i>&nbsp;&nbsp;
          <i>{{$contrato->hash1."  ".$usuario->name}}</i>
  </div>
  {{-- <a  href="?action=verContrato&id=$this->data['contrato']['id_con']" id="listarcon">Volver</a> --}}
  <a href="#" onclick="imprimirCon()" id="imprimirc">imprimir</a>
  </div>
  <script type="text/javascript">
  function imprimirCon(){
   window.print()	
  }
  </script>
  </body>
  </html>
  