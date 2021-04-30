<nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top p-3 shadow-sm" id="main_navbar">
    <div class="container-fluid p-0">
        <a class="navbar-brand" href="{{ route('home') }}">Home</a>
        <button 
            class="navbar-toggler" 
            type="button" 
            data-bs-toggle="collapse" 
            data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" 
            aria-expanded="false" 
            aria-label="Toggle navigation"
        >
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">

                <li class="nav-item dropdown p-1 mx-2">
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

                <li class="nav-item dropdown p-1 mx-2">
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
                                    <li><a class="dropdown-item" href="{{ route('tag.show', $tag->id) }}">{{ $tag->name }}</a></li>
                                @endforeach
                            </ul>
                        </li>
                        @endforeach

                    </ul>
                </li>

                <li class="nav-item dropdown bg-primary rounded p-1 mx-2">
                    <a class="nav-link dropdown-toggle text-light" href="#" id="navbarDropdownAdminPanel" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        Painel de Administrador
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdownAdminPanel">
                        <li class='dropdown-item p-0'><a class='nav-link text-dark' href="{{ route('product.index') }}">Produto</a></li>
                        <li class='dropdown-item p-0'><a class='nav-link text-dark' href="{{ route('category.index') }}">Categoria</a>
                        </li>
                        <li class='dropdown-item p-0'><a class='nav-link text-dark' href="{{ route('tag.index') }}">Tag</a></li>
                        <li class='dropdown-item p-0'><a class='nav-link text-dark' href="{{ route('tagGroup.index') }}">Grupos de
                                Tags</a></li>
                    </ul>
                </li>

            </ul>
            <form class="d-flex">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
        </div>
    </div>
</nav>