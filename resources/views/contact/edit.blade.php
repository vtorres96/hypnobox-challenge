@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">
                        Contatos
                    </div>
                    <div class="card-body">
                        <form action="{{ url('contacts/edit/'.$contact->id) }}" method="POST" enctype="multipart/form-data">

                            @csrf
                            {{ method_field('PUT') }}

                            <div class="form-group">
                                <img src="{{ $contact->avatar_image }}" class="rounded-circle" width="230" height="230">
                            </div>

                            <div class="form-group">
                                <label for="nome">Nome</label>
                                <input type="text" class="form-control{{$errors->has('nome') ? ' is-invalid':''}}" value="{{ $contact->first_name }}" id="nome" name="nome">
                                <div class="invalid-feedback">{{ $errors->first('nome') }}</div>
                            </div>

                            <div class="form-group">
                                <label for="sobrenome">Sobrenome</label>
                                <input type="text" class="form-control{{$errors->has('sobrenome') ? ' is-invalid':''}}" value="{{ $contact->last_name }}" id="sobrenome" name="sobrenome">
                                <div class="invalid-feedback">{{ $errors->first('sobrenome') }}</div>
                            </div>

                            <div class="form-group">
                                <label for="telefone">Telefone</label>
                                <input type="text" class="form-control{{$errors->has('telefone') ? ' is-invalid':''}}" value="{{ $contact->phone_number }}" id="telefone" name="telefone">
                                <div class="invalid-feedback">{{ $errors->first('telefone') }}</div>
                            </div>

                            <div class="form-group">
                                <label for="email">E-mail</label>
                                <input type="email" class="form-control{{$errors->has('email') ? ' is-invalid':''}}" value="{{ $contact->email }}" id="email" name="email" placeholder="email@example.com.br">
                                <div class="invalid-feedback">{{ $errors->first('email') }}</div>
                            </div>

                            <div class="form-group">
                                <label for="avatar">Avatar</label>
                                <input type="file" class="form-control-file{{$errors->has('avatar') ? ' is-invalid':''}}" id="avatar" name="avatar">
                                <div class="invalid-feedback" style="display:inherit">{{ $errors->first('avatar') }}</div>
                            </div>

                            <div class="card-footer text-right">
                                <button type="submit" class="btn btn-primary">Salvar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
