<ul class="tab-menu-list mb-0">
    <li class="tab">
        <span>Module:</span>
    </li>
    @foreach($modules as $module)
        <li class="tab">
            <a id="{{ preg_replace("/\+/", '', preg_replace("/-/", '', preg_replace("/ /", '_', $module->folder))) }}-{{ $module->initials }}-tab" href="#{{preg_replace("/\+/", '', preg_replace("/-/", '',  preg_replace("/ /", '_', $module->folder))) }}-{{ $module->initials }}" class="module-button tab-link btn">
                <span class="link-text">{{ $module->folder }}: {{ $module->name }}</span>
                <div class="clock">
                    <div class='second-hand'>I</div>
                </div>
                <span class="time">{{ $module->time }}</span>
            </a>
        </li>
    @endforeach
    <li class="tab mr-0">
        <button class="right-tab save-button btn btn-one">
            SAVING
            <b class="timer ml-1"></b>
        </button>
    </li>
</ul>