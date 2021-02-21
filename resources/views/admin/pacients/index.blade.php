<a href="{{ route('pacients.create') }}">Criar novo paciente</a>
<h1>Pacientes</h1>

@foreach ($pacients as $pacient)
<p>
    {{ $pacient->name }}
    [ <a href="{{ route('pacients.show', $pacient->id) }}">Ver</a> ]
    [ <a href="{{ route('pacients.edit', $pacient->id) }}">Editar</a> ]
</p>
@endforeach
