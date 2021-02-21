<h1>Cadastrar novo paciente</h1>
@if ($errors->any())
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif
<form action="{{ route('pacients.store') }}" method="post">
    @csrf
    <input type="text" name="name" id="name" placeholder="Nome completo" value="{{ old('name') }}">
    <input type="date" name="year" id="year" placeholder="Data de nascimento" value="{{ old('year') }}">
    <input type="text" name="cpf" id="cpf" placeholder="CPF" value="{{ old('cpf') }}">
    <input type="text" name="wpp" id="wpp" placeholder="WhatsApp" value="{{ old('wpp') }}">
    <button type="submit">Enviar</button>
</form>
