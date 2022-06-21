@php

$location = $GLOBALS['location'];

$link_dashboard = '';
$link_admin = '';
$link_partners = '';
$link_donation_options = '';
$link_site_configurations = '';
$link_volunteerings = '';
$link_about_gallery = '';

switch (true) {
    case stripos($location, 'dashboard') !== false:
        $link_dashboard = 'active';
        break;

    case stripos($location, 'gestor') !== false:
        $link_admin = 'active';
        break;

    case stripos($location, 'parceiro') !== false:
        $link_partners = 'active';
        break;

        case stripos($location, 'doacao') !== false:
        $link_donation_options = 'active';
        break;

    case stripos($location, 'configuracoes') !== false:
        $link_site_configurations = 'active';
        break;

    case stripos($location, 'voluntariado') !== false:
        $link_volunteerings = 'active';
        break;

        case stripos($location, 'galeria') !== false:
        $link_about_gallery = 'active';
        break;
}

@endphp

<aside class='general-dashboard-aside'>
    <nav class='first-top-padding'>

        <div class="sidebar-head">
            <a class='sidebar-link sidebar-logo' href="{{route('dashboard')}}" title="{{config('app.name')}}">
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

                <a class="sidebar-link {{$link_dashboard}}" href="{{route('dashboard')}}">
                    <span class="iconify" data-icon="bx:bxs-dashboard"></span>
                    Dashboard
                </a>

                <a class="sidebar-link {{$link_partners}}" href="{{ route('partner.list') }}">
                    <span class="iconify" data-icon="clarity:users-line"></span>
                    Empresas parceiras
                </a>

                <a class="sidebar-link {{$link_donation_options}}" href="{{ route('donation_options.list') }}">
                    <span class="iconify" data-icon="akar-icons:money"></span>
                    Opções de doação
                </a>

                <a class="sidebar-link {{$link_volunteerings}}" href="{{ route('volunteering.list') }}">
                    <span class="iconify" data-icon="fa-solid:tools"></span>
                   Voluntariados
                </a>

                <a class="sidebar-link {{$link_site_configurations}}" href="{{ route('site_configurations.edit') }}">
                    <span class="iconify" data-icon="bytesize:settings"></span>
                   Configurações do Site
                </a>

                <a class="sidebar-link {{$link_about_gallery}}" href="{{ route('about_gallery.edit') }}">
                    <span class="iconify" data-icon="bi:images"></span>
                    Galeria de imagens
                </a>

            </div>

            <div class="group-links">

                <p class="label-links">Configurações</p>

                <a class="sidebar-link {{$link_admin}}" href="{{route('admin.list')}}">
                    <span class="iconify" data-icon="gridicons:multiple-users"></span>
                    Usuários gestores
                </a>

            </div>

        </div>

    </nav>
</aside>
