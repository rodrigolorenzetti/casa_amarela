@extends('site.shared.layout')

@section('content')
    <section class="container-fluid first-taped-section" id="banner">
        <picture>
            <source type="image/webp" srcset="/img/site/images/banner-background.webp">
            <source type="image/png" srcset="/img/site/images/banner-background.png">
            <img data-src="/img/site/images/banner-background.png" alt="Pessoas dando a mão em forma de união"
                class="lazy banner-background" width="1920" height="1080">
        </picture>
        <div class="container">
            <div class="content">
                <div class="text leftShow">
                    <h1 class="banner-title" title="Com apenas R$5 você faz a diferença">
                        Com apenas <span>R$5</span><br>
                        você faz a <span>diferença</span>
                    </h1>
                    <p class="banner-text">
                        Contribua e participe para continuarmos com<br>nosso projeto de construir uma sociedade melhor!
                    </p>
                    <a href="{{ route('donation') }}" class="btn-geral" title="Doar para a Casa Amarela"
                        aria-label="Doar para a Casa Amarela">Doar</a>
                </div>
                <div class="image rightShow">
                    <picture>
                        <source type="image/webp" srcset="/img/site/images/banner-image.webp">
                        <source type="image/png" srcset="/img/site/images/banner-image.png">
                        <img data-src="/img/site/images/banner-image.png" alt="Criança com camiseta cinza e braços cruzados"
                            class="lazy" width="675" height="875">
                    </picture>
                </div>
            </div>
        </div>
    </section>

    <section class="geral-section container-fluid">
        <article class="container">
            <h2 title="Opções de doação" class="blue-text">Opções de <span class="orange-text">doação</span>
            </h2>
            <p>
                Abaixo estão as opções disponíveis de doação.
            </p>

            <div class="geral-grid-div column-3 gap-40 donation-list">
                <x-DonationCard title="Doe R$5,00" text="2 caixas de leite" isRecommended="0" />
                <x-DonationCard title="Doe R$15,00" text="1 café da manhã para uma família" isRecommended="0" />
                <x-DonationCard title="Doe R$30,00" text="1 café da manhã para duas famílias" isRecommended="0" />
                <x-DonationCard title="Doe R$50,00" text="Ajuda para o sopão comunitário" isRecommended="0" />
                <x-DonationCard title="Doe R$100,00" text="1 cesta básica" isRecommended="1" />
                <x-DonationCard title="Ou doe quanto quiser" text="O quanto couber no seu bolso" isRecommended="0" />
            </div>

            <p>
                O <b class="orange-text">Plano de doações Casa Amarela</b> oferece vários benefícios<br>tanto para quem
                doa
                quanto para quem é nosso parceiro, <a class="blue-text" title="Confira o plano de doações Casa Amarela"
                    href="{{ route('donation_plans') }}" aria-label="Confira o plano de doações Casa Amarela"><b>confira
                        aqui</b></a>.
            </p>

            <p>
                Doando para a Casa Amarela, você estará ajudando <b>470 famílias</b> residentes em Lages - SC e região.
            </p>
        </article>
    </section>

    <section class="geral-section pt-0 container-fluid">
        <article class="container">
            <h2 title="Lojas parceiras" class="blue-text">Lojas parceiras</h2>
            <p>
                Confira todas as empresas parceiras que contribuem para o nosso dia a dia.<br>
                Quer se tornar um parceiro? <a class="orange-text" title="Seja um parceiro Casa Amarela"
                    href="{{ route('donation_plans') }}#seja-um-parceiro"
                    aria-label="Seja um parceiro Casa Amarela"><b>Clique aqui</b></a>.
            </p>

            <div class="geral-grid-div column-4 gap-40">
                <x-PartnerItem name="Imagem placeholder" normalSrc="/img/site/images/image-placeholder.png"
                    webpSrc="/img/site/images/image-placeholder.webp" />
                <x-PartnerItem name="Imagem placeholder" normalSrc="/img/site/images/image-placeholder.png"
                    webpSrc="/img/site/images/image-placeholder.webp" />
                <x-PartnerItem name="Imagem placeholder" normalSrc="/img/site/images/image-placeholder.png"
                    webpSrc="/img/site/images/image-placeholder.webp" />
                <x-PartnerItem name="Imagem placeholder" normalSrc="/img/site/images/image-placeholder.png"
                    webpSrc="/img/site/images/image-placeholder.webp" />
            </div>
        </article>
    </section>
@endsection
