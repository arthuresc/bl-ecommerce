<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">

        <a class="navbar-brand" href="{{ route('home') }}">Home</a>

        <button 
            class="navbar-toggler" 
            type="button" 
            data-bs-toggle="collapse" 
            data-bs-target="#navbarNavDropdown"
            aria-controls="navbarNavDropdown" 
            aria-expanded="false" 
            aria-label="Toggle navigation"
        >
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNavDropdown">

            <ul class="navbar-nav">

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle p-1 mx-2" href="#" id="navbarDropdownMenuCategory" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        Categorias
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuCategory">
                        @foreach(\App\Models\Category::all() as $category)
                            <li><a class="dropdown-item" href="{{ route('category.show', $category->id) }}">{{ $category->name }}</a>
                            </li>
                        @endforeach
                    </ul>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle p-1 mx-2" href="#" id="navbarDropdownMenuTag" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        Tags
                    </a>
                    <ul class="dropdown-menu" role="menu" aria-labelledby="navbarDropdownMenuTag">
                        @foreach(\App\Models\TagGroup::all() as $tagGroup)
                            <li><a class="dropdown-item" href="#">{{ $tagGroup->name }}</a></li>
                        @endforeach
                    </ul>
                </li>

                <li class="nav-item dropdown bg-primary rounded">
                    <a class="nav-link dropdown-toggle text-light p-1 mx-2" href="#" id="navbarDropdownAdminPanel" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        Painel de Administrador
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdownAdminPanel">
                        <li class='dropdown-item'><a class='nav-link text-primary' href="{{ route('product.index') }}">Produto</a></li>
                        <li class='dropdown-item'><a class='nav-link text-primary' href="{{ route('category.index') }}">Categoria</a></li>
                        <li class='dropdown-item'><a class='nav-link text-primary' href="{{ route('tag.index') }}">Tag</a></li>
                        <li class='dropdown-item'><a class='nav-link text-primary' href="{{ route('tagGroup.index') }}">Grupos de Tags</a></li>
                    </ul>
                </li>

            </ul>
        </div>
    </div>
</nav>
