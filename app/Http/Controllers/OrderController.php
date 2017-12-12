<?php 

namespace App\Http\Controllers;

class OrderController extends Controller 
{

  /**
   * Display a listing of the resource.
   *
   * @return Response
   */
  public function index()
  {
      $newOrderList=\App\Order::with(array('user'))->where('OrderReady',0)->orderBy('delivered','desc')->get();
      $orderReadyList=\App\Order::with(array('user'))->where('OrderReady',1)->orderBy('delivered','desc')->get();
//      dd($newOrderList);
    return view('admin.order.index',compact('newOrderList','orderReadyList'));
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
      $order = \App\Order::with(array('user','shipment','orderLine'))->findOrFail($id);
      $orderLineList=\App\OrderLine::with(array('shoe'))->where('idOrder',$id)->get();
//        dd($orderLineList);
        return view('admin.order.show',compact(['order','orderLineList']));
  }

    public function showListFront($id)
    {
        $user = \App\User::with(array('adress','order'))->findOrFail($id);
        $orderList=\App\Order::with(array('user'))->where('idUser',$id)->orderBy('id')->get();
        $totalUser=\App\Order::where('idUser',$id)->sum('TotalProducts');
//      dd($totalUser);
        return view('shop.user.orderListShow',compact(['user','orderList','totalUser']));
    }

    public function showFront($id)
    {
        $order = \App\Order::with(array('user','orderLine'))->findOrFail($id);
        $productTempList=\App\OrderLine::with(array('shoe'))->where('idOrder',$id)->get();
        $adress=\App\Adressorder::where('idOrder',$id)->first();
//        dd($adress);
        return view('Shop.user.orderShow',compact(['order','productTempList','adress']));
    }


  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return Response
   */
  public function edit($id)
  {
      $order = \App\Order::findOrFail($id);
      if($order->orderReady==0)
      {
          $order->orderReady=1 ;
      }
      else
      {
          $order->delivered = 1;
      }

      $order->save();
      $newOrderList=\App\Order::with(array('user'))->where('OrderReady',0)->orderBy('id')->get();
      $orderReadyList=\App\Order::with(array('user'))->where('OrderReady',1)->orderBy('id')->get();
//      dd($newOrderList);

      return view('admin.order.index',compact('newOrderList','orderReadyList'));
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function update($id)
  {
    
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