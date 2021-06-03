<nav class=" navbar navbar-expand-lg navbar-light bg-light fixed-top p-0 shadow-sm" id="navbar_main">
  <div class="container d-flex justify-content-between w-100 p-0">

    <div class="d-flex justify-content-between">
    <a class="navbar-brand mx-3 d-inline-block" href="{{ route('home') }}">
      <h1 class="visually-hidden">Brindes de Luxo</h1>
      <img src="./images/bl-logo.svg" width="100" height="80" class="align-text-top" alt="Logo Brindes de Luxo" srcset="">
    </a>
    <button
      class="navbar-toggler py-1 px-1 border-0"
      type="button"
      data-bs-toggle="collapse"
      data-bs-target="#navbarSupportedContent"
      aria-controls="navbarSupportedContent"
      aria-expanded="false"
      aria-label="Toggle navigation"
      >
      <span class="navbar-toggler-icon"></span>
    </button>
    </div>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav d-flex flex-row align-items-center justify-content-center">

        <li class="nav-item dropdown d-inline-block">
          <a
            class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuCategory" role="button"
            data-bs-toggle="dropdown" aria-expanded="false"
          >
            Categorias
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuCategory">
            @foreach(\App\Models\Category::orderBy('name', 'asc')->get() as $category)
            <li>
              <a class="dropdown-item" href="{{ route('category.show', $category->id) }}">
                {{ $category->name }}
              </a>
            </li>
            @endforeach
          </ul>
        </li>

        <li class="nav-item dropdown d-inline-block">
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
                <li>
                  <a class="dropdown-item" href="{{ route('tag.show', $tag->id) }}">
                    {{ $tag->name }}
                  </a>
                </li>
                @endforeach
              </ul>
            </li>
            @endforeach

          </ul>
        </li>
        @if (Route::has('isAdmin'))
        <li class="nav-item dropdown bg-primary rounded p-1 mx-2">
            <a
              class="nav-link dropdown-toggle text-light"
              href="#" id="navbarDropdownAdminPanel"
              role="button"
              data-bs-toggle="dropdown"
              aria-expanded="false"
            >
            Painel de Administrador
            </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdownAdminPanel">
            <li class='dropdown-item p-0'>
              <a class='nav-link text-dark' href="{{ route('product.index') }}">
                Produto
              </a>
            </li>
            <li class='dropdown-item p-0'>
              <a class='nav-link text-dark' href="{{ route('category.index') }}">
                Categoria
              </a>
            </li>
            <li class='dropdown-item p-0'>
              <a class='nav-link text-dark' href="{{ route('tag.index') }}">
                Tag
              </a>
            </li>
            <li class='dropdown-item p-0'>
              <a class='nav-link text-dark' href="{{ route('tagGroup.index') }}">
                Grupos de Tags
              </a>
            </li>
          </ul>
        </li>

      @endif
      @if (Route::has('login'))
      <div class="fixed top-0 right-0 px-6 py-4 d-flex">

        @auth

        <form action="{{ route('logout') }}" name="logout" method="POST">

          @csrf

          <a onclick="logout.submit()" href="#" class="ml-4 text-sm text-gray-700 underline">
            Logout
          </a>
        </form>

        <a href="{{ url('/dashboard') }}" class="text-sm text-gray-700 underline">
          <x-orchid-icon viewBox="0 0 60 60" width="36" height="36" class="icon" path="fa.user"/>
        </a>

        @else

        <a href="{{ route('login') }}" class="text-sm text-gray-700 underline">Log in</a>

        @if (Route::has('register'))

        <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 underline">
          Register
        </a>

        @endif

        @endauth
      </div>
      @endif
      <form class="d-flex">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
      </ul>
    </div>
  </div>
</nav>
