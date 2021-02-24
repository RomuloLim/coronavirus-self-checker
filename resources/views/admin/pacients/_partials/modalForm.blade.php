@if ($errors->any())
    <ul>
        <div class="alert alert-danger mt-3">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>

        </div>
    </ul>
@endif
<!-- Modal -->
<div class="modal fade" id="modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Inserir novo paciente</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form action="{{ route('pacients.store') }}" class="row g-3" method="post" enctype="multipart/form-data">
               @csrf
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-6 mt-3">
                            <label for="image" class="form-label">Foto</label>
                            <input required class="form-control" type="file" name="image" id="image">
                        </div>
                        <div class="col-md-6 mt-3">
                            <label for="name" class="form-label">Data de nascimento</label>
                            <input required class="form-control col" type="date" name="year" id="year" placeholder="Data de nascimento" value="{{ old('year') }}">
                        </div>
                        <div class="col-md-12 mt-3">
                            <label for="name" class="form-label">Nome Completo</label>
                            <input required class="form-control" type="text" name="name" id="name" value="{{ old('name') }}">
                        </div>
                        <div class="col-md-12 mt-3">
                            <label for="name" class="form-label">CPF</label>
                            <input required class="form-control" type="text" name="cpf" id="cpf" placeholder="CPF" value="{{ old('cpf')}}">
                        </div>

                        <div class="col-md-12 mt-3">
                            <label for="name" class="form-label">WhatsApp</label>
                            <input required class="form-control" type="text" name="wpp" id="wpp" placeholder="WhatsApp" value="{{ old('wpp') }}">
                        </div>
                        <div class="col-md-6 mt-3">
                            <button type="submit" class="btn btn-primary">Enviar</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
      </div>
    </div>
  </div>
