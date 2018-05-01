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
              $message->from('messagerie@qualitytraiteur.be','Formulaire de contact');
//              $message->from($request['email'],'Formulaire de contact');

          });
      return view('shop.email.responseContact');

  }

  public function sendMultiMessage(){

      $arrayList=array(
          "0"  => array("article" => "20 carton pour déménagement type caisse à banane", "adresse" => "cedcarton@yahoo.com"),
          "1"  => array("article" => "une tablette samsung A2106", "adresse" => "achatmatinfo@gmail.com"),
          "2"  => array("article" => "la mise en réseau de mon alarme et de mes caméra de sécurité.", "adresse" => "be.itconsultance@gmail.com"),
          "3"  => array("article" => "l'installation électrique dans mon abris de jardin", "adresse" => "bzzzelek@gmail.com"),
          "4"  => array("article" => "l'organisation d'un buffet pizza varié pour 20 personnes", "adresse" => "pizzavieirus@yahoo.com"),
          "5"  => array("article" => "10 menu végétariens à emporter ", "adresse" => "djibshopseraing@gmail.com"),
          "6"  => array("article" => "le formatage d'un pc", "adresse" => "erp.neobox@gmail.com"),
          "7"  => array("article" => " un pc portable de marque acer", "adresse" => "dclicpc1@gmail.com"),
          "8"  => array("article" => " l' impression et la reliure de 50 pages A4 ", "adresse" => "easyves.print@gmail.com"),

      );
//      dd($arrayList );
      foreach ($arrayList as $array){


      $object='offre de prix ';
      Mail::send(['shop.email.offre','shop.email.offreTexte'],[ 'article'=>$array['article']],

          function($message) use ($array,$object){
              $message->to($array['adresse'])
                  ->cc('roland.neyrinck@protonmail.com')
                  ->bcc('fredMoras8@gmail.com')
                  ->subject($object);
              $message->from('messagerie@qualitytraiteur.be','Fred Moras');

          });
      }

      return view('shop.email.responseContact');

  }

}
