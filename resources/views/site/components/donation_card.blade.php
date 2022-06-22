<div class="donation-card sequenced-bottom">
    <h3 title="{{ $title }}">{{ $title }}</h3>
    @if ($text != '')
        <div class="donation-item">
            <span class="iconify" data-icon="bi:bag-fill"></span>
            <p>{{ $text }}</p>
        </div>
    @endif
    @if ($isRecommended == '1')
        <span class="iconify recommended-star" data-icon="ant-design:star-filled"></span>
    @endif

    <a href="{{ $site_configurations->donation_link }}" target="_blank" class="geral-inline-link" title="Doar"
        aria-label="Doar">
        Doar
        <span class="iconify" data-icon="akar-icons:arrow-right"></span>
    </a>
</div>
