@extends('theme.base')

@section('content')

<div class="container py-5 text-center">
    <h1 class="">Listado de clientes</h1>
    <a href="{{ route('client.create') }}" class="btn btn-primary">Crear clientes</a>

    @if (Session::has('mensaje'))
        <div class="alert alert-info my-5">
            {{Session::get('mensaje') }}
        </div>
        
    @endif
    <table class="table table-primary table-striped table-hover table-bordered table-sm table-responsive-sm">

        <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Saldo</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                 @forelse ($client as $detail)
                    <tr>
                        <td>{{$detail->name}}</th>
                        <td>{{$detail->due}}</td>
                        <td>
                            <a href="{{ route('client.edit', $detail) }}" class="btn btn-warning">Editar</a>   
                            
                            <form action="{{ route('client.destroy', $detail) }}" method="post" class="d-inline">
                            @method('DELETE')
                            @csrf
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Estas seguro de Eliminar este Cliente')">Eliminar</button>
                            
                            </form>                            
                        </td>
                    </tr>
                @empty
                <tr>
                    <td colspan="3">No hay registros</td>
                </tr>
                @endforelse
                
            </tbody>
        </table>
        @if ($client->count())
            {{ $client->links() }}
        @endif
</div>
    
@endsection