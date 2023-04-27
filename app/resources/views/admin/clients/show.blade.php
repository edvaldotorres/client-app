@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Cliente: ') . $client->id }}</div>
                    <div class="card-body">
                        <form>
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="name_client" class="form-label">Nome:</label>
                                    <input type="text" class="form-control" name="name_client"
                                        value="{{ $client->name_client }}" disabled>
                                </div>
                                <div class="col-md-6">
                                    <label for="date_of_birth" class="form-label">Data de Nascimento:</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" name="date_of_birth"
                                            value="{{ $client->date_of_birth }}" disabled>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="document" class="form-label">CPF/CNPJ:</label>
                                    <input type="text" class="form-control" name="document"
                                        value="{{ $client->document }}" disabled>
                                </div>
                                <div class="col-md-6">
                                    <label for="name_social" class="form-label">Nome Social:</label>
                                    <input type="text" class="form-control" name="name_social"
                                        value="{{ $client->name_social }}" disabled>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="image" class="form-label">Foto:</label>
                                    <div class="mb-3">
                                        <img src="{{ $client->image ? asset('storage/images/' . $client->image) : asset('images/default.png') }}"
                                            alt="Foto do Cliente" class="img-thumbnail img-fluid">
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
