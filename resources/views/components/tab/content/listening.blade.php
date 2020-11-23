<section id="{{ preg_replace("/\+/", '', preg_replace("/-/", '', preg_replace("/ /", '_', $module->folder))) }}-{{ $module->initials }}" class="tab-content closed {{ preg_replace("/\+/", '', preg_replace("/-/", '', preg_replace("/ /", '_', $module->folder))) }}-{{ $module->name }}">
    <section class="questions question-listening">
        <div class="row px-4 py-md-4 justify-content-lg-center">
            @for($i = 1; $i <= $module->questions; $i++)
                @component("components.questions.$module->folder.$module->initials$i")
                @endcomponent
            @endfor
        </div>
    </section>
</section>
