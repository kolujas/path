@foreach($noticias as $noticia)
    <section class="noticia w-full md:w-6/12 lg:w-4/12">
        <figure class="mb-4 px-8">
            <img src="/storage/{{$noticia->archivo}}" alt="primera conferencia trimestral">
        </figure>
        <header class="mb-4">
            <h3 class="text-center text-2xl">{{$noticia->titulo}}</h3>
        </header>
        <main class="px-12">
            <p class="text-gray-600">{{$noticia->minified->descripcion}}</p>

            <div class="flex justify-center">
                <a href="/noticia/{{$noticia->slug}}" class="btn btn-dos-transparent px-4 py-2 rounded text-white mt-4 mb-8 text-lg">Ver más</a>
            </div>
        </main>
    </section>
@endforeach