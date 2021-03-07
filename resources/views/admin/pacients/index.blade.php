@extends('admin.layouts.app')

@section('title', 'Listagem dos pacientes')

@section('content')
    @if (session('message'))
        <div class="alert alert-success mt-3 msg">{{ session('message') }}</div>
    @endif
    @include('admin.pacients._partials.modalForm')
    <h1 class="text-center mt-4">Pacientes</h1>
    <div class="row">
        <button type="button" class="btn btn-success col-md-2 mb-2" data-bs-toggle="modal" data-bs-target="#modal">
            Criar novo paciente
        </button>
        <form class="col-md-3 ms-auto" action="{{ route('pacients.search') }}" method="post">
            @csrf
            <div class="input-group mb-3">
                <input type="text" class="form-control" name="search" placeholder="Pesquisar">
                <button type="submit" class="btn btn-outline-secondary">Filtrar</button>
            </div>
        </form>
        <div class="table-responsive" id="pacientsList">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Foto</th>
                        <th scope="col">Nome</th>
                        <th scope="col">Idade</th>
                        <th>Diagnóstico</th>
                        <th colspan="4">Ações</th>
                    </tr>
                </thead>
                <tbody id="reload">
                    @php $cont = 1; @endphp
                    @foreach ($pacients as $pacient)
                        <tr style="vertical-align: middle" id="line">
                            <td scope="row">{{ $cont++ }}</td>
                            <td><img src="{{ url("storage/{$pacient->image}") }}"
                                    style="height:80px;width:80px;border-radius:100%;"></td>
                            <td>{{ $pacient->name }}</td>
                            <td>
                                @php
                                    $date = new DateTime($pacient->year);
                                    $onlyAge = $date->diff(new DateTime(date('Y-m-d')));
                                @endphp
                                {{ $onlyAge->format('%Y') }} anos
                            </td>
                            @if ($pacient->diagnostic == '---')
                                <td class="col-3">
                                    <div class="col-12 text-center">{{ $pacient->diagnostic }}</div>
                                </td>
                            @else
                                <td class="col-3">
                                    <div
                                        class="col-12 text-center {{ $pacient->diagnostic == 'SINTOMAS INSUFICIENTES' ? 'alert alert-success' : ($pacient->diagnostic == 'POTENCIAL INFECTADO' ? 'alert alert-warning' : 'alert alert-danger') }}">
                                        {{ $pacient->diagnostic }}</div>
                                </td>
                            @endif
                            <td class="float-none">
                                <a class="btn btn-primary" href="{{ route('pacients.show', $pacient->id) }}"><i
                                        class="fas fa-eye"></i></a>
                                @if ($pacient->diagnostic == '---')
                                    <a class="btn btn-success" disabled
                                        href="{{ route('diagnostic.create', $pacient->id) }}"><i
                                            class="fas fa-book"></i></a>
                                @else
                                    <button class="btn btn-success" disabled><i class="fas fa-book"></i></button>

                                @endif

                                <a class="btn btn-warning" href="{{ route('pacients.edit', $pacient->id) }}"><i
                                        class="fas fa-pen"></i></a>
                                <a class="btn btn-danger" href="{{ route('pacients.destroy', $pacient->id) }}"
                                    id="deletePacient" data-id="{{ $pacient->id }}" onclick="confirm('Tem certeza que quer deletar o paciente?')">
                                    <i class="fas fa-trash"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="mb-4">
            @if (isset($filters))
                {{ $pacients->appends($filters)->links() }}
            @else
                {{ $pacients->links() }}
            @endif
        </div>
    @endsection

    @push('javascript')
        <script>
            setTimeout(function () {
                $(".msg").hide();
            }, 2000);
            $(document).ready(function() {
                $("body").on("click", "#deletePacient", function(e) {
                    e.preventDefault();
                    var id = $(this).data("id");
                    var token = $("meta[name='csrf-token']").attr("content");
                    var url = e.target;
                    console.log(url.href);
                    $.ajax({
                        url: url.href,
                        type: 'DELETE',
                        dataType: 'json',
                        data: {
                            _token: token,
                            id: id
                        },
                        success: function(data) {
                            $("#reload").load("{{ route('pacients.index') }} #line");
                            $('#validation-success').append('<div class="alert alert-success mt-3">' + data.success +' </div').delay(2000).fadeOut(400);
                            jQuery('#modal').modal('hide');
                        },
                    });
                });
            });

        </script>
    @endpush
