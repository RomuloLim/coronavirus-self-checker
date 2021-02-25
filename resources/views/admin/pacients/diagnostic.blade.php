@extends('admin.layouts.app')
@section('Diagnosticar paciente')

@section('content')
<h1 class="text-center mt-4">Diagnosticar paciente {{ $pacient->name }}</h1>
<form action="{{ route('diagnostic.store', $pacient->id) }}" method="post" class="row mb-5 mt-4">
    @csrf
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
            <input class="form-check-input me-1" name="nariz_ent" type="checkbox" value="1">
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
    <div class="list-group col-3">
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
    <div class="list-group col-3">
        <label class="list-group-item">
            <input class="form-check-input me-1" name="dif_loc" type="checkbox" value="1">
            Dificuldade de locomoção
        </label>
        <label class="list-group-item">
            <input class="form-check-input me-1" name="diarreia" type="checkbox" value="1">
            Diarréia
        </label>
    </div>
<button type="submit" class="btn btn-lg btn-success col-lg-1 mt-3">Enviar</button>
</form>
@endsection
