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
  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function destroy($id)
  {
    
  }
  
}

?>