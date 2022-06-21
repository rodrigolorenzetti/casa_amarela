<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\AboutGallery;

class AboutGalleryController extends Controller
{
    public function edit()
    {
        $images = AboutGallery::where('status', 1)->get();
        return view("content-adm.dashboard.about_gallery.index", [
            'images' => $images,
        ]);
    }

    public function createMultipleImages(Request $request)
    {

        $alt = explode(",", $request->image_alt);

        $validated = true;

        for ($i = 0; $i < $request->image_count; $i++) {
            $image_name = "image{$i}";

            $page_home_gallery = new AboutGallery();
            list($page_home_gallery['image'], $page_home_gallery['image_webp']) = UploadImageWithWebp($request->$image_name, "img/uploads/about_gallery/");
            $page_home_gallery['alt_text'] = $alt[$i] != "" ? $alt[$i] : "";
            $page_home_gallery['status'] = 1;

            if (!$page_home_gallery->save()) {

                $validated = false;
            }
        }
        if ($validated) {
            echo json_encode(array(
                'status' => 1,
                'msg'    => 'Adicionado com sucesso!',
            ));
        } else {
            echo json_encode(array(
                'status' => 0,
                'msg'    => 'Ocorreu um erro ao adicionar. Tente novamente mais tarde.',
            ));
        }
    }

    public function updateGalleryImageAlt(Request $request)
    {
        try {
            $data = $request->all();
            $data['alt_text'] = $data['alt_text'] != '' ? $data['alt_text'] : "";
            AboutGallery::findOrFail($request->id)->update($data);

            echo json_encode(array(
                'status' => 1,
            ));
        } catch (\Throwable $e) {
            echo json_encode(array(
                'status' => 0,
                'msg'    => 'Ocorreu um erro ao alterar. Tente novamente mais tarde.',
                'error' => $e->getMessage(),
            ));
        }
    }

    public function updateStatus(Request $request)
    {

        try {
            AboutGallery::findOrFail($request->id)->update(['status' => 0]);

            echo json_encode(array(
                'status' => 1,
                'msg'    => 'Removido com sucesso',
            ));
        } catch (\Throwable $e) {
            echo json_encode(array(
                'status' => 0,
                'msg'    => 'Ocorreu um erro ao alterar. Tente novamente mais tarde.',
                'error' => $e->getMessage(),
            ));
        }
    }
}
