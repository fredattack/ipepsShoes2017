<?php 

namespace App\Http\Controllers;
use Illuminate\Http\Request;

class UserController extends Controller 
{

  /**
   * Display a listing of the resource.
   *
   * @return Response
   */
  public function index()
  {
      $userList=\App\User::with(array('adress','order'))->orderBy('role','asc')->get();

//      dd($userList);
      return view('admin.user.index',compact('userList'));
    
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return Response
   */
  public function create()
  {
    
  }

  /**
   * Store a newly created resource in storage.
   *
   * @return Response
   */
  public function store()
  {
    
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return Response
   */
  public function show($id)
  {
      $user = \App\User::with(array('adress','order'))->findOrFail($id);
      $orderList=\App\Order::with(array('user'))->where('idUser',$id)->orderBy('id')->get();
      $totalUser=\App\Order::where('idUser',$id)->sum('TotalProducts');
//      dd($totalUser);
      if($user->role=='client')      return view('admin.user.show',compact(['user','orderList','totalUser']));
      else return view('admin.user.showAdmin',compact(['user','orderList','totalUser']));
  }

    public function showFront($id)
    {
        $user = \App\User::with(array('adress','order'))->findOrFail($id);
        $orderList=\App\Order::with(array('user'))->where('idUser',$id)->orderBy('id')->get();
        $totalUser=\App\Order::where('idUser',$id)->sum('TotalProducts');
//      dd($totalUser);
        if($user->role=='client')      return view('shop.userShow',compact(['user','orderList','totalUser']));
        else return view('admin.user.showAdmin',compact(['user','orderList','totalUser']));
    }
  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return Response
   */
  public function edit($id)
  {
      $user = \App\User::with(array('adress','order'))->findOrFail($id);
//      $orderList=\App\Order::with(array('user'))->where('idUser',$id)->orderBy('id')->get();
//      $totalUser=\App\Order::where('idUser',$id)->sum('TotalProducts');
//      dd($totalUser);
//      if($user->role=='client')      return view('admin.user.show',compact(['user','orderList','totalUser']));
       return view('admin.user.edit',compact('user'));
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function update($id,Request $request)
  {
      $this->validate($request, [
          'firstName' => 'required|string|max:50',
          'lastName' => 'required|string|max:50',
          'login' => 'required|string|max:50',
          'email' => 'required|string|email|max:255',
      ]);

      $user = \App\Modele::findOrFail($id);
      $input = $request->all();

      $user->fill($input)->save();

      $userList=\App\User::with(array('adress','order'))->orderBy('role','asc')->get();

//      dd($userList);
      return view('admin.user.index',compact('userList'));
  }

    public function updateRole(Request $request)
    {
        $id=$request->input('id');
        $user = \App\User::findOrFail($id);
        if($request->input('Role')==0)$user->role= 'admin';
        else if($request->input('Role')==1)$user->role= 'client';
        else $user->role='seller';
        $user->save();
        return response($user);
    }

    public function updateFront(Request $request)
    {
        $user=\Auth::user();
//            validation2
        $this->controlTwoAdress($request);


        if($user->idFactAdress!=null)   // if user have an adress
        {

            $this->updateUser($request, $user);
//            dd($user);
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
//            dd('dans le else');
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
//        $user = \App\User::with(array('adress','order'))->findOrFail($id);
        $orderList=\App\Order::with(array('user'))->where('idUser',$user->id)->orderBy('id')->get();
//        $totalUser=\App\Order::where('idUser',$id)->sum('TotalProducts');
//      dd($totalUser);
     return view('shop.userShow',compact(['user','orderList']));
    }
  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function destroy($id)
  {
    
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

?>