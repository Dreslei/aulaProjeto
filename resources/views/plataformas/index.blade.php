<x-app-layout>
    <head>
        <link rel="stylesheet" href="{{ asset('css/index.css') }}">
    </head>
        <div class="container">
            <br>
            <a href="{{ route('plataformas.create') }}" class="btn btn-primary">Nova Distribuidora</a>
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>Descricao</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($plataformas as $plataforma)
                        <tr>
                            <td class="colunas">{{ $plataforma->id }}</td>
                            <td id="nome">{{ $plataforma->nome }}</td>
                            <td>
                                <a href="{{ route('plataformas.show', $plataforma->id) }}" class="btn btn-info">Detalhes</a>
                                <a href="{{ route('plataformas.edit', $plataforma->id) }}" class="btn btn-warning">Editar</a>
                                <form action="{{ route('plataformas.destroy', $plataforma->id) }}" method="POST" style="display: inline;">
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

