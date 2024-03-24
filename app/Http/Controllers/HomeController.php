<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = Auth::user()->adm;
        if($user == 1)
        {
            return view('/home_adm');
        }
        else
        {
            return view('/home');
        }
    }

    public function pesquisa()
    {
        $user = Auth::user()->adm;
        if($user == 1)
        {
            return view('/home_adm');
        }
        elseif($user == 0)
        {
            $results = DB::select('select * from users');
            return view('user_views/contatos', [
            'results' => $results,
            ]);
        }
        else
        {
            return view('/login');
        }
        
    }
}
