<?php

namespace App\Http\Controllers;

use App\Adress;
use Illuminate\Http\Request;

class CheckOutController extends Controller
{
    //
    public function show(){
        $user=\Auth::user();
        $user=\App\User::with(array('adress'))->findOrFail($user->id);
        $productTempList=\App\TempCartItem::with('shoe')->where('idUser',$user->id)->orderBy('idShoe')->get();
        $step=1;
        return view('shop.checkOut',compact(['productTempList','user','step']));
    }

    public function showCart(Request $request){
        $user=\Auth::user();

        if($request->sameAdress=='on')
        {
//           validation1
            $this->controlFactAdressOnly($request);
        }
        else{
//            validation2
            $this->controlTwoAdress($request);
        }

        if($user->idFactAdress!=null)   // if user have an adress
        {
            $this->updateUser($request, $user);
//todo right adress of Shipment
            $idAdress=$user->idFactAdress;
            $adressFact=\App\Adress::findOrFail($idAdress);
            $idShipment=$user->idShipAdress1;
            $shipAdress=\App\Adress::findOrFail($idShipment);

            if($request->sameAdress=='on')
            {
                $this->UpdateFactAdress($request, $adressFact);
                $user->save();
            }
            else
            {
                $this->updateTwoAdress($request, $adressFact, $shipAdress);
                $user->save();
            }

        }
        else
        {//if User haven't any adress
            //0 update user Info
//            dd('Dans la boucle sans adresse');
            $user->lastName=$request->lastName;
            $user->firstName=$request->firstName;
            $user->login=$request->login;
            $user->email=$request->email;

            $idFactAdress = $this->createNewFactAdress($request, $user);


            //attribute the new adress to user idFactadress
            $user->idFactAdress=$idFactAdress->id;


            if($request->sameAdress=='on')
            {
                $user->idShipAdress1=$idFactAdress->id;
                $user->save();

            }
            else
            {
                $this->createShipAdress($request, $user);


            }
        }

        $productTempList=\App\TempCartItem::with('shoe')->where('idUser',$user->id)->orderBy('idShoe')->get();
        $step=2;
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
//        dd($total);
        $control= true;



        //after control paiement
        return $this->confirmOrder($control,$total);
    }

    /**
     * @param Request $request
     */
    public function controlFactAdressOnly(Request $request)
    {
        $this->validate($request, [
            'firstName' => 'bail|required|string|max:50',
            'lastName' => 'bail|required|string|max:50',
            'login' => 'bail|required|string|max:50',
            'email' => 'bail|required|string|email|max:255',
            'factAdress_name' => 'bail|required|string|max:100',
            'factAdress_street' => 'bail|required|string|max:100',
            'factAdress_number' => 'bail|required|string|max:5',
            'factAdress_postCode' => 'bail|required|max:50',
            'factAdress_city' => 'bail|required|string|max:50',
            'factAdress_country' => 'bail|required|string|max:50',
        ]);
    }

    /**
     * @param Request $request
     */
    public function controlTwoAdress(Request $request)
    {
        $this->validate($request, [
            'firstName' => 'bail|required|string|max:50',
            'lastName' => 'bail|required|string|max:50',
            'login' => 'bail|required|string|max:50',
            'email' => 'bail|required|string|email|max:255',
            'factAdress_name' => 'bail|required|string|max:100',
            'factAdress_street' => 'bail|required|string|max:100',
            'factAdress_number' => 'bail|required|string|max:5',
            'factAdress_postCode' => 'bail|required|string|max:50',
            'factAdress_city' => 'bail|required|string|max:50',
            'factAdress_country' => 'bail|required|string|max:50',
            'shipAdress_name' => 'bail|required|string|max:100',
            'shipAdress_street' => 'bail|required|string|max:100',
            'shipAdress_number' => 'bail|required|string|max:5',
            'shipAdress_postCode' => 'bail|required|string|max:50',
            'shipAdress_city' => 'bail|required|string|max:50',
            'shipAdress_country' => 'bail|required|string|max:50',

        ]);
    }

    /**
     * @param Request $request
     * @param $adressFact
     */
    public function UpdateFactAdress(Request $request, $adressFact)
    {
        //1 update FactAdress
        $adressFact->name = $request->factAdress_name;
        $adressFact->street = $request->factAdress_street;
        $adressFact->number = $request->factAdress_number;
        $adressFact->postCode = $request->factAdress_postCode;
        $adressFact->city = $request->factAdress_city;
        $adressFact->country = $request->factAdress_country;
        $adressFact->deliveryCost = 5.00;//todo deliveryCost
        $adressFact->save();
    }

    /**
     * @param Request $request
     * @param $adressFact
     * @param $shipAdress
     */
    public function updateTwoAdress(Request $request, $adressFact, $shipAdress)
    {
        //1 update FactAdress
        $adressFact->name = $request->factAdress_name;
        $adressFact->street = $request->factAdress_street;
        $adressFact->number = $request->factAdress_number;
        $adressFact->postCode = $request->factAdress_postCode;
        $adressFact->city = $request->factAdress_city;
        $adressFact->country = $request->factAdress_country;
        $adressFact->deliveryCost = 5.00;//todo deliveryCost
        $adressFact->save();

        //2 update ShipAdress

        $shipAdress->name = $request->shipAdress_name;
        $shipAdress->street = $request->shipAdress_street;
        $shipAdress->number = $request->shipAdress_number;
        $shipAdress->postCode = $request->shipAdress_postCode;
        $shipAdress->city = $request->shipAdress_city;
        $shipAdress->country = $request->shipAdress_country;
        $shipAdress->deliveryCost = 5.00;//todo deliveryCost
        $shipAdress->save();
    }

    /**
     * @param Request $request
     * @param $user
     */
    public function updateUser(Request $request, $user)
    {
        //0 update user Info
        $user->lastName = $request->lastName;
        $user->firstName = $request->firstName;
        $user->login = $request->login;
        $user->email = $request->email;
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
            $newOrder=\App\Order::create($newOrder);

            foreach ($productTempList as $productTemp)
            {
                $newOrderLine['idOrder']  = $newOrder->id;
                $newOrderLine['quantity'] = $productTemp->quantity;
                $newOrderLine['idShoe']   = $productTemp->idShoe;
                \App\OrderLine::create($newOrderLine);
                $productTemp->delete();
            }

            return view('shop.confirmCheckOut');

        } else dd('paiement refuser');
    }

    /**
     * @param Request $request
     * @param $user
     * @return mixed
     */
    public function createNewFactAdress(Request $request, $user)
    {
        //1 create FactAdress
        $newFactAdress = [];
        $newFactAdress['idUser'] = $user->id;
        $newFactAdress['name'] = $request->factAdress_name;
        $newFactAdress['street'] = $request->factAdress_street;
        $newFactAdress['number'] = $request->factAdress_number;
        $newFactAdress['postCode'] = $request->factAdress_postCode;
        $newFactAdress['city'] = $request->factAdress_city;
        $newFactAdress['country'] = $request->factAdress_country;
        $newFactAdress['deliveryCost'] = 5.00;//todo deliveryCost
        $idFactAdress = \App\Adress::create($newFactAdress);
        return $idFactAdress;
    }

    /**
     * @param Request $request
     * @param $user
     */
    public function createShipAdress(Request $request, $user)
    {
        //2 create ShipAdress
        $newShipAdress = [];
        $newShipAdress['idUser'] = $user->id;
        $newShipAdress['name'] = $request->shipAdress_name;
        $newShipAdress['street'] = $request->shipAdress_street;
        $newShipAdress['number'] = $request->shipAdress_number;
        $newShipAdress['postCode'] = $request->shipAdress_postCode;
        $newShipAdress['city'] = $request->shipAdress_city;
        $newShipAdress['country'] = $request->shipAdress_country;
        $newShipAdress['deliveryCost'] = 5.00;//todo deliveryCost
        //      dd($newShipAdress);
        $newShipAdress = \App\Adress::create($newShipAdress);
        //attribute the new adress to user idFactadress
        $user->idShipAdress1 = $newShipAdress->id;
        $user->save();
    }


}
