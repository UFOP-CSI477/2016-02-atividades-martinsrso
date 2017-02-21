<?php

namespace App\Http\Controllers;

use App\Exame;
use App\Procedimento;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;

class ExameController extends Controller
{
    public function listar()
    {
        $exames = Exame::with('procedimento')->where('paciente_id', Auth::id())->get();
        $exames->sortBy('procedimento.nome');
        $exames->sortByDesc('data');

        $precoTotal = 0;
        $quantidadeExames = 0;

        foreach($exames as $exame)
        {
            $precoTotal += $exame->procedimento->preco;
            ++$quantidadeExames;
        }

        return view('paciente.exame.listar')->with(['exames' => $exames, 'precoTotal' => $precoTotal, 'quantidadeExames' => $quantidadeExames]);
    }

    public function showSolicitar()
    {
        $procedimentos = Procedimento::all();
        return view('paciente.exame.solicitar')->with('procedimentos', $procedimentos);
    }

    public function solicitar(Request $request)
    {
        $formulario = Input::all();
        $exame = Exame::create(['paciente_id' => Auth::id(), 'procedimento_id' => $formulario['procedimento'], 'data' => $formulario['data']]);
        return redirect()->route('listarExamesPaciente');
    }

    public function listarTodos()
    {
        $exames = Exame::with('paciente', 'procedimento')->get();
        return view('usuario.administrador.exame.listar')->with('exames', $exames);
    }

}
