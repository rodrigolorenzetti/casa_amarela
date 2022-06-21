@extends('site.shared.layout')

@section('content')
    <section class="first-section container-fluid geral-section" id="donation_plans">
        <article class="container">
            <h1 class="title-w-bg orange-bg" title="Planos de doações">Planos de doações</h1>
            <div class="simditor-text black-text">
                <p>Você pode ajudar o <b>Instituto Casa Amarela</b> de várias maneiras, seja com doações financeiras para a realização de nossos projetos, divulgando nas redes sociais e também trabalhando conosco no nosso <a class="orange-text" href="{{route('home')}}#voluntariados" title="Confira todos os programas de voluntariados disponíveis" aria-label="Confira todos os programas de voluntariados disponíveis">programa de voluntariados.</a></p>

                <p>Doando qualquer quantia para o <b>Instituto Casa Amarela</b>, além de estar contribuindo para o bem-estar de mais de 400 famílias, você receberá brindes frequentemente em forma de agradecimento, como <b>camisetas, calendários, acessórios e vídeos</b> feitos pelas crianças envolvidas nos nossos projetos.</p>
                
                <p>Nossas opções de doações variam entre doações únicas e recorrentes. Em ambas as opções, qualquer quantia é válida e irá contribuir para a realização de diversos projetos em prol das famílias e crianças que o Instituto Casa Amarela ajuda. </p>
            </div>

            <div class="geral-section pb-0">
                <div id="seja-um-parceiro"></div>
                <h2 class="title-w-bg blue-bg" title="Seja um parceiro">Seja um parceiro</h2>
                <div class="simditor-text black-text">
                    <p>Seja um parceiro do Instituto Casa Amarela e torne sua loja umas das lojas embaixadoras dos nossos projetos, contribuindo de diversas formas, desde produtos necessários para a realização dos projetos, voluntariados e divulgações em redes sociais
                    </p>
                </div>
            </div>

            <div class="partner-seal-list">
                <x-PartnerSealItem title="Selo Prata" text="Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a."/>
                <x-PartnerSealItem title="Selo Gold" text="Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a."/>
                <x-PartnerSealItem title="Selo Bronze" text="Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a."/>
            </div>
        </article>
    </section>
@endsection