<!doctype html>
<html lang="fr">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="/style.css">
    <title>@yield('title')</title>
    
  </head>
  <body>
    <main>
      <nav class="navbar navbar-expand-lg fixed-top">
        <div class="container">
          <div class="navbar-brand">
            <img src="/images/blason-min.png" alt="logo">
            <a class="navbar-brand" href="#">Kaamelo'TSE</a>
          </div>
          
          <button class="navbar-toggler navbar-dark" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
              <li class="nav-item active">
                <a class="nav-link" href="/">Index
                  <span class="sr-only">(current)</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Banquets</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="/tableRonde">Table ronde</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="/contact">Contact</a>
              </li>
                @if(Auth::user())
                <li class="nav-item dropdown">
                  
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        {{ Auth::user()["name"]}}
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="/tdb">Tableau de Bord</a>
                        <a class="dropdown-item" href="/commander">Commander</a>
                        <div class="dropdown-divider"></div>
                        @if(Auth::user()["role"]>0)
                            <a class="dropdown-item" href="/article">Edition Articles</a>
                            <a class="dropdown-item" href="#">Gestion Commandes</a>
                            <div class="dropdown-divider"></div>
                        @endif
                        @if(Auth::user()["role"]>2)
                            <a class="dropdown-item" href="#">Utilisateurs</a>
                            <a class="dropdown-item" href="#">Statistiques</a>
                            <div class="dropdown-divider"></div>
                        @endif
                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">Déconnexion</a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </li>
                @else
                <li class="nav-item">
                    <a class="nav-link" href="/login">Connexion</a>
                </li>
                @endif 
            </ul>
          </div>
        </div>
      </nav>
      <div class="container page">
        @yield('content')
      </div>
      <div id="social">
        <ul>
            <li><a href="#" class="fb"></a></li>
            <li><a href="#" class="yt"></a></li>
            <li><a href="#" class="tw"></a></li>
        </ul>
      </div>
      
      <footer class="">
        <div class="container">
          <p class="m-0 text-center">Copyright &copy; Kaamelot'TSE 2019</p>
        </div>
      </footer>
    </main>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script>$('.carousel').carousel();</script>
  </body>
</html>