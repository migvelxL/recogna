<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\DB;

use App\Models\Maquinas;

class MaquinasController extends Controller
{
    public function index()
    {
        return view('maquinas.index');
    }

    public function show($id)
    {
        $maquina = DB::table('maquinas')->find($id);
        return view('maquinas.index', ['space' => $maquina]);
    }

    public function create()
    {
        return view('users.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:6',
        ]);
        //var_dump($request->request);
        // $user = User::create([
        //     'name' => $validatedData['name'],
        //     'email' => $validatedData['email'],
        //     'password' => bcrypt($validatedData['password']),
        // ]);

        // Você pode querer redirecionar o usuário para uma página de sucesso ou exibir uma mensagem de confirmação aqui

        // return redirect()->route('users.index');
    }

    public function edit($id)
    {
    }

    public function update(Request $request, $id)
    {
    }

    public function destroy($id)
    {
    }
}