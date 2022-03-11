<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{asset('css/all.min.css')}}" />
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}" />
    <link rel="stylesheet" href="{{asset('css/library.css')}}" />
    @yield('styles')

</head>
<body>
    <!-- Start Nav  -->
    <nav class="navbar navbar-expand-lg sticky-top">
        <div class="container">
          <a class="navbar-brand" href="#">Library</a>
          <button
            class="navbar-toggler"
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#main"
            aria-controls="main"
            aria-expanded="false"
            aria-label="Toggle navigation"
          >
            <i class="fa-solid fa-bars"></i>
          </button>
          <div class="collapse navbar-collapse" id="main">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link p-2 p-lg-3 active" aria-current="page" href="#"
                  >Home</a
                >
              </li>
              <li class="nav-item">
                <a class="nav-link p-2 p-lg-3" href="{{route('books.index')}}">Books</a>
              </li>
              <li class="nav-item">
                <a class="nav-link p-2 p-lg-3" href="{{route('categories.index')}}">Categories</a>
              </li>
              @guest    
              
                  <li class="nav-item">
                    <a class="nav-link p-2 p-lg-3" href="{{route('auth.register')}}">Register</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link p-2 p-lg-3" href="{{route('auth.login')}}">Login</a>
                  </li>

              @endguest
              @auth
                  <li class="nav-item">
                    <a class="nav-link p-2 p-lg-3 disabled" href="#">{{Auth::user()->name}}</a>
                  </li>

                  <li class="nav-item">
                    <a class="nav-link p-2 p-lg-3" href="{{route('auth.logout')}}">Logout</a>
                  </li>

              @endauth
            </ul>
          </div>
        </div>
      </nav>
      <!-- End Nav  -->
    <div class="container py-5">
        @yield('content')
    </div>
   

    @yield('scripts')
    <script src="{{asset('js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('js/all.min.js')}}"></script>
</body>
</html>