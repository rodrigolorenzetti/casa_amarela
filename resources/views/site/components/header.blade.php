<header>
    <div class="container-fluid">

        <div class="container">
            <nav class="nav-default">
                <div class="background"></div>
                    <div class="nav-mobile-links">
                        <ul class="nav-links">
                            <li>
                                <a class="header-link {{ (request()->routeIs('home')) ? 'active' : '' }}" href="{{ route('home') }}" title="Início"
                                    aria-label="Início">Início</a>
                            </li>
                            <li>
                                <a class="header-link {{ (request()->routeIs('donation_plans')) ? 'active' : '' }}"
                                    href="{{ route('donation_plans') }}" title="Planos de doações"
                                    aria-label="Planos de doações">Planos de doações</a>
                            </li>
                            <li>
                                <a class="header-link" href="{{ route('donation_plans') }}#seja-um-parceiro"
                                    title="Seja um parceiro" aria-label="Seja um parceiro">Seja um parceiro</a>
                            </li>
                            <li>
                                <a class="header-link {{ (request()->routeIs('about')) ? 'active' : '' }}" href="{{ route('about') }}"
                                    title="Sobre nós" aria-label="Sobre nós">Sobre nós</a>
                            </li>

                            <li>
                                <a class="header-link {{ (request()->routeIs('contact')) ? 'active' : '' }}" href="{{ route('contact') }}"
                                    title="Contato" aria-label="Contato">Contato</a>
                            </li>
                            <li>

                                <a class="btn-geral" href="https://institutocasaamarela.apoiar.co/" target="_blank" title="Fazer doação"
                                    aria-label="Fazer doação">Fazer
                                    doação</a>
                            </li>
                        </ul>

                        <ul class="iconify-links">
                            <li>
                                <a href="https://facebook.com" target="_blank" class="iconify-link"
                                    title="Ir para o Facebook da Casa Amarela"
                                    aria-label="Ir para o Facebook da Casa Amarela">
                                    <span class="iconify" data-icon="akar-icons:facebook-fill"></span>
                                </a>
                            </li>
                            <li>
                                <a href="https://instagram.com" target="_blank" class="iconify-link"
                                    title="Ir para o Instagram da Casa Amarela"
                                    aria-label="Ir para o Instagram da Casa Amarela">
                                    <span class="iconify" data-icon="akar-icons:instagram-fill"></span>
                                </a>
                            </li>
                            <li>
                                <a href="https://wa.me/+55999999999" target="_blank" class="iconify-link"
                                    title="Ir para o Whatsapp da Casa Amarela"
                                    aria-label="Ir para o Whatsapp da Casa Amarela">
                                    <span class="iconify" data-icon="akar-icons:whatsapp-fill"></span>
                                </a>
                            </li>
                        </ul>
                    </div>
                <a href="{{route('home')}}" class="logo" title="{{config('app.name')}}" aria-labe="{{config('app.name')}}">
                    <img data-src="/img/site/brand/logo.png" alt="Logo Casa Amarela" class="lazy" width="100" height="100">
                </a>

                <div class="nav-toggle">
                    <button class="button button-action button-primary nav-button">
                        <span class="span-menu"></span>
                        <span class="span-menu"></span>
                        <span class="span-menu"></span>
                    </button>
                </div>
            </nav>
        </div>
    </div>

</header>
