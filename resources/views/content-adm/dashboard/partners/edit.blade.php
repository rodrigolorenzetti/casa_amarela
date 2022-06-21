@extends('content-adm.dashboard.shared.layout')
@section('content')
    <div class="loading-form"></div>

    <h1>Editar empresa parceira - {{$partner->name}}</h1>

    <form id="edit-partner" class="default-form">
        @csrf
        <input type="hidden" name="id" value="{{$partner->id}}"
        <div class="fields default-space-between form-space">

            <div class="blue-background default-space-between">
                <!-- Nome -->
                <div class="default-input-group">
                    <label>Nome*</label>
                    <input class="geral-input required" type="text" placeholder="Nome" name="name" maxlength="100" value="{{$partner->name}}">
                </div>

                <div class="default-input-group">
                    <label>Imagem (290x160px)</label>
                    <div class="image-preview">
                        <input type="file" class="input-image-hidden" name="image" id="image">
                        <input type="hidden" name="image-old" id="image-old" value="<?php echo $partner->image ?>">

                        <?php
                        $class_background = $partner->image != "" ? "w-background" : "";
                        $style_background = $partner->image != "" ? "style='background-image: url(/img/uploads/partners/{$partner['image']})'" : "";
                        ?>

                        <div class="preview-img contain <?php echo $class_background ?>" <?php echo $style_background ?>>
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
