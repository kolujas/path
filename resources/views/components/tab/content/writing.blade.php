<section id="writing" class="tab-content closed">
    <section class="questions">
        <div class="row px-4 py-md-4 justify-content-lg-center">
            @for($i = 1; $i <= $module->questions; $i++)
                @component("components.questions.$module->folder.$module->name$i")
                @endcomponent
            @endfor
        </div>
    </section>
</section>