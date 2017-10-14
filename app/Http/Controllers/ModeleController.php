<?php 

namespace App\Http\Controllers;
use App\Modele;
use App\Type;
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
    $modeleList= \App\Modele::with(array('type','brand'))->orderBy('idGender')->get();
    $genderList =\App\Gender::orderBy('id')->get();
    $reductionList =\App\Reduction::orderBy('id')->pluck('value','id');


      return view('admin.modele.index',compact(['modeleList','genderList','reductionList']));

  }
    public function indexEnfant()
    {
        $modeleList= \App\Modele::with(array('type','brand'))->where('idGender',2)->orderBy('idGender')->get();
        $genderList =\App\Gender::orderBy('id')->get();

//        dd($modeleList);
        return view('admin.modele.indexEnfant',compact(['modeleList','genderList']));

    }

    public function indexFemme()
    {
        $modeleList= \App\Modele::where('idGender',1)->with(array('type','brand'))->orderBy('idGender')->get();
        $genderList =\App\Gender::orderBy('id')->get();

//    dd($modeleList);
        return view('admin.modele.indexFemme',compact(['modeleList','genderList']));

    }

    public function indexHomme()
    {
        $modeleList= \App\Modele::where('idGender',3)->with(array('type','brand'))->orderBy('idGender')->get();

        return view('admin.modele.indexHomme',compact(['modeleList','genderList']));

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
      $brandList =\App\Brand::orderBy('name')->pluck('name', 'id');
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

      if($request->file('image')==null){

      $nom="no-image.jpg";
  }
  else{
      $nom= $request->file('image')->getClientOriginalName();
      $file = $request->file('image');
      $destinationPath = 'image';
      $file->move($destinationPath,$nom);
  }
      $model['image']=$nom;
      $model['idReduction']=1;
//      dd($model);
      \App\Modele::create($model);
      return redirect('admin/modele');
//          ->withOk("Le Plat " . $request->input('name') . " a été modifié.");
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
      $leModele = \App\Modele::findOrFail($id);
      $genderList =\App\Gender::orderBy('name')->pluck('name', 'id');
      $typeList =\App\Type::orderBy('name')->pluck('name', 'id');
      $brandList =\App\Brand::orderBy('name')->pluck('name', 'id');;
//      dd($leModele);
      return view('admin.modele.edit',compact(['leModele','brandList','typeList','genderList']));

  }

  /**
   * Update the specified resource in storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function update(Request $request,$id)
  {
      $leModele = \App\Modele::findOrFail($id);
      $input = $request->all();
      if($request->file('image')==null){

          $input['image']=$leModele->image;
      }
      $leModele->fill($input)->save();

      return redirect('admin/modele')->withOk("Le Modèle" . $request->input('name') . " a été modifié.");
  }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function updateReduction(Request $request)
    {
        $id = $request->input('id');
        $leModele = \App\Modele::findOrFail($id);
        $leModele->idReduction= $request->input('reduction');

        $leModele->save();
        return response($leModele);
    }
  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function destroy($id)
  {
      $leModele = \App\Modele::findOrFail($id);

      $leModele->delete();


      return redirect()->route('modele.index');
  }
  
}

?>