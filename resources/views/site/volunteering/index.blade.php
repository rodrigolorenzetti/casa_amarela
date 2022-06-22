@extends('site.shared.layout')

@section('content')
    <section class="first-section container-fluid geral-section" id="donation_plans">
        <article class="container">
            <h1 title="Voluntariado - {{ $volunteering->title }}">Voluntariado - {{ $volunteering->title }}</h1>
            <div class="simditor-text">
                @php echo $volunteering->text @endphp
            </div>

            <div class="mt-5">
                <h2 class="orange-text" title="Faça parte!">Faça parte!</h2>
                <form id="add-volunteering-submition">
                    @csrf
                    <input type="hidden" name="volunteering_id" value="{{ $volunteering->id }}">
                    <div class="geral-grid-div column-2 gap-20 mt-0 mb-0">
                        <div class="default-input-group">
                            <label for="name" title="Nome">Nome</label>
                            <input type="text" name="name" id="name" maxlength="64" aria-label="Insira seu nome completo"
                                placeholder="Insira seu nome completo">
                        </div>
                        <div class="default-input-group">
                            <label for="phone" title="Telefone">Telefone</label>
                            <input type="text" name="phone" id="phone" maxlength="15" aria-label="(00) 00000-0000"
                                placeholder="(00) 00000-0000" onkeydown="Mascara(this, Telefone)">
                        </div>
                    </div>
                    <div class="default-input-group">
                        <label for="email" title="E-mail">E-mail</label>
                        <input type="email" name="email" id="email" maxlength="128" aria-label="email@email.com"
                            placeholder="email@email.com">
                    </div>
                    <div class="default-input-group">
                        <label for="help_description" title="Como você quer ajudar?">Como você quer ajudar?</label>
                        <textarea name="help_description" id="help_description" placeholder="ex: Dinheiro, materiais, mão de obra"></textarea>
                    </div>

                    <div class="default-checkbox-area">
                        <input type="checkbox" name="accept_terms" id="accept_terms">
                        <div class="checkbox-area">
                            <span class="iconify" data-icon="akar-icons:check"></span>
                        </div>
                        <label for="accept_terms">Você concorda com nossos <a class="orange-text"
                                title="termos de uso e política de privacidade" onclick="openModal('cookies-modal')"
                                aria-label="termos de uso e política de privacidade">termos de uso e política de
                                privacidade</a>?</label>
                    </div>

                    <button type="submit" title="Enviar" aria-label="Enviar" class="btn-geral-secondary ms-auto disabled">
                        Enviar
                    </button>
                </form>
            </div>
        </article>
    </section>
@endsection
