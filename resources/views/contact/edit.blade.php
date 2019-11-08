@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="message alert-success d-none p-2 my-4">
                    Contato excluído com sucesso
                </div>
                <div class="card">
                    <div class="card-header">
                        Contatos
                    </div>
                    <div class="card-body">
                        <form action="{{ url('contacts/edit/'.$contact->id) }}" method="POST" enctype="multipart/form-data">
                            
                            @csrf
                            {{ method_field('PUT') }}     

                            <div class="form-group">
                                <label for="first_name">Nome</label>
                                <input type="text" required class="form-control{{$errors->has('first_name') ? ' is-invalid':''}}" value="{{ old('first_name',  $contact->first_name) }}" id="first_name" name="first_name">
                                <div class="invalid-feedback">{{ $errors->first('first_name') }}</div>
                            </div>

                            <div class="form-group">
                                <label for="last_name">Sobrenome</label>
                                <input type="text" required class="form-control{{$errors->has('last_name') ? ' is-invalid':''}}" value="{{ old('last_name', $contact->last_name) }}" id="last_name" name="last_name">
                                <div class="invalid-feedback">{{ $errors->first('last_name') }}</div>
                            </div>

                            <div class="form-group">
                                <label for="phone_number">phone_number</label>
                                <input type="text" required class="form-control{{$errors->has('phone_number') ? ' is-invalid':''}}" value="{{ old('phone_number', $contact->phone_number) }}" id="phone_number" name="phone_number">
                                <div class="invalid-feedback">{{ $errors->first('phone_number') }}</div>
                            </div>

                            <div class="form-group">
                                <label for="email">E-mail</label>
                                <input type="email" disabled class="form-control{{$errors->has('email') ? ' is-invalid':''}}" value="{{ old('email', $contact->email) }}" id="email" name="email" placeholder="email@example.com.br">
                                <div class="invalid-feedback">{{ $errors->first('email') }}</div>
                            </div>

                            <div class="form-group">
                                <label for="date_of_birth">Data de Nascimento</label>
                                <input type="text" class="form-control{{$errors->has('date_of_birth') ? ' is-invalid':''}}" id="date_of_birth" value="{{ old('date_of_birth', date('d/m/Y', strtotime($contact->date_of_birth))) }}" name="date_of_birth" placeholder="00/00/0000" maxlength="10">
                                <div class="invalid-feedback">{{ $errors->first('date_of_birth') }}</div>
                            </div>

                            <div class="form-group">
                                <label for="avatar">Avatar</label>
                                <input type="file" class="form-control-file{{$errors->has('avatar') ? ' is-invalid':''}}" id="avatar" name="avatar" accept=".jpg, .jpeg, .png .gif">
                                <div class="invalid-feedback" style="display:inherit">{{ $errors->first('avatar') }}</div>
                            </div>
                            
                            <div class="card-footer text-right">
                                <a href="#" onclick="history.back()" class="btn btn-secondary">Voltar</a>
                                <button type="submit" class="btn btn-primary">Salvar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
