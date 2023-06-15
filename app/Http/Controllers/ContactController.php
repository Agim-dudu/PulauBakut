<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    
    public function index()
    {
        $data['users'] = User::all();
        $data['contacts'] = Contact::all();

        return view('data_contact',$data);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'subject' => 'required',
            'message' => 'required',
        ]);

        Contact::create($validatedData);

        return redirect()->route('index')->with('success', 'Pesan Anda telah berhasil dikirim.');
    }
    public function destroy($id)
    {
        $contact = Contact::findOrFail($id);
        $contact->delete();

        return redirect()->route('admin.data_contact.index')->with('success', 'Data kontak berhasil dihapus.');
    }
}
