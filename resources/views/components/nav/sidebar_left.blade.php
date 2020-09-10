<div id="menu" class="sidebar left closed push-body">
    <div class="sidebar-header">
        <div class="sidebar-title logo">
            <img src="/img/recursos/logo.png" alt="Mututalcoops">
            <h2>Menu</h2>
        </div>
        <a href="#" class="sidebar-button close-btn left">
            <i class="sidebar-icon fas fa-times"></i>
        </a>
    </div>

    <div class="sidebar-content">
        <ul class="sidebar-menu-list">
            <li><a href="/" class="sidebar-link sidebar-button nav-link p-0">
                <span class="link-text">Inicio</span>
            </a></li>
            <li><a href="/#nosotros" class="sidebar-link sidebar-button nav-link p-0">
                <span class="link-text">Nosotros</span>
            </a></li>
            <li><a href="/#servicios" class="sidebar-link sidebar-button nav-link p-0">
                <span class="link-text">Servicios</span>
            </a></li>
            <li><a href="/noticias" class="sidebar-link sidebar-button nav-link p-0">
                <span class="link-text">Noticias</span>
            </a></li>
            <li><a href="/#eventos" class="sidebar-link sidebar-button nav-link p-0">
                <span class="link-text">Eventos</span>
            </a></li>
            @if(!Auth::user())
                <li><a href="/ingresar" class="sidebar-link nav-link p-0">
                    <i class="link-icon left fas fa-sign-out-alt"></i>
                    <span class="link-text">Iniciar Sesión</span>
                </a></li>
            @else
                <li id="dropdown-2" class="dropdown closed">
                    <a href="/dashboard" class="sidebar-link dropdown-title nav-link p-0">
                        <span class="link-text">Panel</span>
                        <button class="dropdown-button">
                            <i class="dropdown-icon fas fa-sort-down"></i>
                        </button>
                    </a>
                    <ul class="dropdown-menu-list">
                        @if(Auth::user()->id_nivel <= 1)
                            <li class="m-0">
                                <a href="/dashboard" class="sidebar-link dropdown-link nav-link p-0">
                                    <i class="link-icon left fas fa-chevron-right"></i>
                                    <span class="link-text">Dashboard</span>
                                </a>
                            </li>
                        @else
                            <li class="m-0">
                                <a href="/dashboard" class="sidebar-link dropdown-link nav-link p-0">
                                    <i class="link-icon left fas fa-chevron-right"></i>
                                    <span class="link-text">Dashboard</span>
                                </a>
                            </li>
                            <li class="m-0">
                                <a href="/panel#tabla_eventos" class="sidebar-link dropdown-link nav-link p-0">
                                    <i class="link-icon left fas fa-chevron-right"></i>
                                    <span class="link-text">Eventos</span>
                                </a>
                            </li>
                            <li class="m-0">
                                <a href="/panel#tabla_gestiones" class="sidebar-link dropdown-link nav-link p-0">
                                    <i class="link-icon left fas fa-chevron-right"></i>
                                    <span class="link-text">Gestiones</span>
                                </a>
                            </li>
                            <li class="m-0">
                                <a href="/panel#tabla_normativas" class="sidebar-link dropdown-link nav-link p-0">
                                    <i class="link-icon left fas fa-chevron-right"></i>
                                    <span class="link-text">Normatvas</span>
                                </a>
                            </li>
                            <li class="m-0">
                                <a href="/panel#tabla_educaciones" class="sidebar-link dropdown-link nav-link p-0">
                                    <i class="link-icon left fas fa-chevron-right"></i>
                                    <span class="link-text">Notas de Interés</span>
                                </a>
                            </li>
                            <li class="m-0">
                                <a href="/panel#tabla_noticias" class="sidebar-link dropdown-link nav-link p-0">
                                    <i class="link-icon left fas fa-chevron-right"></i>
                                    <span class="link-text">Noticias</span>
                                </a>
                            </li>
                            <li class="m-0">
                                <a href="/panel#tabla_precios" class="sidebar-link dropdown-link nav-link p-0">
                                    <i class="link-icon left fas fa-chevron-right"></i>
                                    <span class="link-text">Precios</span>
                                </a>
                            </li>
                            <li class="m-0">
                                <a href="/panel#tabla_usuarios" class="sidebar-link dropdown-link nav-link p-0">
                                    <i class="link-icon left fas fa-chevron-right"></i>
                                    <span class="link-text">Usuarios</span>
                                </a>
                            </li>
                            <li class="m-0">
                                <a href="/panel#tabla_facturaciones" class="sidebar-link dropdown-link nav-link p-0">
                                    <i class="link-icon left fas fa-chevron-right"></i>
                                    <span class="link-text">Facturaciones</span>
                                </a>
                            </li>
                            <li class="m-0">
                                <a href="/panel#tabla_suscriptores" class="sidebar-link dropdown-link nav-link p-0">
                                    <i class="link-icon left fas fa-chevron-right"></i>
                                    <span class="link-text">Suscriptores</span>
                                </a>
                            </li>
                        @endif
                    </ul>
                </li>
                <li><a href="/salir" class="sidebar-link nav-link p-0">
                    <i class="link-icon left fas fa-sign-out-alt"></i>
                    <span class="link-text">Cerrar Sesión</span>
                </a></li>
            @endif
        </ul>
    </div>
</div>
