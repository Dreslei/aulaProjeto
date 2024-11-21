<x-app-layout>
  <head>
      <link rel="stylesheet" href="{{ asset('css/edit.css') }}">
  </head>
  <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
          {{ __('Editar Jogo') }}
      </h2>
  </x-slot>
  <section class="edit-form">
    <div class="form-container">
      <form method="POST" action="{{ route('jogos.update', $jogo->id) }}">
        @csrf
        @method('PUT')

        <div class="form-group">
          <label class="form-label" for="nome">Nome do Jogo:</label>
          <input type="text" id="nome" name="nome" value="{{ old('nome', $jogo->nome) }}" class="form-input" required>
        </div>

        <div class="form-group">
          <label class="form-label" for="requisitos">Requisitos:</label>
          <textarea id="requisitos" name="requisitos" class="form-textarea" required>{{ old('requisitos', $jogo->requisitos) }}</textarea>
        </div>

        <div class="form-group">
          <label class="form-label" for="imagens">Imagens (URL):</label>
          <input type="text" id="imagens" name="imagens" value="{{ old('imagens', $jogo->imagens) }}" class="form-input" required>
        </div>

        <div class="form-group">
          <label class="form-label" for="data_lancamento">Data de Lançamento:</label>
          <input type="date" id="data_lancamento" name="data_lancamento" value="{{ old('data_lancamento', $jogo->data_lancamento) }}" class="form-input" required>
        </div>

        <div class="form-group">
          <label class="form-label" for="distribuidora_id">Distribuidora:</label>
          <select id="distribuidora_id" name="distribuidora_id" class="form-select" required>
              @foreach($distribuidoras as $distribuidora)
                  <option value="{{ $distribuidora->id }}" {{ $jogo->distribuidora_id == $distribuidora->id ? 'selected' : '' }}>
                      {{ $distribuidora->id }}
                  </option>
              @endforeach
          </select>
        </div>

        <div class="form-group">
          <label class="form-label" for="genero_id">Gênero:</label>
          <select id="genero_id" name="genero_id" class="form-select" required>
            <option value="" disabled selected>Selecione um Genero</option>
              @foreach($generos as $genero)
                  <option value="{{ $genero->id }}" {{ $jogo->genero_id == $genero->id ? 'selected' : '' }}>
                      {{ $genero->nome }}
                  </option>
              @endforeach
          </select>
        </div>

        <div class="form-actions">
          <button type="submit" class="btn-primary">Salvar</button>
          <a href="{{ route('jogos.index') }}" class="btn-secondary">Cancelar</a>
        </div>
      </form>
    </div>
  </section>
</x-app-layout>
