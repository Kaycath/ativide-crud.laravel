@extends('layout.site')

@section('titulo', 'Autenticação')

@section('conteudo')
<div class="container" style="margin-top: 50px;">
  <div class="row">
    <div class="col s12 m6 offset-m3">
      
      <div class="card z-depth-2">
        <div class="card-content">
          <span class="card-title center-align deep-orange-text text-darken-2" style="font-weight: bold;">
            <i class="material-icons large">account_circle</i>
            <br>Acesso ao Sistema
          </span>

          @if($errors->any())
            <div class="card red lighten-4 red-text text-darken-4" style="padding: 10px; border-radius: 4px; margin-bottom: 20px;">
                <ul style="margin: 0;">
                    @foreach($errors->all() as $error)
                        <li><i class="material-icons left tiny" style="margin-top: 4px;">error</i>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
          @endif

          <form action="{{ route('login.entrar') }}" method="post">
            {{ csrf_field() }}
            
            <div class="input-field">
              <i class="material-icons prefix">email</i>
              <input type="text" name="email" id="email" value="{{ old('email') }}">
              <label for="email">E-mail</label>
            </div>

            <div class="input-field">
              <i class="material-icons prefix">lock</i>
              <input type="password" name="senha" id="senha">
              <label for="senha">Senha</label>
            </div>

            <br>
            <div class="center-align">
              <button class="btn-large waves-effect waves-light deep-orange btn-block" style="width: 100%;">
                Entrar <i class="material-icons right">send</i>
              </button>
            </div>
          </form>
        </div>
      </div>

    </div>
  </div>
</div>
@endsection