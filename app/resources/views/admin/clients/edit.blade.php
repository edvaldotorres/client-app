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
                                    @error('name_client')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label for="date_of_birth" class="form-label">Data de Nascimento:</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control mask-date_of_birth" name="date_of_birth"
                                            placeholder="Ex: 00/00/0000"
                                            value="{{ old('date_of_birth') ?? $client->date_of_birth }}">
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
                                        value="{{ $client->document }}">
                                    @error('document')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label for="name_social" class="form-label">Nome Social:</label>
                                    <input type="text" class="form-control" name="name_social"
                                        value="{{ $client->name_social }}">
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
        $(document).ready(function() {
            $('#document').keydown(function(event) {
                const document = $(this).val();
                const length = document.length;

                if (length < 14) {
                    $(this).mask('000.000.000-009');
                } else {
                    $(this).mask('00.000.000/0000-00');
                }
            });

            $('.mask-date_of_birth').mask('00/00/0000');
        });
    </script>
@endsection
