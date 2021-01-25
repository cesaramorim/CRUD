<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Carros;

class CarrosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $carros = Carros::all()->toArray();
        return view('carros.index', compact('carros'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('carros.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'nome_carro'    =>  'required',
            'proprietario'  =>  'required',
            'placa'         =>  'required'
        ]);
        $carros = new Carros([
            'nome_carro'    =>  $request->get('nome_carro'),
            'proprietario'  =>  $request->get('proprietario'),
            'placa'         =>  $request->get('placa'),
        ]);
        $carros->save();
        return redirect()->route('carros.index')->with('success', 'Informações adicionadas!');
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
        $carros = Carros::find($id);
        return view('carros.edit', compact('carros', 'id'));
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
        $this->validate($request, [
            'nome_carro'    =>  'required',
            'proprietario'  =>  'required',
            'placa'         =>  'required'
        ]);
        $carros = Carros::find($id);
        $carros->nome_carro = $request->get('nome_carro');
        $carros->proprietario = $request->get('proprietario');
        $carros->placa = $request->get('placa');
        $carros->save();
        return redirect()->route('carros.index')->with('success', 'Informações atualizadas!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $carros = Carros::find($id);
        $carros->delete();
        return redirect()->route('carros.index')->with('success', 'Informações Deletadas');
    }
}
