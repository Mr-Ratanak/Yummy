<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;

class PageController extends Controller
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
        $read_page = DB::table('page_info')->get();
        return view('admin::page_info.index',compact('read_page'));
    }


    public function edit($id)
    {
        $edit['page'] = DB::table('page_info')->find($id);
        return view('admin::page_info.edit',$edit);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title'=>'required',
            'slug'=>'required'
        ]);
        $data = $request->except('_token','_method');
        $update = DB::table('page_info')->where('id',$id)->update($data);
        if($update){
            return redirect()->route('page_info.index',$id)->with('success',config('app.success'));
        }else{
            return redirect()->route('page_info.index',$id)->with('error',config('app.error'));
        }
    }


}
