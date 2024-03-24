<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\Reserve;
use App\Models\Maquinas;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller

{
    public function users()
    {
        $users = User::get();

        return view('admin.users.index', ['users' => $users]);
    }

    public function usersEdit($id)
    {
        $user = User::find($id);

        return view('admin.users.edit', ['user' => $user]);
    }

    public function usersUpdate(Request $request, $id)
    {
        $user = User::find($id);

        if (!$user) {
            return redirect()->route('admin.users')->with('message', 'Usuário não encontrado')->with('color', 'red');
        }

        $user->update([
            'admin' => $request->admin,
        ]);


        return redirect()->route('admin.users')->with('message', 'Usuário atualizado com sucesso')->with('color', 'blue');
    }
    public function usersDestroy($id)
    {
        $user = User::find($id);

        if (!$user) {
            return redirect()->route('admin.users')->with('message', 'Usuário não encontrado')->with('color', 'red');
        }

        $user->delete();

        return redirect()->route('admin.users')->with('message', 'Usuário deletado com sucesso')->with('color', 'blue');
    }

    public function reserves()
    {
        $reserves = Reserve::get();

        return view('admin.reserves.index', ['reserves' => $reserves]);
    }

    public function reservesEdit($id)
    {
        $reserve = Reserve::find($id);

        return view('admin.reserves.edit', ['reserve' => $reserve]);
    }

    public function reservesUpdate(Request $request, $id)
    {
        $reserve = Reserve::find($id);

        if (!$reserve) {
            return redirect()->route('admin.reserves')->with('message', 'Reserva não encontrada')->with('color', 'red');
        }
        $reserve->update([
            'approved' => $request->approved,
        ]);

        $reserves = Reserve::where('allocation', $request->allocation);
        if ($reserves) {
            foreach ($reserves as $r) {
                AdminController::reservesDestroy($r->id);
            }
        }

        return redirect()->route('admin.reserves')->with('message', 'Reserva atualizada com sucesso')->with('color', 'blue');
    }
    public function reservesDestroy($id)
    {
        $reserve = Reserve::find($id);

        if (!$reserve) {
            return redirect()->route('admin.reserves')->with('message', 'Reserva não encontrada')->with('color', 'red');
        }

        $reserve->delete();

        return redirect()->route('admin.reserves')->with('message', 'Reserva deletada com sucesso')->with('color', 'blue');
    }

    public function maquinas()
    {
        $maquinas = Maquinas::get();

        return view('admin.maquinas.index', ['maquinas' => $maquinas]);
    }

    public function maquinasCreate()
    {
        return view('admin.maquinas.create');
    }

    public function maquinasStore(Request $request)
    {
        

        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $requestPhoto = $request->image;

            $extension = $requestPhoto->extension();

            $photoName = md5($requestPhoto->getClientOriginalName() . strtotime('now')) . '.' . $extension;

            $request->image->move(public_path('photos'), $photoName);
        }

        $maquina = new Maquina();
        $maquina->name = $request->name;
        $maquina->description = $request->description;
        $maquina->image = $photoName;
        $maquina->save();
        return redirect()->route('dashboard')->with('messsage', 'máquina cadastrado com sucesso!')->with('color', 'blue');
    }

    public function maquinasEdit($id)
    {
        $maquina = Maquina::find($id);

        return view('admin.maquinas.edit', ['space' => $maquina]);
    }

    public function maquinasUpdate(Request $request, $id)
    {
        $maquina = Maquina::find($id);

        if (!$maquina) {
            return redirect()->route('admin.maquinas')->with('message', 'máquina não encontrado')->with('color', 'red');
        }

        $maquina->update([
            'name' => $request->name,
            'description' => $request->description,
        ]);

        return redirect()->route('admin.maquinas')->with('message', 'máquina atualizado com sucesso')->with('color', 'blue');
    }
    public function maquinasDestroy($id)
    {
        $maquina = Maquina::find($id);

        if (!$maquina) {
            return redirect()->route('admin.maquinas')->with('message', 'máquina não encontrado')->with('color', 'red');
        }

        $maquina->delete();

        return redirect()->route('admin.maquinas')->with('message', 'máquina deletado com sucesso')->with('color', 'blue');
    }

    public function index()
    {
    }

    public function show($id)
    {
    }

    public function create()
    {
    }

    public function store(Request $request)
    {
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
