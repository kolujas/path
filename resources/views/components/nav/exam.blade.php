<nav id="nav-exam" class="nav-menu background background-linear">
    <div class="nav-row">
        <a href="#menu" class="sidebar-button open-btn left">
            <i class="sidebar-icon fas fa-bars"></i>
        </a>
        
        <a href="/" class="nav-title logo flex items-center">
            <img src={{ asset('img/recursos/logo_white.png') }} alt="Path">
            <h1>Path</h1>
        </a>
    </div>

    <div class="nav-row">
        <ul class="nav-menu-list">
            <li>
                <span class="nav-text">
                    <span class="exam_name mr-3">{{ $exam->name }}:</span>
                    @if ($candidate && $candidate->member)
                        <span class="candidate_member">{{ $candidate->member }}</span>
                    @endif
                    @if ($candidate && $candidate->full_name)
                        <span class="candidate_name">{{ $candidate->full_name }}</span>
                    @endif
                </span>
            </li>
        </ul>
    </div>

    @component('components.nav.sidebar_exam')
    @endcomponent
</nav>