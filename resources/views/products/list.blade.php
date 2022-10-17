

@extends('layouts.main')
@section('title','SchedulesApp - Meus Produtos')

@section('content')

<div class="col-md-10 offset-md-1 dasboard-title-container">
    <h1>Meus Produtos</h1>
</div>
<div class="col-md-10 offset-md-1 dashboard-schedules-container">
    @if(count($products) > 0)
        <form>
            <label for="name">nome</label> <br>
            <input type="text" name="name" /> 

            <button type="submit">Pesquisar</button>
        </form><br><br>
        <a href="{{ route('products.multi.pdf') }}" class="btn btn-success "><ion-icon name="create-outline"></ion-icon>PDF de todos os produtos</a>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Descrição</th>
                    <th scope="col">Quantidade</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                @foreach($products as $product)
                    <tr>
                        <td scropt="row">{{$loop-> index + 1}}</td>
                        <td>{{$product->name}}</td>
                        <td>{{$product->description}}</td>
                        <td>{{$product->quantity}}</td>
                        <td>
                            <a href="{{ route('products.single.pdf', ['id' => $product->getKey()]) }}" class="btn btn-success "><ion-icon name="create-outline"></ion-icon>PDF</a>
                            <a href="{{ route('products.show', ['id' => $product->getKey()]) }}" class="btn btn-info "><ion-icon name="create-outline"></ion-icon>Detalhes</a><br><br>
                            <a href="{{ route('products.edit', ['id' => $product->getKey()]) }}" class="btn btn-secondary"><ion-icon name="create-outline"></ion-icon>Editar</a>
                            <form action="{{ route('products.delete', ['id' => $product->getKey()]) }}" method="POST">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-danger"><ion-icon name="trash-outline"></ion-icon>Deletar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>Não existem produtos, <a href="{{ route('products.create') }}">você pode criá-los aqui.</a></p> 
    @endif
</div>

@endsection
