<ul class="tab-menu-list mb-0">
    @foreach($modules as $module)
        <li class="tab"><a href="#{{ $module->file }}" class="tab-button">
            <span class="link-text">{{ $module->name }}</span>
        </a></li>
    @endforeach
</ul>