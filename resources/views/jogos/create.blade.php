<x-app-layout>
    <head>
        <link rel="stylesheet" href="{{ asset('css/create.css') }}">
        <title>Novo Jogo</title>
    </head>
    <header>

    </header>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            {{ __('Criar Jogo') }}
        </h2>
    </x-slot>
    @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
        <strong class="font-bold">Sucesso!</strong>
        <span class="block sm:inline">{{ session('success') }}</div>
        </div>
    @endif
    <body>
        <div class="container">
            <form action="{{ route('jogos.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="nome">Nome do Jogo:</label>
                    <input type="text" name="nome" required>
                </div>
                <div class="form-group">
                    <label for="requisitos">Requisitos:</label>
                    <textarea name="requisitos" id="requisitos" cols="69" rows="5" required></textarea>
                </div>
                <div class="form-group">
                    <label for="imagens">Imagens (URL):</label>
                    <input type="text" name="imagens" required>
                </div>
                <div class="form-group">
                    <label for="data_lancamento">Data de Lançamento:</label>
                    <input type="date" name="data_lancamento" required>
                </div>
                <div class="form-group">
                    <label for="distribuidora_id">Distribuidora:</label>
                    <select name="distribuidora_id" required>
                        <option value="" disabled selected>Selecione uma Distribuidora</option>
                        @foreach($distribuidoras as $distribuidora)
                            <option value="{{ $distribuidora->id }}">{{ $distribuidora->nome }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="genero_id">Gênero:</label>
                    <select name="genero_id" required>
                        <option value="" disabled selected>Selecione um Genero</option>
                        @foreach($generos as $genero)
                            <option value="{{ $genero->id }}">{{ $genero->nome }}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-success">Salvar</button>
                <a href="{{ route('jogos.index') }}" class="btn btn-secondary">Cancelar</a>
            </form>
        </div>
    </body>
</x-app-layout>
