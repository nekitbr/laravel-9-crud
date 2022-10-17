@extends('layouts.main')
@section('title','ProductsApp - Editar Produto')

@section('content')
    <div id="schedule-create-container" class='col-md-6 offset-md-3'>
        <h1>Cadastrando novo produto:</h1>
        <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="name">Nome: </label>
                <input type="text" required placeholder="Digite o nome..." name="name" class="form-control">

                <label for="description">Descrição: </label>
                <input type="text" required placeholder="Digite a descrição..." name="description" class="form-control">

                <label for="quantity">Quantidade: </label>
                <input type="number" required placeholder="Ex.: 4" name="quantity" class="form-control">

                <label for="images">Adicionar imagens: </label>
                <input type="file" name="images[]" class="form-control" accept="image/*" multiple>
            </div>
            <button type="submit" class="btn btn-primary" class="form-check-input">Salvar</button>
        </form>
        <footer>
            <script>
                function changeImage(elem) {
                    const imageId = elem.value
                    const imageUrl = $(`#image-${imageId}`).attr('data-preview-image')

                    $("#preview-image").attr('src', imageUrl)
                    $("#preview-image").show()
                }
            </script>
        </footer>
    </div>
@endsection
