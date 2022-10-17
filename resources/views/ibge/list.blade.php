

@extends('layouts.main')
@section('title','SchedulesApp - Meus Produtos')

@section('content')

<div class="col-md-10 offset-md-1 dasboard-title-container">
    <h1>IBGE</h1>
</div>
<div class="col-md-10 offset-md-1 dashboard-schedules-container">
       @if(count($items) > 0)
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Descrição</th>
                        <th scope="col">Grupo</th>
                        <th scope="col">Obs.</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($items as $item)
                        <tr>
                            <td scropt="row">{{$loop-> index + 1}}</td>
                            <td>{{$item->descricao}}</td>
                            <td>{{$item->grupo->descricao}}</td>
                            <td>{{$item->observacoes[0]}}</td>
                            <td>
                                <a href="{{ route('external.ibge.show', ['id' => $item->id]) }}" class="btn btn-success "><ion-icon name="create-outline"></ion-icon>Detalhes</a>
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
