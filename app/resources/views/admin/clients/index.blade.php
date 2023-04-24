@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>
                    <div class="card-body">
                        <div class="d-flex mb-3">
                            <a href="{{ route('admin.clients.create') }}" class="btn btn-primary mr-2">Criar Novo Cliente</a>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col"><strong>Nome</strong></th>
                                        <th scope="col"><strong>Data de nascimento</strong></th>
                                        <th scope="col"><strong>CPF/CNPJ</strong></th>
                                        <th scope="col"><strong>Foto</strong></th>
                                        <th scope="col"><strong>Nome social</strong></th>
                                        <th scope="col"><strong>Ações</strong></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($clientsList as $clientData)
                                        <tr>
                                            <th scope="row">{{ $clientData->id }}</th>
                                            <td>{{ $clientData->name_client }}</td>
                                            <td>{{ $clientData->date_of_birth }}</td>
                                            <td>{{ $clientData->document }}</td>
                                            <td></td>
                                            <td>{{ $clientData->name_social }}</td>
                                            <td>
                                                <a href="{{ route('admin.clients.show', $clientData->id) }}"
                                                    class="btn btn-sm btn-success btn-block mb-1 mb-md-0">Visualizar</a>
                                                <a href="{{ route('admin.clients.edit', $clientData->id) }}"
                                                    class="btn btn-sm btn-primary btn-block mb-1 mb-md-0">Editar</a>
                                                <form action="{{ route('admin.clients.destroy', $clientData->id) }}"
                                                    method="post" style="display: inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit"
                                                        class="btn btn-sm btn-danger btn-block">Excluir</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <nav aria-label="Page navigation example">
                            {{ $clientsList->links() }}
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
