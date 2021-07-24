<?php

namespace App\Http\Controllers;

use App\Contact;
use App\Mail\ContactFormMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function form()
    {
        return view('guest.contacts');
    }

    public function send(Request $request)
    {
        $validate = $request->validate([
            "full_name" => "required",
            "email" => "required | email",
            "message" => "required"
        ]);

        //Salvare dati nel database
        $contact = Contact::create($validate);


        //Visualizzare mail senza inviare
        //return(new ContactFormMail($contact))->render();

        //invia la mail
        Mail::to('admin@test.com')->send(new ContactFormMail($contact));
        return redirect()->back()->with('message', 'Success!! La tua email è stata inviata');
    }
}
