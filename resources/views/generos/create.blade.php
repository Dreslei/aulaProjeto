<x-app-layout>
    {{-- <link rel="stylesheet" href="{{asset('css/distribuidora.css')}}"> --}}
    <div class="container">
        <form action="{{route('generos.store')}}" method="POST">
            @csrf
            <div class="form-group">
                <label class="cor" for="">Nome</label>
                <input type="text" class="form-control" name="nome" required>
            </div>
            <button type="submit" class="btn btn-primary">Cadastrar</button>
        </form>
    </div>
</x-app-layout>
