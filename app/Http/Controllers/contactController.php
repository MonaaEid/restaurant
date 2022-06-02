<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Contact;
//use Mail;
class contactController extends Controller
{


    public function getContact() {

       return view('contactUs.contact_us');
     }

      public function saveContact(Request $request) {

        $request->validate( [
            'name' => 'required',
            'email' => 'required|email',
            'subject' => 'required',
            'message' => 'required'
        ]);

        $contact = new Contact();

        $contact->name = $request->name;
        $contact->email = $request->email;
        $contact->subject = $request->subject;
        $contact->user_message = $request->message;



        Mail::send('contactUs.contact_email',
             array(
                 'name' => $request->get('name'),
                 'email' => $request->get('email'),
                 'subject' => $request->get('subject'),
                 'user_message' => $request->get('message'),
             ), function($message) use ($request)
               {
                  $message->from($request->email);
                  $message->to('asmaaabdoabdo31@gmail.com');
               });
        $contact->save();


        return redirect()->back();


    }

    //
}
