<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\SiteConfigurations;

class SiteConfigurationsController extends Controller
{
    public function edit()
    {
        $site_configuration = SiteConfigurations::find(1);

        if ($site_configuration) {
            return view("content-adm.dashboard.site_configurations.edit", ['site_configuration' => $site_configuration]);
        } else {
            return redirect('/content-adm/dashboard');
        }
    }

    public function update(Request $request)
    {
        try {

            $data = $request->all();

            SiteConfigurations::findOrFail(1)->update($data);

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
}
