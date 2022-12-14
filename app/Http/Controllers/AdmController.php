<?php

namespace App\Http\Controllers;

use App\Models\Alocar;
use App\Models\User;
use App\Helper\Helper;
use App\Models\Maquinas;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

use stdClass;

class AdmController extends Controller
{
    protected $request;

    /**
      * Store a newly created resource in storage.
      *
      * @param  \Illuminate\Http\Request  $request
      * @return \Illuminate\Http\Response
      */

    public function solic_cad()
    {
        $msg = Helper::getCustomMsg();
        return view('solic_cad', ['msg' => $msg]);
    }
    public function pesquisa()
    {
        $msg = Helper::getCustomMsg();
        if(Auth::check())
        {
            $user = Auth::user()->email;
            $results = DB::select('select * from users left join maquinas on users.id_maq = maquinas.id_maqui left join alocars on alocars.id_user = users.id where email ="'.$user.'"');
            if(Auth::user()->adm == 1)
            {
                return view('user_views/adm_area', [
                    'results' => $results,
                    'msg' => $msg,
                ]);
            }
            else
            {
                return view('user_views/user_area', [
                    'results' => $results,
                    'msg' => $msg,
                ]);
            }
        }
        else
        {
            return view('auth/login');
        }
        
    }

    public function teste()
    {
        $msg = Helper::getCustomMsg();
        if(Auth::check())
        {
            $id_user = Auth::user()->id;
            $nome = Auth::user()->name;
            $email = Auth::user()->email;
            $fora_do_prazo = DB::select
            ('SELECT alocars.prazo, alocars.id_maq, maquinas.nome
            FROM alocars INNER JOIN maquinas
            WHERE alocars.id_maq = maquinas.id_maqui
            AND alocars.id_user = '.$id_user.'
            AND alocars.prazo < CURDATE();');
            // echo "<script>alert('".count($fora_do_prazo)."')</script>";

            User::find(Auth::user()->id)->update([
                'id_maq'=> 0,
            ]);

            
            foreach ($fora_do_prazo as $alocacao) {
                DB::table('alocars')
                ->where('id_maq', '=', $alocacao->id_maq, 'AND', 'id_user', '=', $id_user)
                ->delete();

                Mail::send(new \App\Mail\SendMail($alocacao, $email, $nome));
            }

            

            // fazer verificação do prazo e mandar email
            $user = Auth::user()->adm;
            if($user == 1)
            {
                return view('/home_adm');
            }
            else
            {
                
                return view('/home', ['msg' => $msg,]);
            }
        }
        else
        {
            return view('auth/login');
        }
        
    }

    public function create(Request $request)
    {
        if(Auth::check())
        {
            if(Auth::user()->adm == 1)
            {
                // echo "<script>alert('".$request->query("nome")."')</script>";
                // echo "<script>alert('".$request->query("email")."')</script>";
                // echo "<script>alert('".$request->query("telefone")."')</script>";

                try {
                    if ($request->query("nome") == null || $request->query("nome") == '') {
                        $msg = Helper::getCustomMsg();
                        echo "<script>alert('Primeiro if')</script>";
                        return view('cadastros/cad_user', [
                        'msg' => $msg,
                        'nome' => $request['nome'],
                        'email' => $request['email']
                        ]);
    
                    } else {
                        echo "<script>alert('Segundo if')</script>";
                        $nome = $request->query("nome");
                        $email = $request->query("email");
                        $this->store($request);
                        Helper::setCustomMsg(['msg-success', 'Usuário cadastrado!']);
                        return redirect('controle_user');
                    }
                } catch (\Exception $e) {
                    $e->getMessage();
                    Helper::setCustomMsg(['msg-danger', 'Erro no cadastro!']);

                    $msg = Helper::getCustomMsg();
                    return redirect('controle_user');
                }
            }
            else
            {
                return view('/home');
            }
        }
        else
        {
            return view('auth/login');
        }
        
    }

    public function store(Request $request)
    {
        if(isset($request['adm']))
        {
            $checkbox = 1;
        }
        else
        {
            $checkbox = 0;
        }

        if ($request->query("nome") == null || $request->query("nome") == '') {
            $nome = $request['name'];
            $email = $request['email'];
            $telefone = $request['telefone'];
            // echo "<script>alert('$nome')</script>";
        } else {
            echo "<script>alert('Segundo if')</script>";
            $nome = $request->query("nome");
            $email = $request->query("email");
            $cadastro_automatico = true;
        }

        try
        {
            // echo "<script>alert('$nome')</script>";
            User::create([
                'name' => $nome,
                'email' => $email,
                'telefone' => $request['telefone'],
                'password' => Hash::make('29recogna03'),
                'adm' => $checkbox,
                'ativo' => 1,
                'id_maq' => 0,
            ]);
            

            $email = $request['email'];
            $nome = $request['name'];
            $telefone = $request['telefone'];
            $senha = '29recogna03';
            if($checkbox == 1)
            {
                $tipo = 'Administrador';
            }
            else
            {
                $tipo = 'Usuário comum';
            }

            $user = new stdClass();
            $user->name = $nome;
            $user->email = $email;

            //return new \App\Mail\cadMail($user, $telefone, $senha, $tipo);
            Mail::send(new \App\Mail\cadMail($user, $telefone, $senha, $tipo));

            Helper::setCustomMsg(['msg-success', 'Usuário cadastrado!']);
            
            return redirect('controle_user');
        }
        catch(\Exception $e)
        {
            $e->getMessage();
            Helper::setCustomMsg(['msg-danger', 'Erro no cadastro!']);

            $msg = Helper::getCustomMsg();
            return view('cadastros/cad_user', ['msg' => $msg, 'nome' => $nome,
            'email' => $email]);

        }

        
    }

    protected $maq_mais;

    public function index($id)
    {
        $maq_mais = DB::select('select * from users right join maquinas on users.id_maq = maquinas.id_maqui left join alocars on alocars.id_user = users.id where maquinas.id_maqui='.$id);
        return view('maquinas/mais', ['maq_mais' => $maq_mais]);
    }

    protected $maq_ver;

    public function mostrar($id)
    {
        $maq_ver = DB::select('select * from users right join maquinas on users.id_maq = maquinas.id_maqui left join alocars on alocars.id_user = users.id where maquinas.id_maqui='.$id);
        return view('alocar/ver', ['maq_mais' => $maq_ver]);
    }

    public function edit($id)
    {
        $usuario = DB::select('select * from users left join maquinas on users.id_maq = maquinas.id_maqui left join alocars on alocars.id_user = users.id where alocars.id='.$id);
        // carrega o registro (realiza um select e um fetch internamente)
        
        return view('user_views/altera_area', ['usuario' => $usuario]);
    }

    public function update(Request $request, $id)
    {
        //$senha_usuario = DB::table('users')->where('email', Auth::user()->email)->value('password');

        try
        {
            DB::table('alocars')
            ->where('id_user', $id)
            ->update([
                'prazo' =>  $request['prazo'],
                'paper' => $request['paper'],
            ]);

            Helper::setCustomMsg(['msg-success', 'Alteração feita com sucesso!']);
        }
        catch(\Exception $e)
        {
            $e->getMessage();
            Helper::setCustomMsg(['msg-danger', 'Erro na alteração!']);
        }
        
        return redirect('area');
    }
    
}
