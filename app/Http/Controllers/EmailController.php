<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use stdClass;
use App\Helper\Helper;
use Illuminate\Support\Facades\Auth;

class EmailController extends Controller
{
    public function solic(Request $request)
    {
        try
        {
            $adms = DB::select('select * from users where adm = 1 and ativo = 1');
            
            $email = $request['email'];
            $nome = $request['name'];
            $telefone = $request['telefone'];

            foreach($adms as $adms)
            {
                $user = new stdClass();
                $user->name = $adms->name;
                $user->email = $adms->email;

                //return new \App\Mail\newRecogna($user, $email, $nome);
                \Illuminate\Support\Facades\Mail::send(new \App\Mail\newRecogna($user, $email, $nome, $telefone));
            }

            Helper::setCustomMsg(['msg-success', 'Solicitação enviada! Caso não recebeu o email tente novamente']);

        }
        catch(\Exception $e)
        {
            $e->getMessage();
            dd($e);
            Helper::setCustomMsg(['msg-danger', 'Erro no envio do email!']);
        }

        $msg = Helper::getCustomMsg();
        return view('solic_cad', ['msg' => $msg]);
    }
}
