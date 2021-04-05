<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <script>
        function restaurar() {
            return confirm('Você deseja restaurar o grupo de tags?')
        }
    </script>
    <title>Brindes de luxo</title>
</head>
<body>
    @include('layouts.header.nav')
    <main>
        <div class="container m-5">
            @if (session()->has('success'))
                <div class="alert alert-success" role="alert">
                    {{ session()->get('success') }}
                </div>
            @endif

            <div>
                <h1 class="mx-5">Lista de grupos de tags apagados</h1>
                <a href="{{ Route('tagGroup.index') }}" class="btn btn-sm btn-primary mx-5">Voltar</a>
            </div>

            <div class="row mx-5">
                <table class="table table-striped w-100">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nome</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($tagsGroups as $tagGroup)
                        <tr>
                            <td>{{ $tagGroup->id }}</td>
                            <td>{{ $tagGroup->name }}</td>
                            <td>
                                <form action="{{ route('tagGroup.restore', $tagGroup->id ) }}" method="POST" class="d-inline" onsubmit="return restaurar()">
                                    @csrf
                                    @method('PATCH')
                                    <button type="submit" class="btn btn-sm btn-success">Restaurar</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </main>
</body>
</html>