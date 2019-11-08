@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="message alert-success d-none p-2 my-4">
                    Contato excluído com sucesso
                </div>
                <div class="mb-4">
                    <a href="/contacts/create">
                        <button class="btn btn-primary">Novo Contato</button>
                    </a>
                </div>
                <div class="card">
                    <div class="card-header">
                        Contatos
                    </div>
                    <div class="card-body">
                        @if($contacts->isEmpty())
                            <section class="row">
                                <div class="col-12">
                                    <h1 class="col-12 text-center">Que pena! Você não tem contatos adicionados a sua agenda.</h1>
                                </div>
                            </section>
                        @else
                            <div class="table-responsive border-0">
                                <table class="table table-hover" style="margin-bottom: inherit">
                                    <tbody>
                                        @foreach ($contacts as $contact)
                                            <tr>
                                                <td><img src="{{ $contact->avatar_image }}" class="rounded-circle" width="35" height="35"></td>
                                                <td>{{ $contact->first_name }}</a></td>   
                                                <td>{{ $contact->last_name }}</a></td>                                    
                                                <td class="d-none d-md-table-cell">{{ $contact->phone_number }}</a></td>
                                                <td class="d-none d-md-table-cell">{{ $contact->email }}</a></td>
                                                <td>
                                                    <a href="/contacts/show/{{$contact->id}}">
                                                        <i class="fas fa-eye"></i>
                                                    </a>
                                                </td>
                                                <td>
                                                    <a href="/contacts/edit/{{$contact->id}}">
                                                        <i class="fas fa-edit"></i>
                                                    </a>
                                                </td>
                                                <td>
                                                    <a href="#" data-toggle="modal" data-target="#modal{{ $contact->id }}">
                                                        <i class="fas fa-trash"></i>
                                                    </a>
                                                    <div class="modal fade" id="modal{{ $contact->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title">Deseja excluir o contato {{ $contact->titulo }} ?</h5>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <p>Contato: {{ $contact->first_name . " " . $contact->last_name }}</p>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                                                    <form action="/contacts/remove/{{ $contact->id }}" method="POST">
                                                                        @csrf
                                                                        {{ method_field('DELETE') }}
                                                                        <button id="delete-contact" type="submit" class="btn btn-danger">Excluir</a>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
