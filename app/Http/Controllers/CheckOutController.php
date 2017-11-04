<?php

namespace App\Http\Controllers;

use App\Adress;
use Illuminate\Http\Request;

use Session;

class CheckOutController extends Controller
{
    //


    public function show(){
        $user=\Auth::user();
        $user=\App\User::with(array('adress'))->findOrFail($user->id);
//        $orderAdress=\App\Adress::findOrFail($user->idShipAdress);
        $productTempList=\App\TempCartItem::with('shoe')->where('idUser',$user->id)->orderBy('idShoe')->get();
        $step=1;
        return view('shop.checkOut',compact(['productTempList','user','step','orderAdress']));
    }

    public function showCart(Request $request){
//dd($request);
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
            dd('dansla boucle');
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
                $idAdress = $user->idFactAdress;
            }
            else
            {
                $this->updateTwoAdress($request, $adressFact, $shipAdress);
                $user->save();
                $idAdress = $user->idShipAdress1;
            }

        }
        else
        {//if User haven't any adress
            //0 update user Info
            $user->lastName=$request->lastName;
            $user->firstName=$request->firstName;
            $user->login=$request->login;
            $user->email=$request->email;

            $idFactAdress = $this->createNewFactAdress($request, $user);

            //attribute the new adress to user idFactadress
            $user->idFactAdress=$idFactAdress->id;

            if($request->sameAdress=='on')
            {
//                $user->idShipAdress1=$idFactAdress->id;
                $user->save();
                $idAdress = $user->idShipFactAdress;
            }
            else
            {
                $this->createShipAdress($request, $user);
                $idAdress= $user->idShipAdress1;
            }
        }
//        $orderAdress=\App\Adress::findOrFail($idOrderAdress);
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
        $deliveryCost = $this->calculDeliveryCost($adressFact);
        $adressFact->deliveryCost = $deliveryCost;
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
        $deliveryCost = $this->calculDeliveryCost($adressFact);
        $adressFact->deliveryCost = $deliveryCost;
        $adressFact->save();

        //2 update ShipAdress

        $shipAdress->name = $request->shipAdress_name;
        $shipAdress->street = $request->shipAdress_street;
        $shipAdress->number = $request->shipAdress_number;
        $shipAdress->postCode = $request->shipAdress_postCode;
        $shipAdress->city = $request->shipAdress_city;
        $shipAdress->country = $request->shipAdress_country;
        $deliveryCost = $this->calculDeliveryCost($shipAdress);
        $shipAdress->deliveryCost = $deliveryCost;
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
            $newOrder['idAdress'] =  session()->get('idAdress') ;
            $newOrder=\App\Order::create($newOrder);

            foreach ($productTempList as $productTemp)
            {
                $newOrderLine['idOrder']  = $newOrder->id;
                $newOrderLine['quantity'] = $productTemp->quantity;
                $newOrderLine['idShoe']   = $productTemp->idShoe;
                \App\OrderLine::create($newOrderLine);
                $this->updateStock($productTemp);
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
        $deliveryCost = $this->calculDeliveryCost($newFactAdress);
        $newFactAdress['deliveryCost'] = $deliveryCost;
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
        $deliveryCost = $this->calculDeliveryCost($newShipAdress);
        $newShipAdress['deliveryCost'] = $deliveryCost;
        //      dd($newShipAdress);
        $newShipAdress = \App\Adress::create($newShipAdress);
        //attribute the new adress to user idFactadress
        $user->idShipAdress1 = $newShipAdress->id;
        $user->save();
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

    public function calculDeliveryCost($adress)
    {
        $distance = "https://maps.googleapis.com/maps/api/distancematrix/json?units=metric&origins=Huy,Belgique&destinations=$adress->city,$adress->country&key=AIzaSyCLizDL0kGcKNIuAn8XwFxDcNSQbuKTXvY";
        $json = file_get_contents($distance);
        $distance = json_decode($json, true);
        $rows = $distance['rows'];
//        $rows=$rows->elements;
        $rows = $rows[0];
        $rows = $rows['elements'][0];
        $rows = $rows['distance'];
        $rows = $rows['value'];
        $distance = $rows / 1000;
//        dd($distance);
        if ($distance < 15) {
            $delivery['cost'] = 5.00;
        } else {
            $kiloMetreSup = $distance - 15;
            $deliveryCost = 5.00 + ($kiloMetreSup * 0.1);
        }
        return $deliveryCost;
    }

}
