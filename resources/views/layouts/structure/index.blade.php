<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
        <script src="/js/domUtils.js" defer></script>
        <link rel="stylesheet" href="/css/domUtils.css">
        @yield('script-scoped')
        @yield('css-scoped') 

        <title>Brindes de Luxo</title>
    </head>

    <body class='mw-100'>
        <header>
            @include('layouts.header.nav')
        </header>

        <main class='mh-100'>
            
            @if (session()->has('success'))
                <div class="alert alert-success" role="alert">
                    {{ session()->get('success') }}
                </div>
            @endif

            @if (session()->has('error'))
                <div class="alert alert-warning" role="alert">
                    {{ session()->get('error') }}
                </div>
            @endif

            @yield('content')

        </main>

        <footer class="bg-dark text-light mt-5 p-4 w-100 text-center">
            Footer
        </footer>

    </body>

</html>