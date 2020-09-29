<nav id="nav-exam" class="nav-menu">
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
            <li><button class="submit-exam nav-button btn btn-nine-transparent">
                <span class="link-text">Submit</span>
            </button></li>
        </ul>
    </div>

    @component('components.nav.sidebar_exam')
    @endcomponent
</nav>