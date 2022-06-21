@extends('content-adm.dashboard.shared.layout')
@section('content')
    <div class="loading-form"></div>

    <h1>Adicionar voluntariado</h1>

    <form id="add-volunteering" class="default-form">
        @csrf
        <div class="fields default-space-between form-space">

            <div class="blue-background default-space-between">
                <!-- Nome -->
                <div class="default-input-group">
                    <label>Título</label>
                    <input class="geral-input required" type="text" placeholder="Digite aqui" name="title" maxlength="64">
                </div>
                <div class="default-input-group">
                    <label>Resumo</label>
                    <textarea class="geral-input required" type="text" placeholder="Digite aqui" name="brief" maxlength="200"></textarea>
                </div>
                <div class="default-input-group">
                    <label>Texto</label>
                    <textarea class="geral-input required simditor-text" type="text" placeholder="Digite aqui" name="text" id="text"></textarea>
                </div>
                <div class="geral-grid-div column-2">
                    <div class="default-input-group">
                        <label>Data</label>
                        <input class="geral-input required" type="date" name="date" maxlength="10">
                    </div>
                    <div class="default-input-group">
                        <label>Carga horária</label>
                        <input class="geral-input required" type="text" name="hour" maxlength="10" placeholder="ex: 3 horas">
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
