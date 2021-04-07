<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <title>Brindes de luxo</title>
</head>

<body>
    @include("layouts.header.nav")
    <main class="container m-5">
        @if (session()->has('success'))
            <div class="alert alert-success" role="alert">
                {{ session()->get('success') }}
            </div>
        @endif
        <h1>Cadastrar tag</h1>

        <form method="post" action="{{ Route('tag.store') }}" class="mt-3 mx-3" id="tagGroupForm">
            @CSRF
            <div class="row form-group mb-2" >
                <label class="form-label" for="name">Adicionar novo grupo de tag</label>

                <div class="col-8 p-0 d-flex">
                    <input 
                        type="text" 
                        name="name" 
                        id="tagGroupFormName" 
                        placeholder="Nome do novo grupo de tag" 
                        class="form-control align-self-center" 
                        form="tagGroupForm" 
                        required
                    >
                    <button 
                        type="submit" 
                        class="btn btn-md btn-primary mx-2 align-self-center"
                        name="addNewTagGroup"
                    >
                        Adicionar
                    </button>
                </div>
                
            </div>
        </form>


        <form method="post" action="{{ Route('tag.store') }}" class="m-3" id="tagForm">
            @CSRF

            <div class="row form-group mb-2">
                <label class="form-label" for="tag_group_id">Selecionar grupo da tag</label>

                <select 
                    class="form-control" 
                    name="tag_group_id" 
                    id="tag-group" 
                    form="tagForm" 
                    required
                >
                    @foreach ($tagsGroups as $tagGroup)
                        <option value="{{ $tagGroup->id }}">{{ $tagGroup->name }} </option>
                    @endforeach
                </select>
                
            </div>

            <div class="row form-group mb-2">
                <label class="form-label" for="name">Nome</label>

                <input 
                    type="text" 
                    name="name" 
                    id="name" 
                    placeholder="Nome da tag" 
                    class="form-control" 
                    form="tagForm" 
                    required
                >
            </div>

            <div class="row col-2 mt-4">
                <button 
                    type="submit" 
                    class="btn btn-lg btn-success mt-2" 
                    name="addNewTag"
                >
                    Salvar
                </button>
            </div>

        </form>
    </main>
</body>

</html>