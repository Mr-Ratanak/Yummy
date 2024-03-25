<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;

class MenuController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
   
    public function index()
    {
        $data['fetch_menu'] = DB::table('menu')->join('category','menu.category_id','category.id')
        ->where('menu.active',1)->select('menu.*','category.name as cname')->paginate(config('app.row'));
        return view('admin::menu.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        $data['fetch_category'] = DB::table('category')->where('active',1)->get();
        return view('admin::menu.create',$data);
    }

    public function store(Request $request)
    {
       $request->validate([
        'title'=>'required|unique:menu|min:1',
        'description'=>'required',
        'price'=>'required',
        'category_id'=>'required'
       ]);
       $data = $request->except('_token','image');
       if($request->image){
        $data['image'] = $request->file('image')->store('uploads/menu','customize');
       }
       $insert = DB::table('menu')->insert($data);
       if($insert){
            return redirect()->route('menu.index')->with('success',config('app.success'));
       }else{
        return redirect()->route('menu.create')->with('error',config('app.error'))->withInput();
       }


    }


    public function edit($id)
    {
        $fetch_data['cat'] = DB::table('category')->where('active',1)->get();
        $fetch_data['fetch'] = DB::table('menu')->find($id);
        return view('admin::menu.edit',$fetch_data);
    }

    
    public function update(Request $request, $id)
    {
        $request->validate([
        'title'=>'required|min:1',
        'description'=>'required',
        'price'=>'required'
        ]);

        $data = $request->except('_token','image','_method');
        if($request->image){
            $data['image'] = $request->file('image')->store('uploads/menu','customize');
        }
        $update = DB::table('menu')->where('id',$id)->update($data);
        if($update){
            return redirect()->route('menu.index',$id)->with('success',config('app.success'));
        }else{
            return redirect()->route('menu.index',$id)->with('error',config('app.error'));
        }

    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function delete($id)
    {
        $delete = DB::table('menu')->where('id',$id)->update(['active'=>0]);
        $fetch_menu_item = DB::table('menu')->find($id);
        if($delete){
            if($fetch_menu_item->image){
                @unlink($fetch_menu_item->image);
                return redirect()->route('menu.index')->with('success',config('app.delete'));
            }
        }else{
            return redirect()->route('menu.index')->with('error',config('app.delete_fail'));
        }

    }
}
