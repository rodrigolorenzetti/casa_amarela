@extends('content-adm.dashboard.shared.layout')
@section('content')
    <div class="loading-form"></div>

    <h1>Adicionar empresa parceira</h1>

    <form id="add-partner" class="default-form">
        @csrf
        <div class="fields default-space-between form-space">

            <div class="blue-background default-space-between">
                <!-- Nome -->
                <div class="default-input-group">
                    <label>Nome*</label>
                    <input class="geral-input required" type="text" placeholder="Nome" name="name" maxlength="100">
                </div>

                <div class="default-input-group">
                    <label>Imagem (290x160px)</label>
                    <div class="image-preview">
                        <input type="file" class="input-image-hidden required" name="image" id="image">

                        <div class="preview-img contain">
                            <span class="iconify" data-icon="akar-icons:plus"></span>
                        </div>
                    </div>
                </div>

            </div>


            <div class="actions d-flex">
                <button type="button" class="btn-geral btn-green mr-2" onclick="window.history.go(-1)">Voltar</button>
                <input type="submit" class="btn-geral ms-2" value="Enviar">
            </div>
        </div>

    </form>
@endsection
