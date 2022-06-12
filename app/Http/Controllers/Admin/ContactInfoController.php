<?php

namespace App\Http\Controllers\Admin;

use App\Models\ContactInfo;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ContactInfoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contact_info = ContactInfo::find(1);

        return view("content-adm.dashboard.contact_info.index", [
            'contact_info' => $contact_info,
        ]);
    }

    public function update(Request $request)
    {
        try {
            ContactInfo::findOrFail(1)->update($request->all());

            echo json_encode(array(
                'status' => 1,
                'msg' => "Operação realizada com sucesso!",
            ));
        } catch (Exception $e) {
            echo json_encode(array(
                'status' => 0,
                'msg' => "Ocorreu um erro ao realizar a operação",
                'error' => $e->getMessage(),
            ));
        }
    }
}
