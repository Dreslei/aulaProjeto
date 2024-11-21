<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Distribuidora;

class DistribuidoraController extends Controller
{

    public function index()
    {
        $distribuidoras = Distribuidora::all();
        return view('distribuidoras.index', compact('distribuidoras'));
    }

    public function create()
    {
        return view ('distribuidoras.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|string|max:100',
            'descricao' => 'string|max:800'
        ]);

        Distribuidora::create($request->all());

        return redirect()->route('distribuidoras.index')->with('Deu CERTO');
    }

    public function show($id)
    {
        $distribuidora = Distribuidora::findOrFail($id);
        return view('distribuidoras.show', compact('distribuidora'));
    }


    public function edit($id)
    {
        $distribuidora = Distribuidora::findOrFail($id);
        return view('distribuidoras.edit', compact('distribuidora'));
    }

    public function update(Request $request, $id)
    {

        $distribuidora = Distribuidora::findOrFail($id);

        $distribuidora->nome = $request->input('nome');
        $distribuidora->descricao = $request->input('descricao');

        $distribuidora->save();

        return redirect()->route('distribuidoras.index');
    }

    public function destroy($id)
    {
        $distribuidora = Distribuidora::findOrFail($id);

        $distribuidora->delete();
        return redirect()->route('distribuidoras.index');
    }
}
