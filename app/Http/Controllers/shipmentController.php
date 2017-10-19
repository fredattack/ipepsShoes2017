<?php 

namespace App\Http\Controllers;

use App\Shipment;
use Symfony\Component\HttpFoundation\Request;

class shipmentController extends Controller
{

  /**
   * Display a listing of the resource.
   *
   * @return Response
   */
  public function index()
  {

      $newShipmentList=\App\Order::with(array('user'))->where('orderReady',1)->where('delivered','=',0)->orderBy('delivered','desc')->get();
      $shipmentReadyList=\App\Order::with(array('user'))->where('delivered',1)->orderBy('delivered','desc')->get();
//      dd($newOrderList);
      return view('admin.shipment.index',compact('newShipmentList','shipmentReadyList'));
    
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
      return view('admin.shipment.show',compact(['order','orderLineList']));
    
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return Response
   */
  public function edit(Request $request,$id)
  {
      $order = \App\Order::findOrFail($id);
      $order->delivered = 1;

      //  create shipment
      $shipment = new Shipment();
      $shipment->trackingNr=$request->trackingNr;
      $shipment->idAdress = $order->user->idShipAdress1;
      $shipment->save();
        // get idShipment + update order
      $order->idShipment = $shipment->id;
      $order->save();

      $newShipmentList=\App\Order::with(array('user'))->where('delivered',0)->orderBy('delivered','desc')->get();
      $shipmentReadyList=\App\Order::with(array('user'))->where('delivered',1)->orderBy('delivered','desc')->get();

      return view('admin.shipment.index',compact('newShipmentList','shipmentReadyList'));
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