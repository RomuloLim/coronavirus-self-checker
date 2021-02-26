@extends('admin.layouts.app')
@section('Diagnosticar paciente')

@section('content')
<h1 class="text-center mt-4">Diagnosticar paciente {{ $pacient->name }}</h1>
<form action="{{ route('diagnostic.store', $pacient->id) }}" method="post" class="row mb-5 mt-4">
    @csrf
<div class="row">
    <div class="list-group col-sm justify-content-center">
        <label class="list-group-item">
            <input class="form-check-input me-1" name="febre" type="checkbox" value="1">
            Febre
        </label>
        <label class="list-group-item">
            <input class="form-check-input me-1" name="coriza" type="checkbox" value="1">
            Coriza
        </label>
        <label class="list-group-item">
            <input class="form-check-input me-1" name="nariz_ent" type="checkbox" value="1">
            Nariz Entupido
        </label>
        <label class="list-group-item">
            <input class="form-check-input me-1" name="cansaco" type="checkbox" value="1">
            Cansaço
        </label>
    </div>
    <div class="list-group col-sm">
    <label class="list-group-item">
        <input class="form-check-input me-1" name="tosse" type="checkbox" value="1">
        Tosse
    </label>
    <label class="list-group-item">
        <input class="form-check-input me-1" name="dor_cab" type="checkbox" value="1">
        Dor de cabeça
    </label>
    <label class="list-group-item">
        <input class="form-check-input me-1" name="dor_corpo" type="checkbox" value="1">
        Dores no corpo
    </label>
    <label class="list-group-item">
        <input class="form-check-input me-1" name="mal_estar" type="checkbox" value="1">
        Mal estar geral
    </label>
    </div>
    <div class="list-group col-sm">
    <label class="list-group-item">
        <input class="form-check-input me-1" name="dor_garganta" type="checkbox" value="1">
        Dor de garganta
    </label>
    <label class="list-group-item">
        <input class="form-check-input me-1" name="dif_respirar" type="checkbox" value="1">
        Dificuldade de respirar
    </label>
    <label class="list-group-item">
        <input class="form-check-input me-1" name="falta_paladar" type="checkbox" value="1">
        Falta de paladar
    </label>
    <label class="list-group-item">
        <input class="form-check-input me-1" name="falta_olfato" type="checkbox" value="1">
        Falta de olfato
    </label>
    </div>
    <div class="list-group col-sm">
        <label class="list-group-item">
            <input class="form-check-input me-1" name="dif_loc" type="checkbox" value="1">
            Dificuldade de locomoção
        </label>
        <label class="list-group-item">
            <input class="form-check-input me-1" name="diarreia" type="checkbox" value="1">
            Diarréia
        </label>
    </div>
</div>
<div class="col-sm-10 mt-3">
    <button type="submit" class="btn btn-lg btn-success">Enviar</button>
</div>
<div class="col-sm-auto d-flex  mt-3 float-start">
    <a href="{{ route('pacients.index') }}" type="submit" class="btn btn-lg btn-primary">Voltar</a>
</div>
</form>
@endsection
