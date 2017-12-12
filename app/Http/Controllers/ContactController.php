<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;

class ContactController extends Controller
{
  public function show()
  {
      return view('shop.contact');
  }

  public function sendMessage(Request $request)
  {
      $this->validate($request, [
          'nom' => 'bail|required|max:100',
          'email' => 'bail|required|email',
          'subject'=>'bail|required|string|max:50',
          'message'=>'bail|required|string|max:500',
          'g-recaptcha-response' => 'required|captcha'

      ]);


        $object=$request['subject'];
      Mail::send(['shop.email.contact','shop.email.contactTexte'],[ 'clientName'=>$request['nom'],
          'clientEmail'=>$request['email'],
          'leText'=>$request['message']],
          function($message) use ($request,$object){
              $message->to('fredmoras8@gmail.com')->subject($object);
              $message->from('fredmoras8@gmail.com','Formulaire de contact');
//              $message->from($request['email'],'Formulaire de contact');

          });
      return view('shop.email.responseContact');

  }
}
