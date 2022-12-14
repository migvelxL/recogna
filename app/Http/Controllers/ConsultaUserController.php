<?php

namespace App\Http\Controllers;

use App\Helper\Helper;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

use App\models\User;


use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

use App\Http\Controllers\Redirect;
use App\Models\Maquinas;
use Illuminate\Contracts\Encryption\DecryptException;
use mysqli;
use PHPUnit\TextUI\Help;

class ConsultaUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    protected $request;
    protected $maquina;

    public function index()
    {
        $msg = Helper::getCustomMsg();
        $results = DB::select('select * from users left join maquinas on users.id_maq = maquinas.id_maqui');
        return view('users/controle_users', [
            'results' => $results,
            'msg' => $msg,
        ]);
    }
    
    /**
      * Store a newly created resource in storage.
      *
      * @param  \Illuminate\Http\Request  $request
      * @return \Illuminate\Http\Response
      */


    public function pesquisa(Request $request)
    {

        try
        {
            $sql = 'select * from users left join maquinas on users.id_maq = maquinas.id_maqui '.
          'where users.name like "%'.$request['name'].'%" and users.ativo like "%'.$request['ativo'].'%" and '.
          'users.email like "%'.$request['email'].'%" and users.adm like "%'.$request['tipo'].'%"';

            if ($request['id_maq']!= 0) 
            {
                $sql=$sql.' and maquinas.nome like "%'.$request['id_maq'].'%"'; 
            }
        }
        catch(\Exception $e)
        {
            $e->getMessage();
            Helper::setCustomMsg(['msg-danger', 'Erro na alteração!']);
        }
        
        $msg = Helper::getCustomMsg();
        $results = DB::select($sql);
        return view('users/controle_users',[
            'results' => $results,
            'msg' => $msg,
        ]);
    }

    protected $usuario;
    private $repository;

    public function edit($id)
    {

        $usuario = DB::select('select * from users left join maquinas on users.id_maq = maquinas.id_maqui where users.id = '.$id);
        $maquinas = DB::select('select * from maquinas');
        $alocado = DB::select('select * from alocars');

        //dd($maquinas);
        // carrega o registro (realiza um select e um fetch internamente)
        return view('users/alt_users', compact('usuario', 'maquinas', 'alocado'));
    }

    public function update(Request $request, $id)
    {
        
        //$senha_usuario = DB::table('users')->where('email', Auth::user()->email)->value('password');

            if($request['id_maq'] == 0)
            {
                $maquina= 0;
            }
            else
            {
                $maquina= $request['id_maq'];
            }

            if($request['status'] == 0)
            {
                DB::table('alocars')
                ->where('id_user', $id)
                ->delete();

                $maquina == 0;
            }

            DB::table('users')
            ->where('id', $id)
            ->update([
                'name' =>  $request['name'],
                'telefone' => $request['telefone'],
                'id_maq' =>  $maquina,
                'adm' =>   $request['tipo'],
                'ativo' => $request['status'],
            ]);

            Helper::setCustomMsg(['msg-success', 'Alteração feita com sucesso!']);


        return redirect('controle_user');
    }

    protected $user;

    public function delete($id)
    {
        $user = DB::select('select * from users left join maquinas on users.id_maq = maquinas.id_maqui where users.id = '.$id);
        return view('users/del_users', ['user' => $user]);
    }

    public function destroy($id)
    {
        try
        {

            $user = DB::select('select * from users left join alocars on alocars.id_user = users.id where users.id = '.$id);

            if($user != null)
            {
                DB::table('alocars')
              ->where('id_user', $id)
              ->delete();
            }

            DB::table('users')
              ->where('id', $id)
              ->delete();

            

            Helper::setCustomMsg(['msg-success', 'Exclusão feita com sucesso!']);
        }
        catch(\Exception $e)
        {
            $e->getMessage();
            //Helper::setCustomMsg(['msg-danger', 'Erro na exclusão!']);
            dd($e);
        }
    
        return redirect('controle_user');
    }
}