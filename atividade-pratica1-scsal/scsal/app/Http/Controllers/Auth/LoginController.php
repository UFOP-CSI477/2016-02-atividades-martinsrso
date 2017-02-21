<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Paciente;
use App\Usuario;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'logout']);
    }


    public function showSelecaoLogin()
    {
        return view('auth.selecao');
    }

    public function showLoginUsuario()
    {
        return view('auth.usuario.login');
    }

    public function showLoginPaciente()
    {
        return view('auth.paciente.login');
    }

    public function loginPaciente(Request $request)
    {
        $formulario = Input::all();

        $paciente = Paciente::where('login', $formulario['usuario'])->first();

        if($paciente->senha == $formulario['senha'])
        {
            Auth::guard('pacientes')->login($paciente);
            return redirect()->intended(route('homePaciente'));
        }

        return redirect()->back()->withInput(Input::except('senha'));
    }


    public function loginUsuario(Request $request)
    {
        $formulario = Input::all();

        $usuario = Usuario::where('login', $formulario['usuario'])->first();

        if($usuario->senha == $formulario['senha']) {
            Auth::guard('usuarios')->login($usuario);
            return redirect()->intended(route('homeUsuario'));
        }

        return redirect()->back()->withInput(Input::except('senha'));
    }
}
