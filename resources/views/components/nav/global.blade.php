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
            <li><a href="/#nosotros" class="nav-link">
                <span class="link-text">Nosotros</span>
            </a></li>
            <li><a href="/#servicios" class="nav-link">
                <span class="link-text">Servicios</span>
            </a></li>
            <li><a href="/noticias" class="nav-link">
                <span class="link-text">Noticias</span>
            </a></li>
            <li><a href="/#eventos" class="nav-link">
                <span class="link-text">Eventos</span>
            </a></li>
        @if(!Auth::user())
            <li><a href="/ingresar" class="nav-link">
                <i class="link-icon left fas fa-sign-in-alt"></i>
                <span class="link-text">Iniciar Sesión</span>
            </a></li>
        @else
            <li id="dropdown-1" class="dropdown closed">
                <a href="/dashboard" class="dropdown-title nav-link">
                    <span class="text">Panel</span>
                    <button class="dropdown-button">
                        <i class="dropdown-icon fas fa-sort-down"></i>
                    </button>
                </a>
                <ul class="dropdown-menu-list">
                    @if(Auth::user()->id_nivel <= 1)
                        <li class="m-0">
                            <a href="/dashboard" class="dropdown-link nav-link">
                                <i class="link-icon fas fa-chevron-right"></i>
                                <span class="link-text">Dashboard</span>
                            </a>
                        </li>
                    @else
                        <li class="m-0">
                            <a href="/dashboard" class="dropdown-link nav-link">
                                <i class="link-icon fas fa-chevron-right"></i>
                                <span class="link-text">Dashboard</span>
                            </a>
                        </li>
                        <li class="m-0">
                            <a href="/panel#tabla_eventos" class="dropdown-link nav-link">
                                <i class="link-icon fas fa-chevron-right"></i>
                                <span class="link-text">Eventos</span>
                            </a>
                        </li>
                        <li class="m-0">
                            <a href="/panel#tabla_gestiones" class="dropdown-link nav-link">
                                <i class="link-icon fas fa-chevron-right"></i>
                                <span class="link-text">Gestiones</span>
                            </a>
                        </li>
                        <li class="m-0">
                            <a href="/panel#tabla_normativas" class="dropdown-link nav-link">
                                <i class="link-icon fas fa-chevron-right"></i>
                                <span class="link-text">Normativas</span>
                            </a>
                        </li>
                        <li class="m-0">
                            <a href="/panel#tabla_educacion" class="dropdown-link nav-link">
                                <i class="link-icon fas fa-chevron-right"></i>
                                <span class="link-text">Notas de Interés</span>
                            </a>
                        </li>
                        <li class="m-0">
                            <a href="/panel#tabla_noticias" class="dropdown-link nav-link">
                                <i class="link-icon fas fa-chevron-right"></i>
                                <span class="link-text">Noticas</span>
                            </a>
                        </li>
                        <li class="m-0">
                            <a href="/panel#tabla_precios" class="dropdown-link nav-link">
                                <i class="link-icon fas fa-chevron-right"></i>
                                <span class="link-text">Precios</span>
                            </a>
                        </li>
                        <li class="m-0">
                            <a href="/panel#tabla_preguntas" class="dropdown-link nav-link">
                                <i class="link-icon fas fa-chevron-right"></i>
                                <span class="link-text">Preguntas</span>
                            </a>
                        </li>
                        <li class="m-0">
                            <a href="/panel#tabla_usuarios" class="dropdown-link nav-link">
                                <i class="link-icon fas fa-chevron-right"></i>
                                <span class="link-text">Usuarios</span>
                            </a>
                        </li>
                        <li class="m-0">
                            <a href="/panel#tabla_facturaciones" class="dropdown-link nav-link">
                                <i class="link-icon fas fa-chevron-right"></i>
                                <span class="link-text">Facturaciones</span>
                            </a>
                        </li>
                        <li class="m-0">
                            <a href="/panel#tabla_suscriptores" class="dropdown-link nav-link">
                                <i class="link-icon fas fa-chevron-right"></i>
                                <span class="link-text">Suscriptores</span>
                            </a>
                        </li>
                    @endif
                </ul>
            </li>
                <li><a href="/salir" class="nav-link">
                    <i class="link-icon left fas fa-sign-out-alt"></i>
                    <span class="link-text">Cerrar Sesión</span>
                </a></li>
            @endif
        </ul>
    </div>

    @component('components.nav.sidebar_left')
    @endcomponent
</nav>