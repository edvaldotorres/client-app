@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Novo Cliente') }}</div>
                    <div class="card-body">
                        <form action="{{ route('admin.clients.store') }}" method="post" autocomplete="off"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="name_client" class="form-label">Nome:</label>
                                    <input type="text" class="form-control" name="name_client"
                                        value="{{ old('name_client') }}">
                                    @error('name_client')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label for="date_of_birth" class="form-label">Data de Nascimento:</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control mask-date_of_birth" name="date_of_birth"
                                            value="{{ old('date_of_birth') }}">
                                    </div>
                                    @error('date_of_birth')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="document" class="form-label">CPF/CNPJ:</label>
                                    <input type="text" class="form-control" name="document" id="document"
                                        value="{{ old('document') }}">
                                    @error('document')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label for="name_social" class="form-label">Nome Social:</label>
                                    <input type="text" class="form-control" name="name_social"
                                        value="{{ old('name_social') }}">
                                    @error('name_social')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="image" class="form-label">Foto:</label>
                                    <div class="mb-3">
                                        <input type="file" class="form-control" name="image">
                                    </div>
                                    @error('image')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Cadastrar</button>
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

        $('.mask-date_of_birth').mask('00/00/0000');
    </script>
@endsection
