@extends('content-adm.dashboard.shared.layout')
@section('content')
    <div class="loading-form"></div>

    <h1>Adicionar opção de doação</h1>

    <form id="add-donation-option" class="default-form">
        @csrf
        <div class="fields default-space-between form-space">

            <div class="blue-background default-space-between">
                <!-- Nome -->
                <div class="default-input-group">
                    <label>Valor da opção*</label>
                    <input class="geral-input required" type="text" placeholder="ex: R$5,00" name="title" maxlength="40">
                </div>

                <div class="default-input-group">
                    <label>Oportunidade gerada pela opção*</label>
                    <input class="geral-input required" type="text" placeholder="ex: 2 caixas de leite, café da manhã, etc" name="text" maxlength="60">
                </div>

            </div>


            <div class="actions d-flex">
                <button type="button" class="btn-geral btn-green mr-2" onclick="window.history.go(-1)">Voltar</button>
                <input type="submit" class="btn-geral ms-2" value="Enviar">
            </div>
        </div>

    </form>
@endsection
