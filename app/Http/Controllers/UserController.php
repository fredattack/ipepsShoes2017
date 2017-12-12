<?php 

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


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

  public function showUserInfo($id)
  {
      $user = \App\User::with(array('adress','order'))->findOrFail($id);

//      dd($userList);
      return view('shop.user.infoShow',compact('user'));
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
        if($user->role=='client')    return view('shop.user.userIndexShow');

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
        $user->lastName = $request->lastName;
        $user->firstName = $request->firstName;
        $user->email = $request->email;
        $user->save();

        return redirect()->route('showUserInfo',['id' =>  Auth::User()->id]);
    }

    public function updatePassword(Request $request){
        $user = \Auth::user();
        /*
        * Validate all input fields
        */
        $this->validate($request, [
            'oldPassword' => 'required|string|max:8',
            'newPassword' => 'required|string|min:8',
            'newPassword_confirmation' => 'required|min:8|same:newPassword'
        ]);

        if (Hash::check($request->oldPassword, $user->password))
        {
//            dd('match');
            $user->fill(['password' => Hash::make($request->newPassword)])->save();
            $request->session()->flash('message', 'Votre Mot de Passe a été modifié');
            return redirect()->route('ChangePassword');

        } else {
//            dd('no match');
            $request->session()->flash('error', 'l\'ancien mot de passe n\'est pas correct');
            return redirect()->route('ChangePassword');
        }


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
     * @param $adressFact
     * @return float
     */
    public function calculDeliveryCost($adress)
    {

        $distance = "https://maps.googleapis.com/maps/api/distancematrix/json?units=metric&origins=Huy,Belgique&destinations=$adress->city,$adress->country&key=AIzaSyCLizDL0kGcKNIuAn8XwFxDcNSQbuKTXvY";
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