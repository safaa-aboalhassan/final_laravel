<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">LUNA RESTAURENT</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          @auth
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="{{ route('food.index') }}">menu</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="{{ route('chef.index') }}">chef</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="{{ route('witter.index') }}">witter</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="{{ route('category.index') }}">category</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="{{ route('table.index') }}">table</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="{{ route('order.index') }}">order</a>
          </li>
          
          @endauth
          
        </ul>

        <ul class="navbar-nav">
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Select Lanaguage
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="{{ route('lang.en') }}">En</a></li>
              <li><a class="dropdown-item" href="{{ route('lang.ar') }}">Arabic</a></li>
            </ul>
          </li>
        </ul>
        @guest
        <a class="nav-link me-2" href="{{ route('auth.login') }}">Login</a>
        <a class="nav-link me-2" href="{{ route('auth.signup') }}">sign up</a>
        @endguest
        @auth
        <a class="nav-link me-2" href="{{route('logout')}}">logout</a>   
        @endauth
        
      </div>
    </div>
  </nav>