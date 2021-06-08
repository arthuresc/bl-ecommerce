<nav class="navbar navbar-expand-lg navbar-light bg-white p-3 shadow-sm" id="main_navbar">
  <div class="container-fluid p-0">
    <a class="navbar-brand" href="{{ route('home') }}">
      <img src="/images/logo.png" width="100px">
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
      aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">

        <li class="nav-item dropdown p-0 p-md-1 mx-0 mx-md-2">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuCategory" role="button"
            data-bs-toggle="dropdown" aria-expanded="false">
            Categorias
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuCategory">
            @foreach(\App\Models\Category::orderBy('name', 'asc')->get() as $category)
            <li><a class="dropdown-item" href="{{ route('category.show', $category->id) }}">{{ $category->name }}</a>
            </li>
            @endforeach
          </ul>
        </li>

        <li class="nav-item dropdown p-0 p-md-1 mx-0 mx-md-2">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
            Tags
          </a>
          <ul class="dropdown-menu">
            @foreach(\App\Models\TagGroup::orderBy('name', 'asc')->get() as $tagGroup)
            <li class="nav-item dropdown">
              <a class="dropdown-item dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
                {{ $tagGroup->name }}
              </a>
              <ul class="dropdown-menu">
                @foreach ($tagGroup->tags()->orderBy('name', 'asc')->get() as $tag)
                  @if($tag->name !== 'Padrão')
                    <li><a class="dropdown-item" href="{{ route('tag.show', $tag->id) }}">{{ $tag->name }}</a></li>
                  @endif
                @endforeach
              </ul>
            </li>
            @endforeach

          </ul>
        </li>
        @if(Auth()->user() && Auth()->user()->isAdmin)
          <li class="nav-item dropdown btn-orange controlPanel p-0 p-md-1 mx-0 mx-md-2">
            <a class="nav-link dropdown-toggle text-light" href="#" id="navbarDropdownAdminPanel" role="button"
              data-bs-toggle="dropdown" aria-expanded="false">
              Painel de Administrador
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdownAdminPanel">
              <li class='dropdown-item p-0'><a class='nav-link text-dark' href="{{ route('product.index') }}">Produto</a>
              </li>
              <li class='dropdown-item p-0'><a class='nav-link text-dark'
                  href="{{ route('category.index') }}">Categoria</a>
              </li>
              <li class='dropdown-item p-0'><a class='nav-link text-dark' href="{{ route('tag.index') }}">Tag</a></li>
              <li class='dropdown-item p-0'><a class='nav-link text-dark' href="{{ route('tagGroup.index') }}">Grupos de
                  Tags</a></li>
            </ul>
          </li>
        @endif

      </ul>

      <form class="d-flex p-0 p-md-1 mx-0 mx-md-2" action="{{ route('product.search') }}">
        <div class="input-group">
          <input class="form-control" style="max-width: 250px;" type="search" placeholder="Buscar" aria-label="Search" name="search" id="search">
      
          <button class="btn btn-outline-orange" type="submit">
            <i class="fas fa-search"></i>
          </button>
        </div>
      </form>
      
      
      <div class="fixed top-0 right-0 px-0 px-md-1 py-1 py-md-4 d-flex">
        @if (Route::has('login'))
          @auth

          <div class="mx-0 mx-md-4 d-flex align-items-center">

            <a class='nav-link' href='{{ route('order.show') }}'>
              <span class='nav-link text-orange'>{{ Auth()->user()->name }}</span>
            </a>

            <a class='nav-link link-secondary' href='{{ route('cart.show') }}'>
              <i class="fas fa-shopping-cart"></i>
              {{\App\Models\Cart::count()}}
            </a>

          </div>

          <form action="{{ route('logout') }}" name="logout" method="POST" class="d-flex align-items-center mx-4 mb-0">
            @csrf
            <a onclick="logout.submit()" href="#" class="nav-options mr-1 link-secondary underline">
              Sair
              <i class="fas fa-sign-out-alt"></i>
            </a>
          </form>

        @else
          <div class="mx-4">
            <a href="{{ route('login') }}" class="nav-options mx-2 link-secondary">Logar</a>
          
            @if (Route::has('register'))
              <a href="{{ route('register') }}" class="nav-options ml-4 link-secondary">
                Registrar
              </a>
            @endif
          </div>

          @endauth
        @endif
      </div>
      
    </div>
  </div>
</nav>