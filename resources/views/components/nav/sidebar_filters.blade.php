<section id="filters" class="sidebar right closed push-body">
    <div class="sidebar-header">
        <a href="#" class="sidebar-button close-btn right">
            <i class="sidebar-icon fas fa-times"></i>
        </a>
        <div class="sidebar-title">
            <h2>Filtros</h2>
        </div>
    </div>

    <div class="sidebar-content pb-4">

        <!-- <div class="buscador-box w-full py-4">
            <input type="search" placeholder="Buscar">
            <div class="search"></div>
        </div> -->
        @if(isset($filtros->mes))
        <div class="mes">
            <h3 class="text-2xl text-center py-4">Filtrar por mes</h3>

            <div class="flex justify-around">
                <div>
                    <button value="{{'(-' . date('m', strtotime('-1 month', strtotime(date('Y-m-d')))) . '-)'}}" class="fecha fecha-left p-2 btn btn-uno left no-text arrow prev">
                        <i class="fas fa-arrow-left"></i>
                    </button>
                </div>

                <select data-name="fecha-select" data-target="alta" class="filter filter-select filter-regexp outline-none text-xl p-2">
                    <option @if(date('m') == '01') selected @endif value="(-01-)">Enero</option>
                    <option @if(date('m') == '02') selected @endif value="(-02-)">Feberero</option>
                    <option @if(date('m') == '03') selected @endif value="(-03-)">Marzo</option>
                    <option @if(date('m') == '04') selected @endif value="(-04-)">Abril</option>
                    <option @if(date('m') == '05') selected @endif value="(-05-)">Mayo</option>
                    <option @if(date('m') == '06') selected @endif value="(-06-)">Junio</option>
                    <option @if(date('m') == '07') selected @endif value="(-07-)">Julio</option>
                    <option @if(date('m') == '08') selected @endif value="(-08-)">Agosto</option>
                    <option @if(date('m') == '09') selected @endif value="(-09-)">Septiembre</option>
                    <option @if(date('m') == '10') selected @endif value="(-10-)">Octubre</option>
                    <option @if(date('m') == '11') selected @endif value="(-11-)">Noviembre</option>
                    <option @if(date('m') == '12') selected @endif value="(-12-)">Diciembre</option>
                </select>

                <div>
                    <button value="{{'(-' . date('m', strtotime('+1 month', strtotime(date('Y-m-d')))) . '-)'}}" class="fecha fecha-right p-2 btn btn-uno right no-text arrow next">
                        <i class="fas fa-arrow-right"></i>
                    </button>
                </div>
            </div>
        </div>
        @endif
        @if(isset($filtros->privado))
        <div class="privado">
            
            <h3 class="text-2xl text-center py-4">Filtrar por Privacidad</h3>
            <ul>
                <li class="flex items-center mx-auto w-8/12 md:w-7/12 lg:10/12 xl:w-8/12">
                    <label class="switch">
                    <input id="privado" type="checkbox">
                    <span class="slider round"></span>
                    </label>
                    <label class="ml-4" for="privado">Privado</label>
                </li>
            </ul>
        </div>
        @endif
        @if(isset($filtros->tipo_de_suscripcion))
        <div class="tipo_de_suscripcion">
            <h3 class="text-2xl text-center py-4">Filtrar por Tipo de Suscripción</h3>

            <ul class="divide-y divide-gray-400 px-12">
                <li><button data-name="id_tipo_suscripcion-todos" data-target="id_tipo_suscripcion" class="filter filter-button active block w-full text-left py-2">
                    <span>Todos</span>
                    <span class="flex justify-center items-center floating-number text-center float-right rounded-full h-8 w-8 text-white bg-red-900"></span>
                </button></li>
                <li><button data-name="id_tipo_suscripcion-debito" data-target="id_tipo_suscripcion" value="2" class="filter filter-button block w-full text-left py-2">
                    <span>Debito</span> 
                    <span class="flex justify-center items-center floating-number text-center float-right rounded-full h-8 w-8 text-white bg-red-900"></span>
                </button></li>
                <li><button data-name="id_tipo_suscripcion-semestral" data-target="id_tipo_suscripcion" value="2" class="filter filter-button block w-full text-left py-2">
                    <span>Semestral</span> 
                    <span class="flex justify-center items-center floating-number text-center float-right rounded-full h-8 w-8 text-white bg-red-900"></span>
                </button></li>
                <li><button data-name="id_tipo_suscripcion-anual" data-target="id_tipo_suscripcion" value="3" class="filter filter-button block w-full text-left py-2">
                    <span>Anual</span> 
                    <span class="flex justify-center items-center floating-number text-center float-right rounded-full h-8 w-8 text-white bg-red-900"></span>
                </button></li>
            </ul>   
        </div>
        @endif
        @if(isset($filtros->organismo))
        <div class="organismo">
            <h3 class="text-2xl text-center py-4">Filtrar por Organismo</h3>
            <ul class="divide-y divide-gray-400 px-12">
                <li><button data-name="id_organismo-todos" data-target="id_organismo" class="filter filter-button active block w-full text-left py-2">
                    <span>Todos</span>
                    <span class="flex justify-center items-center floating-number text-center float-right rounded-full h-8 w-8 text-white bg-red-900"></span>
                </button></li>
                <li><button data-name="id_organismo-inaes" data-target="id_organismo" value="1" class="filter filter-button block w-full text-left py-2">
                    <span>INAES</span> 
                    <span class="flex justify-center items-center floating-number text-center float-right rounded-full h-8 w-8 text-white bg-red-900"></span>
                </button></li>
                <li><button data-name="id_organismo-otros_organismos" data-target="id_organismo" value="2" class="filter filter-button block w-full text-left py-2">
                    <span>Otros organismos</span> 
                    <span class="flex justify-center items-center floating-number text-center float-right rounded-full h-8 w-8 text-white bg-red-900"></span>
                </button></li>
            </ul>
        </div>
        @endif
        @if(isset($filtros->nivel))
        <div class="nivel">
            <h3 class="text-2xl text-center py-4">Filtrar por Nivel de Usuario</h3>

            <ul class="divide-y divide-gray-400 px-12">                
                <li><button data-name="id_nivel-todos" data-target="id_nivel" class="filter filter-button active block w-full text-left py-2">
                    <span>Todos</span>
                    <span class="flex justify-center items-center floating-number text-center float-right rounded-full h-8 w-8 text-white bg-red-900"></span>
                </button></li>           
                <li><button data-name="id_nivel-suscriptores" data-target="id_nivel" value="1" class="filter filter-button block w-full text-left py-2">
                    <span>Suscriptor</span>
                    <span class="flex justify-center items-center floating-number text-center float-right rounded-full h-8 w-8 text-white bg-red-900"></span>
                </button></li>
                <li><button data-name="id_nivel-administradores" data-target="id_nivel" value="2" class="filter filter-button block w-full text-left py-2">
                    <span>Administrador</span> 
                    <span class="flex justify-center items-center floating-number text-center float-right rounded-full h-8 w-8 text-white bg-red-900"></span>
                </button></li>
            </ul>   
        </div>
        @endif
        @if(isset($filtros->tipo_de_normativa))
        <div class="tipo_de_normativa">
            <h3 class="text-2xl text-center py-4">Filtrar por Tipo de Normativa</h3>

            <ul class="filter divide-y divide-gray-400 px-12">
                <li><button data-name="id_tipo_normativa-todos" data-target="id_tipo_normativa" class="filter filter-button active block w-full text-left py-2">
                    <span>Todos</span>
                    <span class="flex justify-center items-center floating-number text-center float-right rounded-full h-8 w-8 text-white bg-red-900"></span>
                </button></li>
                <li><button data-name="id_tipo_normativa-ley" data-target="id_tipo_normativa" value=1 class="filter filter-button block w-full text-left py-2">
                    <span>Ley</span>
                    <span class="flex justify-center items-center floating-number text-center float-right rounded-full h-8 w-8 text-white bg-red-900"></span>
                </button></li>
                <li><button data-name="id_tipo_normativa-decreto" data-target="id_tipo_normativa" value=2 class="filter filter-button block w-full text-left py-2">
                    <span>Decreto</span> 
                    <span class="flex justify-center items-center floating-number text-center float-right rounded-full h-8 w-8 text-white bg-red-900"></span>
                </button></li>
                <li><button data-name="id_tipo_normativa-resolucion" data-target="id_tipo_normativa" value=3 class="filter filter-button block w-full text-left py-2">
                    <span>Resolución</span> 
                    <span class="flex justify-center items-center floating-number text-center float-right rounded-full h-8 w-8 text-white bg-red-900"></span>
                </button></li>
            </ul>   
        </div>
        @endif
        @if(isset($filtros->tipo_de_gestion))
        <div class="tipo_de_gestion">
            <h3 class="text-2xl text-center py-4">Filtrar por Tipo de Gestion</h3>

            <ul class="filter divide-y divide-gray-400 px-12">
                <li><button data-name="id_tipo_gestion-todos" data-target="id_tipo_gestion" class="filter filter-button active block w-full text-left py-2">
                    <span>Todos</span>
                    <span class="flex justify-center items-center floating-number text-center float-right rounded-full h-8 w-8 text-white bg-red-900"></span>
                </button></li>
                <li><button data-name="id_tipo_gestion-administrativo_contable" data-target="id_tipo_gestion" value=4 class="filter filter-button block w-full text-left py-2">
                    <span>Administrativo Contable</span>
                    <span class="flex justify-center items-center floating-number text-center float-right rounded-full h-8 w-8 text-white bg-red-900"></span>
                </button></li>
                <li><button data-name="id_tipo_gestion-impositivo" data-target="id_tipo_gestion" value=5 class="filter filter-button block w-full text-left py-2">
                    <span>Impositivo</span>
                    <span class="flex justify-center items-center floating-number text-center float-right rounded-full h-8 w-8 text-white bg-red-900"></span>
                </button></li>
                <li><button data-name="id_tipo_gestion-previsional" data-target="id_tipo_gestion" value=6 class="filter filter-button block w-full text-left py-2">
                    <span>Previsional</span>
                    <span class="flex justify-center items-center floating-number text-center float-right rounded-full h-8 w-8 text-white bg-red-900"></span>
                </button></li>
                <li><button data-name="id_tipo_gestion-recursos" data-target="id_tipo_gestion" value=7 class="filter filter-button block w-full text-left py-2">
                    <span>Recurso</span>
                    <span class="flex justify-center items-center floating-number text-center float-right rounded-full h-8 w-8 text-white bg-red-900"></span>
                </button></li>
                <li><button data-name="id_tipo_gestion-analisis_reglamentacion" data-target="id_tipo_gestion" value=8 class="filter filter-button block w-full text-left py-2">
                    <span>Análisis de la Reglamentación</span>
                    <span class="flex justify-center items-center floating-number text-center float-right rounded-full h-8 w-8 text-white bg-red-900"></span>
                </button></li>
                <li><button data-name="id_tipo_gestion-informacion_complementaria" data-target="id_tipo_gestion" value=9 class="filter filter-button block w-full text-left py-2">
                    <span>Información Complementaria</span>
                    <span class="flex justify-center items-center floating-number text-center float-right rounded-full h-8 w-8 text-white bg-red-900"></span>
                </button></li>
                <li><button data-name="id_tipo_gestion-jurisprudencia" data-target="id_tipo_gestion" value=10 class="filter filter-button block w-full text-left py-2">
                    <span>Jurisprudencia</span>
                    <span class="flex justify-center items-center floating-number text-center float-right rounded-full h-8 w-8 text-white bg-red-900"></span>
                </button></li>
            </ul>
        </div>
        @endif
        @if(isset($filtros->obras))
        <div class="obras">
            <h2 class="text-2xl text-center py-4">Filtrar por Tipo de Obra</h2>
            <ul class="obras">
                <li class="checkbox mx-auto w-8/12 md:w-7/12 lg:10/12 xl:w-8/12">
                    <input data-name="obras-cooperativas_complejas" class="filter filter-checkbox" data-target="obras" name="id_obra" value="1" type="checkbox" id="completas">
                    <label class="mt-2" for="completas">Cooperativas completas</label>
                </li>
                <li class="checkbox mx-auto w-8/12 md:w-7/12 lg:10/12 xl:w-8/12">
                    <input data-name="obras-cooperativas_trabajo" class="filter filter-checkbox" data-target="obras" name="id_obra" value="2" type="checkbox" id="trabajo">
                    <label class="mt-2" for="trabajo">Cooperativas de trabajo</label>
                </li>
                <li class="checkbox mx-auto w-8/12 md:w-7/12 lg:10/12 xl:w-8/12">
                    <input data-name="obras-asociaciones_mutuales" class="filter filter-checkbox" data-target="obras" name="id_obra" value="3" type="checkbox" id="mutuales">
                    <label class="mt-2" for="mutuales">Asociaciones mutuales</label>
                </li>
                <li class="checkbox mx-auto w-8/12 md:w-7/12 lg:10/12 xl:w-8/12">
                    <input data-name="obras-uif" class="filter filter-checkbox" data-target="obras" name="id_obra" value="4" type="checkbox" id="UIF">
                    <label class="mt-2" for="UIF">UIF</label>
                </li>
            </ul>
        </div>
        @endif
        <div class="sin_filtros text-center pt-4 text-gray-600">
            <p>No hay por lo que filtrar</p>
        </div>
    </div>
</section>
