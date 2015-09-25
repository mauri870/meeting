<?php

namespace App\Http\Controllers;

use Artesaos\Defender\Testing\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;
use Illuminate\Contracts\Logging\Log;
use Modules\Admin\Entities\Portfolio;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Auth;

class PagesController extends Controller
{

    public function index()
    {
        return view('index')
            ->with('user',Auth::user())
            ->with('page_name', 'Início');
    }

    public function contact(Request $request)
    {
        $rules = [
            'nome'=>'required|min:1',
            'email'=>'required|email',
            'telefone'=>'required|regex:/^\([1-9]{2}\) [2-9][0-9]{3,4}\-[0-9]{4}$/',
            'mensagem'=>'required|min:10',
            'g-recaptcha-response' => 'required|captcha'
        ];

        $messages = [
            'nome.min'=>'O campo :atribute precisa ser preenchido!',
            'telefone.regex'=>'O campo telefone precisa estar no padrão (xx) xxxxx-xxxx!',
            'g-recaptcha-response.required'=>'Você precisa confirmar que não é um robô!',
            'g-recaptcha-response.captcha'=>'O ReCAPTCHA precisa ser um código CAPTCHA válido!'
        ];

        $validator = Validator::make($request->all(),$rules,$messages);

        if($validator->fails()){
            return redirect()
                ->to(URL::previous().'#section-contact')
                ->withErrors($validator->errors())
                ->withInput();
        }


        //Enviar email

        Mail::send('email.template',
        array(
            'site_domain' => 'digitalserra.com.br',

            'nome' => $request->get('nome'),
            'email' => $request->get('email'),
            'telefone' => $request->get('telefone'),
            'mensagem' => $request->get('mensagem')
        ), function($message)
        {
            $message->from(env('MAIL_USERNAME', null));
            $message->to(env('MAIL_USERNAME', null), 'Site Admin')->subject('Contato do site digitalserra.com.br');
        });

        //Log Users action
        \Log::info('Usuário com ip '.$request->getClientIp(). ' enviou um email pelo site');

        //Redirect back
        $request->session()->flash('success','Obrigado por nos contatar!');
        return redirect()
            ->to(URL::previous().'#section-contact');
    }
}
