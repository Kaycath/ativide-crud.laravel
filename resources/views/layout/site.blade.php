<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <title>@yield('titulo')</title>
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
</head>
<body>

  <header>
    <nav class="deep-orange">
      <div class="nav-wrapper container">
        <a href="/" class="brand-logo">Curso de Laravel</a>
        <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
        <ul class="right hide-on-med-and-down">
          <li><a href="/">Home</a></li>
          <li><a href="{{ route('admin.cursos') }}">Cursos</a></li>
        </ul>
      </div>
    </nav>

    <ul class="sidenav" id="mobile-demo">
      <li><a href="/">Home</a></li>
      <li><a href="{{ route('admin.cursos') }}">Cursos</a></li>
    </ul>
  </header>

  <main>
    @yield('conteudo')
  </main>

  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
  
  <script>
    $(document).ready(function(){
      // Inicializa o menu mobile (Sidenav)
      $('.sidenav').sidenav();
    });
  </script>
</body>
</html>