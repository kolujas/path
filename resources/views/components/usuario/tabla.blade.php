<section id="tabla_usuarios" class="tab-content closed">
    <section class="accesos-directos w-full">
        <header class="py-8">
            <h2 class="text-center text-3xl">Listado de Usuarios</h2>
        </header>

        <main class="cards flex flex-wrap justify-around md:justify-center pt-8">
            <a href="#" class="btn btn-dos-transparent border acceso-directo w-5/12 md:w-2/12 lg:h-40 lg:w-40 mb-8 md:mx-4 md:mb-4 lg:mx-6 lg:mb-6 xl:mx-4 border-solid shadow-md bg-white text-center flex justify-center items-center flex-wrap rounded py-2">
                <span class="text-3xl w-full">
                    <span>{{$niveles->total}}</span>
                </span>
                <span class="w-full">Usuarios Totales</span>
            </a>
            <a href="#" class="btn btn-dos-transparent border acceso-directo w-5/12 md:w-2/12 lg:h-40 lg:w-40 mb-8 md:mx-4 md:mb-4 lg:mx-6 lg:mb-6 xl:mx-4 border-solid shadow-md bg-white text-center flex justify-center items-center flex-wrap rounded py-2">
                <span class="text-3xl w-full">
                    <span>{{$niveles->suscriptores}}</span>
                </span>
                <span class="w-full">Suscriptores</span>
            </a>
            <a href="#" class="btn btn-dos-transparent border acceso-directo w-5/12 md:w-2/12 lg:h-40 lg:w-40 mb-8 md:mx-4 md:mb-4 lg:mx-6 lg:mb-6 xl:mx-4 border-solid shadow-md bg-white text-center flex justify-center items-center flex-wrap rounded py-2">
                <span class="text-3xl w-full">
                    <span>{{$niveles->administradores}}</span>
                </span>
                <span class="w-full">Administradores</span>
            </a>
        </main>

        <section class="actions flex justify-center py-8">
            <a href="/panel/usuario/crear" class="btn-rounded btn btn-uno-transparent font-bold py-2 px-4 flex justify-center items-center"><span class="fas fa-plus text-3xl"></span></a>
        </section>
    </section>
    
    <section class="table-data">
        <!-- tabla -->
    </section>
</section>