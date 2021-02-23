@extends('admin.layouts.app')

@section('title', 'Atualizando paciente')

@section('content')
<h1>Editar paciente <u>{{ $pacient->name }}</u></h1>
<form action="{{ route('pacients.update', $pacient->id) }}" class="row g-3" method="post" enctype="multipart/form-data">
    @method('put')
    @include('admin.pacients._partials.form')
</form>
@endsection
