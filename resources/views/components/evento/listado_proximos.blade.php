<main class="flex flex-wrap justify-around">
    @foreach($eventos as $evento)
        @component('components.evento.evento_proximo', [
            'evento' => $evento,
            'showLink' => $showLink,
        ])
        @endcomponent
    @endforeach
</main>