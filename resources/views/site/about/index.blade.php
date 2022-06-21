@extends('site.shared.layout')

@section('content')
    <section class="first-section container-fluid geral-section gray-section" id="about">
        <article class="container">
            <div class="content-flex">
                <h1 class="leftShow">Sobre nós</h1>
                <div class="divider"></div>
                <p class="rightShow mb-0">
                    Temos como missão a preparação e qualificação de adolescentes e Jovens para a inserção no mercado de trabalho e tambem apoiar o desenvolvimento de crianças, adolescentes e Jovens em situação de privação, exclusão e vulnerabilidade social, tornando-as capazes de realizar melhorias em suas vidas e dando a elas oportunidade de se tornarem jovens, adultos, pais e líderes que conferirão mudanças sustentáveis e positivas às comunidades. Mobilizar pessoas e instituições para que atuem na valorização, na proteção e na promoção dos direitos das crianças, adolescentes, Jovens, mulheres, idosos, para que juntos tenhamos uma sociedade mais justa.
                </p>
            </div>

            <div class="video-div fadeIn">
                <a href="https://www.youtube.com/watch?v=u31qwQUeGuM&ab_channel=JoomlaTemplate" class="video-item" data-fancybox data-caption="Vídeo Institucional" title="Vídeo Institucional" aria-label="Vídeo Institucional">
                    <picture>
                        <source type="image/webp" srcset="/img/site/images/video-background.webp">
                        <source type="image/png" srcset="/img/site/images/video-background.png">
                        <img data-src="/img/site/images/video-background.png" alt="Crianças brincando na piscina de bolinha"
                            class="lazy video-background" width="1300" height="515">
                    </picture>

                    <span class="iconify" data-icon="carbon:play-filled-alt"></span>
                </a>
                <div class="orange-video-background"></div>
            </div>
        </article>
    </section>

    <section class="geral-section container-fluid" id="gallery-section">
        <article class="container">
            <h2 class="title-w-bg orange-bg" title="Fotos">Fotos</h2>

            <div class="about-gallery-grid-area fadeIn">
                <div class="about-gallery-grid swiper-container">
                    <div class="swiper-wrapper">
                        <x-GalleryImage title="Criança brincando" pathWebp="/img/site/images/kid-gallery.webp" pathPng="/img/site/images/kid-gallery.png"/>
                        <x-GalleryImage title="Criança brincando" pathWebp="/img/site/images/video-background.webp" pathPng="/img/site/images/video-background.png"/>
                        <x-GalleryImage title="Criança brincando" pathWebp="/img/site/images/kid-gallery.webp" pathPng="/img/site/images/kid-gallery.png"/>
                        <x-GalleryImage title="Criança brincando" pathWebp="/img/site/images/video-background.webp" pathPng="/img/site/images/video-background.png"/>
                        <x-GalleryImage title="Criança brincando" pathWebp="/img/site/images/kid-gallery.webp" pathPng="/img/site/images/kid-gallery.png"/>
                        <x-GalleryImage title="Criança brincando" pathWebp="/img/site/images/kid-gallery.webp" pathPng="/img/site/images/kid-gallery.png"/>
                    </div>
                </div>
            </div>
        </article>
    </section>
@endsection