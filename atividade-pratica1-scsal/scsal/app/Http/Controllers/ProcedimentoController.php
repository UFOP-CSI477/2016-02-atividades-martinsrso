<?php

namespace App\Http\Controllers;

use App\Procedimento;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;

class ProcedimentoController extends Controller
{

    public function listarGeral()
    {
        $procedimentos = Procedimento::orderBy('nome', 'asc')->get();
        return view('geral.procedimentos')->with('procedimentos', $procedimentos);
    }

    public function listar()
    {
        $procedimentos = Procedimento::orderBy('nome', 'asc')->get();
        return view('usuario.administrador.procedimento.listar')->with('procedimentos', $procedimentos);
    }

    public function showAdicionar()
    {
        return view('usuario.administrador.procedimento.adicionar');
    }

    public function adicionar(Request $request)
    {
        $formulario = Input::all();
        $formulario['usuario_id'] = Auth::id();
        Procedimento::create($formulario);
        return redirect()->route('listarProcedimentos');
    }

    public function relatorio()
    {
        $procedimentos = Procedimento::with('exames')->get();
        return view('usuario.administrador.procedimento.relatorio')->with('procedimentos', $procedimentos);
    }

    public function showEditarOperador($exame)
    {
        $procedimento = $exame->procedimento;
        return view('usuario.operador.exame.editar')->with('procedimento', $procedimento);
    }
}
