<h1>Detalhes do paciente</h1>
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
<ul>
    <li>{{ $pacient->name }}</li>
    <li>{{ $onlyAge->format('%Y') }} anos</li>
    <li>{{ $pacient->cpf }}</li>
    <li>{{ $pacient->wpp }}</li>
</ul>
<form action="{{ route('pacients.destroy', $pacient->id )}}" method="POST">
    @csrf
    <input type="hidden" name="_method" value="DELETE">
    <button type="submit">Deletar paciente</button>
</form>
