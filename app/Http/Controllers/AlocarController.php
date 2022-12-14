<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Alocar;

use App\Models\User;

use App\Models\Maquinas;

use App\Helper\Helper;

use Illuminate\Support\Facades\DB;



use Illuminate\Support\Facades\Auth;

class AlocarController extends Controller
{
    protected $maq_mais;

    public function index($id)
    {
        try
        {
            $maq_mais = DB::select('select * from maquinas where id_maqui='.$id);
            return view('alocar/alocar', ['maq_mais' => $maq_mais]);
        }
        catch(\Exception $e)
        {
            $e->getMessage();
            Helper::setCustomMsg(['msg-danger', 'Máquina não encontrada!']);
            return redirect('controle_maq');
        }   
    }

    protected $maq;

    public function mostrar($id)
    {
        try
        {
            $maq = DB::select('select * from maquinas right join alocars on maquinas.id_maqui = alocars.id_maq where maquinas.id_maqui='.$id);
            return view('alocar/desalocar', ['maq' => $maq]);
        }
        catch(\Exception $e)
        {
            $e->getMessage();
            Helper::setCustomMsg(['msg-danger', 'Máquina não encontrada!']);
            return redirect('controle_maq');
        } 
        
    }


    public function uncreate($id)
    {
        try
        {
            User::find(Auth::user()->id)->update([
                'id_maq'=> 0,
            ]);
    
            DB::table('alocars')
                  ->where('id_maq', $id)
                  ->delete();

            Helper::setCustomMsg(['msg-success', 'Usuário desalocado!']);
        }
        catch(\Exception $e)
        {
            $e->getMessage();
            Helper::setCustomMsg(['msg-danger', 'Erro na desalocação!']);
        }
        
        return redirect('controle_maq');
    }

    public function create(Request $request, $id)
    {
        try
        {
            Alocar::create([
                'id_user'=> Auth::user()->id,
                'id_maq'=> $id,
                'paper'=> $request->paper,
                'prazo' => $request->prazo,
            ]);
    
            User::find(Auth::user()->id)->update([
                'id_maq'=> $id,
            ]);

            Helper::setCustomMsg(['msg-success', 'Usuário alocado!']);
        }
        catch(\Exception $e)
        {
            $e->getMessage();
            Helper::setCustomMsg(['msg-danger', 'Erro na alocação!']);
        }

        return redirect('controle_maq');
    }

}
