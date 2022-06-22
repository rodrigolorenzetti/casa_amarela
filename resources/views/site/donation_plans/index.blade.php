@extends('site.shared.layout')

@section('content')
    <section class="first-section container-fluid geral-section" id="donation_plans">
        <article class="container">
            <h1 class="title-w-bg orange-bg" title="Planos de doações">Planos de doações</h1>
            <div class="simditor-text black-text">
                @php echo $site_configurations->donation_plans_text @endphp
            </div>

            <div class="geral-section pb-0">
                <div id="seja-um-parceiro"></div>
                <h2 class="title-w-bg blue-bg" title="Seja um parceiro">Seja um parceiro</h2>
                <div class="simditor-text black-text">
                    @php echo $site_configurations->partner_text @endphp
                </div>
            </div>

            <div class="partner-seal-list">
                <x-PartnerSealItem title="Selo Prata" text="{{ $site_configurations->silver_seal }}." />
                <x-PartnerSealItem title="Selo Gold" text="{{ $site_configurations->gold_seal }}." />
                <x-PartnerSealItem title="Selo Bronze" text="{{ $site_configurations->tan_seal }}." />
            </div>
        </article>
    </section>
@endsection
