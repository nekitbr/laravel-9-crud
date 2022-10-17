@extends('layouts.main')
@section('title','SchedulesApp - Editar Produto')

@section('content')
    <div id="schedule-create-container" class='col-md-6 offset-md-3'>
        <h1>Produto: {{ $product->name }} </h1>
        <div class="form-group">
            <!-- <label for="barcode">Código de barras:</label>
            <img src="data:image/png;base64,{DNS1D::getBarcodePNG($product->barcode, 'EAN13')}" alt="barcode" /> --> <!-- TODO: make work -->

            <label for="name">Nome: </label>
            <input disabled type="text" required placeholder="Digite o nome..." value="{{ $product->name }}" name="name" class="form-control">

            <label for="description">Descrição: </label>
            <input disabled type="text" required placeholder="Digite a descrição..." value="{{ $product->description }}" name="description" class="form-control">

            <label for="quantity">Quantidade: </label>
            <input disabled type="number" required placeholder="Ex.: 4" value="{{ $product->quantity }}" name="quantity" class="form-control">

            @if (count($product->files) > 0)
                <label for="images">Imagens</label>
                <select name="images" required id="service" class="form-select" onChange="changeImage(this)">
                    @foreach ($product->files as $image )
                        <option id="image-{{ $image->id }}" value="{{ $image->id }}" data-preview-image="{{ route('file.download', ['id' => $image->id]) }}">{{ $image->name }}</option><br>
                    @endforeach
                </select>
                <img class="mw-300px" src="{{ route('file.download', ['id' =>$product->files[0]->id]) }}" id="preview-image"> <br>
            @endif
        </div> <br>
        <a href="{{ route('products.edit', ['id' => $product->getKey()]) }}" class="btn btn-secondary"><ion-icon name="create-outline"></ion-icon>Editar</a>
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