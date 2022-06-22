@extends('content-adm.dashboard.shared.layout')
@section('content')
    <div class="loading-form"></div>

    <h1>Editar configurações do site</h1>

    <form id="edit-site-configuration" class="default-form">
        @csrf
        <div class="fields default-space-between form-space">
            <h3>Página "Planos de doação"</h3>
            <div class="blue-background default-space-between">
                <!-- Nome -->
                <div class="default-input-group">
                    <label>Texto de Planos de Doação</label>
                    <textarea class="geral-input required simditor-text" type="text" name="donation_plans_text" id="donation_plans_text">
                        {{ $site_configuration->donation_plans_text }}
                    </textarea>
                </div>
            </div>

            <div class="blue-background default-space-between">
                <div class="default-input-group">
                    <label>Texto de Parceiros</label>
                    <textarea class="geral-input required simditor-text" type="text" name="partner_text" id="partner_text">
                        {{ $site_configuration->partner_text }}
                    </textarea>
                </div>
            </div>

            <h3>Selos</h3>
            <div class="blue-background default-space-between">
                <div class="default-input-group">
                    <label>Selo Ouro</label>
                    <input class="geral-input required" type="text" name="gold_seal" maxlength="150"
                        value="{{ $site_configuration->gold_seal }}">
                </div>

                <div class="default-input-group">
                    <label>Selo Prata</label>
                    <input class="geral-input required" type="text" name="silver_seal" maxlength="150"
                        value="{{ $site_configuration->silver_seal }}">
                </div>

                <div class="default-input-group">
                    <label>Selo Bronze</label>
                    <input class="geral-input required" type="text" name="tan_seal" maxlength="150"
                        value="{{ $site_configuration->tan_seal }}">
                </div>
            </div>

            <h3>Página "Sobre nós"</h3>
            <div class="blue-background default-space-between">
                <div class="default-input-group">
                    <div class="default-input-group">
                        <label>Link do Vídeo</label>
                        <input class="geral-input required" type="text" name="about_us_video_url" maxlength="100"
                            value="{{ $site_configuration->about_us_video_url }}">
                    </div>
                    <label>Texto Sobre Nós</label>
                    <textarea class="geral-input required simditor-text" type="text" name="about_us_text" id="about_us_text">
                        {{ $site_configuration->about_us_text }}
                    </textarea>
                </div>
            </div>

            <div class="blue-background geral-grid-div column-4">
                <div class="default-input-group">
                    <label>Telefone</label>
                    <input class="geral-input required" type="text" name="phone" maxlength="20"
                        value="{{ $site_configuration->phone }}">
                </div>

                <div class="default-input-group">
                    <label>Endereço</label>
                    <textarea class="geral-input required" type="text" name="address"
                        maxlength="100">{{ $site_configuration->address }}</textarea>
                </div>

                <div class="default-input-group">
                    <label>E-mail</label>
                    <input class="geral-input required" type="text" name="email" maxlength="40"
                        value="{{ $site_configuration->email }}">
                </div>

                <div class="default-input-group">
                    <label>Link de Doações</label>
                    <input class="geral-input required" type="text" name="donation_link" maxlength="100"
                        value="{{ $site_configuration->donation_link }}">
                </div>
            </div>

            <div class="blue-background geral-grid-div column-3">
                <div class="default-input-group">
                    <label>Facebook</label>
                    <input class="geral-input required" type="text" name="facebook" maxlength="100"
                        value="{{ $site_configuration->facebook }}">
                </div>

                <div class="default-input-group">
                    <label>Instagram</label>
                    <input class="geral-input required" type="text" name="instagram" maxlength="100"
                        value="{{ $site_configuration->instagram }}">
                </div>

                <div class="default-input-group">
                    <label>Whatsapp</label>
                    <input class="geral-input required" type="text" name="whatsapp" maxlength="100"
                        value="{{ $site_configuration->whatsapp }}">
                </div>
            </div>

            <div class="blue-background default-space-between">
                <div class="default-input-group">
                    <label>Texto Política de Cookies</label>
                    <textarea class="geral-input required simditor-text" type="text" name="cookies_policy" id="cookies_policy">
                        {{ $site_configuration->cookies_policy }}
                    </textarea>
                </div>
            </div>

            <div class="actions d-flex">
                <button type="button" class="btn-geral btn-green mr-2" onclick="window.history.go(-1)">Voltar</button>
                <input type="submit" class="btn-geral ms-2" value="Enviar">
            </div>
        </div>

    </form>
@endsection
