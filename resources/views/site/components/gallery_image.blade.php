<div class="swiper-slide">
    <a href="{{$pathWebp}}" class="gallery-item" data-fancybox="Galeria de fotos"  title="{{$title}}" data-caption="{{$title}}" aria-label="{{$title}}">
        <picture>
            <source type="image/webp" srcset="{{$pathWebp}}">
            <source type="image/png" srcset="{{$pathPng}}">
            <img data-src="{{$pathPng}}" alt="{{$title}}"
                class="lazy" width="400" height="300">
        </picture>
        <div class="background-hover"></div>
    </a>
</div>