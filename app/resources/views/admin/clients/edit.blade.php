@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Editar Cliente') }}</div>
                    <div class="card-body">
                        <form action="{{ route('admin.clients.update', $client->id) }}" method="post" autocomplete="off"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="name_client" class="form-label">Nome:</label>
                                    <input type="text" class="form-control" name="name_client"
                                        value="{{ $client->name_client }}">
                                </div>
                                <div class="col-md-6">
                                    <label for="date_of_birth" class="form-label">Data de Nascimento:</label>
                                    <div class="input-group">
                                        <input type="date" class="form-control" name="date_of_birth"
                                            value="{{ $client->date_of_birth }}">
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="document" class="form-label">CPF/CNPJ:</label>
                                    <input type="text" class="form-control" name="document"
                                        value="{{ $client->document }}">
                                </div>
                                <div class="col-md-6">
                                    <label for="name_social" class="form-label">Nome Social:</label>
                                    <input type="text" class="form-control" name="name_social"
                                        value="{{ $client->name_social }}">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="image" class="form-label">Foto:</label>
                                    <div class="mb-3">
                                        <input type="file" class="form-control" name="image">
                                    </div>
                                    <div class="mb-3">
                                        <img src="{{ $client->image ? asset('storage/images/' . $client->image) : asset('images/default.png') }}"
                                            alt="Foto do Cliente" class="img-thumbnail img-fluid">
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Salvar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        $('#document').mask('000.000.000-00', {
            onKeyPress: function(document, e, field, options) {
                const masks = ['000.000.000-000', '00.000.000/0000-00'];
                const mask = (document.length > 14) ? masks[1] : masks[0];
                $('#document').mask(mask, options);
            }
        });
    </script>
@endsection
