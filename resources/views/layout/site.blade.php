<header>
    <nav class="deep-orange">
      <div class="nav-wrapper container">
        <a href="/" class="brand-logo">Curso de Laravel</a>
        <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
        
        <ul class="right hide-on-med-and-down">
          <li><a href="/">Home</a></li>
          @if(Auth::guest())
            <li><a href="{{ route('login') }}">Login</a></li>
          @else
            <li><a href="{{ route('admin.cursos') }}">Cursos</a></li>
            <li><a href="#">Olá, {{ Auth::user()->name }}</a></li>
            <li><a href="{{ route('login.sair') }}">Sair</a></li>
          @endif
        </ul>
      </div>
    </nav>

    <ul class="sidenav" id="mobile-demo">
      <li><a href="/">Home</a></li>
      @if(Auth::guest())
        <li><a href="{{ route('login') }}">Login</a></li>
      @else
        <li><a href="{{ route('admin.cursos') }}">Cursos</a></li>
        <li><a href="{{ route('login.sair') }}">Sair</a></li>
      @endif
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