<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{

    public function index()
    {
        $countModel=\App\Modele::count();
        $countOrder=\App\Order::count();
        $countShipment=\App\Order::where('orderReady','1')->Where('delivered','0')->count();
        $countUser=\App\User::where('role','client')->count();
        return view('admin.adminHome',compact(['countModel','countOrder','countShipment','countUser']));
    }

    public function settingsProduct(){
        $typeList =\App\Type::orderBy('id')->get();
        $genderList =\App\Gender::orderBy('id')->get();
        $brandList =\App\Brand::orderBy('id')->get();
        return view('admin.settings.product',compact(['typeList','genderList','brandList']));
    }

    public static function badgeGenerator(){
        $badge=[];
        $badge['modele']=\App\Modele::count();
        $badge['promo']=\App\Modele::where('idReduction','!=',1)->count();

        $badge['order']=\App\Order::count();
        $badge['newOrder']=\App\Order::where('orderReady','0')->Where('delivered','0')->count();
        $badge['newShipment']=\App\Order::where('orderReady','1')->Where('delivered','0')->count();
        $badge['user']=\App\User::where('role','client')->count();
//        dd($badge);
        return $badge;
    }



}
