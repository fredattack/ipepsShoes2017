<?php 

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class AdressController extends Controller 
{

  /**
   * Display a listing of the resource.
   *
   * @return Response
   */
  public function index()
  {
    
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
  public function store(Request $request)
  {
      $this->validate($request, [
          
          'name' => 'bail|required|string|max:100',
          'street' => 'bail|required|string|max:100',
          'number' => 'bail|required|string|max:5',
          'postCode' => 'bail|required|max:50',
          'city' => 'bail|required|string|max:50',
          'country' => 'bail|required|string|max:50',
      ]);

      $newAdress = [];
      $newAdress['idUser'] = Auth::User()->id;
      $newAdress['name'] = $request->name;
      $newAdress['street'] = $request->street;
      $newAdress['number'] = $request->number;
      $newAdress['postCode'] = $request->postCode;
      $newAdress['city'] = $request->city;
      $newAdress['country'] = $request->country;
      $deliveryCost = $this->calculDeliveryCost($newAdress);
      $newAdress['deliveryCost'] = $deliveryCost['cost'];
      $newAdress['distance']= $deliveryCost['distance'];
      \App\Adress::create($newAdress);

      return redirect()->route('showAdressListFront',['id' =>  Auth::User()->id]);
    
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return Response
   */
  public function show($id)
  {
    
  }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function showAdressListFront($id)
    {
        $adressList =\App\Adress::where('idUser',$id)->get();
        $user = \App\User::with(array('adress','order'))->findOrFail($id);

//        dd($adressList);
        return view('shop.user.adressListShow',compact(['adressList','user']));
    }
  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return Response
   */
  public function edit($id)
  {
    
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

          'name' => 'bail|required|string|max:100',
          'street' => 'bail|required|string|max:100',
          'number' => 'bail|required|string|max:5',
          'postCode' => 'bail|required|max:50',
          'city' => 'bail|required|string|max:50',
          'country' => 'bail|required|string|max:50',
      ]);

      $lAdresse = \App\Adress::findOrFail($id);
      $input = $request->all();
      $deliveryCost = $this->calculDeliveryCost($input);
      $input['deliveryCost'] = $deliveryCost['cost'];
      $input['distance']= $deliveryCost['distance'];
      $lAdresse->fill($input)->save();

      return redirect()->route('showAdressListFront',['id' =>  Auth::User()->id]);

  }

  public function userDefaultAdress($id){
     $user=Auth::user();
    if($user->idFactAdress==null)
    {
        $user->idFactAdress=$id;
        $user->idShipAdress1=$id;
    }
      $user->idShipAdress1=$id;
      $user->save();
//      dd($user);
//      $idUser=$user->id;
      return redirect()->route('showAdressListFront',['id' =>  Auth::User()->id]);
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function destroy($id)
  {
      $adress = \App\Adress::findOrFail($id);

      $adress->delete();

      return redirect()->route('showAdressListFront',['id' =>  Auth::User()->id]);
  }

    public function calculDeliveryCost($adress)
    {
        $city='bruxelles';
        $country='Belgium';
        $distance = "https://maps.googleapis.com/maps/api/distancematrix/json?units=metric&origins=Huy,Belgique&destinations=$city,$country&key=AIzaSyCLizDL0kGcKNIuAn8XwFxDcNSQbuKTXvY";
        $json = file_get_contents($distance);
        $distance = json_decode($json, true);
        $rows = $distance['rows'];
        $rows = $rows[0];
        $rows = $rows['elements'][0];
        $rows = $rows['distance'];
        $rows = $rows['value'];
        $distance = $rows / 1000;

        if ($distance < 15) {
            $delivery['cost'] = 5.00;
        } else {
            $kiloMetreSup = $distance - 15;
            $delivery['cost'] = 5.00 + ($kiloMetreSup * 0.1);
        }

        $delivery['distance']=$distance;
        return $delivery;
    }
  
}

?>