@extends('content-adm.dashboard.shared.layout')
@section('content')
    <div class="loading-form"></div>

    <h1>Editar opção de doação - {{$donation_option->title}}</h1>

    <form id="edit-donation-option" class="default-form">
        @csrf
        <input type="hidden" name="id" value="{{$donation_option->id}}">
        <div class="fields default-space-between form-space">

            <div class="blue-background default-space-between">
                <!-- Nome -->
                <div class="default-input-group">
                    <label>Valor da opção*</label>
                    <input class="geral-input required" type="text" placeholder="ex: R$5,00" name="title" maxlength="40" value="{{$donation_option->title}}">
                </div>

                <div class="default-input-group">
                    <label>Oportunidade gerada pela opção*</label>
                    <input class="geral-input required" type="text" placeholder="ex: 2 caixas de leite, café da manhã, etc" name="text" maxlength="60" value="{{$donation_option->text}}">
                </div>

            </div>


            <div class="actions d-flex">
                <button type="button" class="btn-geral btn-green mr-2" onclick="window.history.go(-1)">Voltar</button>
                <input type="submit" class="btn-geral ms-2" value="Enviar">
            </div>
        </div>

    </form>
@endsection
