@extends('theme.base')

@section('content')

<div class="container py-5 text-center">
    @if (isset($client))
        <h1>Editar Cliente</h1>
    @else
        <h1>Crear Cliente</h1>
    @endif

    @if (isset($client))
        <form action="{{ route('client.update', $client) }}" method="post">
            @method('PUT')
    @else
         <form action="{{ route('client.store') }}" method="post">
    @endif
     
        {{--incluir @csrf evitar errores--}}
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Nombre</label>
            <input class="form-control" name="name" type="text" placeholder="Nombre del Cliente" value="{{ old('name') ?? @$client->name }}" >
            @error('name')
            <p>{{$message}}</p>
            @enderror
        </div>

        <div class="mb-3">
            <label for="due" class="form-label">Saldo</label>
            <input class="form-control" name="due" type="number" placeholder="Saldo" step="0.01"value="{{ old('due') ?? @$client->due }}">
            @error('due')
            <p>{{$message}}</p>
            @enderror
        </div>

        <div class="mb-3">
            <label for="coments" class="form-label">Comentarios</label>
            <textarea class="form-control" name="coments" type="text" placeholder="" >{{ old('coments') ?? @$client->coments }}</textarea>
            <p>Pon aqui tus comentarios</p>
            {{--@error('coments')
            <p>{{$mesage}}</p>
            @enderror--}}
        </div>

        @if (isset($client))
            <button type="sumbit" class="btn btn-primary">Editar Cliente</button>
        @else
            <button type="sumbit" class="btn btn-primary">Guardar cliente</button>
        @endif
       
    </form>
</div>
    
@endsection