@extends('admin.layouts.app')

@section('title', 'Exibindo paciente')

@section('content')
<h1 class="text-center mt-3">Detalhes do paciente</h1>
<hr>
@if (session('message'))
    <div>
        {{ session('message') }}
    </div>
@endif
@php
    $date = new DateTime($pacient->year);
    $onlyAge = $date->diff(new DateTime(date('Y-m-d')));
@endphp

<div class="row align-items-center" style="max-width: 540px;">
        <div class="row g-0">
        <div class="col-md-4">
            <img src="{{ url("storage/{$pacient->image}") }}" class="card-img-top mt-2" alt="paciente">
        </div>
        <div class="col-md-8">
            <div class="card-body">
            <h5 class="card-title">{{ $pacient->name }}</h5>
            <p class="card-text">Idade: {{ $onlyAge->format('%Y') }} anos</p>
            <p class="card-text">CPF: {{ $pacient->cpf }}</p>
            <p class="card-text">Idade: {{ $onlyAge->format('%Y') }} anos</p>
            <p class="card-text">WhatsApp: {{ $pacient->wpp }}</p>
            <p class="card-text"><small class="text-muted">Paciente criado em {{ $pacient->created_at }}</small></p>
            </div>
        </div>
        </div>
</div>
<form action="{{ route('pacients.destroy', $pacient->id )}}" method="POST">
    @csrf
    <input type="hidden" name="_method" value="DELETE">
    <button type="submit" class=" row btn btn-danger">Deletar paciente</button>
</form>
<hr class="mt-4">
<h1>Sintomas</h1>

    <form class="row mb-5">
        <div class="list-group col-3">
            <label class="list-group-item">
                <input class="form-check-input me-1" name="febre" type="checkbox" value="1">
                Febre
            </label>
            <label class="list-group-item">
                <input class="form-check-input me-1" name="coriza" type="checkbox" value="1">
                Coriza
            </label>
            <label class="list-group-item">
                <input class="form-check-input me-1" name="nariz-ent" type="checkbox" value="1">
                Nariz Entupido
            </label>
            <label class="list-group-item">
                <input class="form-check-input me-1" name="cansaco" type="checkbox" value="1">
                Cansaço
            </label>
        </div>
        <div class="list-group col-3">
        <label class="list-group-item">
            <input class="form-check-input me-1" name="tosse" type="checkbox" value="1">
            Tosse
        </label>
        <label class="list-group-item">
            <input class="form-check-input me-1" name="dor-cab" type="checkbox" value="1">
            Dor de cabeça
        </label>
        <label class="list-group-item">
            <input class="form-check-input me-1" name="dor-corpo" type="checkbox" value="1">
            Dores no corpo
        </label>
        <label class="list-group-item">
            <input class="form-check-input me-1" name="mal-estar" type="checkbox" value="1">
            Mal estar geral
        </label>
        </div>
        <div class="list-group col-3">
        <label class="list-group-item">
            <input class="form-check-input me-1" name="dor-garganta" type="checkbox" value="1">
            Dor de garganta
        </label>
        <label class="list-group-item">
            <input class="form-check-input me-1" name="dif-respirar" type="checkbox" value="1">
            Dificuldade de respirar
        </label>
        <label class="list-group-item">
            <input class="form-check-input me-1" name="falta-paladar" type="checkbox" value="1">
            Falta de paladar
        </label>
        <label class="list-group-item">
            <input class="form-check-input me-1" name="falta-olfato" type="checkbox" value="1">
            Falta de olfato
        </label>
        </div>
        <div class="list-group col-3">
        <label class="list-group-item">
            <input class="form-check-input me-1" name="dif-loc" type="checkbox" value="1">
            Dificuldade de locomoção
        </label>
        <label class="list-group-item">
            <input class="form-check-input me-1" name="diarreia" type="checkbox" value="1">
            Diarréia
        </label>
        </div>
    </form>


@endsection
