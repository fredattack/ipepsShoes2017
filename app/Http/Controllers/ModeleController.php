<?php 

namespace App\Http\Controllers;
use App\Modele;
use Illuminate\Http\Request;

class ModeleController extends Controller 
{

  /**
   * Display a listing of the resource.
   *
   * @return Response
   */
  public function index()
  {
    $modeleList= \App\Modele::orderBy('idGender')->get();
    $genderList =\App\Gender::orderBy('id')->pluck('name', 'id');

      return view('admin.modele.index',compact(['modeleList','genderList']));

    dd($modeleList);
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return Response
   */
  public function create()
  {
      $genderList =\App\Gender::orderBy('name')->pluck('name', 'id');
      $typeList =\App\Type::orderBy('name')->pluck('name', 'id');
      $brandList =\App\Brand::orderBy('name')->pluck('name', 'id');;
      return view('admin.modele.create',compact(['brandList','typeList','genderList']));
  }

  /**
   * Store a newly created resource in storage.
   *
   * @return Response
   */
  public function store(Request $request)
  {
      $this->validate($request, [
          'name' => 'bail|required|unique:modeles|max:100',
          'price' => 'bail|required|numeric',
          'color'=>'bail|required|max:100',
          'idGender'=>'required',
          'idBrand' => 'required',
          'idType'=>'required'

      ]);

      $model = $request->all();
      $nom= $request->file('image')->getClientOriginalName();
      $model['image']=$nom;
      $model['idReduction']=1;
//      dd($model);
      \App\Modele::create($model);
      return 'ok on y est';
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