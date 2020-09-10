<?php
    /** @var string $current - Current active link */
?>
<nav id="nav-1" class="nav-menu">
    <div class="nav-row">
        <a href="#menu" class="sidebar-button open-btn left">
            <i class="sidebar-icon fas fa-bars"></i>
        </a>
        
        <a href="/" class="nav-title logo">
            <img src="/img/recursos/logo.png" alt="Mutualcoop">
            <h1>Mutualcoop</h1>
        </a>
    </div>

    <div class="nav-row">
        <ul class="nav-menu-list">
            <li><a href="/" class="nav-link">
                <span class="link-text">Inicio</span>
            </a></li>
            <li><a href="/salir" class="nav-link">
                <i class="link-icon left fas fa-sign-out-alt"></i>
                <span class="link-text">Cerrar Sesión</span>
            </a></li>
        </ul>
    </div>

    @component('components.nav.sidebar_left')
    @endcomponent
    @component('components.nav.sidebar_right')
    @endcomponent
</nav>