@extends('admin.layouts.app')

@section('title', 'Listagem dos pacientes')

@section('content')
    @if (session('message'))
        <div class="alert alert-success mt-3">{{ session('message') }}</div>
    @endif

    <form class="form-group" action="{{ route('pacients.search') }}" method="post">
        @csrf
        <div class="input-group mb-3">
        <input type="text" class="form-control" name="search" placeholder="Pesquisar">
        <button type="submit" class="btn btn-outline-secondary">Filtrar</button>
        </div>
    </form>
    <h1 class="text-center">Pacientes</h1>
    <a class="btn btn-success col-sm-3" href="{{ route('pacients.create') }}">Criar novo paciente</a>
    <table class="table table-hover">
        <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Foto</th>
              <th scope="col">Nome</th>
              <th scope="col">Idade</th>
              <th>Ver</th>
              <th>Editar</th>
            </tr>
        </thead>
        <tbody>
            @php $cont = 1; @endphp
            @foreach ($pacients as $pacient)
            <tr>
                <th scope="row">{{ $cont++ }}</th>
                <td><img src="{{ url("storage/{$pacient->image}") }}" style="height:80px;width:80px;border-radius:100%;"></td>
                <td>{{ $pacient->name }}</td>
                <td>
                    @php $date = new DateTime($pacient->year); $onlyAge = $date->diff(new DateTime(date('Y-m-d'))); @endphp
                    {{ $onlyAge->format('%Y') }} anos
                </td>
                <td><a class="btn btn-primary" href="{{ route('pacients.show', $pacient->id) }}"><i class="fas fa-eye"></i></a></td>
                <td><a class="btn btn-warning" href="{{ route('pacients.edit', $pacient->id) }}"><i class="fas fa-pen"></i></a></td>
            </tr>
            @endforeach
        </tbody>
</table>
    @if (isset($filters))
        {{ $pacients->appends($filters)->links() }}
    @else
        {{ $pacients->links() }}
    @endif
@endsection
