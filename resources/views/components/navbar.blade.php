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
              >@lang('site.home')</a
            >
          </li>
          <li class="nav-item">
            <a class="nav-link p-2 p-lg-3" href="{{route('books.index')}}">@lang('site.books')</a>
          </li>
          <li class="nav-item">
          <div class="dropdown mt-2">
            <button  class="btn btn-secondary bg-transparent nav-link dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">@lang('site.cats')</button>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                <li><a class="dropdown-item " href="{{ route('categories.index') }}">All Categories </a></li>            
                @foreach ($cats as $cat)
                    <li><a class="dropdown-item " href="{{route('categories.show',$cat->id)}}">{{$cat->name}}</a></li>            
                @endforeach
            
            </ul>
          </div>
        </li>
        
          @guest    
          
              <li class="nav-item d-flex ">
                <a class="nav-link p-2 p-lg-3" href="{{route('auth.register')}}">@lang('site.register')</a>
              </li>
              <li class="nav-item">
                <a class="nav-link p-2 p-lg-3" href="{{route('auth.login')}}">@lang('site.login')</a>
              </li>

          @endguest
          @auth
              <li class="nav-item">
                <a class="nav-link p-2 p-lg-3 disabled" href="#">{{Auth::user()->name}}</a>
              </li>

              <li class="nav-item">
                <a class="nav-link p-2 p-lg-3" href="{{route('auth.logout')}}">@lang('site.logout')</a>
              </li>

          @endauth
          
          <li class="nav-item dropdown mt-2">
              <button  class="btn btn-secondary bg-transparent nav-link dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">@lang('site.lang')</button>
              <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                  <li><a class="dropdown-item " href="{{ route('lang.ar') }}">AR</a></li>            
                  <li><a class="dropdown-item " href="{{ route('lang.en') }}">EN</a></li>            
              </ul>
          </li>
        </ul>

      </div>
    </div>
  </nav>
  <!-- End Nav  -->