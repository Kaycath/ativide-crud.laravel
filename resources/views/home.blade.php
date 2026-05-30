@extends('layout.site')

@section('titulo', 'Home - Cursos')

@section('conteudo')
<div class="container">
  <h3 class="center">Nossos Cursos</h3>
  <div class="row">
    @foreach($rows as $row)
      <div class="col s12 m4">
        <div class="card large">
          <div class="card-image">
            <img src="{{ asset($row->imagem) }}" alt="{{ $row->titulo }}">
            <span class="card-title" style="background: rgba(0,0,0,0.5); width: 100%;">{{ $row->titulo }}</span>
          </div>
          <div class="card-content">
            <p>{{ $row->descricao }}</p>
            <br>
            <p><b>Valor:</b> R$ {{ number_format($row->valor, 2, ',', '.') }}</p>
          </div>
          <div class="card-action">
            <a href="#" class="deep-orange-text">Ver mais detalhes</a>
          </div>
        </div>
      </div>
    @endforeach
  </div>
</div>
@endsection