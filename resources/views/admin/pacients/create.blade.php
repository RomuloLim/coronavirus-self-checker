@extends('admin.layouts.app')

@section('title', 'Criação de paciente')

@section('content')
<h1>Cadastrar novo paciente</h1>
<form action="{{ route('pacients.store') }}" class="row g-3" method="post" enctype="multipart/form-data">
    @include('admin.pacients._partials.form')
</form>
@endsection
