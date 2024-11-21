<x-app-layout>
    <head>
        <link rel="stylesheet" href="{{ asset('css/index.css') }}">
    </head>
    <div class="container">
        <br>
        <a href="{{ route('jogos.create') }}" class="btn btn-primary">Novo Jogo</a>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Data de Lançamento</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($jogos as $jogo)
                    <tr>
                        <td class="colunas">{{ $jogo->id }}</td>
                        <td id="nome">{{ $jogo->nome }}</td>
                        <td>{{ date('d/m/Y', strtotime($jogo->data_lancamento)) }}</td>
                        <td>
                            <a href="{{ route('jogos.show', $jogo->id) }}" class="btn btn-info">Detalhes</a>
                            <a href="{{ route('jogos.edit', $jogo->id) }}" class="btn btn-warning">Editar</a>
                            <form action="{{ route('jogos.destroy', $jogo->id) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Excluir</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{-- {{ $jogos->links() }} --}}
    </div>
</x-app-layout>
