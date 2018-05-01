<?php

namespace App\Http\Controllers;

use App\Adress;
use App\Adressorder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Auth;

use Session;

class CheckOutController extends Controller
{
    //


    public function show(){
        session(['Url' => 'checkout']);
        $user=Auth::user();
//        dd($user);
        $user=\App\User::with(array('adress'))->findOrFail($user->id);
        $productTempList=\App\TempCartItem::with('shoe')->where('idUser',$user->id)->orderBy('idShoe')->get();
        $step=1;
        return view('shop.checkOut',compact(['productTempList','user','step','orderAdress']));
    }

    public function showCart()
    {

        $user=Auth::user();
        session()->forget('Url');


        $idAdress= $user->idShipAdress1;
        $productTempList=\App\TempCartItem::with('shoe')->where('idUser',$user->id)->orderBy('idShoe')->get();
        $step=2;
        session(['idAdress' => $idAdress]);
        return view('shop.checkOut',compact(['productTempList','user','step']));
    }

    public function showPaiement()
    {

        $user=\Auth::user();
        $user=\App\User::with(array('adress'))->findOrFail($user->id);
        $productTempList=\App\TempCartItem::with('shoe')->where('idUser',$user->id)->orderBy('idShoe')->get();
        $step=3;

        return view('shop.checkOut',compact(['productTempList','user','step']));
    }

    public function makePaiement($total)
    {
        $control= true;
//todo payement
        //after control paiement
        return $this->confirmOrder($control,$total);
    }


    /**
     * @param $control
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function confirmOrder($control,$total)
    {
        $user=\Auth::user();
        $productTempList=\App\TempCartItem::with('shoe')->where('idUser',$user->id)->orderBy('idShoe')->get();

        if ($control) {
//            $newOrder= new \App\Order();
            $newOrder['idUser'] =$user->id;
            $newOrder['totalProducts'] = $total ;
            $newOrder['idAdress'] =  session()->get('idAdress') ;

//            dd($newOrder['idAdress']);
            $newOrder=\App\Order::create($newOrder);
           $this->createAdressOrder($newOrder);

            foreach ($productTempList as $productTemp)
            {
                $newOrderLine['idOrder']  = $newOrder->id;
                $newOrderLine['quantity'] = $productTemp->quantity;
                $newOrderLine['idShoe']   = $productTemp->idShoe;
                \App\OrderLine::create($newOrderLine);
                $this->updateStock($productTemp);
                $productTemp->delete();


            }

            return view('shop.confirmCheckOut',compact('productTempList'));

        } else dd('paiement refuser');
    }


    /**
     * @param $productTemp
     */
    public function updateStock($productTemp)
    {
        $laShoe = \App\Shoe::findOrFail($productTemp->idShoe);
        $laShoe->quantity -= $productTemp->quantity;
        $laShoe->save();
    }

    public function  createAdressOrder($newOrder)
    {
        $adressShipment=\App\Adress::findorFail($newOrder->idAdress);

        $newAdressOrder= new Adressorder();
        $newAdressOrder->name=$adressShipment->name;
        $newAdressOrder->street =$adressShipment->street;
        $newAdressOrder->number=$adressShipment->number;
        $newAdressOrder->postCode=$adressShipment->postCode;
        $newAdressOrder->city=$adressShipment->city;
        $newAdressOrder->country=$adressShipment->country;
        $newAdressOrder->deliveryCost=$adressShipment->deliveryCost;
        $newAdressOrder->distance=$adressShipment->distance;
        $newAdressOrder->idOrder=$newOrder->id;

//        dd($adressShipment);
        $newAdressOrder->save();
    }

}
