<h1>Editar paciente <u>{{ $pacient->name }}</u></h1>
@if ($errors->any())
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif
<form action="{{ route('pacients.store') }}" method="post">
    @csrf
    <input type="text" name="name" id="name" placeholder="Nome completo" value="{{ $pacient->name }}">
    <input type="date" name="year" id="year" placeholder="Data de nascimento" value="{{ $pacient->year }}">
    <input type="text" name="cpf" id="cpf" placeholder="CPF" value="{{ $pacient->cpf }}">
    <input type="text" name="wpp" id="wpp" placeholder="WhatsApp" value="{{ $pacient->wpp }}">
    <button type="submit">Editar</button>
</form>
