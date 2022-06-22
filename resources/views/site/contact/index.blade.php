@extends('site.shared.layout')

@section('content')
    <section class="first-section container-fluid geral-section" id="contact">
        <article class="container">
            <h1 class="title-w-bg orange-bg" title="Contato">Contato</h1>
            <div class="form-map">
                <form class="half-part leftShow" id="send-contact">
                    @csrf
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
                        <label for="message" title="Mensagem">Mensagem</label>
                        <textarea name="message" id="message" placeholder="Digite sua dúvida ou sua mensagem"></textarea>
                    </div>

                    <div class="default-checkbox-area">
                        <input type="checkbox" name="accept_terms" id="accept_terms">
                        <div class="checkbox-area">
                            <span class="iconify" data-icon="akar-icons:check"></span>
                        </div>
                        <label for="accept_terms">Você concorda com nossos <a class="orange-text"
                                title="termos de uso e política de privacidade"
                                aria-label="termos de uso e política de privacidade"
                                onclick="openModal('cookies-modal')">termos de uso e política de privacidade</a>?</label>
                    </div>

                    <button type="submit" title="Enviar" aria-label="Enviar" class="btn-geral-secondary ms-auto disabled">
                        Enviar
                    </button>
                </form>
                <div class="half-part map rightShow">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d14118.631490974218!2d-50.2969261!3d-27.7895141!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x27b726c8753bb0fe!2sINSTITUTO%20CASA%20AMARELA!5e0!3m2!1spt-BR!2sbr!4v1655400239759!5m2!1spt-BR!2sbr"
                        width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
        </article>
    </section>
@endsection
