<?php 

namespace App\Http\Controllers;
use Illuminate\Http\Request;


class TypeController extends Controller 
{
//
//  /**
//   * Display a listing of the resource.
//   *
//   * @return Response
//   */
//  public function index()
//  {
//
//  }
//
//  /**
//   * Show the form for creating a new resource.
//   *
//   * @return Response
//   */
//  public function create()
//  {
//
//  }

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

      $type=$request->all();

      \App\Type::create($type);
      return redirect('admin/settings/product');
  }
//
//  /**
//   * Display the specified resource.
//   *
//   * @param  int  $id
//   * @return Response
//   */
//  public function show($id)
//  {
//
//  }

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


  
}

?>