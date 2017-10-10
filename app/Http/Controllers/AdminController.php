<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{

    public function index()
    {
        $countModel=\App\Modele::count();
        return view('admin.adminHome',compact(['countModel']));
//        redirect ('admin');
    }

}
