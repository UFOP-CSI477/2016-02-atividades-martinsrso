<?php

namespace App\Http\Controllers;

use App\Evento;
use App\Registro;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class RegistroController extends Controller
{

    public function relatorioEvento(){
        $registros = Registro::with('atleta', 'evento')->get();

        $vTotal = 0;
        $qTotal = 0;

        foreach ($registros as $registro) {
            $vTotal += $registro->evento->preco;
            $qTotal += 1;
        }

        return view('adm.atleta.total')->with(compact('registros'))->with(compact('qTotal'))->with(compact('vTotal'));

    }

    public function relatorioAtleta(){
        $registros = Registro::with('evento', 'atleta')->get();

        $vTotal = 0;
        $qTotal = 0;

        foreach ($registros as $registro) {
            $vTotal += $registro->evento->preco;
            $qTotal += 1;
        }

        return view('adm.atleta.total')->with(compact('registros'))->with(compact('qTotal'))->with(compact('vTotal'));

    }

    public function listaTodos(){
        $registros = Registro::with('evento', 'atleta')->get()->sortByDesc('data');

        return view('adm.registro.lista')->with(compact('registros'));
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $registros = Evento::all();
        return view('registro.create')->with(compact('registros'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $in = new Registro;

        $input = Input::all();

        $in['atleta_id'] = auth()->user()->id();

        $in['evento_id'] = $input['evento']['value'];
        $in['data'] = $input['data'];

        $in['pago'] = 0;

        $in->save();

//        Registro::create($in);

        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
