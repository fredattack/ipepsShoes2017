<?php 

namespace App\Http\Controllers;
use App\Modele;
use App\Shoe;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class shoeController extends Controller
{

  /**
   * Display a listing of the resource.
   *
   * @return Response
   */
  public function index()
  {
//


      $shoesList= \App\Shoe::with('modele')->orderBy('idModele')->get();
//      dd($shoesList);




      $genderList =\App\Gender::orderBy('name')->pluck('name', 'id');
      $typeList =\App\Type::orderBy('name')->pluck('name', 'id');
      $brandList =\App\Brand::orderBy('name')->pluck('name', 'id');


//      dd($shoesList);
      return view('admin.shoe.index',compact(['shoesList','brandList','typeList','genderList']));
  }

  /**
  * redirection bouton stock
   *
   *
   */

  public function stock($id)
  {
      $leModele = \App\Modele::findOrFail($id);
      $shoesList =\App\Shoe::where('idModele',$id)->get();
      $count =\App\Shoe::where('idModele','=',$id)->count();
      if($count==0) {
          return  view('admin.shoe.create',compact('leModele'));
      }
      else{

          return view('admin.shoe.edit',compact(['leModele','shoesList']));
      }
  }



  /**
   * Store a newly created resource in storage.
   *
   * @return Response
   */
  public function store(Request $request)
  {
//      dd($request);
      $id=$request->idModele;
      $leModele = \App\Modele::findOrFail($id);

      $test=$request->except('idModele','_token');
      foreach ($test as $size => $quantity) {

        $theShoe=new Shoe();
        $theShoe->size=$size;
        if($quantity!=null)$theShoe->quantity=$quantity;
        else $theShoe->quantity=0;
        $theShoe->idModele=$id;
        $theShoe->save();
      }

      return redirect('admin/modele');


  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return Response
   */
  public function show($id)
  {
      $leModele = \App\Modele::findOrFail($id);
      $shoesList =\App\Shoe::where('idModele',$id)->get();
      $similarList=\App\Modele::where('idType',$leModele->idType)->where('idGender',$leModele->idGender)->get();
      if(count($similarList)<3)  $similarList=\App\Modele::where('idGender',$leModele->idGender)->get();
//      dd($shoesList);
      return view('shop.product',compact(['leModele','shoesList','similarList']));

  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return Response
   */

  /**
   * Update the specified resource in storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function update(Request $request)
  {
    dd($request);
  }

    public function stockUpdate(Request $request)
    {
        $id=$request->idModele;
//        $leModele = \App\Modele::findOrFail($id);

        $test=$request->except('idModele','_token');
        foreach ($test as $size => $quantity) {
            $theShoe = \App\Shoe::where('idModele',$id)->where('size',$size)->update(['quantity'=>$quantity]);
//            $theShoe->quantity=$quantity;
//            $theShoe->save();
        }

        $modeleList= \App\Modele::with(array('type','brand'))->orderBy('idGender')->get();
        $genderList =\App\Gender::orderBy('id')->get();
        return redirect('admin/modele');
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