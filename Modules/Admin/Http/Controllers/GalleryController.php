<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;

class GalleryController extends Controller
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
        $data['gallery'] = DB::table('gallery')->where('active',1)->paginate(config('app.row'));
        return view('admin::gallery.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('admin::gallery.create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        $request->validate([
            'sequence'=>'required',
            'photo'=>'max:200000'
            
        ]);

        $data = $request->except('_token','photo');
        if($request->photo){
            $data['photo'] = $request->file('photo')->store('uploads/gallery','customize');
        }
        $insert = DB::table('gallery')->insert($data);
       
        if($insert){
            return redirect()->route('gallery.index')->with('success',config('app.success'));
        }else{
            return redirect()->route('gallery.create')->with('error',config('app.error'))->withInput();
        }
    }


    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        $data['gallery'] = Db::table('gallery')->find($id);
        return view('admin::gallery.edit',$data);
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
            'sequence'=>'required'
        ]);
        $data = $request->except('_token','photo','_method');
        if($request->photo){
            $data['photo'] = $request->file('photo')->store('uploads/gallery','customize');
        }
       
        $fetch_gallery = DB::table('gallery')->find($id);
        $update = DB::table('gallery')->where('id',$id)->update($data);

        if($update){
            if($fetch_gallery){
                @unlink($fetch_gallery->photo);
                return redirect()->route('gallery.index',$id)->with('success',config('app.success'));
            }
        }else{
            return redirect()->route('gallery.edit',$id)->with('error',config('app.error'));
        }

    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function delete($id)
    {
        $delete = DB::table('gallery')->where('id',$id)->update(['active'=>0]);
        if($delete){
            return redirect()->route('gallery.index')->with('success',config('app.delete'));
        }else{
            return redirect()->route('gallery.index')->with('error',config('app.delete_fail'));
        }

    }
}
