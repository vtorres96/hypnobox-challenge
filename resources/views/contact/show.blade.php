@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">
                        Visualizando informações sobre {{ $contact->first_name . ' ' . $contact->last_name }}
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-4 col-md-4">
                                <img src="{{ $contact->avatar_image }}" class="rounded-circle" width="230" height="230">
                            </div>
                            <div class="col-sm-8 col-md-8">
                                <div class="form-group">
                                    <label for="nome">Nome: </label>
                                    <span class="form-control-static">{{ $contact->first_name }}</span>
                                </div>
                                <div class="form-group">
                                    <label for="saudacao" class="control-label">Sobrenome</label>
                                    <span class="form-control-static">{{ $contact->last_name }}</span>
                                </div>
                                <div class="form-group">
                                    <label for="telefone">Telefone: </label>
                                    <span class="form-control-static">{{ $contact->phone_number }}</span>
                                </div>
                                <div class="form-group">
                                    <label for="email">E-mail: </label>
                                    <span class="form-control-static">{{ $contact->email }}</span>
                                </div>
                                <div class="form-group">
                                    <a href="/contacts">
                                        <button class="btn btn-primary">
                                            Voltar
                                        </button>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
