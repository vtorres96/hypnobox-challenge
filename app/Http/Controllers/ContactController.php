<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Contact;
use App\User;

class ContactController extends Controller
{
    public function index(){
        $user_id = Auth::user()->id;
        $contacts = Contact::where('user_id', '=', $user_id)->paginate(5);

        return view('contact.index')->with('contacts', $contacts);
    }

    public function show($id){
        $contact = Contact::find($id);

        return view('contact.show')->with('contact', $contact);
    }

    public function create(){
        return view('contact.create');
    }

    public function store(Request $request){
        $request->validate([
            'nome' => 'required|max:50',
            'sobrenome' => 'required|max:50',
            'telefone' => 'required|max:15',
            'email' => 'email|max:80|unique:contacts',
            'data_de_nascimento' => 'required',
            'avatar' => 'nullable|sometimes|image|mimes:jpg,jpeg,png,gif'
        ]);

        $arquivo = $request->file('avatar');

        if (empty($arquivo)) {
            $caminhoRelativo = null;
        } else {
            $arquivo->storePublicly('uploads');
            $caminhoAbsoluto = public_path()."/storage/uploads";
            $nomeArquivo = $arquivo->getClientOriginalName();
            $caminhoRelativo = "storage/uploads/$nomeArquivo";
            $arquivo->move($caminhoAbsoluto, $nomeArquivo);
        }

        $contact = Contact::create([
            'first_name' => $request->input('nome'),
            'last_name' => $request->input('sobrenome'),
            'phone_number' => $request->input('telefone'),
            'email' => $request->input('email'),
            'date_of_birth' => $request->input('data_de_nascimento'),
            'avatar' => $caminhoRelativo,
            'user_id' => Auth::user()->id
        ]);

        return redirect('/contacts');
    }

    public function edit($id){
        $contact = Contact::find($id);

        return view('contact.edit')->with('contact', $contact);
    }

    public function update(Request $request, $id){
        $request->validate([
            'nome' => 'required|max:50',
            'sobrenome' => 'required|max:50',
            'telefone' => 'required|max:15',
            'data_de_nascimento' => 'required',
            'avatar' => 'nullable|sometimes|image|mimes:jpg,jpeg,png,gif'
        ]);

        $arquivo = $request->file('avatar');

        if (empty($arquivo)) {
            $caminhoRelativo = null;
        } else {
            $arquivo->storePublicly('uploads');
            $caminhoAbsoluto = public_path()."/storage/uploads";
            $nomeArquivo = $arquivo->getClientOriginalName();
            $caminhoRelativo = "storage/uploads/$nomeArquivo";
            $arquivo->move($caminhoAbsoluto, $nomeArquivo);
        }

        $contact = Contact::fill([
            'first_name' => $request->input('nome'),
            'last_name' => $request->input('sobrenome'),
            'phone_number' => $request->input('telefone'),
            'date_of_birth' => $request->input('data_de_nascimento'),
            'avatar' => $caminhoRelativo
        ]);

        $contact->update();

        return redirect('/contacts');
    }

    public function destroy($id){
        $contact = Contact::find($id);

        $contact->delete();

        return redirect('/contacts');
    }
}
