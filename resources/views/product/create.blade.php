@extends('layouts.structure.index')

@section('script-scoped')

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

@endsection

@section('css-scoped')

<style>
    .tagSpan:hover {
        background-color: #dc3545 !important;
        cursor: pointer;
    }

    .tags-container {
        height: 100px;
        background: #ECECEC;
        overflow: auto;
        border: 1px solid #DEDEDE;
        border-radius: 4px;
    }
</style>

@endsection

@section('content')
    <div class="container m-5">
        <div class='d-flex justify-content-between align-items-center'>
            <h1>Cadastrar Produto</h1>
            <a href="{{ Route('product.index') }}" class="btn btn-sm btn-primary">
                Voltar
                <i class="fas fa-undo-alt ms-1"></i>
            </a>
        </div>
        <span class="text-muted">* Obrigatório</span>
        <form method="post" action="{{ Route("product.store") }}" enctype="multipart/form-data" class="m-3 row">
            @CSRF

            <div class="col-12 col-md-6 form-group mb-2">
                <label class="form-label" for="name">Nome *</label>
                <input type="text" name="name" id="name" placeholder="Nome do produto" class="form-control" required>
            </div>

            <div class="col-12 col-md-6 form-group d-flex align-items-center">
                <div class="form-check">
                    <input type="checkbox" name="highlight" id="highlight" class="form-check-input" value="true">
                    <label class="form-check-label" for="highlight">Destacar</label>
                </div>
            </div>

            <div class="form-group mb-2">
                <label class="form-label" for="description">Descrição *</label>
                <textarea type="text" maxlength="255" name="description" id="description" placeholder="Descrição do produto"
                    class="form-control" required></textarea>
            </div>

            <div class="col-12 col-md-6 form-group mb-2">
                <label class="form-label" for="price">Preço *</label>
                <input type="number" name="price" id="price" placeholder="Preço do produto" class="form-control"
                    min="0.00" max="10000000.00" step="0.01" required>
            </div>

            <div class="col-12 col-md-6 form-group mb-2">
                <label class="form-label" for="quantity">Quantidade *</label>
                <input type="number" name="quantity" id="quantity" placeholder="Quantidade do produto"
                    class="form-control" min="0" step="1" required>
            </div>

            <div class="col-12 col-md-6 form-group mb-2">
                <label class="form-label" for="minQuantity">Quantidade mínima *</label>
                <input type="number" name="minQuantity" id="minQuantity" placeholder="Quantidade mínima para compra"
                    class="form-control" min="0" step="1" required>
            </div>

            <div class="col-12 col-md-6 form-group mb-2">
                <label class="form-label" for="category_id">Categoria *</label>
                <select name="category_id" class="form-select">
                    @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="col-12 form-group mb-2">
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
                    <div id="selected-tags" class="d-flex flex-wrap"></div>
                    <select class='d-none' name="tags[]" id="tag-id" multiple></select>
                </div>
            </div>

            <div class="col-12 col-md-6 form-group mb-2">
                <label class="form-label" for="mainImage">Imagem principal *</label>
                <input type="file" name="mainImage" id="mainImage" class="form-control" required>
            </div>

            <div class="col-12 col-md-6 form-group mb-2">
                <label class="form-label" for="arrayImages">Imagens adicionais (opcional)</label>
                <input type="file" accept="image/png, image/jpeg" name="arrayImages[]" id="arrayImages"
                    class="form-control" multiple>
            </div>

            <div class="col-12">
                <button type="submit" class="btn btn-md btn-success mt-3">
                    Salvar
                    <i class="fas fa-save ms-1"></i>
                </button>
            </div>
        </form>
    </div>
@endsection