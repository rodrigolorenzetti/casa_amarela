@extends('content-adm.dashboard.shared.layout')
@section('content')
<div class="loading-form"></div>

<!-- Page Heading -->

<h1>Editar galeria de imagens
</h1>

<p>
    Os campos que são gerados ao adicionar imagens são os textos alternativos de cada uma.<br>
    O texto alternativo é exibido no lugar da imagem caso ela não seja carregada, ou o usuário<br>
    utilize um leitor de tela.
</p>

<form id="edit-about-gallery" class="default-form">
    <div class="fields default-space-between form-space">
        <div class="default-input-group">
            <div class="d-flex align-items-center">
                <label>Imagens</label>
            </div>

            <div class="image-preview">

                <input type="file" class="input-image-hidden required" name="images" id="images" multiple>

                <div class="geral-grid-div column-2">

                    <div class="preview-img gallery div-to-add">

                        <span class="iconify" data-icon="akar-icons:plus"></span>

                        <div class="alt-text" hidden>
                            <input type="text" class="input-alt-text" name="image_alt[]">
                        </div>

                    </div>

                </div>
            </div>


        </div>

        <div class="d-flex align-items-center">

            <h3 class='mr-2'>Imagens adicionadas</h3>

        </div>

        <div class="image-preview geral-grid-div column-2">

            <?php

            foreach ($images as $image) {

                $class_background = $image['image'] != "" ? "w-background" : "";

                $style_background = $image['image'] != "" ? "style='background-image: url(/img/uploads/about_gallery/{$image['image']})'" : "";

                echo "
            <div class='image-item'>
                <a class='preview-img gallery {$class_background}' {$style_background} data-fancybox='galeria-home' href='/img/uploads/about_gallery/{$image['image']}'>
                           
                    <span class='iconify' data-icon='akar-icons:plus'></span>

                </a>

                <div class='alt-text'>
                    <input class='input-alt-text input_image_alt alt' type='text' value='{$image['alt_text']}' name='image_alt_{$image['id']}'>
                </div>

                <input type='hidden' class='id' value='{$image['id']}'>

                <button type='button' class='btn-red btn-action remove-gallery-image' data-value='{$image['id']}'>
                    {$trash_iconify}
                </button>
            </div>
                ";
            }

            ?>

        </div>

        <div class="actions d-flex">
            <button type="button" class="btn-geral btn-green me-2" onclick="window.history.go(-1)">Voltar</button>
            <input type="submit" class="btn-geral" value="Enviar">
        </div>
    </div>

</form>
@endsection