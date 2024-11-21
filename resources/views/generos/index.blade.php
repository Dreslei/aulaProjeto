<x-app-layout>
    <head>
        <link rel="stylesheet" href="{{ asset('css/index.css') }}">
    </head>
        <div class="container">
            <br>
            <a href="{{ route('generos.create') }}" class="btn btn-primary">Nova Distribuidora</a>
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>Descricao</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($generos as $genero)
                        <tr>
                            <td class="colunas">{{ $genero->id }}</td>
                            <td id="nome">{{ $genero->nome }}</td>
                            <td>
                                <a href="{{ route('generos.show', $genero->id) }}" class="btn btn-info">Detalhes</a>
                                <a href="{{ route('generos.edit', $genero->id) }}" class="btn btn-warning">Editar</a>
                                <form action="{{ route('generos.destroy', $genero->id) }}" method="POST" style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Excluir</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </x-app-layout>

