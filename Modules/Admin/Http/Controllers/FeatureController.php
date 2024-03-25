<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;

class FeatureController extends Controller
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
        $feature = DB::table('features')->where('active',1)->paginate(config('app.row'));
        return view('admin::feature.index',compact('feature'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('admin::feature.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'icon'=>'unique:features',
            'title'=>'required|unique:features',
            'description'=>'required'
        ]);
        $data = $request->except('_token');
        $insert = DB::table('features')->insert($data);
        if($insert){
            return redirect()->route('feature.index')->with('success',config('app.success'));
    }else{
        return redirect()->route('feature.create')->with('error',config('app.error'))->withInput();
    }

    }


    public function edit($id)
    {
        $fetch_feature =  DB::table('features')->find($id);
        return view('admin::feature.edit',compact('fetch_feature'));
    }

    
    public function update(Request $request, $id)
    {
        $request->validate([
            'title'=>'required',
            'description'=>'required'
        ]);
        $data = $request->except('_token','_method');
        $update = DB::table('features')->where('id',$id)->update($data);
        if($update){
                return redirect()->route('feature.index',$id)->with('success',config('app.row'));
        }else{
                return redirect()->route('feature.edit',$id)->with('error',config('app.row'));
        }
        
    }


    public function delete($id)
    {
        $delete = DB::table('features')->where('id',$id)->update(['active'=>0]);
        if($delete){
                return redirect()->route('feature.index',$id)->with('success',config('app.delete'));
        }else{
            return redirect()->route('feature.index',$id)->with('error',config('app.delete_fail'));
        }
    }
}
