<?php

namespace App\Http\Controllers\Site;

use App\Models\PageHome;

use App\Mail\ContactEmail;
use Illuminate\Support\Facades\Mail;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use App\Models\DonationOptions;
use App\Models\Partner;
use App\Models\Volunteering;
use App\Models\VolunteeringSubmitions;
use App\Models\AboutGallery;

class SiteGeralController extends Controller
{
    public function index()
    {
        $donation_options = DonationOptions::where("status", 1)->get();
        $partners = Partner::where("status", 1)->get();
        $volunteerings = Volunteering::where("status", 1)->get();

        return view("site.home.index", compact(['donation_options', 'partners', 'volunteerings']));
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
        $images = AboutGallery::where("status", 1)->get();

        return view("site.about.index", compact(['images']));
    }

    public function contact()
    {
        // $page_home = PageHome::find(1);

        return view("site.contact.index", [
            // 'page_home' => $page_home,
        ]);
    }

    public function volunteering($url)
    {
        $volunteering = Volunteering::where("url", $url)->where('status', 1)->first();

        if ($volunteering) {
            return view("site.volunteering.index", compact(["volunteering"]));
        } else {
            return redirect()->route('home');
        }
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
        $user['subject'] = "Novo e-mail de contato - ";

        if (Mail::send(new ContactEmail($user))) {
            return response()->json([
                'status' => 1,
                'title' => "Contato enviado com sucesso!",
                'text' => "Fique atento ao seu e-mail. Entraremos em contato por lá!",
            ], 200);
        } else {
            return response()->json([
                'status' => 0,
                'title' => "Não foi possível enviar seu formulário",
                'text' => "Ocorreu um erro interno ao enviar seu e-mail. Já estamos trabalhando nisso, tente novamente mais tarde.",
            ], 500);
        }
    }

    public function addVolunteeringSubmition(Request $request)
    {
        VolunteeringSubmitions::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'message' => $request->help_description,
            'volunteering_id' => $request->volunteering_id,
            'status' => 1,
        ]);

        $user = array();
        $user['email'] = $request->email;
        $user['name'] = $request->name;
        $user['phone'] = $request->phone;
        $user['message'] = $request->help_description;
        $user['subject'] = "Uma submissão de voluntariado foi feita - ";

        if (Mail::send(new ContactEmail($user))) {
            return response()->json([
                'status' => 1,
                'title' => "Formulário enviado com sucesso!",
                'text' => "Fique atento ao seu e-mail. Entraremos em contato por lá!",
            ], 200);
        } else {
            return response()->json([
                'status' => 0,
                'title' => "Não foi possível enviar seu formulário",
                'text' => "Ocorreu um erro interno ao enviar seu e-mail. Já estamos trabalhando nisso, tente novamente mais tarde.",
            ], 500);
        }
    }
}
