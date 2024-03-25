<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;

class ChefController extends Controller
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
        $data['chef'] = DB::table('chefs')->where('active',1)->paginate(config('app.row'));
        return view('admin::chef.index',$data);
    }

    public function create()
    {
        return view('admin::chef.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required|unique:chefs|min:3',
            'position'=>'required|unique:chefs',
            'description'=>'required',
            'twitter',
            'facebook',
            'instagram',
            'linkin'
        ]);
        $data = $request->except('_token','photo');
        if($request->photo){
            $data['photo'] = $request->file('photo')->store('uploads/chef','customize');
        }
        $insert_chef = DB::table('chefs')->insert($data);
        if($insert_chef){
                return redirect()->route('chef.index')->with('success',config('app.success'));
        }else{
            return redirect()->route('chef.create')->with('error',config('app.error'))->withInput();
        }
    }


    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        $edit = DB::table('chefs')->find($id);
        return view('admin::chef.edit',compact('edit'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name'=>'required|min:1',
            'position'=>'required',
            'description'=>'required'
        ]);
        $data = $request->except('_token','photo','_method');
        if($request->photo){
            $data['photo'] = $request->file('photo')->store('uploads/chef','customize');
        }
        $fetch_chef = DB::table('chefs')->find($id);
        $update = DB::table('chefs')->where('id',$id)->update($data);
        if($update){
            if($fetch_chef){
                @unlink($fetch_chef->photo);
                return redirect()->route('chef.index',$id)->with('success',config('app.row'));
            } 
        }else{
            return redirect()->route('chef.edit',$id)->with('error',config('app.row'));
        }

    }

    public function delete($id)
    {
        $fetch = DB::table('chefs')->find($id);
        if($fetch->photo){
            @unlink($fetch->photo);
        } 
        $delete = DB::table('chefs')->where('id',$id)->update(['active'=>0]);
       
        if($delete){
            return redirect()->route('chef.index',$id)->with('success',config('app.delete'));
        }else{
            return redirect()->route('chef.index',$id)->with('error',config('app.delete_fail'));
        }

    }
}
