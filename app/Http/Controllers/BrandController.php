<?php 

namespace App\Http\Controllers;
use Illuminate\Http\Request;

class BrandController extends Controller 
{

  /**
   * Display a listing of the resource.
   *
   * @return Response
   */
  public function index()
  {
      $brandList= \App\Brand::all();
    return $brandList;
  }

    static function indexBrand()
    {
        $brandList= \App\Brand::all();
        foreach ($brandList as $brand)
        {
        $count=\App\Modele::where('idBrand',$brand->id)->count();
        $brand['count']=$count;
        }
        return $brandList;
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
  public function store(Request $request)
  {
      $this->validate($request, [
          'name' => 'bail|unique:types|max:100',
      ]);

      $brand=$request->all();
//      dd($request);


      if($request->file('logo')==null){
dd('pas top');
          $nom="no-image.jpg";
      }
      else{
          $nom= $request->file('logo')->getClientOriginalName();
          $file = $request->file('logo');
          $destinationPath = 'image';
//          dd($file);
          $file->move($destinationPath,$nom);
      }
      $brand['logo']=$nom;
      \App\Brand::create($brand);

      return redirect('admin/settings/product');

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