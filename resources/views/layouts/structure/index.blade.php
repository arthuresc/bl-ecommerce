<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
        <script src="/js/domUtils.js" defer></script>
        <script src="https://kit.fontawesome.com/8e2f41b6ca.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="/css/domUtils.css">
        @yield('script-scoped')
        @yield('css-scoped') 

        <title>Brindes de Luxo</title>
    </head>

    <body class='mw-100'>
        <header>
            @include('layouts.header.nav')
        </header>

        <main class='mh-100 pt-0'>
            
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

        <footer class="bg-light mt-5 p-4 w-100 text-center shadow-md">
            <div class="mt-3">
                <img src="/images/logo.png">
            </div>
            <div class="d-flex mt-4 justify-content-center">
                <a href="{{ route('infos.about')}}" class="link-secondary"><span class="mx-2">Quem Somos</span></a>
                <a href="{{ route('infos.contact') }}" class="link-secondary"><span class="mx-2">Fale Conosco</span></a>
            </div>
            <div class="d-flex justify-content-center mt-5 text-muted">
                <span class="copyright">
                    © Desenvolvido por: Arthur Escalera, Gabriel Sato e Gustavo Palmeira
                </span>
            </div>
        </footer>

    </body>

</html>