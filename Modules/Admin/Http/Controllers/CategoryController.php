<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $data['cat'] = DB::table('category')
        ->where('active',1)->paginate(config('app.row'));
        return view('admin::category.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('admin::category.create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
       $request->validate([
        'name'=>'required|min:3'
       ]);
       $insert = DB::table('category')->insert($request->except('_token'));
       if($insert){
          return redirect()->route('category.index')->with('success',config('app.success'));
       }else{
          return redirect()->route('category.create')->with('error',config('app.error'))->withInput();
       }
    }

        public function delete(Request $request, $id){
            $delete = DB::table('category')->where('id',$id)
            ->update(['active'=>0]);
            if($delete){
                return redirect()->route('category.index')->with('success',config('app.delete'));
             }else{
                return redirect()->route('category.index')->with('error',config('app.delete_fail'))->withInput();
             }

        }


    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        $data['cat'] = DB::table('category')->find($id);
        return view('admin::category.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name'=>'required|min:3'
        ]);
        $data = array(
            'name'=>$request->name,
            'slug'=>$request->slug
        );
        $edit = DB::table('category')->where('id',$id)
        ->update($data);

        if($edit){
            return redirect()->route('category.index',$id)->with('success',config('app.success'));
        }else{
            return redirect()->route('category.index',$id)->with('error',config('app.error'));
        }
    }


  
 
}
