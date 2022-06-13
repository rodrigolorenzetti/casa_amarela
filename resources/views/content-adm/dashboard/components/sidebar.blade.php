@php

$location = $GLOBALS['location'];

$link_dashboard = '';
$link_admin = '';

switch (true) {
    case stripos($location, 'dashboard') !== false:
        $link_dashboard = 'active';
        break;

    case stripos($location, 'gestor') !== false:
        $link_admin = 'active';
        break;
}

@endphp

<aside class='general-dashboard-aside'>
    <nav class='first-top-padding'>

        <div class="sidebar-head">
            <a class='sidebar-link sidebar-logo' href="{{ $GLOBALS['urlDashboard'] }}/dashboard" title="Marin Logo">
                <img src="/img/site/brand/logo.png" alt="Logo | Admin">
            </a>

            <span class="version-ueek">
                <b>adm</b> vs 1.0
            </span>
        </div>

        <div class="sidebar-divider"></div>

        <div class="sidebar-links">

            <div class="group-links">

                <p class="label-links">Gestão de conteúdo</p>

                <a class="sidebar-link {{ $link_dashboard }}" href="{{ $GLOBALS['urlDashboard'] }}/dashboard">
                    <span class="iconify" data-icon="bx:bxs-dashboard"></span>
                    Dashboard
                </a>

                <a class="sidebar-link " href="{{ route('partner.list') }}">
                    <span class="iconify" data-icon="clarity:users-line"></span>
                    Parceiros
                </a>

                <div class="collapse-group">
                    <a class="sidebar-link " data-bs-toggle="collapse" href="#collapseproduct" role="button"
                        aria-expanded="false" aria-controls="collapseproduct">
                        <span class="iconify" data-icon="bx:bxs-package"></span>
                        Collapse
                        <span class="iconify" data-icon="feather:chevron-down"></span>
                    </a>
                    <div class="collapse multi-collapse" id="collapseproduct">
                        <a class="sidebar-link" href="{{ $GLOBALS['urlDashboard'] }}/">
                            <span class="iconify" data-icon="bx:bxs-spreadsheet"></span>
                            Item
                        </a>
                        <a class="sidebar-link " href="{{ $GLOBALS['urlDashboard'] }}/">
                            <span class="iconify" data-icon="bx:bxs-square-rounded"></span>
                            Item
                        </a>

                    </div>
                </div>

            </div>

            <div class="group-links">

                <p class="label-links">Configurações</p>

                <a class="sidebar-link {{ $link_admin }}" href="{{ $GLOBALS['urlDashboard'] }}/lista-gestores">
                    <span class="iconify" data-icon="gridicons:multiple-users"></span>
                    Usuários gestores
                </a>

            </div>

        </div>

    </nav>
</aside>
