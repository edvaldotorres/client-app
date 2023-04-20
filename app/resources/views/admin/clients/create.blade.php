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
                                <div class="col">
                                    <label for="name_client" class="form-label">Nome</label>
                                    <input type="text" class="form-control" name="name_client">
                                </div>
                                <div class="col">
                                    <label for="date_of_birth" class="form-label">Data de Nascimento</label>
                                    <div class="input-group">
                                        <input type="date" class="form-control" name="date_of_birth">
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col">
                                    <label for="document" class="form-label">CPF/CNPJ</label>
                                    <input type="text" class="form-control" name="document">
                                </div>
                                <div class="col">
                                    <label for="image" class="form-label">Foto</label>
                                    <input type="file" class="form-control" name="image">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-6">
                                    <label for="name_social" class="form-label">Nome Social</label>
                                    <input type="text" class="form-control" name="name_social">
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Cadastrar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
