<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Contact;
use App\User;
use App\Http\Requests\ContactRequest;

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

    public function store(ContactRequest $request){
        $request->all();

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
            'avatar' => $caminhoRelativo,
            'user_id' => Auth::user()->id
        ]);

        return redirect('/contacts');
    }

    public function edit($id){
        $contact = Contact::find($id);

        return view('contact.edit')->with('contact', $contact);
    }

    public function update(ContactRequest $request, $id){
        $contact = Contact::find($id);

        $request->all();

        $arquivo = $request->file('avatar');

        if (empty($arquivo)) {
            $caminhoRelativo = $contact->avatar;
        } else {
            $arquivo->storePublicly('uploads');
            $caminhoAbsoluto = public_path()."/storage/uploads";
            $nomeArquivo = $arquivo->getClientOriginalName();
            $caminhoRelativo = "storage/uploads/$nomeArquivo";
            $arquivo->move($caminhoAbsoluto, $nomeArquivo);
        }

        $contact->first_name = $request->input('nome');
        $contact->last_name = $request->input('sobrenome');
        $contact->phone_number = $request->input('telefone');
        $contact->email = $request->input('email');
        $contact->avatar = $caminhoRelativo;

        $contact->save();

        return redirect('/contacts/show/'.$contact->id);
    }

    public function destroy($id){
        $contact = Contact::find($id);

        $contact->delete();

        return redirect('/contacts');
    }

    public function search(Request $request){
        $search = $request->input('search');

        $contacts = Contact::
              where('first_name', 'like', '%'.$search.'%')
              ->orWhere('last_name', 'like', '%'.$search.'%')
              ->paginate(5);

        return view('contact.index')->with(['contacts' => $contacts, 'search' => $search]);
    }
}
