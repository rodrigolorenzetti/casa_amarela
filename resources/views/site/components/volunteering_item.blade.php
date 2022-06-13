<a href="{{ route('volunteering', ['voluntariado' => $route]) }}" class="volunteering-item" title="{{$title}}" aria-label="{{$title}}">
    <h3>{{$title}}</h3>
    <p class="brief">{{$text}}</p>
    <p class="read-more">
        Ver mais detalhes
        <span class="iconify" data-icon="akar-icons:arrow-right"></span>
    </p>
</a>