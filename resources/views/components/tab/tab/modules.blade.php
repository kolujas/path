<ul class="position-relative tab-menu-list mb-0">
    <li class="tab">
        <span>Module:</span>
    </li>
    @foreach($modules as $module)
        <li class="tab">
            <a href="#{{ $module->file }}" class="tab-button btn">
                <span class="link-text">{{ $module->name }}</span>
            </a>
        </li>
    @endforeach
    <li class="tab mr-0">
        <button class="right-tab submit-exam btn btn-one">
            <span class="link-text">Submit Exam</span>
        </button>
    </li>
</ul>