<?php

namespace App\Http\Controllers;

use App\Helper\Helper;

use Illuminate\Http\Request;

use App\Models\Maquinas;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use PDO;

class MaquinasController extends Controller
{
    public function create()
    {
        $msg = Helper::getCustomMsg();
        if(Auth::check())
        {
            if(Auth::user()->adm == 1)
            {
                return view('cadastros/cad_maq', [
                    'msg' => $msg,
                ]);
            }
            else
            {
                return view('/home', [
                    'msg' => $msg,
                ]);
            }
        }
        else
        {
            return view('auth/login');
        }
    }

    

    public function store(Request $request)
    {

        try
        {
            Maquinas::create([
                'nome'=> $request->nome,
                'local'=> $request->local,
                'dominio'=> $request->dominio,
                'mac_address' => $request->mac_address, 
                'cpu' => '',
                'gpu' => '',
                'ram' => '',
                'storage' => '',
                'senha' => '',
                'endereco' => '',
                'status' => 1,
                'restrita' => 0,
                'manut' => '',
            ]);

            Helper::setCustomMsg(['msg-success', 'Máquina cadastrada!']);
            return redirect('controle_maq');
        }
        catch(\Exception $e)
        {
            $e->getMessage();
            Helper::setCustomMsg(['msg-danger', 'Erro no cadastro!']);

            $msg = Helper::getCustomMsg();
            return view('cadastros/cad_maq', ['msg' => $msg]);

        }
        
    }

    public function index()
    {
        
        $msg = Helper::getCustomMsg();
        $results = DB::select('select * from users right join maquinas on users.id_maq = maquinas.id_maqui left join alocars on alocars.id_user = users.id');
        // $results = DB::select('select * from maquinas');
        // $maquinas_alocadas = array();
        // foreach ($results as $result) {
        //     $maquinas_alocadas.push()
            // $maquinas_alocadas = DB::select('SELECT * FROM alocars A left JOIN users U ON U.id = A.id_user WHERE A.id_maq = 2;');//SELECT * FROM alocars A WHERE A.id_maq ='.$result->id_maq.';
            
            // dd($maquinas_alocadas);
        // }//26, 1 e 2
        // dd($results);
        // var_export($results, true);
        // echo "ok";
        if(Auth::check())
        {
            // exit();
            $users = Auth::user()->id_maq;
            $user = Auth::user()->id;

            if(Auth::user()->adm == 1)
            {
                return view('maquinas/controle_maq', [
                    'results' => $results,
                    'user' => $user,
                    'users' => $users,
                    'msg' => $msg,
                ]);
            }
            elseif(Auth::user()->adm == 0)
            {
                return view('alocar/controle_maq_user', [
                    'results' => $results,
                    'user' => $user,
                    'users' => $users,
                    'msg' => $msg,
                ]);
            }
        }
        else
        {
            return view('auth/login');
        }
    }

    /**
     * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */

    public function pesquisa(Request $request)
    {
    //$sql = 'select * users right join maquinas on users.maquina = maquinas.id_maqui where nome like "%'.$request['nome'].'%" and dominio like "%'.$request['dominio'].'%" and mac_address like "%'.$request['mac_address'].'%" and restrita like "%'.$request['restrita'].'%" and status like "%'.$request['status'].'%"';
    try
    {
        $results = DB::select('select * from users right join maquinas on users.id_maq = maquinas.id_maqui left join alocars on alocars.id_user = users.id where nome like "%'.$request['nome'].'%" and dominio like "%'.$request['dominio'].'%" and mac_address like "%'.$request['mac_address'].'%" and restrita like "%'.$request['restrita'].'%" and status like "%'.$request['status'].'%"');
        $users = Auth::user()->id_maq;
    }
    catch(\Exception $e)
    {
        $e->getMessage();
        Helper::setCustomMsg(['msg-danger', 'Erro na pesquisa!']);
    }
    
    $msg = Helper::getCustomMsg();
    if(Auth::user()->adm == 1)
    {
        return view('maquinas/controle_maq', [
            'results' => $results,
            'users' => $users,
            'msg' => $msg,
        ]);
    }
    else
    {
        return view('alocar/controle_maq_user', [
            'results' => $results,
            'users' => $users,
            'msg' => $msg,
        ]);
    }

    }

    protected $maquina;

    public function edit($id)
    {
        $maquina = DB::select('select * from users right join maquinas on users.id_maq = maquinas.id_maqui where maquinas.id_maqui = '.$id);
        // carrega o registro (realiza um select e um fetch internamente)
        return view('maquinas/alt_maq',compact('maquina'));
    }

    public function update(Request $request, $id)
    { 

        try
        {
                if($request['cpu'] == null) {   $cpu='';    }
                else {  $cpu= $request['cpu'];  }

                if($request['gpu'] == null) {   $gpu='';    }
                else {  $gpu= $request['gpu'];  }

                if($request['ram'] == null) {   $ram='';    }
                else {  $ram= $request['ram'];  }

                if($request['storage'] == null) {   $storage='';    }
                else {  $storage= $request['storage'];  }

                if($request['senha'] == null) {   $senha='';    }
                else {  $senha= $request['senha'];  }

                if($request['endereco'] == null) {   $endereco='';    }
                else {  $endereco= $request['endereco'];  }

                if($request['manut'] == null || $request['status'] == 1) {   $manut='';    }
                else 
                {  
                    $manut= $request['manut'];
                }
                    DB::table('maquinas')
                      ->where('id_maq', $id)
                      ->update([
                        'nome'=> $request['nome'],
                        'local'=> $request['local'],
                        'dominio'=> $request['dominio'],
                        'mac_address' => $request['mac_address'], 
                        'status' => $request['status'],
                        'restrita' => $request['restrita'],
                        'cpu' => $cpu,
                        'gpu' => $gpu,
                        'ram' => $ram,
                        'storage' => $storage,
                        'senha' => $senha,
                        'endereco' => $endereco,
                        'manut' => $manut,
                    ]);

            Helper::setCustomMsg(['msg-success', 'Alteração feita com sucesso!']);
        }
        catch(\Exception $e)
        {
            $e->getMessage();
            Helper::setCustomMsg(['msg-danger', 'Erro na alteração!']);
        }

        return redirect('controle_maq');
    }

    protected $maq;

    public function delete($id)
    {
        $maq = DB::select('select * from users right join maquinas on users.id_maq = maquinas.id_maqui where maquinas.id_maqui = '.$id);
        return view('maquinas/del_maq', ['maq' => $maq]);
    }

    public function destroy($id, $id2)
    {
        try
        {
            $maq = DB::select('select id_maq from alocars left join maquinas on alocars.id_maq = maquinas.id_maqui where maquinas.id_maqui = '.$id);

            if($maq != null)
            {
                DB::table('alocars')
              ->where('id_maq', $id)
              ->delete();

              DB::table('users')
              ->where('id', $id2)
              ->update([
                'id_maq' => 0
              ]);
            }

            DB::table('maquinas')
              ->where('id_maq', $id)
              ->delete();

            Helper::setCustomMsg(['msg-success', 'Exclusão feita com sucesso!']);
        }
        catch(\Exception $e)
        {
            $e->getMessage();
            Helper::setCustomMsg(['msg-danger', 'Erro na exclusão!']);
        }
    
        return redirect('controle_maq');
    }


}
