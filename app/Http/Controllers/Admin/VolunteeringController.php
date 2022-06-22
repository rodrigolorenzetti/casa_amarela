<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Volunteering;
use App\Models\VolunteeringSubmitions;

class VolunteeringController extends Controller
{
    public function index()
    {
        $volunteering = Volunteering::where('status', 1)->get();

        return view("content-adm.dashboard.volunteering.index", ['volunteering' => $volunteering]);
    }

    public function create()
    {
        return view("content-adm.dashboard.volunteering.add");
    }

    public function store(Request $request)
    {
        try {
            $volunteering = new Volunteering();

            $volunteering->title = $request->title;
            $volunteering->url = friendlyUrl($request->title);
            $volunteering->text = $request->text;
            $volunteering->brief = $request->brief;
            $volunteering->date = $request->date;
            $volunteering->hour = $request->hour;
            $volunteering->status = 1;

            $volunteering->save();

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
        $volunteering = Volunteering::find($id);

        if ($volunteering) {
            return view("content-adm.dashboard.volunteering.edit", ['volunteering' => $volunteering]);
        } else {
            return redirect('/content-adm/dashboard');
        }
    }

    public function update(Request $request)
    {
        try {

            $data = $request->all();
            $data['url'] = friendlyUrl($request->title);

            Volunteering::findOrFail($request->id)->update($data);

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
            Volunteering::findOrFail($request->id)->update(['status' => 0]);

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
            if (!Volunteering::findOrFail($id)->update(['status' => 0])) {
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

    public function indexSubmitions($volunteering_id)
    {
        $submitions = VolunteeringSubmitions::where("volunteering_id", $volunteering_id)->where("status", 1)->get();
        $volunteering = Volunteering::find($volunteering_id);

        return view("content-adm.dashboard.volunteering.index_submitions", compact('volunteering', 'submitions'));
    }

    public function detailsSubmitions($id)
    {
        $submition = VolunteeringSubmitions::where("volunteering_id", $id)->first();
        $volunteering = Volunteering::find($submition->volunteering_id);

        return view("content-adm.dashboard.volunteering.details_submitions", compact('volunteering', 'submition'));
    }

    public function updateSubmitionStatus(Request $request)
    {
        try {
            VolunteeringSubmitions::findOrFail($request->id)->update(['status' => 0]);

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

    public function updateSubmitionMultipleStatus(Request $request)
    {

        $validated = true;

        foreach ($request->inputs as $id) {
            if (!VolunteeringSubmitions::findOrFail($id)->update(['status' => 0])) {
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
