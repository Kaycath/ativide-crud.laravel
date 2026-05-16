@extends('layout.site')

@section('titulo', 'Cursos')

@section('conteudo')
  <div class="container">
    <h3 class="center">Lista de Cursos</h3>
    <div class="row">
      <table>
        <thead>
          <tr>
            <th>Id</th>
            <th>Título</th>
            <th>Descrição</th>
            <th>Imagem</th>
            <th>Publicado</th>
            <th>Ação</th>
          </tr>
        </thead>
        <tbody>
          @foreach($rows as $row)
            <tr>
              <td>{{ $row->id }}</td>
              <td>{{ $row->titulo }}</td>
              <td>{{ $row->descricao }}</td>
              <td><img width="60" src="{{ asset($row->imagem) }}" alt="{{ $row->titulo }}" /></td>
              <td>{{ $row->publicado }}</td>
              <td>
                <a class="btn deep-orange" href="{{ route('admin.cursos.editar', $row->id) }}">Editar</a>
                <a class="btn red" href="{{ route('admin.cursos.excluir', $row->id) }}">Deletar</a>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
    <div class="row">
      <a class="btn blue" href="{{ route('admin.cursos.adicionar') }}">Adicionar</a>
    </div>
  </div>
@endsection