{{-- @if ($errors->any())
    <ul>
        <div class="alert alert-danger mt-3">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>

        </div>
    </ul>
@endif --}}
<div id="validation-errors"></div>
<div id="validation-success"></div>
<!-- Modal -->
<div class="modal fade" id="modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Inserir novo paciente</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form name="createForm" class="row g-3" enctype="multipart/form-data">
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
                            <input required class="form-control" type="text" name="cpf" id="cpf" placeholder="000.000.000-00" data-mask="(00) 00000-0000" data-mask-selectonfocus="true" value="{{ old('cpf')}}">
                        </div>

                        <div class="col-md-12 mt-3">
                            <label for="name" class="form-label">WhatsApp</label>
                            <input required class="form-control" type="text" name="wpp" id="wpp"placeholder="(00) 00000-0000" data-mask="(00) 00000-0000" data-mask-selectonfocus="true" value="{{ old('wpp') }}">
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

  @push('javascript')
  <script>
     $(document).ready(function($){
     $('#wpp').mask('(00) 00000-0000');
     $('#cpf').mask('000.000.000-00');
 });

    $(function(){
        $('form[name="createForm"]').submit(function(event){
            event.preventDefault();
            $.ajax({
                url: "{{ route('pacients.store') }}",
                type: 'POST',
                // data: $(this).serialize(),
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
                dataType: 'json',
                success: function (data){
                    $('#validation-success').append('<div class="alert alert-success mt-3">'+data.success+' </div').delay( 2000 ).fadeOut( 400 );
                    jQuery('#modal').modal('hide');
                },
                error: function (xhr) {
                    $('#validation-errors').html('');
                    $.each(xhr.responseJSON.errors, function(key,value) {
                        $('#validation-errors').append('<div class="alert alert-danger mt-3">'+value+'</div').delay( 2000 ).fadeOut( 400 );
                    });
                    jQuery('#modal').modal('hide');
                 },
            }).done(function(data){ //done em vez de load
                console.log(data);
               $("#reload").load("{{ route('pacients.index') }} #line"); //atribuir o conteúdo do div com a função html()
    });
        });
    });
 </script>
  @endpush
