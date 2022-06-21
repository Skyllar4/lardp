<!doctype html>
<html lang="ru">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <title>@yield('title', 'Jolybag')</title>
  </head>
  <body>
      <!-- header -->
    <nav class="navbar navbar-expand-lg navbar-dark py-4">
        <div class="container">
          <a class="navbar-brand" href="{{ route('home.index')}}"><img src="{{ asset('img/logo.png') }}" alt="Logo" class="brand-image"></a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup"" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="menu-container" id="navbarNavAltMarkup">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="header-link" aria-current="page" href="{{ route('home.index')}}">Главная</a>
              </li>
              <li class="nav-item">
                <a class="header-link" aria-current="page" href="{{ route('products.index')}}">Каталог</a>
              </li>
              <li class="nav-item">
                <a class="header-link" aria-current="page" href="{{ route('cart.index') }}">Избранное</a>
              </li>
              <li class="nav-item">
                <a class="header-link last-menu-element" href="{{ route('home.about')}} ">О нас</a>
              </li>
              @guest
              <div>
              <a class="header-link active nav-item" href="{{ route('login') }}">Войти</a>
              <a class="header-link active nav-item" href="{{ route('register') }}">Зарегистрироваться</a>
            </div>
              @else

              <li class="nav-item dropdown">
                  <a role="button" class="header-link dropdown-toggle active" id="navbarDropdown"
                  role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  <span class="mr-2 d-none d-lg-inline">Вы вошли как {{\Auth::user()->name}}</span>

                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <form id="logout" action="{{ route('logout') }}" method="POST">
                      @csrf
                    <a class="dropdown-item" href="#" onclick="document.getElementById('logout').submit()">Выйти</a>
                  </form>
                  </li>
                </ul>
              </li>

              @endguest

            </ul>

          </div>
        </div>
      </nav>

      <div class="title-container">
          <div class="container d-flex align-items-center flex-column">
              <h2 class="page-title">@yield('subtitle', 'JolyBag')</h2>
          </div>
      </div>

      <div class="container my-4">
          @yield('content')
      </div>

      <!--footer -->
      <div class="copyright py-4 text-center text-white">
          <div class="container">
            <small>
                  &copy; Copyright - <a class="text-reset fw-bold text-decoration-none" target="_blank" href="https://prestadesk.com">
                Prasolov Vladimir</a>.
            </small>
          </div>
      </div>
      <!--footer -->


    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
  </body>
</html>
