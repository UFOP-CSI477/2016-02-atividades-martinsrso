<?php

namespace App\Http\Controllers;

use App\Paciente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;

class PacienteController extends Controller
{
    public function home()
    {
        return view('paciente.home');
    }

    public function showCadastro()
    {
        return view('paciente.cadastro');
    }

    public function cadastrar(Request $request)
    {
        $formulario = Input::all();

        $pacientesExiste = Paciente::where('login', $formulario['login'])->get();
        if(!is_null($pacientesExiste))
            return redirect()->back()->withInput(Input::except('login'));
        else
        {

            $novoPaciente = Paciente::create(Input::all());
            Auth::guard('pacientes')->login($novoPaciente);
            return redirect()->route('homePaciente');
        }
    }

    public function relatorio()
    {
        $pacientes = Paciente::with('exames', 'exames.procedimento')->get();
        return view('usuario.administrador.paciente.relatorio')->with('pacientes', $pacientes);
    }
}
