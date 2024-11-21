<?php

namespace App\Http\Controllers;

use App\Models\Jogo;
use App\Models\Distribuidora;
use App\Models\Genero;
use Illuminate\Http\Request;

class JogoController extends Controller
{
    public function index()
    {
        $jogos = Jogo::with(['distribuidora', 'genero'])->get();
        return view('jogos.index', compact('jogos'));
    }

    public function create()
    {
        $distribuidoras = Distribuidora::all(); 
        $generos = Genero::all();
    
        return view('jogos.create', compact('distribuidoras', 'generos'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'requisitos' => 'required|string',
            'imagens' => 'required|string',
            'data_lancamento' => 'required|date',
            'distribuidora_id' => 'required|exists:distribuidoras,id',
            'genero_id' => 'required|exists:generos,id',
        ]);

        Jogo::create($request->all());

        return redirect()->route('jogos.index')->with('success', 'Jogo criado com sucesso!');
    }

    public function show($id)
    {
        $jogo = Jogo::with(['distribuidora', 'genero'])->findOrFail($id);
        return view('jogos.show', compact('jogo'));
    }

    public function edit($id)
    {
        $jogo = Jogo::findOrFail($id);
        $distribuidoras = Distribuidora::all();
        $generos = Genero::all();
    
        return view('jogos.edit', compact('jogo', 'distribuidoras', 'generos'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'requisitos' => 'required|string',
            'imagens' => 'required|string',
            'data_lancamento' => 'required|date',
            'distribuidora_id' => 'required|exists:distribuidoras,id',
            'genero_id' => 'required|exists:generos,id',
        ]);

        $jogo = Jogo::findOrFail($id);
        $jogo->update($request->all());

        return redirect()->route('jogos.index')->with('success', 'Jogo atualizado com sucesso!');
    }

    public function destroy($id)
    {
        $jogo = Jogo::findOrFail($id);
        $jogo->delete();

        return redirect()->route('jogos.index')->with('success', 'Jogo removido com sucesso!');
    }
}
