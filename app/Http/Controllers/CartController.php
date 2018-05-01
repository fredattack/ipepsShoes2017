<?php

namespace App\Http\Controllers;

use App\Shoe;
use App\TempCartItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;

class CartController extends Controller
{


   public function show(){
       $user=Auth::user();
       $user=\App\User::with(array('adress'))->findOrFail($user->id);
       $productTempList=\App\TempCartItem::with('shoe')->where('idUser',$user->id)->orderBy('idShoe')->get();
//       dd($productTempList);
//       dd($user);
       return view('shop.cart',compact(['productTempList','user']));
   }

   public function storeInSession(Request $request){
//       dd($request);
       $id=Auth::user()->id;
       $shoe= \App\Shoe::with('modele')->where('idModele',$request->idModele)->where('size',$request->size)->firstOrFail();
//       dd($shoe);
       if(\App\TempCartItem::where('idShoe',$shoe->id)->count()==0)
       {

           $tempOrderLine=new TempCartItem();
           $tempOrderLine->idShoe=$shoe->id;
           $tempOrderLine->quantity=$request->quantity;
           if($tempOrderLine->quantity > $shoe->quantity)
           {
               $tempOrderLine->quantity > $shoe->quantity;
               return redirect()->back()->with('danger', 'le stock disponible pour cette article dans cette pointure  est de ' . $shoe->quantity);
           }
           else{

           }
           $tempOrderLine->idUser = $id;
           $tempOrderLine->save();
       }
       else

       {
           $tempOrderLine=\App\TempCartItem::where('idShoe',$shoe->id)->firstOrFail();
           $tempOrderLine->quantity=$tempOrderLine->quantity +$request->quantity;
           if($tempOrderLine->quantity > $shoe->quantity)
           {
               $tempOrderLine->quantity > $shoe->quantity;
               return redirect()->back()->with('danger', 'le stock disponible pour cette article dans cette pointure est de ' . $shoe->quantity);
           }
           $tempOrderLine->idUser = $id;
           $tempOrderLine->update();
       }

//       dd($tempOrderLine);
//       $product = array("shoe" => $shoe,"quantity" => $request->quantity);
       return redirect('cart');

   }

   public function cartUpdatePlus($id,$quantity)
   {
       $productTemp = \App\TempCartItem::findOrFail($id);
       $shoe = \App\Shoe::findOrFail($productTemp->idShoe);
       $productTemp->quantity += $quantity;
       if ($productTemp->quantity > $shoe->quantity)
       {
           return redirect()->back()->with('danger', 'le stock disponible pour cette article dans cette pointure est de ' . $shoe->quantity);
       }
       else

       {
           $productTemp->update();
           return redirect('cart');
       }
   }

   public function cartUpdateMinus($id,$quantity){
       $productTemp=\App\TempCartItem::findOrFail($id);
       $shoe=\App\Shoe::findOrFail($productTemp->idShoe);
       $productTemp->quantity+=$quantity;
        if($productTemp->quantity==0)
        {
            $productTemp->delete();
        }
        else
        {
            $productTemp->update();
        }
           return redirect('cart');

        }




   public function destroy($id){
       $productTemp=\App\TempCartItem::findOrFail($id);
//       dd($productTemp);
       $productTemp->delete();

       return redirect('cart');

   }

}
