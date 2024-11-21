<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Plataforma;

class PlataformaController extends Controller
{
    public function index()
    {
        $plataformas = Plataforma::all();
        return view('plataformas.index', compact('plataformas'));

        // $search = $request->input('search');
        // $plataformas = Plataforma::where('nome', 'like', '%'.$search.'%')
        //                  ->orWhere('id', 'like', '%'.$search.'%')
        //                  ->paginate(10);

        // return view('autores.index', compact('autores'));
    }

    public function create()
    {
        return view ('plataformas.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|string|max:100'
        ]);

        Plataforma::create($request->all());

        return redirect()->route('plataformas.index')->with('Deu CERTO');
    }

    public function show($id)
    {
        $plataforma = Plataforma::findOrFail($id);
        return view('plataformas.show', compact('Plataforma'));
    }


    public function edit($id)
    {
        $plataforma = Plataforma::findOrFail($id);
        return view('plataformas.edit', compact('plataformas'));
    }

    public function update(Request $request, $id)
    {

        $plataforma = Plataforma::findOrFail($id);

        $plataforma->nome = $request->input('nome');
        $plataforma->descricao = $request->input('descricao');

        $plataforma->save();

        return redirect()->route('plataformas.index');
    }

    public function destroy($id)
    {
        $plataforma = Plataforma::findOrFail($id);

        $plataforma->delete();
        return redirect()->route('plataformas.index');
    }
}
