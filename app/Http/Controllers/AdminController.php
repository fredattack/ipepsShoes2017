<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{

    public function index()
    {
        $countModel=\App\Modele::count();
        return view('admin.adminHome',compact(['countModel']));
    }

    public function settingsProduct(){
        $typeList =\App\Type::orderBy('id')->get();
        $genderList =\App\Gender::orderBy('id')->get();
        $brandList =\App\Brand::orderBy('id')->get();
        return view('admin.settings.product',compact(['typeList','genderList','brandList']));
    }

}
