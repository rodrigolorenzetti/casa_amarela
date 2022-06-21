<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\DonationOptions;

class DonationOptionsController extends Controller
{
    public function index()
    {
        $donation_options = DonationOptions::where('status', 1)->get();

        return view("content-adm.dashboard.donation_options.index", ['donation_options' => $donation_options]);
    }

    public function create()
    {
        return view("content-adm.dashboard.donation_options.add");
    }

    public function store(Request $request)
    {
        try {
            $donation_option = new DonationOptions();

            $donation_option->title = $request->title;
            $donation_option->text = $request->text;
            $donation_option->status = 1;

            $donation_option->save();

            return response()->json([
                'status' => 1,
                'msg' => "Operação realizada com sucesso!",
            ], 200);
        } catch (\Throwable $e) {
            return response()->json([
                'status' => 0,
                'msg' => "Ocorreu um erro ao realizar a operação. Tente novamente mais tarde.",
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    public function edit($id)
    {
        $donation_option = DonationOptions::find($id);

        if ($donation_option) {
            return view("content-adm.dashboard.donation_options.edit", ['donation_option' => $donation_option]);
        } else {
            return redirect('/content-adm/dashboard');
        }
    }

    public function update(Request $request)
    {
        try {

            $data = $request->all();

            DonationOptions::findOrFail($request->id)->update($data);

            return response()->json([
                'status' => 1,
                'msg' => "Operação realizada com sucesso!",
            ], 200);
        } catch (\Throwable $e) {
            return response()->json([
                'status' => 0,
                'msg' => "Ocorreu um erro ao realizar a operação. Tente novamente mais tarde.",
                'error' => $e->getMessage(),
            ], 500);
        }
    }


    public function updateStatus(Request $request)
    {
        try {
            DonationOptions::findOrFail($request->id)->update(['status' => 0]);

            return response()->json([
                'status' => 1,
                'msg' => "Removido com sucesso!",
            ], 200);
        } catch (\Throwable $e) {
            return response()->json([
                'status' => 0,
                'msg' => "Ocorreu um erro ao realizar a operação. Tente novamente mais tarde.",
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    public function updateMultipleStatus(Request $request)
    {

        $validated = true;

        foreach ($request->inputs as $id) {
            if (!DonationOptions::findOrFail($id)->update(['status' => 0])) {
                $validated = false;
            }
        }

        if ($validated) {
            return response()->json([
                'status' => 1,
                'msg'    => 'Removidos com sucesso!',
            ], 200);
        } else {
            return response()->json([
                'status' => 0,
                'msg'    => 'Ocorreu um erro ao remover. Tente novamente mais tarde.',
            ], 500);
        }
    }
}
