@if ($errors->any())
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif

@csrf
<div class="col-md-6">
    <label for="name" class="form-label">Nome Completo</label>
    <input class="form-control col" type="text" name="name" id="name" value="{{ $pacient->name ?? old('name') }}">
</div>

<div class="col-md-6">
    <label for="name" class="form-label">Data de nascimento</label>
    <input class="form-control col" type="date" name="year" id="year" placeholder="Data de nascimento" value="{{ $pacient->year ??old('year') }}">
</div>

<div class="col-md-6">
    <label for="image" class="form-label">Foto</label>
    <input class="form-control" type="file" name="image" id="image">
</div>

<div class="col-md-6">
    <label for="name" class="form-label">CPF</label>
    <input class="form-control" type="text" name="cpf" id="cpf" placeholder="CPF" value="{{ $pacient->cpf ?? old('cpf')}}">
</div>

<div class="col-md-12">
    <label for="name" class="form-label">WhatsApp</label>
    <input class="form-control" type="text" name="wpp" id="wpp" placeholder="WhatsApp" value="{{ $pacient->wpp ??old('wpp') }}">
</div>
