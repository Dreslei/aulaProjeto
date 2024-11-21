<x-app-layout>
    <head>
        <link rel="stylesheet" href="{{ asset('css/edit.css') }}">
    </head>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Editar Distribuidora') }}
        </h2>
    </x-slot>
    <section class="edit-form">
      <div class="form-container">
        <form method="POST" action="{{ route('distribuidoras.update', $distribuidora->id) }}">
          @csrf
          @method('PUT')

          <div class="form-group">
            <label class="form-label" for="nome">Nome:</label>
            <input type="text" id="nome" name="nome" value="{{ old('nome', $distribuidora->nome) }}" class="form-input">
          </div>

          <div class="form-group">
            <label class="form-label" for="descricao">Descrição:</label>
            <textarea id="descricao" name="descricao" class="form-textarea">{{ old('descricao', $distribuidora->descricao) }}</textarea>
          </div>

          <div class="form-actions">
            <button type="submit" class="btn-primary">Salvar</button>
            <a href="{{ route('distribuidoras.index') }}" class="btn-secondary">Cancelar</a>
          </div>
        </form>
      </div>
    </section>
</x-app-layout>
