<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Models\Reserve;
use App\Models\Maquina;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class ReserveController extends Controller
{
    public function index()
    {

        $user_id = auth()->id();

        $reserves = Reserve::where('user_id', $user_id)->get();
        return view('reserves.index', ['reserves' => $reserves]);
    }

    public function show($id)
    {
        $maquina = DB::table('maquinas')->find($id);
        $approveds = DB::table('reserves')->where('approved', 1)->get();
        return view('reserves.create', ['space' => $maquina, 'approveds' => $approveds]);
    }

    public function create(Request $request)
    {
        return view('reserves.create');
    }

    public function store(Request $request)
    {
        $maquina = DB::table('maquinas')->get();
        $maquinas = Reserve::where('allocation', $request->allocation)->get();
        if ($maquinas) {
            foreach ($maquinas as $maquina) {
                if ($maquina->approved = 1) {
                    return redirect()->back()->with(['message' => 'Data indisponível', 'maquinas' => $maquinas])->with('color', 'red');
                }
            }
        }

        $date = Carbon::parse($request->allocation);
        $today = Carbon::today();
        $daysBetween = $today->diffInDays($date);
        switch ($request->type) {
            case 'wedding':
                if ($daysBetween <  180) {
                    return redirect()->back()->with(['message' => 'Casamentos devem ser agendados com mais de 180 dias de antecedência', 'maquinas' => $maquinas])->with('color', 'red');
                }
                break;
            case 'birthday':
                if ($daysBetween <  90) {
                    return redirect()->back()->with(['message' => 'Aniversários devem ser agendados com mais de 90 dias de antecedência', 'maquinas' => $maquinas])->with('color', 'red');
                }
                break;
            case 'default': 
                if ($daysBetween <  60) {
                    return redirect()->back()->with(['message' => 'Os eventos devem ser agendados com mais de 60 dias de antecedência', 'maquinas' => $maquinas])->with('color', 'red');
                }
                break;
        }
        $reserve = Reserve::create([
            'user_id' => $request->user_id,
            'user_name' => $request->user_name,
            'space_id' => $request->space_id,
            'email' => $request->email,
            'space_name' => $request->space_name,
            'allocation' => $request->allocation,
        ]);
        return redirect()->route('dashboard')->with(['message' => 'Reserva registrada!', 'maquinas' => $maquinas])->with('color', 'blue');

        // return view('dashboard', ['message' => 'Reserva aguardando aprovação', 'maquinas' => $maquinas]);
    }

    public function edit($id)
    {
        // Encontrar a reserva pelo ID
        $reserve = Reserve::find($id);

        // Verificar se a reserva existe
        if (!$reserve || Auth::user()->id != $reserve->user_id) {
            return redirect()->route('dashboard')->with('message', 'Reserva não encontrada')->with('color', 'red');
        }
        return view('reserves.edit', ['reserve' => $reserve]);
    }


    public function update(Request $request, $id)
    {
        $reserve = Reserve::find($id);

        // Verificar se a reserva foi encontrada
        if (!$reserve || Auth::user()->id != $request->user_id) {
            return redirect()->route('dashboard')->with('message', 'Reserva não encontrada')->with('color', 'red');
        }
        $date = Carbon::parse($request->allocation);
        if($date->isPast()){
            return redirect()->route('dashboard')->with('message', 'Sua reserva deve ter uma data válida')->with('color', 'red');

        }

        $today = Carbon::today();
        $daysBetween = $today->diffInDays($date);
        switch ($request->type) {
            case 'wedding':
                if ($daysBetween <  180) {
                    return redirect()->back()->with(['message' => 'Casamentos devem ser agendados com mais de 180 dias de antecedência'])->with('color', 'red');
                }
                break;
            case 'birthday':
                if ($daysBetween <  90) {
                    return redirect()->back()->with(['message' => 'Aniversários devem ser agendados com mais de 90 dias de antecedência'])->with('color', 'red');
                }
                break;
            case 'default': 
                if ($daysBetween <  60) {
                    return redirect()->back()->with(['message' => 'Os eventos devem ser agendados com mais de 60 dias de antecedência'])->with('color', 'red');
                }
                break;
        }
        // Atualizar os dados da reserva com os dados do formulário
        $reserve->update([
            'user_id' => $request->user_id,
            'user_name' => $request->user_name,
            'space_id' => $request->space_id,
            'email' => $request->email,
            'space_name' => $request->space_name,
            'aproved' => 0,
            'allocation' => $request->allocation,
        ]);

        // Redirecionar de volta para a página de índice de reservas com uma mensagem de sucesso
        return redirect()->route('dashboard')->with('message', 'Reserva atualizada com sucesso')->with('color', 'blue');
    }

    public function destroy($id)
    {
        $reserve = Reserve::find($id);

        // Verificar se a reserva foi encontrada
        if (!$reserve || Auth::user()->id != $reserve->user_id) {
            return redirect()->route('dashboard')->with('message', 'Reserva não encontrada')->with('color', 'red');
        }

        // Excluir a reserva
        $reserve->delete();

        // Redirecionar de volta para a página de índice de reservas com uma mensagem de sucesso
        return redirect()->route('dashboard')->with('message', 'Reserva deletada com sucesso')->with('color', 'blue');
    }
}
