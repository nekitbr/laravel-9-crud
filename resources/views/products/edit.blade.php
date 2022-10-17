@extends('layouts.main')
@section('title','SchedulesApp - Editar Produto')

@section('content')
    <div id="schedule-create-container" class='col-md-6 offset-md-3'>
        <h1>Editando produto: {{ $product->name }} </h1>
        <form action="{{ route('products.update', ['id' => $product->getKey()]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('patch')
            <div class="form-group">
                <label for="name">Nome: </label>
                <input type="text" required placeholder="Digite o nome..." value="{{ $product->name }}" name="name" class="form-control">

                <label for="description">Descrição: </label>
                <input type="text" required placeholder="Digite a descrição..." value="{{ $product->description }}" name="description" class="form-control">

                <label for="quantity">Quantidade: </label>
                <input type="number" required placeholder="Ex.: 4" value="{{ $product->quantity }}" name="quantity" class="form-control">

                <label for="images">Adicionar imagens: </label>
                <input type="file" name="images[]" class="form-control" accept="image/*" multiple>
                @if (count($product->files) > 0)
                    <label for="images">Imagens</label>
                    <div>
                        <select name="images" required id="service" class="form-select" onChange="changeImage(this)">
                            @foreach ($product->files as $image )
                                <option id="image-{{ $image->getKey() }}" value="{{ $image->getKey() }}" data-preview-image="{{ route('file.download', ['id' => $image->getKey()] ) }}">{{ $image->name }}</option><br>
                            @endforeach
                        </select>
                    </div>
                    <img class="mw-300px" src="{{ route('file.download', ['id' =>$product->files[0]->id]) }}" id="preview-image"> <br>
                @endif
            </div> <br>
            <button type="submit" class="btn btn-primary" class="form-check-input">Salvar</button>
        </form>
        <script>
            function changeImage(elem) {
                const imageId = elem.value
                const imageUrl = $(`#image-${imageId}`).attr('data-preview-image')

                $("#preview-image").attr('src', imageUrl)
                $("#preview-image").show()
            }
        </script>
    </div>
@endsection