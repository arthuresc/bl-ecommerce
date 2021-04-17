<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <title>Brindes de luxo</title>
    <script defer>
        var selectedTagsArray = [];

        function selectTag(tagId) {
            // Se a tag selecionada já estiver selecionada, retorna
            if (this.selectedTagsArray.find(element => element.id == tagId)) return;

            // Adiciona a tag selecionada a um array de tags
            let obj = this.$tagsArray.find(element => element.id == tagId);
            this.selectedTagsArray.push(obj);

            // Cria e adiciona o elemento visual da tag no container
            const tagElement = document.createElement("span");
            tagElement.innerText = obj.name;
            tagElement.classList.add("badge","bg-success", "m-3", "tagSpan");
            tagElement.id = obj.id;
            tagElement.setAttribute("onclick", "removeTag(this.id)");
            document.getElementById("selected-tags").appendChild(tagElement);

            this.createSelectedTagsInput();
        }

        function createSelectedTagsInput() {
            document.getElementById("tag-id").innerHTML = '';

            // Adiciona o array de tags selecionadas um input para o envio do formulário
            selectedTagsArray.forEach((element) => {
                const selectedTag = document.createElement("option");
                selectedTag.value = element.id;
                selectedTag.innerText = element.name;
                selectedTag.setAttribute("selected", true);
                document.getElementById("tag-id").appendChild(selectedTag);
            });
        } 

        function removeTag(elementId) {
            this.selectedTagsArray = this.selectedTagsArray.filter(element => element.id != elementId);
            this.createSelectedTagsInput();
            document.getElementById(elementId).remove();
        }
    </script>


</head>
<body>
    @include("layouts.header.nav")
    <main>
        <div class="container m-5">
            <h1>Cadastrar produto</h1>
            <form method="post" action="{{ Route("product.store") }}" enctype="multipart/form-data" class="m-3">
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

                <div class="row">
                    <label class="form-label" for="category_id">Categoria (requerido)</label>
                    <select name="category_id" class="form-select">
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="row form-group mb-2">
                    <label class="form-label">Tags</label>
                    <select class="form-control" onchange="selectTag(this.value)">
                        <script>
                            var $tagsArray = Object.values(<?php echo $tags; ?>);
                        </script>
                        
                        @foreach ($tags as $tag)
                            <option value="{{ $tag->id }}">{{ $tag->name }} </option>
                        @endforeach
                    </select>

                    <div class="tags-container my-2">
                        <div id="selected-tags" class="d-flex flex-wrap" />
                        <select class='d-none' name="tags[]" id="tag-id" multiple></select>
                    </div>
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
        </div>
    </main>
</body>
</html>