<header>
    <nav class='nav navbar-expand-lg navbar-light bg-light'>
        <ul class='navbar-nav'>
            <li class='nav-item'><a class='nav-link' href="{{ route('home') }}">Home</a></li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuCategory" role="button" data-bs-toggle="dropdown"
                    aria-expanded="false">
                    Categorias
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuCategory">
                    @foreach(\App\Models\Category::all() as $category)
                    <li><a class="dropdown-item" href="{{ route('category.show', $category->id) }}">{{ $category->name }}</a></li>
                    @endforeach
                </ul>
            </li>
            
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuTag" role="button" data-bs-toggle="dropdown"
                    aria-expanded="false">
                    Tags
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuTag">
                    @foreach(\App\Models\Tag::all() as $tag)
                    <li><a class="dropdown-item" href="{{ route('tag.show', $tag->id) }}">{{ $tag->name }}</a></li>
                    @endforeach
                </ul>
            </li>
            <div class='d-flex border border-solid border-gray-900 rounded bg-info text-light'>
                <span class='p-2'>Painel de Admin</span>
                <li class='nav-item'><a class='nav-link' href="{{ route('product.index') }}">Produto</a></li>
                <li class='nav-item'><a class='nav-link' href="{{ route('category.index') }}">Categoria</a></li>
                <li class='nav-item'><a class='nav-link' href="{{ route('tag.index') }}">Tag</a></li>
                <li class='nav-item'><a class='nav-link' href="{{ route('tagGroup.index') }}">Grupos de Tags</a></li>
            </div>
        </ul>
    </nav>
</header>