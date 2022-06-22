@extends('site.shared.layout')

@section('content')
    <section class="first-section container-fluid geral-section gray-section" id="about">
        <article class="container">
            <div class="content-flex">
                <h1 class="leftShow">Sobre nós</h1>
                <div class="divider"></div>
                <div class="rightShow mb-0 simditor-text">
                    @php echo $site_configurations->about_us_text @endphp
                </div>
            </div>

            <div class="video-div fadeIn">
                <a href="{{ $site_configurations->about_us_video_url }}" class="video-item" data-fancybox
                    data-caption="Vídeo Institucional" title="Vídeo Institucional" aria-label="Vídeo Institucional">
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
                        @foreach ($images as $image)
                            <x-GalleryImage title="{{ $image->alt_text }}"
                                pathWebp="/img/uploads/about_gallery/{{ $image->image }}"
                                pathPng="/img/uploads/about_gallery/{{ $image->image_webp }}" />
                        @endforeach
                    </div>
                </div>
            </div>
        </article>
    </section>
@endsection
