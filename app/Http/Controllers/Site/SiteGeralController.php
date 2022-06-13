<?php

namespace App\Http\Controllers\Site;

use App\Models\PageHome;

use App\Mail\ContactEmail;
use Illuminate\Support\Facades\Mail;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SiteGeralController extends Controller
{
    public function index()
    {
        // $page_home = PageHome::find(1);

        return view("site.home.index", [
            // 'page_home' => $page_home,
        ]);
    }

    public function donation_plans()
    {
        // $page_home = PageHome::find(1);

        return view("site.donation_plans.index", [
            // 'page_home' => $page_home,
        ]);
    }

    public function about()
    {
        // $page_home = PageHome::find(1);

        return view("site.about.index", [
            // 'page_home' => $page_home,
        ]);
    }

    public function contact()
    {
        // $page_home = PageHome::find(1);

        return view("site.contact.index", [
            // 'page_home' => $page_home,
        ]);
    }

    public function sendContact(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required',
            'name' => 'required',
            'phone' => 'required',
            'message' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 422,
                'error' => 'Erro na validação de campos',
                $validator->errors()
            ], 422);
        }

        $user = array();
        $user['email'] = $request->email;
        $user['name'] = $request->name;
        $user['phone'] = $request->phone;
        $user['message'] = $request->message;

        if (Mail::send(new ContactEmail($user))) {
            return response()->json([
                'status' => 1,
                'title' => "Contato enviado com sucesso!",
                'msg' => "Fique atento ao seu e-mail. Entraremos em contato por lá!",
            ], 200);
        } else {
            return response()->json([
                'status' => 0,
                'title' => "Não foi possível enviar seu formulário",
                'msg' => "Ocorreu um erro interno ao enviar seu e-mail. Já estamos trabalhando nisso, tente novamente mais tarde.",
            ], 500);
        }
    }
}
