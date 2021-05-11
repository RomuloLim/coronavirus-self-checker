@extends('admin.layouts.app')

@section('title', 'Atualizando paciente')

@section('content')
<h1 class="text-center mt-4 mb-4">Editar paciente <u>{{ $pacient->name }}</u></h1>
<form action="{{ route('pacients.update', $pacient->id) }}" class="row g-3" method="post" enctype="multipart/form-data">
    @method('put')
    @include('admin.pacients._partials.form')

   @if (isset($diagnostic))
   <h1 class="text-center">Detalhes do diagnóstico</h1>
   <div class="row mt-5">
       <div class="list-group col-sm justify-content-center">
           <label class="list-group-item">
               <input class="form-check-input me-1" name="febre" type="checkbox" value="1" {{ $diagnostic->febre == 1 ? 'checked' : '' }}>
               Febre
           </label>
           <label class="list-group-item">
               <input class="form-check-input me-1" name="coriza" type="checkbox" value="1" {{ $diagnostic->coriza == 1 ? 'checked' : '' }}>
               Coriza
           </label>
           <label class="list-group-item">
               <input class="form-check-input me-1" name="nariz_ent" type="checkbox" value="1" {{ $diagnostic->nariz_ent == 1 ? 'checked' : '' }}>
               Nariz Entupido
           </label>
           <label class="list-group-item">
               <input class="form-check-input me-1" name="cansaco" type="checkbox" value="1" {{ $diagnostic->cansaco == 1 ? 'checked' : '' }}>
               Cansaço
           </label>
       </div>
       <div class="list-group col-sm">
       <label class="list-group-item">
           <input class="form-check-input me-1" name="tosse" type="checkbox" value="1" {{ $diagnostic->tosse == 1 ? 'checked' : '' }}>
           Tosse
       </label>
       <label class="list-group-item">
           <input class="form-check-input me-1" name="dor_cab" type="checkbox" value="1" {{ $diagnostic->dor_cab == 1 ? 'checked' : '' }}>
           Dor de cabeça
       </label>
       <label class="list-group-item">
           <input class="form-check-input me-1" name="dor_corpo" type="checkbox" value="1" {{ $diagnostic->dor_corpo == 1 ? 'checked' : '' }}>
           Dores no corpo
       </label>
       <label class="list-group-item">
           <input class="form-check-input me-1" name="mal_estar" type="checkbox" value="1" {{ $diagnostic->mal_estar == 1 ? 'checked' : '' }}>
           Mal estar geral
       </label>
       </div>
       <div class="list-group col-sm">
       <label class="list-group-item">
           <input class="form-check-input me-1" name="dor_garganta" type="checkbox" value="1" {{ $diagnostic->dor_garganta == 1 ? 'checked' : '' }}>
           Dor de garganta
       </label>
       <label class="list-group-item">
           <input class="form-check-input me-1" name="dif_respirar" type="checkbox" value="1" {{ $diagnostic->dif_respirar == 1 ? 'checked' : '' }}>
           Dificuldade de respirar
       </label>
       <label class="list-group-item">
           <input class="form-check-input me-1" name="falta_paladar" type="checkbox" value="1" {{ $diagnostic->falta_paladar == 1 ? 'checked' : '' }}>
           Falta de paladar
       </label>
       <label class="list-group-item">
           <input class="form-check-input me-1" name="falta_olfato" type="checkbox" value="1" {{ $diagnostic->falta_olfato == 1 ? 'checked' : '' }}>
           Falta de olfato
       </label>
       </div>
       <div class="list-group col-sm">
           <label class="list-group-item">
               <input class="form-check-input me-1" name="dif_loc" type="checkbox" value="1" {{ $diagnostic->dif_loc == 1 ? 'checked' : '' }}>
               Dificuldade de locomoção
           </label>
           <label class="list-group-item">
               <input class="form-check-input me-1" name="diarreia" type="checkbox" value="1" {{ $diagnostic->diarreia == 1 ? 'checked' : '' }}>
               Diarréia
           </label>
       </div>
   </div>
   @else
   <div class="alert alert-warning">O paciente ainda não foi diagnosticado</div>
   @endif
    <div class="col-sm-6 mb-4">
        <button type="submit" class="btn btn-lg btn-primary">Enviar</button>
    </div>

    <div class="col-sm-6 d-flex justify-content-end mb-4">
        <a href="{{ route('pacients.index') }}" type="submit" class="btn btn-lg btn-primary">Voltar</a>
    </div>
</form>
@endsection
