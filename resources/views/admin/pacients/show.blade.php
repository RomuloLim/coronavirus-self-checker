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
            <p class="card-text">Diagnóstico: {{ $pacient->diagnostic }}</p>
            <p class="card-text">WhatsApp: {{ $pacient->wpp }}</p>
            <p class="card-text"><small class="text-muted">Paciente criado em {{ $pacient->created_at }}</small></p>
            </div>
        </div>
        </div>
</div>
<hr class="mt-4">
@if (!isset($diagnostic))
    <div class="alert alert-warning text-center"> O paciente ainda não foi diagnosticado</div>
@else
<h1>Sintomas</h1>

<form class="row mb-4">
    <div class="list-group col-3">
        <label class="list-group-item">
            <input class="form-check-input me-1" name="febre" type="checkbox" value="1"  {{ $diagnostic->febre == 1 ? 'disabled checked' : 'disabled' }}>
            Febre
        </label>
        <label class="list-group-item">
            <input class="form-check-input me-1" name="coriza" type="checkbox" value="1"  {{ $diagnostic->coriza == 1 ? 'disabled checked' : 'disabled' }}>
            Coriza
        </label>
        <label class="list-group-item">
            <input class="form-check-input me-1" name="nariz_ent" type="checkbox" value="1"  {{ $diagnostic->nariz_ent == 1 ? 'disabled checked' : 'disabled' }}>
            Nariz Entupido
        </label>
        <label class="list-group-item">
            <input class="form-check-input me-1" name="cansaco" type="checkbox" value="1"  {{ $diagnostic->cansaco == 1 ? 'disabled checked' : 'disabled' }}>
            Cansaço
        </label>
    </div>
    <div class="list-group col-3">
    <label class="list-group-item">
        <input class="form-check-input me-1" name="tosse" type="checkbox" value="1"  {{ $diagnostic->tosse == 1 ? 'disabled checked' : 'disabled' }}>
        Tosse
    </label>
    <label class="list-group-item">
        <input class="form-check-input me-1" name="dor_cab" type="checkbox" value="1"  {{ $diagnostic->dor_cab == 1 ? 'disabled checked' : 'disabled' }}>
        Dor de cabeça
    </label>
    <label class="list-group-item">
        <input class="form-check-input me-1" name="dor_corpo" type="checkbox" value="1"  {{ $diagnostic->dor_corpo == 1 ? 'disabled checked' : 'disabled' }}>
        Dores no corpo
    </label>
    <label class="list-group-item">
        <input class="form-check-input me-1" name="mal_estar" type="checkbox" value="1"  {{ $diagnostic->mal_estar == 1 ? 'disabled checked' : 'disabled' }}>
        Mal estar geral
    </label>
    </div>
    <div class="list-group col-3">
    <label class="list-group-item">
        <input class="form-check-input me-1" name="dor_garganta" type="checkbox" value="1" {{ $diagnostic->dor_garganta == 1 ? 'disabled checked' : 'disabled' }}>
        Dor de garganta
    </label>
    <label class="list-group-item">
        <input class="form-check-input me-1" name="dif_respirar" type="checkbox" value="1" {{ $diagnostic->dif_respirar == 1 ? 'disabled checked' : 'disabled' }}>
        Dificuldade de respirar
    </label>
    <label class="list-group-item">
        <input class="form-check-input me-1" name="falta_paladar" type="checkbox" value="1" {{ $diagnostic->falta_paladar == 1 ? 'disabled checked' : 'disabled' }}>
        Falta de paladar
    </label>
    <label class="list-group-item">
        <input class="form-check-input me-1" name="falta_olfato" type="checkbox" value="1" {{ $diagnostic->falta_olfato == 1 ? 'disabled checked' : 'disabled' }}>
        Falta de olfato
    </label>
    </div>
    <div class="list-group col-3">
    <label class="list-group-item">
        <input class="form-check-input me-1" name="dif_loc" type="checkbox" value="1" {{ $diagnostic->dif_loc == 1 ? 'disabled checked' : 'disabled' }}>
        Dificuldade de locomoção
    </label>
    <label class="list-group-item">
        <input class="form-check-input me-1" name="diarreia" type="checkbox" value="1" {{ $diagnostic->diarreia == 1 ? 'disabled checked' : 'disabled' }}>
        Diarréia
    </label>
    </div>
</form>
@endif
<a href="{{ route('pacients.index')}} " class="btn btn-lg btn-primary col-1 mb-4">Voltar</a>

@endsection
