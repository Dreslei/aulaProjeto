<x-app-layout>
  <head>
      <link rel="stylesheet" href="{{ asset('css/show.css') }}">
  </head>
  <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
          {{ __('Jogos') }}
      </h2>
  </x-slot>
  <section class="details">
    <div class="content">
      <div class="meta">
        <span class="label">ID:</span>
        <span class="info">{{ $jogo->id }}</span>
      </div>
      <div class="meta">
        <span class="label">Nome do Jogo:</span>
        <span class="info">{{ $jogo->nome }}</span>
      </div>
      <div class="meta">
        <span class="label">Requisitos:</span>
        <span class="info">{{ $jogo->requisitos }}</span>
      </div>
      <div class="meta">
        <span class="label">Imagens (URL):</span>
        <span class="info">{{ $jogo->imagens }}</span>
      </div>
      <div class="meta">
        <span class="label">Data de Lançamento:</span>
        <span class="info">{{ date('d/m/Y', strtotime($jogo->data_lancamento)) }}</span>
      </div>
      <div class="meta">
        <span class="label">Distribuidora:</span>
        <span class="info">{{ $jogo->distribuidora->nome }}</span>
      </div>
      <div class="meta">
        <span class="label">Gênero:</span>
        <span class="info">{{ $jogo->genero->nome }}</span>
      </div>
    </div>
    <a href="{{ route('jogos.index') }}" class="btn-return">Voltar</a>
  </section>
</x-app-layout>
