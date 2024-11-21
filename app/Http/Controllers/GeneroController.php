<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Genero;

class GeneroController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $generos = Genero::all();
        return view('generos.index', compact('generos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view ('generos.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|string|max:100'
        ]);

        Genero::create($request->all());

        return redirect()->route('generos.index')->with('Deu CERTO');
    }

    /**
     * Display the specified resource.
     */


    public function show($id)
    {

        $genero = Genero::findOrFail($id);
        return view('generos.show', compact('genero'));
    }


    public function edit($id)
    {

        $genero = Genero::findOrFail($id);
        return view('generos.edit', compact('genero'));
    }

    public function update(Request $request, $id)
    {

        $genero = Genero::findOrFail($id);

        $genero->nome = $request->input('nome');
        $genero->data_nascimento = $request->input('data_nascimento');
        $genero->nacionalidade = $request->input('nacionalidade');

        $genero->save();

        return redirect()->route('generos.index');
    }

    public function destroy($id)
    {

        $genero = Genero::findOrFail($id);

        $genero->delete();
        return redirect()->route('generos.index');
    }
}
