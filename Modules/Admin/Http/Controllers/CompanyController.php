<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $data['com'] = DB::table('company')->find(1);
        return view('admin::companies.index',$data);
    }

  
    public function edit(Request $req, $id)
    {
        $data['com'] = DB::table('company')->find(1);
        return view('admin::companies.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
 
     public function save(Request $request)
     {
         $data = array(
            'name'=>$request->name,
            'title'=>$request->title,
            'description'=>$request->description,
            'address'=>$request->address,
            'phone'=>$request->phone,
            'hours'=>$request->hours,
            'email'=>$request->email,
            'url'=>$request->url
         );
         if($request->logo){
            $data['logo'] = $request->file('logo')->store('uploads/company','customize');
         }
         $i = DB::table('company')->where('id',1)->update($data);
         if($i){
            return redirect()->route('company.index',1)->with('success',config('app.success'));
         }else{
            return redirect()->route('company.edit',1)->with('error',config('app.error'));
         }

     }

}
