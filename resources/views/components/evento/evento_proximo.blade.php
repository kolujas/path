<section class="background background-cuatro evento w-full grid gap-1 grid-cols-2 px-8 w-full md:w-5/12 mb-8 py-4 rounded-lg">
    <header class="fecha p-3 rounded-full h-20 w-20 flex items-center flex-wrap justify-center text-center">
        <span class="dia text-white text-3xl block text-center mb-1">{{date('d', strtotime($evento->fecha))}}</span>
        <span class="mes text-white text-lg block text-center">{{$evento->mes}}</span>
    </header>
    <main class="info-evento">
        <h3 class="mb-2">{{$evento->titulo}}</h3>

        <p class="text-gray-600">{{$evento->descripcion}}</p>

        @if($evento->privado)
            <div class="private">
                <div class="corner">
                    <i class="icon fas fa-lock"></i>
                </div>
                <div class="center">
                    <p>Para poder inscribirse debe estar registrado.</p>
                </div>
            </div>
        @endif
        @if($showLink)
            <div class="flex">
                <a targe="_blank" href="{{$evento->url_inscripcion}}" class="btn btn-dos px-4 py-2 rounded text-white mt-4 text-lg">Inscribirme</a>
            </div>
        @else
            <div class="flex">
                <a href="#" class="btn btn-uno px-4 py-2 rounded text-white mt-4 text-lg">Inscribirme</a>
            </div>
        @endif
    </main>
</section>