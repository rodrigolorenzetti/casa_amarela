<footer>
    <div class="container-fluid">
        <div class="container">
            <div class="footer-links">
                <a href="{{ route('home') }}" class="logo" title="{{ config('app.name') }}"
                    aria-labe="{{ config('app.name') }}">
                    <img data-src="/img/site/brand/logo.png" alt="Logo Casa Amarela" class="lazy" width="100"
                        height="100">
                </a>
                <p class="footer-text">
                    @php echo nl2br($site_configurations->address) @endphp
                </p>
                <a href="{{ $site_configurations->donation_link }}" target="_blank" class="btn-geral"
                    title="Fazer uma doação" aria-label="Fazer uma doação">Fazer uma doação</a>

                <div class="links">
                    <a href="tel:{{ $site_configurations->phone }}" class="footer-text footer-link"
                        title="Ligar para a Casa Amarela" aria-label="Ligar para a Casa Amarela">
                        {{ $site_configurations->phone }}
                    </a>
                    <a href="mailto:{{ $site_configurations->email }}" class="footer-text footer-link"
                        title="Mandar e-mail para a Casa Amarela" aria-label="Mandar e-mail para a Casa Amarela">
                        {{ $site_configurations->email }}
                    </a>
                </div>

                <ul class="footer-list">
                    <li>
                        <a href={{ $site_configurations->facebook }}" target="_blank" class="footer-text footer-link"
                            title="Ir para o Facebook da Casa Amarela" aria-label="Ir para o Facebook da Casa Amarela">
                            <span class="iconify" data-icon="akar-icons:facebook-fill"></span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ $site_configurations->instagram }}" target="_blank"
                            class="footer-text footer-link" title="Ir para o Instagram da Casa Amarela"
                            aria-label="Ir para o Instagram da Casa Amarela">
                            <span class="iconify" data-icon="akar-icons:instagram-fill"></span>
                        </a>
                    </li>
                    <li>
                        <a href="https://wa.me/+55{{ $GLOBALS['whatsapp_link'] }}" target="_blank"
                            class="footer-text footer-link" title="Ir para o Whatsapp da Casa Amarela"
                            aria-label="Ir para o Whatsapp da Casa Amarela">
                            <span class="iconify" data-icon="akar-icons:whatsapp-fill"></span>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="footer-links justify-content-between">
                <p class="footer-text text-center mb-0">
                    Copyright 2021 © INSTITUTO CASA AMARELA. Todos os direitos reservados
                </p>
                <a href="javascript:;" onclick="openModal('cookies-modal')" class="footer-text footer-link"
                    title="Política de Cookies e Privacidade" aria-label="Política de Cookies e Privacidade">Política de
                    Cookies e Privacidade
                </a>
            </div>
        </div>
    </div>
</footer>
