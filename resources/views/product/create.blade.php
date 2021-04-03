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
    <main>
        <div class="container m-5">
            <h1>Cadastrar produto</h1>
            <form method="post" action="{{ Route('product.store') }}" enctype="multipart/form-data" class="m-3">
                @CSRF
                <div class="row form-group mb-2">
                    <label class="form-label" for="name">Nome (requerido)</label>
                    <input type="text" name="name" id="name" placeholder="Nome do produto" class="form-control" required>
                </div>
                <div class="row form-group mb-2">
                    <label class="form-label" for="description">Descrição (requerido)</label>
                    <input type="text" name="description" id="description" placeholder="Descrição do produto" class="form-control" required>
                </div>
                <div class="row form-group mb-2">
                    <label class="form-label" for="price">Preço (requerido)</label>
                    <input type="number" name="price" id="price" placeholder="Preço do produto" class="form-control" min="0.00" max="10000000.00" step="0.01" required>
                </div>
                <div class="row form-group mb-2">
                    <label class="form-label" for="quantity">Quantidade (requerido)</label>
                    <input type="number" name="quantity" id="quantity" placeholder="Quantidade do produto" class="form-control" min="0" step="1" required>
                </div>
                <div class="row form-group mb-2">
                    <label class="form-label" for="minQuantity">Quantidade mínima (requerido)</label>
                    <input type="number" name="minQuantity" id="minQuantity" placeholder="Quantidade mínima para compra" class="form-control" min="0" step="1" required>
                </div>
                <div class="row form-group mb-2">
                    <label class="form-label" for="mainImage">Imagem principal (requerido)</label>
                    <input type="file" name="mainImage" id="mainImage" class="form-control" required>
                </div>
                <div class="row form-group mb-2">
                    <label class="form-label" for="arrayImages">Imagens adicionais (opcional)</label>
                    <input type="file" accept="image/png, image/jpeg" name="arrayImages[]" id="arrayImages" class="form-control" multiple>
                </div>
                <div class="row col-2">
                    <button type="submit" class="btn btn-md btn-success mt-3"> Salvar </button>
                </div>
            </form>
        </div>q
    </main>
</body>
</html>