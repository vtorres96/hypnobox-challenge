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
        $contacts = Contact::where('user_id', '=', $user_id)->get();

        return view('contact.index')->with('contacts', $contacts);
    }

    public function create(){
        return view('contact.create');
    }

    public function store(){
    }

    public function edit($id){
        $contact = Contact::find($id);

        return view('contact.edit')->with('contact', $contact);
    }

    public function update(){
    }

    public function destroy($id){
        $contact = Contact::find($id);

        $contact->delete();

        return redirect('/contacts');
    }
}
