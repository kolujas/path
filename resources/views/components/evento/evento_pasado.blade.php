<section class="evento event-div border-solid shadow-md bg-white text-center flex justify-center items-center flex-wrap rounded py-4 min-h-full">
    <header>
        <h3 class="eventos-card-header py-4 text-2xl">{{$evento->titulo}}</h3>
    </header>
    <main class="eventos-card-image">
        <img src='{{asset("/storage/$evento->archivo")}}' alt="Escritorio con una laptop">

        <div class="evento-descripcion">
            <p class="py-4 text-gray-600">{{$evento->descripcion}}</p>
        </div>

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
            <div class="flex justify-center">
                <a target="_blank" href="{{$evento->video}}" class="btn btn-dos-transparent px-4 py-2 rounded text-white my-4 text-lg">Ver más</a>
            </div>
        @else
            <div class="flex justify-center">
                <a href="#" class="btn btn-dos-transparent px-4 py-2 rounded text-white my-4 text-lg">Ver más</a>
            </div>
        @endif
    </main>
</section>